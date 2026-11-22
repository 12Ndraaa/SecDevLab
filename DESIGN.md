# DESIGN.md — SecDevLab (`APP_NAME` Configurable Cyber Security Academy & CVE Platform)

## 1. Visual Direction & Domain
- **Product Type**: Zero-JS Server-Side Rendered Cyber Security Training Platform, CVE Knowledge Base, Per-Session Isolated Lab Simulator & Owner Control Panel (`SecDevLab`, configurable via `APP_NAME`).
- **Aesthetic Direction**: **Command Center + TerminalUI** (`designmd.ai/frknaykc/command-center` + `designmd.ai/chef/terminalui-design-system`) — high-contrast command surfaces paired with calm reading surfaces, vivid `#fe6e00` primary telemetry signal, semantic status accents, and authentic `#0d0d0d` / `#141414` monospace terminal consoles with `tabular-nums`.
- **Core Constraint**: **100% Zero-JavaScript** (`Blade + Pure CSS`). Zero `.js` or `.mjs` files exist in `public/` or `resources/`, zero `<script>` tags in rendered HTML, zero inline JS handlers, and zero `localStorage` dependencies.
- **Iconography Policy**: **Zero emojis as icons** — all UI icons (shield, sun/moon theme switchers, lock, terminal, refresh, trophy, lab flask, archetype icons) use crisp inline SVGs (`stroke="currentColor"`).
- **Theme Support**: Supports **Dark Mode** (default) and **Light Mode** via `[data-theme="dark"]` / `[data-theme="light"]` on both the Academy shell (`public/content/academy-modern.css`) and Per-Session Lab Command Bar + 8 Target Archetype Workbenches (`public/content/lab-workbench.css`), maintaining >= 4.5:1 text contrast in both themes, **Bilingual EN/ID** UI (`lang/en/academy.php`, `lang/id/academy.php`), and **Print-Ready Reports** (`@media print`).

---

## 2. Design Tokens (`academy-modern.css` & `lab-workbench.css`)

### Dark Mode (`[data-theme="dark"]`, default)
- **Command Center Canvas & Surfaces**:
  - `--vla-bg`: `#090b10` | `--vla-bg-elevated`: `#0f131c`
  - `--vla-surface`: `#141925` | `--vla-surface-2`: `#1a2132`
  - `--vla-border`: `#252f45` | `--vla-border-strong`: `#374563`
- **Typography & Contrast (>= 4.5:1)**:
  - `--vla-heading`: `#f8fafc` | `--vla-text`: `#e2e8f0` | `--vla-text-muted`: `#94a3b8`
- **Primary Signal & Semantic Status**:
  - `--vla-orange` (Primary Signal): `#fe6e00` (`--vla-orange-hover`: `#ff8524`, `--vla-orange-soft`: `rgba(254, 110, 0, 0.15)`)
  - `--vla-accent` (Technical Cyan): `#06b6d4` (`--vla-accent-hover`: `#22d3ee`, `--vla-accent-soft`: `rgba(6, 182, 212, 0.14)`)
  - `--vla-info` (Command Info): `#3080ff` (`--vla-info-soft`: `rgba(48, 128, 255, 0.15)`)
  - `--vla-emerald` (Solved / Success): `#00c758` (`--vla-emerald-soft`: `rgba(0, 199, 88, 0.15)`)
  - `--vla-warning` (Caution / TTL): `#edb200` (`--vla-warning-soft`: `rgba(237, 178, 0, 0.15)`)
  - `--vla-danger` (Critical / Error): `#fb2c36` (`--vla-danger-soft`: `rgba(251, 44, 54, 0.15)`)
- **TerminalUI Dark Console**:
  - `--vla-terminal-bg`: `#0d0d0d` | `--vla-terminal-surface`: `#141414` | `--vla-terminal-border`: `#262626`
  - `--vla-code-bg`: `#0a0c10` | `--vla-code-text`: `#7dd3fc`

### Light Mode (`[data-theme="light"]`)
- **Calm Reading Surfaces & Crisp Borders**:
  - `--vla-bg`: `#f4f6fa` | `--vla-bg-elevated`: `#ffffff`
  - `--vla-surface`: `#ffffff` | `--vla-surface-2`: `#f8fafc`
  - `--vla-border`: `#d5dde8` | `--vla-border-strong`: `#b6c3d4`
- **Typography & Contrast (>= 4.5:1)**:
  - `--vla-heading`: `#0b1220` | `--vla-text`: `#1e293b` | `--vla-text-muted`: `#475569`
- **Primary Signal & Semantic Status (Light-calibrated >= 4.5:1)**:
  - `--vla-orange`: `#d95400` (`--vla-orange-hover`: `#b84700`)
  - `--vla-accent`: `#0369a1` | `--vla-info`: `#1d4ed8`
  - `--vla-emerald`: `#047857` | `--vla-warning`: `#b45309` | `--vla-danger`: `#dc2626`
- **TerminalUI Console in Light Mode**:
  - Retains dark `#0d0d0d` / `#141414` terminal console surface with crisp `#e5e7eb` / `#7dd3fc` monospace text for authentic terminal telemetry legibility.

### CVSS & Difficulty Badges
- **Difficulty pills**: Apprentice (`#16a34a`), Practitioner (`#0284c7`), Expert (`#9333ea`)
- **CVE Severity pills**: `.vla-sev--critical`, `.vla-sev--high`, `.vla-sev--medium`, `.vla-sev--low`, `.vla-sev--info`

---

## 3. Typography & Interactive Primitives (Zero-JS)
- **Font Stack**: `system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif` (UI); `'Cascadia Code', 'Fira Code', 'JetBrains Mono', Consolas, 'Courier New', monospace` with `font-variant-numeric: tabular-nums` (TerminalUI consoles, session tokens, TTL timers, HTTP headers, CVSS metrics, stats, verification codes).
- **Pure-CSS & Native HTML Interactivity**:
  - **Mobile Navigation Drawer**: Hidden checkbox `#vla-mobile-nav.vla-mobile-toggle-input` + `:checked ~ .vla-nav` at `@media (max-width: 980px)`.
  - **Theme & Locale Persistence**: Standard `<form method="POST">` controls in `.vla-topbar` posting to `/preferences/theme` and `/preferences/locale` (stored in Laravel session via `PreferenceController`). Lab instances also persist their non-sensitive visual theme via `POST {basePath}/_theme` on `lab_sessions.ui_theme`.
  - **Expandable Accordions & Modals**: Native HTML `<details>` / `<summary>` for lab Hints, Solutions, Community Solutions, full instance token/URL copy drawer, and `#submit-solution-modal` inside the Lab Command Bar.
  - **Print Stylesheet (`@media print`)**: Formats A4 portrait certificates & progress reports on white paper, hiding `.no-print`, `.vla-topbar`, `.vla-footer`, `.vla-nav`, `.vla-actions`, and `.vla-subnav`.

---

## 4. Per-Session Capability Token & Hybrid Isolation Architecture
1. **Hybrid URL Modes (`config/lab.php`)**:
   - **Path Mode (Default, Railway Free & Localhost)**: `/lab/{token}/...` where `{token}` is a cryptographic 32-hex (16 random bytes) or 64-hex capability token.
   - **Wildcard Subdomain Mode (ENV Opt-In)**: When `LAB_URL_MODE=subdomain` and `LAB_WILDCARD_DOMAIN` are configured, launcher URLs resolve to `https://{token}.{wildcard_domain}/...` and incoming host subdomains route directly to the isolated lab handler.
2. **Capability Token Authorization & Session Separation**:
   - Launching (`GET /academy/labs/launch/{labId}`, `GET /web-security/mystery-lab-challenge/launch`) and managing/resetting (`GET /academy/labs/session/{token}/control`, `POST /academy/labs/session/{token}/reset`, `POST /academy/labs/session/{token}/renew`, `POST /academy/labs/{labId}/reset`, `POST /academy/labs/{labId}/renew`) **require authenticated SecDevLab login + CSRF protection + user ownership check**.
   - Target routes (`/lab/{token}/...` via `routes/lab.php`) authorize purely via the capability `{token}` + active TTL (`expires_at`), completely decoupled from the `web` session middleware (`StartSession`, `EncryptCookies`, `ValidateCsrfToken`), so Burp Suite / `curl` testing never needs `secdevlab-session` (`laravel_session`) and target HTML never exposes Academy CSRF tokens.
   - Legacy `/lab-env/{labId}` routes are strictly blocked (`404 Not Found`).
   - Expired instances (`expires_at <= now()`) return `410 Gone` with a Command Center expiration screen linking back to the authenticated launcher; persistent Academy completion (`lab_sessions.solved`) is never lost on TTL expiration or instance reset (`lab_sessions.instance_solved`).
3. **Per-Session Randomized Secrets & Security Headers (`LabSecurityHeaders`)**:
   - Every lab instance generates unique per-session randomized `session_secrets` (`carlos_secret`, `file_secret`, `admin_password`, `carlos_password`, `wiener_api_key`, `carlos_api_key`, `aws_secret`, `hostname`, `csrf_token`, `forgot_password_token`, `tracking_id`, `lab_session_cookie`, `users_table_suffix`, `jwt_hs_secret`, `oauth_client_secret`).
   - Target `Set-Cookie` headers are path-scoped (`Path=/lab/{token}` in path mode, `Path=/` on isolated origin in subdomain mode) with `SameSite=Lax`.
   - Every `/lab/{token}/...` response sends `Referrer-Policy: no-referrer`, `X-Content-Type-Options: nosniff`, `X-Robots-Tag: noindex, nofollow`, `Cache-Control: no-store, no-cache, must-revalidate`, and a strict Zero-JS `Content-Security-Policy` sandbox (`script-src 'none'; object-src 'none'; sandbox allow-forms allow-same-origin` on HTML, and `sandbox; default-src 'none'` on served uploads).

---

## 5. SecDevLab Lab Command Bar & 8 Topic Archetype Workbenches
- **SecDevLab Lab Command Bar (`.sdl-command-bar`)**:
  - Replaces legacy PortSwigger `logoAcademy.svg` header with a Command Center telemetry header displaying: SecDevLab SVG emblem, Lab Title, Topic Archetype badge, truncated 32-hex Session Token (with expandable full token & URL `<details>`), TTL remaining badge, Instance Solved / Active status pill, Reset / Renew Session action link, Submit Solution / Exploit Server / Email Client buttons (when enabled by lab profile), Dark/Light toggle, Topic Theory link, and Back to Lab Description link.
- **8 Contextual Archetypes Covering All 31 Categories (`LabArchetypeResolver`)**:
  1. `storefront` (`sql-injection`, `nosql-injection`, `business-logic-vulnerabilities`, `race-conditions`) — lands directly on Product Catalog (SQLi/NoSQL), Login (`/my-account` for SQLi auth bypass), or Cart & Coupon/Race Logic (`cart`), with live query/cookie telemetry.
  2. `diagnostic` (`os-command-injection`, `server-side-request-forgery-ssrf`, `xml-external-entity-xxe-injection`, `path-traversal`) — lands directly on Product Stock & XML/SSRF/CMD Diagnostic Workbench (`product`) or Asset Filename & Path Traversal Viewer (`file-viewer`) with TerminalUI output console.
  3. `media-upload` (`file-upload-vulnerabilities`) — lands directly on Media Upload Portal (`media-portal`) with multipart upload form, uploaded files vault, and TerminalUI execution trace.
  4. `identity` (`authentication`, `jwt`, `oauth-authentication`, `access-control-vulnerabilities`, `cross-site-request-forgery-csrf`) — lands directly on Identity / JWT Inspector / OAuth Client / RBAC Admin / Account Email Change workbench.
  5. `api-graphql` (`api-testing`, `graphql-api-vulnerabilities`) — lands directly on REST API Explorer (`api-explorer`) or GraphQL Query & Introspection Console (`graphql`) with TerminalUI JSON viewer.
  6. `editorial` (`cross-site-scripting`, `dom-based-vulnerabilities`, `clickjacking`, `server-side-template-injection`, `prototype-pollution`) — lands directly on Editorial Blog Search, DOM Source-to-Sink Inspector, Clickjacking Framing Target, SSTI Template Sandbox, or Prototype Pollution Gadget Workbench.
  7. `ai-websocket` (`web-llm-attacks`, `websockets`) — lands directly on TerminalUI Live Chat / AI Tool Agent / WebSocket Frame Console (`chat`).
  8. `http-inspector` (`http-host-header-attacks`, `web-cache-poisoning`, `web-cache-deception`, `cross-origin-resource-sharing-cors`, `http-request-smuggling`, `insecure-deserialization`, `information-disclosure`, `essential-skills`) — lands directly on HTTP Request/Response Header, Cache, CORS, Smuggling, Deserialization & Endpoint Discovery Inspector (`http-inspector`).

---

## 6. Academy Modules & Route Contracts
1. **Academy Landing & Catalog (`/`, `/web-security/all-labs`, `/web-security/dashboard`)**: Command Center hero, live platform metrics, featured domains, hot CVEs, 4-step practical workflow, leaderboard preview, and SSR catalog filters.
2. **187 Learning Material Views / 189 Academy Routes & 273 Lab Detail Pages**: Mapped via `config/academy_routes.php` + `lab-detail.blade.php` with active instance telemetry, Hints, Solutions, and related CVEs.
3. **CVE Encyclopedia (`/cve`, `/cve/{slug}` & `trickest/cve` Sync)**: Filterable catalog, TerminalUI PoC block, linked labs/categories, and draft visibility restricted to `owner`.
4. **Role-Based Access & Owner Control Panel (`/owner/*`)**: Strict `owner` role enforcement for managing CVEs, Categories, Labs, Users, and User Progress Reset.
5. **Leaderboard & Printable Certificate (`/web-security/hall-of-fame`, `/leaderboard`, `/certificate`)**: Weighted difficulty scoring (`10`/`25`/`50`) and `@media print` A4 certificates/reports.
6. **SSR Widgets (`POST /api/widgets`)**: Renders all 12 academy widget IDs server-side without `<script>` tags (`ScriptSrc: ""`).
