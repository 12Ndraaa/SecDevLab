#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

export PORT="${PORT:-8080}"

if [ -z "${APP_KEY:-}" ]; then
    echo "[startup] WARNING: APP_KEY is not set; generating an ephemeral APP_KEY for this container instance." >&2
    export APP_KEY="base64:$(php -r 'echo base64_encode(random_bytes(32));')"
fi

mkdir -p \
    storage/app/cve-repo \
    storage/app/private \
    storage/app/public \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache

if [ -s /proc/net/if_inet6 ]; then
    sed "s|__PORT__|${PORT}|g" /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf
else
    sed -e "/listen \[::\]/d" -e "s|__PORT__|${PORT}|g" /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf
fi

nginx -t
php-fpm -t

# Cache configuration with live Railway environment variables
runuser -u www-data -- env HOME=/tmp php artisan config:cache

# Wait for MySQL readiness before running migrations & seeders
runuser -u www-data -- env HOME=/tmp php artisan db:wait --timeout="${DB_WAIT_TIMEOUT:-120}" --sleep=2

# Run idempotent schema migrations and seeders (UserSeeder, CatalogSeeder, CveSeeder)
runuser -u www-data -- env HOME=/tmp php artisan migrate --force
runuser -u www-data -- env HOME=/tmp php artisan db:seed --force

# Non-blocking trickest/cve auto-sync on initial boot (only when cve_articles <= 15)
if [ "${AUTO_SYNC_TRICKEST:-true}" = "true" ]; then
    (
        sleep 2
        echo "[startup] Checking initial trickest/cve sync (threshold <= 15)..."
        flock -n /tmp/secdevlab-trickest-sync.lock \
            runuser -u www-data -- env HOME=/tmp php artisan cve:sync-trickest \
                --years=2024,2025,2026 \
                --limit=300 \
                --only-if-count-lte=15 \
            || echo "[startup] WARNING: Background trickest/cve sync exited with non-zero status (web service remains healthy)." >&2
    ) &
fi

echo "[startup] Starting php-fpm and nginx on 0.0.0.0:${PORT}..."

php-fpm -F &
PHP_FPM_PID=$!

nginx -g 'daemon off;' &
NGINX_PID=$!

shutdown_services() {
    echo "[startup] Caught shutdown signal, stopping nginx and php-fpm..."
    kill -TERM "$NGINX_PID" "$PHP_FPM_PID" 2>/dev/null || true
    wait "$NGINX_PID" "$PHP_FPM_PID" 2>/dev/null || true
    exit 0
}

trap shutdown_services TERM INT

wait -n "$PHP_FPM_PID" "$NGINX_PID"
EXIT_CODE=$?
echo "[startup] A primary web process exited unexpectedly with code ${EXIT_CODE}; shutting down." >&2
kill -TERM "$NGINX_PID" "$PHP_FPM_PID" 2>/dev/null || true
wait "$NGINX_PID" "$PHP_FPM_PID" 2>/dev/null || true
exit "$EXIT_CODE"
