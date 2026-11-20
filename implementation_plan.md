# Implementation Architecture: SecDevLab (Laravel 12 + MySQL Laragon, Zero-JS SSR)

Dokumen ini mendokumentasikan arsitektur aktual dan komponen terimplementasi pada proyek **SecDevLab** ([portswigger-all-labs-rev](file:///c:/Users/Lenovo/.gemini/antigravity/scratch/portswigger-all-labs-rev)) berbasis **Laravel 12 + MySQL (Laragon)** dengan prinsip **100% Zero-JS** (`Blade + Pure CSS`), **Bilingual `EN`/`ID`**, **Dark/Light Mode CSS**, **Ensiklopedia CVE + `trickest/cve` Importer**, **Panel Owner UKK RPL**, dan **Simulator Lab Keamanan Virtual**.

---

## 1. Lingkungan & Toolchain (Laragon)

Sesuai aturan pada [AGENTS.md](file:///c:/Users/Lenovo/.gemini/antigravity/scratch/portswigger-all-labs-rev/AGENTS.md):
- **PHP CLI**: `C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe`
- **MySQL CLI**: `C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysql.exe`
- **Database Runtime Target**: MySQL Laragon (`127.0.0.1:3306`, nama database `portswigger_labs`).
- **Database Testing**: SQLite `:memory:` sesuai konfigurasi `phpunit.xml`.
- **Konfigurasi Brand**: `APP_NAME="SecDevLab"` (dapat diubah melalui `.env`).
- **Web Server Lokal**: `C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe artisan serve --port=4173`.

---

## 2. Arsitektur Zero-JS & Rebranding Total

1. **Zero JavaScript Secara Penuh**:
   - Tidak ada file `.js`/`.mjs` di `public/` maupun `resources/`.
   - Tidak ada backend Node.js (`server.mjs`, `package.json`, `test.mjs` telah dihapus).
   - Seluruh output HTML aplikasi bebas `<script>` dan bebas `localStorage`.
2. **UI/UX Modern + Bilingual + Dark/Light (`public/content/academy-modern.css` & `resources/views/layouts/academy.blade.php`)**:
   - **Tema Dark / Light**: Menggunakan atribut `<html data-theme="dark|light">` yang dikelola oleh `SetLocaleAndTheme` middleware dan `POST /preferences/theme` (`PreferenceController::toggleTheme`).
   - **Bilingual `EN` / `ID`**: Menggunakan file translasi `lang/en/academy.php` dan `lang/id/academy.php` dengan switcher session `POST /preferences/locale` (`PreferenceController::setLocale`).
   - **189 Route Materi `/web-security/*`**: 187 halaman materi dikonversi menjadi Blade views (`resources/views/pages/*.blade.php`) dan dipetakan bersama `dashboard` & `leaderboard` pada `config/academy_routes.php` (total 189 entri), dirender dalam layout baru `layouts.academy` dengan widget SSR (`@include('partials.widget')` / `App\Services\WidgetRenderer`).
   - **Penghapusan Halaman Korporat**: Route korporat lama (`/burp`, `/solutions`, `/careers`, `/research`, `/support`, `/about`, `/customers`) mengembalikan `404`.
   - **Environment Lab (`/lab-env/{labId}`)**: Tetap mempertahankan tampilan klasik target Shop (`labsEcommerce.css`) dan Blog (`labsBlog.css`) melalui `resources/views/lab-env/show.blade.php` + `academyLabHeader.css` + `ps-responsive-fixes.css` tanpa `#lab-drawer` maupun JS.

---

## 3. Skema Database MySQL (`database/migrations/`)

1. `users`:
   - Kolom bawaan Laravel + `role` (`owner` | `user`, default `user`, indexed).
   - `role` dikecualikan dari `User::$fillable` untuk mencegah mass-assignment privilege escalation.
2. `categories`:
   - `id` (string PK), `title`, `topic_route`, `lab_count`, `sort_order`. (Seed awal: 31 kategori).
3. `labs`:
   - `id` (string(64) PK), `category_id` (FK cascade), `title`, `href` (unique), `difficulty` (`APPRENTICE`|`PRACTITIONER`|`EXPERT`), `difficulty_class`, `description_html`, `sections` (json), `profile` (json nullable), `sort_order`. (Seed awal: 273 lab — 61 Apprentice, 173 Practitioner, 39 Expert).
4. `products` & `blog_posts`:
   - `products`: 15 item (termasuk item `released = false` untuk skenario SQLi).
   - `blog_posts`: 6 artikel blog target.
5. `lab_sessions`:
   - `user_id` (FK cascade), `lab_id` (FK cascade), `exfiltrated`, `solved`, `solved_at`, `logged_in_user`, `avatar_path`, `executable_exts` (json), `carlos_secret`, `chat_history` (json nullable), `exploit_state` (json nullable).
   - Unique index pada `(user_id, lab_id)`.
6. `lab_uploaded_files`:
   - `user_id` (FK cascade), `lab_id` (FK cascade), `storage_key`, `content` (`LONGBLOB` di MySQL/MariaDB), `content_type`, `expires_at_ms`.
   - Unique index pada `(user_id, lab_id, storage_key)`.
7. `cve_articles`:
   - `cve_id` (unique), `slug` (unique), `cve_year`, `category_id` (FK nullOnDelete), `lab_id` (FK nullOnDelete), `title`, `cvss_score`, `severity`, `affected_product`, `summary`, `technical_analysis`, `poc_content`, `mitigation`, `references_json` (json), `source_repo`, `is_hot`, `status` (`published`|`draft`), `author_id` (FK users nullOnDelete), `published_at`.

**Seeders (`DatabaseSeeder`)**:
- `UserSeeder`: 1 `owner` (`owner@secdevlab.local` / `owner12345`) + 1 `user` (`user@secdevlab.local` / `user12345`). Memigrasi akun demo `@vulnlab.local` yang sudah ada menjadi `@secdevlab.local` bila sebelumnya pernah di-seed.
- `CatalogSeeder`: mengimpor `catalog.json` & `lab_profiles.json`, 15 produk, dan 6 postingan blog secara idempoten.
- `CveSeeder`: 15 entri CVE terkurasi yang valid dan terverifikasi NVD/trickest (termasuk `CVE-2025-64459` untuk `sql-injection`, `CVE-2024-20362` untuk `cross-site-scripting`, `CVE-2024-34351` untuk `server-side-request-forgery-ssrf`, `CVE-2024-8309` untuk `web-llm-attacks`, serta advisory nyata untuk `CVE-2024-45519` dan `CVE-2024-28995`) yang terhubung ke kategori dan lab terkait.

---

## 4. Role, Fitur UKK RPL & Ensiklopedia CVE

1. **Autentikasi & Otorisasi (`AuthController`, `EnsureOwner`)**:
   - `GET/POST /users` (Login dengan normalisasi lowercase email & proteksi open redirect `safeReturnUrl`).
   - `GET/POST /users/register` (Registrasi publik selalu dikunci ke `User::ROLE_USER`).
   - `POST /users/logout`, `GET /users/youraccount`, `GET /users/youraccount/personaldetails`.
   - Middleware `auth` melindungi `/academy/labs/launch/{labId}`, `/lab-env/{labId}*`, dan `/certificate`.
   - Middleware `['auth', 'owner']` melindungi seluruh grup `/owner/*` (user biasa mendapat `403`).
2. **Panel Owner (`/owner/*`)**:
   - **Dashboard (`/owner`)**: Statistik platform dan ringkasan aktivitas (`OwnerDashboardController`).
   - **CRUD Artikel CVE (`/owner/cves/*`)**: Tambah, edit, hapus, toggle status `published`/`draft`, serta trigger `POST /owner/cves/import-trickest` (`CveManagementController`).
   - **CRUD Kategori & Lab (`/owner/categories/*`, `/owner/labs/*`)**: Pengelolaan kategori (termasuk dynamic topic route `/web-security/<topic>`) dan lab kustom beserta `solutionPayloads` & profil fitur (`CategoryLabController`).
   - **Kelola User & Reset Progres (`/owner/users/*`)**: CRUD user, proteksi anti-self-demote & anti-self-delete, serta `POST /owner/users/{user}/reset-progress` (`UserManagementController`).
3. **Ensiklopedia CVE & `TrickestCveImporter`**:
   - Halaman publik `/cve` & `/cve/{slug}` (`CveController`) menampilkan CVE terpublikasi beserta tautan langsung ke kategori dan lab latihan.
   - `App\Services\TrickestCveImporter` & command `php artisan cve:sync-trickest`:
     - Melakukan sparse-clone `https://github.com/trickest/cve.git` hanya untuk folder tahun pilihan (`2024,2025,2026`) + `/hot_cves.csv`.
     - `parseHotCvesCsv()` menangani header standar (`cve`, `cvss`, `severity`, `poc_count`), format kolom `Title,URL` / `path` / `url`, maupun file `hot_cves.csv` tanpa header yang langsung dimulai dengan baris `CVE-YYYY-NNNN` (termasuk UTF-8 BOM) tanpa kehilangan baris pertama.
     - Memetakan deskripsi/CWE ke `category_id` dan `lab_id` secara otomatis.
4. **Leaderboard Dinamis & Cetak Sertifikat/Laporan**:
   - **Leaderboard (`/web-security/hall-of-fame` & `/leaderboard`)**: Menghitung poin bobot (`APPRENTICE=10`, `PRACTITIONER=25`, `EXPERT=50`) dengan filter pencarian & kategori.
   - **Sertifikat & Laporan Progres (`/certificate?mode=certificate|report`)**: Menampilkan tier pencapaian, kode verifikasi `VLA-...`, breakdown per kategori, dan daftar lab solved siap cetak melalui `@media print`.

---

## 5. Lab Target Simulator & Hardening Validasi (`LabEnvironmentController`, `LabTriggerService`)

1. **CSRF & Endpoint Target**:
   - `bootstrap/app.php` mengecualikan `lab-env/*` dan `api/widgets` dari CSRF agar pengujian via curl/Repeater/Exploit Server berjalan normal, sementara `/users/*`, `/preferences/*`, dan `/owner/*` tetap terlindungi `@csrf`.
2. **Validasi Ketat (Anti-Cheat)**:
   - Shortcut `?solve=1` / `solve=1` dihapus total dan diabaikan.
   - Cookie default browser (`TrackingId=xYz123AbC456`, `session` default, `XSRF-TOKEN`, `laravel_session`) diabaikan saat evaluasi exploit.
   - `/lab-env/{labId}/chat` hanya aktif (`200`) jika profil lab memiliki `hasLiveChat`; selain itu mengembalikan `404`.
   - `/lab-env/{labId}/exploit-server` hanya aktif jika `hasExploitServer` bernilai true, dan pengiriman dengan `responseBody` kosong ditolak dengan pesan error yang jelas.
   - `/lab-env/{labId}/email` dan `/lab-env/{labId}/admin` dibatasi sesuai profil/kategori lab.
   - Validasi multi-step (`requiresLoginAfterExfil`, `requiresSubmitAfterExfil`), login non-admin (`wiener:peter`) tidak memicu solve palsu, dan mode `X-Academy-Repeater: 1` mengembalikan respons JSON + header `X-Lab-Solved` / `X-Lab-Exfiltrated`.
3. **Evaluator PHP & Upload Aman**:
   - `SandboxedPhpEvaluator`: parser token virtual terhadap filesystem virtual (`/home/carlos/secret`, `/etc/passwd`, `/etc/hostname`) tanpa pernah menjalankan `eval()`, `shell_exec()`, atau menulis file upload ke `public/`.
   - `AvatarUploadService`: mendukung seluruh 7 skenario file upload (no-validation, content-type, path-traversal, extension-blacklist + `.htaccess`, null-byte, polyglot magic bytes, race-condition TTL) langsung pada tabel `lab_uploaded_files`.

---

## 6. Verifikasi PHPUnit (`tests/Feature/`)

Suite pengujian terotomatisasi (berjalan di SQLite `:memory:` via `php artisan test`):
1. `AcademyCatalogAndPagesTest`: validasi seeder (31 kategori, 273 lab, 15 produk, 6 blog), home & hilangnya route korporat (`404`), SSR filtering All-Labs, detail lab + CVE terkait, seluruh 189 route materi `/web-security/*` (`187` Blade views `pages.*` + dashboard/leaderboard), kontrak 12 widget `/api/widgets`, dan audit Zero-JS.
2. `AuthAndMultiUserIsolationTest`: role owner/user, penguncian registrasi publik ke `user`, persistensi session bilingual EN/ID & dark/light, proteksi guest pada `/lab-env` & `/certificate`, serta isolasi progres antar-user.
3. `CveAndTrickestImporterTest`: katalog & detail `/cve`, visibilitas draft khusus owner, pembersihan placeholder lama oleh `CveSeeder`, import `trickest/cve`, serta parsing defensif `parseHotCvesCsv()` untuk file tanpa header dan kolom `url`/`path`.
4. `LabEnvironmentAndUploadsTest`: anti-cheat (`solve=1` ditolak, payload kosong exploit-server ditolak, `/chat` & `/exploit-server` diblokir `404` bila tidak diaktifkan, cookie default diabaikan, `requiresSubmitAfterExfil` divalidasi), isolasi kategori, `UNION SELECT`, multi-step SQLi, path traversal, live chat, repeater JSON, dan seluruh 7 lab file upload.
5. `OwnerPanelAndLeaderboardTest`: otorisasi `owner` vs `user`, CRUD CVE/Category/Lab/User + reset progres, self-demote/self-delete guard, leaderboard dinamis, sertifikat/laporan + aturan CSS `@media print` & tema, dan proteksi open redirect.
