# DESIGN.md — SecDevLab (`APP_NAME` Configurable Cyber Security Academy & CVE Platform)

## 1. Visual Direction & Domain
- **Product Type**: Zero-JS Server-Side Rendered Cyber Security Training Platform, CVE Knowledge Base, Per-Session Isolated Lab Simulator & Owner Control Panel (`SecDevLab`, configurable via `APP_NAME`).
- **Aesthetic Direction**:
  - **Default Light Mode (`[data-theme="light"]`, default)** — **Clean Light Editorial** synthesized from `designmd.ai/explore?tag=clean` (`Genesis`, `DocuForge`, `LearnFlow`): warm alabaster `#FAFAFA` canvas, crisp `#FFFFFF` elevated cards with `1px solid #E8E8EC` hairline borders, whisper-subtle elevation, editorial display/prose hierarchy (`#0A0A0A` ink, `#52525B` muted metadata), indigo `#4F46E5` primary interactive accent, and a strict single-row uncrowded header.
  - **Dark Mode (`[data-theme="dark"]`)** — **Octo Code**: developer-first crisp dark slate (`#0D1117` canvas, `#161B22` elevated surface, `#21262D` inset surface, `#30363D` hairline border, `#F0F6FC` / `#E6EDF3` ink, `#8B949E` metadata, `#58A6FF` technical cobalt link/accent ink paired with `#2563EB` primary button surface, `#3FB950` / `#15803D` emerald, `#F0883E` / `#C2410C` orange signal, `#010409` code terminal).
- **Core Constraint**: **100% Zero-JavaScript** (`Blade + Pure CSS`). Zero `.js` or `.mjs` files exist in `public/` or `resources/`, zero `<script>` tags in rendered HTML, zero inline JS handlers, and zero `localStorage` dependencies.
- **Iconography Policy**: **Zero emojis as icons** — all UI icons (shield, sun/moon theme switchers, lock, terminal, refresh, trophy, lab flask, archetype icons) use crisp inline SVGs (`stroke="currentColor"`).
- **CSS Versioning & Cache-Busting**: All Academy (`academy-modern.css?v={filemtime}`), Lab Workbench (`lab-workbench.css?v={filemtime}`), and self-hosted webfont (`fonts/fonts.css?v={filemtime}`) stylesheet links emit deterministic `?v=` timestamps so browser caches invalidate immediately on CSS updates.
- **Theme, Locale & Print Support**: Supports **Light Mode (default)** and **Dark Mode** via `[data-theme="light"]` / `[data-theme="dark"]` on both the Academy shell (`public/content/academy-modern.css`) and Per-Session Lab Command Bar + 8 Target Archetype Workbenches (`public/content/lab-workbench.css`), maintaining >= 4.5:1 text contrast (and >= 7:1 on role badges & pills) in both themes, **Bilingual EN/ID** UI (`lang/en/academy.php`, `lang/id/academy.php`), and **Print-Ready Reports** (`@media print`).

---

## 2. Design Tokens (`academy-modern.css` & `lab-workbench.css`)

### Light Mode (Default — `Clean Light Editorial`: Genesis + DocuForge + LearnFlow)
- **Canvases & Hairline Surfaces**:
  - `--vla-bg`: `#FAFAFA` | `--vla-bg-elevated`: `#FFFFFF`
  - `--vla-surface`: `#FFFFFF` | `--vla-surface-2`: `#F4F4F6`
  - `--vla-border`: `#E8E8EC` | `--vla-border-strong`: `#D4D4DC`
- **Typography & Contrast (>= 4.5:1)**:
  - `--vla-heading`: `#0A0A0A` | `--vla-text`: `#1F2328` | `--vla-text-muted`: `#52525B`
- **Primary Indigo & Semantic Accents**:
  - `--vla-accent` (Primary Editorial Indigo): `#4F46E5` (`--vla-accent-hover`: `#4338CA`, `--vla-accent-soft`: `rgba(79, 70, 229, 0.08)`)
  - `--vla-orange` (Lab Signal / Hot CVE): `#C2410C` (`--vla-orange-hover`: `#9A3412`, `--vla-orange-soft`: `#FFF7ED`)
  - `--vla-info` (Technical Blue): `#2563EB` (`--vla-info-soft`: `#EFF6FF`)
  - `--vla-emerald` (Solved / Verified): `#047857` (`--vla-emerald-soft`: `#ECFDF5`)
  - `--vla-warning` (Caution / TTL): `#B45309` (`--vla-warning-soft`: `#FFFBEB`)
  - `--vla-danger` (Critical / Error): `#DC2626` (`--vla-danger-soft`: `#FEF2F2`)
  - `--vla-purple` (Expert / Schema): `#6D28D9` (`--vla-purple-soft`: `#F5F3FF`)
- **Inline Code vs PoC Terminal**:
  - Inline code: `#F4F4F8` surface, `#3730A3` ink, `1px solid #E4E4EC` border.
  - PoC / Terminal consoles: crisp `#0D1117` frame with `#161B22` bar, `#30363D` border, and `#79C0FF` / `#E6EDF3` monospace telemetry.

### Dark Mode (`[data-theme="dark"]` — `Octo Code`)
- **Slate Canvas & Surfaces**:
  - `--vla-bg`: `#0D1117` | `--vla-bg-elevated`: `#161B22`
  - `--vla-surface`: `#161B22` | `--vla-surface-2`: `#21262D`
  - `--vla-border`: `#30363D` | `--vla-border-strong`: `#484F58`
- **Typography & Contrast (>= 4.5:1)**:
  - `--vla-heading`: `#F0F6FC` | `--vla-text`: `#E6EDF3` | `--vla-text-muted`: `#8B949E`
- **Primary Signal & Semantic Status**:
  - `--vla-accent` (Technical Cobalt Link/Accent): `#58A6FF` (`--vla-accent-hover`: `#79C0FF`, `--vla-accent-soft`: `rgba(88, 166, 255, 0.14)`), paired with `--vla-btn-primary-bg`: `#2563EB` (`5.17:1` contrast with `#FFFFFF`)
  - `--vla-orange` (Lab Signal / Hot CVE): `#F0883E` (`--vla-orange-btn-bg`: `#C2410C` with `#FFFFFF`, `5.18:1`)
  - `--vla-info`: `#58A6FF` | `--vla-emerald`: `#3FB950` (`--lw-solved-bg`: `#15803D`, `5.02:1` with `#FFFFFF`) | `--vla-warning`: `#D29922` | `--vla-danger`: `#F85149` | `--vla-purple`: `#A371F7`
  - `--vla-terminal-bg`: `#010409` | `--vla-terminal-surface`: `#0D1117` | `--vla-terminal-border`: `#30363D` | `--vla-code-text`: `#79C0FF`

### CVSS & Difficulty Badges
- **Difficulty pills**: Apprentice (`#166534` / `#DCFCE7`), Practitioner (`#075985` / `#E0F2FE`), Expert (`#6B21A8` / `#F3E8FF`)
- **CVE Severity pills**: `.vla-sev--critical`, `.vla-sev--high`, `.vla-sev--medium`, `.vla-sev--low`, `.vla-sev--info`
- **Account & Role Pills**: `.vla-account-pill` uses neutral crisp surface (`#FFFFFF` light / `#21262D` dark) with AAA high-contrast `.vla-role-pill--owner` (`#7C2D12` on `#FFF7ED` light `8.83:1`; `#FDBA74` on `#2D1B0E` dark `9.77:1`) and `.vla-role-pill--user` (`#312E81` on `#EEF2FF` light `10.22:1`; `#93C5FD` on `#17253B` dark `8.54:1`).

---

## 3. Typography & Interactive Primitives (Zero-JS)
- **Self-Hosted `designmd.ai` Webfont Delivery (`public/content/fonts/fonts.css` + 11 `latin` `.woff2` binaries)** (`font-src 'self'` & `style-src 'self'` CSP compliant, `font-display: swap`, zero external CDN requests, 100% Zero-JS):
  - **Linked Shells**: `/content/fonts/fonts.css?v={filemtime}` is loaded cleanly in `resources/views/layouts/academy.blade.php`, `resources/views/lab-env/show.blade.php`, and `resources/views/lab-env/expired.blade.php` prior to `academy-modern.css` / `lab-workbench.css`.
  - **Display / Headings (`Plus Jakarta Sans` — weights `500`, `600`, `700`)**: `plus-jakarta-sans-{500,600,700}-latin.woff2` -> `'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif`
  - **UI / Body Prose (`Inter` — weights `400`, `500`, `600`, `700`)**: `inter-{400,500,600,700}-latin.woff2` -> `'Inter', 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif`
  - **Code / Telemetry / Logs (`JetBrains Mono` — weights `400`, `500`, `600`, `700`)**: `jetbrains-mono-{400,500,600,700}-latin.woff2` -> `'JetBrains Mono', 'Fira Code', 'Cascadia Code', Consolas, 'Courier New', monospace` with `font-variant-numeric: tabular-nums`
- **Pure-CSS & Native HTML Interactivity**:
  - **Single-Row Header & Mobile Drawer**: Strictly single-row uncrowded header at `>= 1180px` (`flex-wrap: nowrap`), collapsing via hidden checkbox `#vla-mobile-nav.vla-mobile-toggle-input` + `:checked ~ .vla-nav` below `1180px`.
  - **Account Menu & Lab Popovers**: Native `<details>` / `<summary>` dropdown for Account/Certificate/Owner/Logout (`vla-account-dropdown`) and Lab Command Bar token/solution popovers (`ps-inline-details`).
  - **Theme & Locale Persistence**: Standard `<form method="POST">` controls posting to `/preferences/theme` and `/preferences/locale` (Laravel session via `PreferenceController`). Lab instances persist their visual theme via `POST {basePath}/_theme` on `lab_sessions.ui_theme`.
  - **Print Stylesheet (`@media print`)**: Formats A4 portrait certificates & progress reports on crisp white paper, hiding `.no-print`, `.vla-topbar`, `.vla-footer`, `.vla-nav`, `.vla-actions`, and `.vla-subnav`.

---

## 4. Per-Session Capability Token & Hybrid Isolation Architecture
1. **Hybrid URL Modes (`config/lab.php`)**:
   - **Path Mode (Default, Railway Free & Localhost)**: `/lab/{token}/...` where `{token}` is a cryptographic 32-hex (16 random bytes) or 64-hex capability token.
   - **Wildcard Subdomain Mode (ENV Opt-In)**: When `LAB_URL_MODE=subdomain` and `LAB_WILDCARD_DOMAIN` are configured, launcher URLs resolve to `https://{token}.{wildcard_domain}/...`.
2. **Capability Token Authorization & Session Separation**:
   - Launching and managing/resetting require authenticated SecDevLab login + CSRF protection + ownership verification.
   - Target routes (`/lab/{token}/...` via `routes/lab.php`) authorize purely via capability `{token}` + active TTL (`expires_at`), decoupled from `web` session middleware.
   - Legacy `/lab-env/{labId}` routes are strictly blocked (`404 Not Found`).
   - Expired instances (`expires_at <= now()`) return `410 Gone` with relaunch navigation; persistent Academy completion (`lab_sessions.solved`) is preserved.
3. **Per-Session Randomized Secrets & Security Headers (`LabSecurityHeaders`)**:
   - Every lab instance generates unique per-session randomized `session_secrets`.
   - Target `Set-Cookie` headers are path-scoped (`Path=/lab/{token}` in path mode, `Path=/` in subdomain mode) with `SameSite=Lax`.
   - Strict Zero-JS `Content-Security-Policy` sandbox (`script-src 'none'; object-src 'none'; font-src 'self'; sandbox allow-forms allow-same-origin`).

---

## 5. SecDevLab Lab Command Bar & 8 Visually Differentiated Topic Archetypes
- **SecDevLab Lab Command Bar (`.sdl-command-header`)**:
  - Compact top telemetry header displaying SecDevLab SVG emblem, Lab Title, Topic Archetype badge, truncated 32-hex Session Token (expandable `<details>` drawer), TTL badge, Instance Solved / Active status pill, Reset / Renew Session link, Submit Solution / Exploit Server / Email Client controls, Light/Dark toggle, and Back to Lab Description link.
- **8 Visually Distinct Archetypes (`[data-archetype="..."]` + Dedicated Layout Components)**:
  1. `storefront` (`sql-injection`, `nosql-injection`, `business-logic-vulnerabilities`, `race-conditions`) — **Retail Commerce Storefront**: Teal commerce accent (`#0F766E` / `#2DD4BF`), retail filter bar, gallery product cards with price tags, and itemized receipt-style cart checkout ledger (`.lw-store-hero`, `.lw-receipt-panel`).
  2. `diagnostic` (`os-command-injection`, `server-side-request-forgery-ssrf`, `xml-external-entity-xxe-injection`, `path-traversal`) — **Systems & Filesystem Probe Console**: Technical ocean-blue (`#0369A1` / `#38BDF8`) instrumentation strip (`.lw-diag-strip`), SKU warehouse diagnostic panel, or asset endpoint browser (`/image?filename=...`) paired with `.lw-diag-console`.
  3. `media-upload` (`file-upload-vulnerabilities`) — **Creator Media & Avatar Studio**: Emerald (`#047857` / `#34D399`) studio workspace (`.lw-studio-shell`), circular avatar preview card, custom-styled dashed file upload dropzone with inline upload icon (`::file-selector-button`, zero raw white browser chrome), and virtual storage vault cards (`.lw-vault-list`).
  4. `identity` (`authentication`, `jwt`, `oauth-authentication`, `access-control-vulnerabilities`, `cross-site-request-forgery-csrf`) — **SSO / IAM Identity Portal**: Indigo (`#4F46E5` / `#818CF8`) portal header with lock emblem (`.lw-iam-header`), user/role security posture bar, color-coded JWT segmented claim inspector, and OAuth authorization simulator.
  5. `api-graphql` (`api-testing`, `graphql-api-vulnerabilities`) — **API & GraphQL IDE Workbench**: Violet (`#6D28D9` / `#A78BFA`) developer split-pane IDE (`.lw-ide-pane`, `.lw-ide-urlbar`) with inline HTTP method selector + path bar and formatted JSON output viewer.
  6. `editorial` (`cross-site-scripting`, `dom-based-vulnerabilities`, `clickjacking`, `server-side-template-injection`, `prototype-pollution`) — **Editorial Engineering Journal**: Warm amber-terracotta (`#C2410C` / `#F0883E`) magazine layout (`.lw-editorial-masthead`) with editorial article grid, clean reader view & comment cards, plus diagnostic framing/prototype/DOM trace consoles.
  7. `ai-websocket` (`web-llm-attacks`, `websockets`) — **Conversational AI & Socket Studio**: Cyan (`#0E7490` / `#22D3EE`) messaging workspace (`.lw-chat-shell`) with `AI` / `YOU` avatar badges, distinct assistant vs user message bubbles, live status badge, and compact relay telemetry rail.
  8. `http-inspector` (`http-host-header-attacks`, `web-cache-poisoning`, `web-cache-deception`, `cross-origin-resource-sharing-cors`, `http-request-smuggling`, `insecure-deserialization`, `information-disclosure`, `essential-skills`) — **Protocol & Proxy Repeater**: Amber-gold (`#B45309` / `#FBBF24`) split request/response repeater (`.lw-ide-pane`, `.lw-diag-console`) with quick discovery presets and structured header/body response panes.
