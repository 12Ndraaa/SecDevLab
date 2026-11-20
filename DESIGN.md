# DESIGN.md — SecDevLab (`APP_NAME` Configurable Cyber Security Academy & CVE Platform)

## 1. Visual Direction & Domain
- **Product Type**: Zero-JS Server-Side Rendered Cyber Security Training Platform, CVE Knowledge Base, Interactive Lab Simulator & Owner Control Panel (`SecDevLab`, configurable via `APP_NAME`).
- **Core Constraint**: **100% Zero-JavaScript** (`Blade + Pure CSS`). Zero `.js` or `.mjs` files exist in `public/` or `resources/`, zero `<script>` tags in rendered HTML, and zero `localStorage` dependencies.
- **Aesthetic**: Modern cyber-security academy shell (`public/content/academy-modern.css` + `resources/views/layouts/academy.blade.php`) supporting **Dark Mode** (default) and **Light Mode** via `[data-theme="dark"]` / `[data-theme="light"]`, **Bilingual EN/ID** UI (`lang/en/academy.php`, `lang/id/academy.php`), and **Print-Ready Reports** (`@media print`).
- **Target Lab Fidelity**: Interactive lab environments at `/lab-env/{labId}` (`resources/views/lab-env/show.blade.php`) retain the classic Shop (`labsEcommerce.css`) and Blog (`labsBlog.css`) target aesthetics paired with `#academyLabHeader` (`academyLabHeader.css` + `ps-responsive-fixes.css`).

## 2. Design Tokens (`public/content/academy-modern.css`)
- **Dark Theme (`[data-theme="dark"]`, default)**:
  - `--vla-bg`: `#090d16` | `--vla-bg-elevated`: `#0f172a`
  - `--vla-surface`: `#131d31` | `--vla-surface-2`: `#1a2640`
  - `--vla-border`: `#25334d` | `--vla-border-strong`: `#334566`
  - `--vla-text`: `#e2e8f0` | `--vla-text-muted`: `#94a3b8` | `--vla-heading`: `#f8fafc`
  - `--vla-accent`: `#06b6d4` (`--vla-accent-hover`: `#22d3ee`)
  - `--vla-orange`: `#f97316` (`--vla-orange-hover`: `#fb923c`)
  - `--vla-emerald`: `#10b981` (Solved badges & success alerts)
  - `--vla-danger`: `#ef4444` | `--vla-warning`: `#f59e0b`
  - `--vla-code-bg`: `#050811` | `--vla-code-text`: `#7dd3fc`
- **Light Theme (`[data-theme="light"]`)**:
  - `--vla-bg`: `#f1f5f9` | `--vla-bg-elevated`: `#ffffff` | `--vla-surface`: `#ffffff` | `--vla-surface-2`: `#f8fafc`
  - `--vla-border`: `#dbe3ee` | `--vla-border-strong`: `#cbd5e1`
  - `--vla-text`: `#1e293b` | `--vla-text-muted`: `#64748b` | `--vla-heading`: `#0f172a`
  - `--vla-accent`: `#0284c7` | `--vla-orange`: `#ea580c` | `--vla-emerald`: `#059669`
- **CVSS & Difficulty Badges**:
  - Difficulty pills: Apprentice (`#16a34a`), Practitioner (`#0284c7`), Expert (`#9333ea`)
  - CVE Severity pills: `.vla-sev--critical`, `.vla-sev--high`, `.vla-sev--medium`, `.vla-sev--low`, `.vla-sev--info`

## 3. Typography & Interactive Primitives (Zero-JS)
- **Font Stack**: `system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif` (UI); `'Cascadia Code', 'Fira Code', Consolas, 'Courier New', monospace` (PoC blocks, stats, verification codes).
- **Pure-CSS & Native HTML Interactivity**:
  - **Mobile Navigation Drawer**: Hidden checkbox `#vla-mobile-nav.vla-mobile-toggle-input` + `:checked ~ .vla-nav` rule at `@media (max-width: 980px)`.
  - **Theme & Locale Persistence**: Standard `<form method="POST">` controls in `.vla-topbar` posting to `/preferences/theme` and `/preferences/locale` (stored in Laravel session via `PreferenceController` and applied by `SetLocaleAndTheme` middleware).
  - **Expandable Accordions & Modals**: Native HTML `<details>` / `<summary>` for lab Hints, Solutions, Community Solutions, and `#submit-solution-modal` inside `/lab-env/{labId}`.
  - **Print Stylesheet (`@media print`)**: Formats A4 portrait certificates & progress reports on white paper, hiding `.no-print`, `.vla-topbar`, `.vla-footer`, `.vla-nav`, `.vla-actions`, and `.vla-subnav`.

## 4. Layout Architecture
- **Global Shell (`resources/views/layouts/academy.blade.php`)**:
  - Sticky `.vla-topbar` with SVG brand emblem + `config('app.name')`, navigation links (`Home`, `Topics`, `All Labs`, `CVE`, `Mystery Lab`, `Leaderboard`, `Dashboard`, plus `Certificate` when authenticated and `Owner Panel` when `owner`), `EN`/`ID` switcher, `Dark`/`Light` switcher, and `partials.header-auth`.
  - **Standalone Container (`.vla-container`)**: Used by Landing (`/`), CVE Encyclopedia (`/cve`, `/cve/{slug}`), Dashboard (`/web-security/dashboard`), Leaderboard (`/web-security/hall-of-fame`, `/leaderboard`), Auth (`/users*`), Certificate (`/certificate`), and Owner Control Panel (`/owner/*`).
  - **Three-Column / Learning Shell**: Used by `/web-security/all-labs`, 273 lab detail pages (`lab-detail.blade.php`), custom owner category pages (`category-topic.blade.php`), and the 189 `/web-security/*` routes mapped in `config/academy_routes.php` (187 converted `resources/views/pages/*.blade.php` learning views via `@section('academy_body')` + `@section('legacy_css')`, plus `dashboard` and `leaderboard`).

## 5. Implemented Pages, Modules & Route Contracts
1. **Academy Landing & Catalog (`/`, `/web-security/all-labs`, `/web-security/dashboard`)**:
   - Landing page (`home.blade.php`) shows live counts (Categories, Labs, Published CVEs, Learners), featured topics, hot CVEs, 4-step workflow, and top leaderboard preview.
   - All-Labs Catalog (`all-labs.blade.php`) renders all 31 categories and 273 labs from MySQL with server-side `GET` filters (`search`, `difficulty`, `status`, `category`) and read-only `Solved` / `Not solved` badges backed by `lab_sessions`.
   - Legacy corporate routes (`/burp`, `/solutions`, `/careers`, `/research`, `/support`, `/about`, `/customers`) return `404`.
2. **187 Learning Material Views / 189 Academy Routes & 273 Lab Detail Pages (`AcademyController::resolvePage`)**:
   - Mapped via `config/academy_routes.php` to `resources/views/pages/*.blade.php` with inline SSR widgets (`partials.widget` + `App\Services\WidgetRenderer`).
   - Lab detail pages (`lab-detail.blade.php`) display difficulty/solved status, `<details>` Hint before `ACCESS THE LAB`, Solution / Community solutions after, and related CVE advisories.
3. **CVE Encyclopedia (`/cve`, `/cve/{slug}` & `trickest/cve` Sync)**:
   - Public catalog with filters (`search`, `year`, `severity`, `category`, `hot=1`) and pagination; drafts are hidden from guests/`user` accounts and visible to `owner`.
   - Detail view links directly to `category->topic_route`, `lab`, related category labs, PoC block, mitigation, and external references.
4. **Role-Based Access (`owner` & `user`) & Owner Control Panel (`/owner/*`)**:
   - Public `/users/register` locks new accounts to `user` (`role` excluded from `User::$fillable`).
   - `/owner` routes (`auth` + `owner` middleware via `EnsureOwner`):
     - `/owner`: overview metrics & quick actions.
     - `/owner/cves`: CRUD CVEs, publish/draft toggle, and `trickest/cve` sparse-clone/import UI.
     - `/owner/categories` & `/owner/labs`: full CRUD with auto-synced `lab_count` and dynamic `/web-security/<topic>` routing.
     - `/owner/users`: user CRUD, role assignment with self-demote/self-delete guards, and per-user lab progress reset (`POST /owner/users/{user}/reset-progress`).
5. **Leaderboard & Printable Certificate (`/web-security/hall-of-fame`, `/leaderboard`, `/certificate`)**:
   - Weighted scoring (`APPRENTICE = 10`, `PRACTITIONER = 25`, `EXPERT = 50`), searchable and filterable by category.
   - `/certificate?mode=certificate|report` renders a verification code (`VLA-...`), tier classification, category completion breakdown, and timestamped solved lab log ready for `Ctrl+P` / `@media print`.
6. **Target Lab Environments (`/lab-env/{labId}/*` & `POST /api/widgets`)**:
   - Multi-view target simulator (`shop`, `product`, `blog`, `post`, `my-account`, `admin`, `cart`, `chat`, `email`, `exploit-server`, `upload-result`) with strict per-user MySQL isolation (`lab_sessions`, `lab_uploaded_files` `LONGBLOB`) and hardened exploit evaluation (`LabTriggerService`, `SandboxedPhpEvaluator`, `AvatarUploadService`).
   - `POST /api/widgets` renders all 12 academy widget IDs server-side without `<script>` tags (`ScriptSrc: ""`).
