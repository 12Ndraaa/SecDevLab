FROM php:8.3-fpm-bookworm

ENV DEBIAN_FRONTEND=noninteractive \
    APP_NAME="SecDevLab" \
    APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    DB_CONNECTION=mysql \
    SESSION_DRIVER=database \
    CACHE_STORE=database \
    QUEUE_CONNECTION=database \
    GIT_TERMINAL_PROMPT=0

RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    git \
    ca-certificates \
    curl \
    unzip \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        bcmath \
        intl \
        zip \
        gd \
        exif \
        pcntl \
        opcache \
    && rm -rf /var/lib/apt/lists/* \
    && rm -f /etc/nginx/sites-enabled/default /etc/nginx/conf.d/default.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . .

RUN rm -f bootstrap/cache/*.php \
    && mkdir -p \
        storage/app/cve-repo \
        storage/app/private \
        storage/app/public \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && COMPOSER_ALLOW_SUPERUSER=1 APP_KEY="base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" composer dump-autoload --no-dev --optimize --no-interaction \
    && APP_KEY="base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" php artisan route:cache \
    && APP_KEY="base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" php artisan view:cache \
    && chown -R www-data:www-data storage bootstrap/cache

COPY docker/php.ini /usr/local/etc/php/conf.d/zz-secdevlab.ini
COPY docker/php-fpm.conf /usr/local/etc/php-fpm.d/zz-secdevlab.conf
COPY docker/nginx.conf.template /etc/nginx/templates/default.conf.template
COPY docker/start.sh /usr/local/bin/start.sh

RUN sed -i 's/\r$//' \
        /usr/local/bin/start.sh \
        /usr/local/etc/php/conf.d/zz-secdevlab.ini \
        /usr/local/etc/php-fpm.d/zz-secdevlab.conf \
        /etc/nginx/templates/default.conf.template \
    && chmod +x /usr/local/bin/start.sh

EXPOSE 8080

ENTRYPOINT ["/usr/local/bin/start.sh"]
