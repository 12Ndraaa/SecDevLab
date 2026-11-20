# SecDevLab (UKK RPL Competency Project)

Platform akademi keamanan web & eksplorasi CVE berbasis **Laravel 12 + MySQL (Laragon)** dengan prinsip **100% Zero-JS** (Blade + Pure CSS, tanpa JavaScript di frontend maupun aset publik).

## Fitur Utama

1. **Zero-JS Cyber Security Academy UI/UX**:
   - Tema **Dark / Light** berbasis CSS murni + session Laravel (`POST /preferences/theme`).
   - Dukungan **Bilingual (`EN` / `ID`)** via session (`POST /preferences/locale`).
   - Mempertahankan 189 halaman materi pembelajaran `/web-security/*` dengan layout baru dan menghapus halaman korporat lama.
   - Simulasi environment target `/lab-env/{labId}` mempertahankan tampilan shop/blog klasik dengan validasi eksploit yang diperketat (tanpa shortcut `solve=1`).
2. **2 Role Akun (`owner` dan `user`)**:
   - Registrasi publik (`/users/register`) otomatis terkunci ke role `user`.
   - Seeder demo:
     - **Owner**: `owner@secdevlab.local` / `owner12345`
     - **User**: `user@secdevlab.local` / `user12345`
3. **Ensiklopedia Artikel CVE & Sinkronisasi `trickest/cve`**:
   - Katalog `/cve` dan detail `/cve/{slug}` terhubung langsung ke kategori & lab latihan terkait.
   - Impor otomatis dari `https://github.com/trickest/cve.git` (sparse-checkout tahun `2024-2026` + `hot_cves.csv`) melalui Artisan CLI atau Panel Owner (`/owner/cves`).
4. **Standar UKK RPL (Panel Owner `/owner`)**:
   - CRUD Artikel CVE + Toggle Publish/Draft + Trickest Importer.
   - CRUD Kategori & Lab Interaktif.
   - Kelola User & Reset Progres Belajar.
   - **Leaderboard Dinamis** (`/web-security/hall-of-fame` & `/leaderboard`).
   - **Cetak Sertifikat & Laporan Progres** (`/certificate`) siap cetak via `@media print` (`Ctrl+P`).

## Menjalankan dengan Toolchain Laragon

Pastikan layanan **MySQL** di Laragon aktif dan gunakan PHP & MySQL dari instalasi Laragon:

```powershell
# 1. Buat database MySQL Laragon (portswigger_labs)
C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysql.exe -h 127.0.0.1 -u root -e "CREATE DATABASE IF NOT EXISTS portswigger_labs CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 2. Migrasi & Seed Data Awal (Owner, User Demo, 31 Kategori, 273 Lab, 15 CVE Kurasi)
C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe artisan migrate --seed

# 3. Sparse-clone & Impor CVE 2024-2026 + hot_cves.csv dari trickest/cve
C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe artisan cve:sync-trickest --years=2024,2025,2026 --limit=300

# 4. Jalankan server lokal
C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe artisan serve --port=4173

# 5. Jalankan test suite PHPUnit
C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe artisan test
```
