# Project Environment Rules

- Gunakan toolchain **Laragon** untuk semua perintah PHP, Composer, Artisan, dan MySQL:
  - PHP CLI: `C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe`
  - MySQL CLI: `C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysql.exe`
- Dilarang memakai atau mereferensikan XAMPP (`C:\xampp`) meskipun `php` di `PATH` sistem masih menunjuk ke XAMPP.
- Database runtime target adalah **MySQL Laragon** (`portswigger_labs`); SQLite `:memory:` hanya dipakai oleh konfigurasi tes `phpunit.xml`.

# Project UI & Deployment Guardrails

- Semua link CSS di layout Academy maupun Lab Workbench wajib menyertakan cache-busting `?v={{ @filemtime(...) }}`.
- Webfont baru harus di-bundle sebagai aset lokal (`.woff2` + `@font-face`) di `public/content/fonts/` agar lolos CSP `font-src 'self'` dan Zero-JS.
- Dilarang mengedit file migrasi yang sudah ter-deploy ke Railway/Laragon MySQL; selalu buat file migrasi aditif baru.
- Setelah push perubahan UI ke `main`, verifikasi deployment live menggunakan `browseros-neo` (cek screenshot serta `getComputedStyle` & `document.fonts`) sebelum menutup tugas.
- Setiap audit UI wajib mengecek rute yang memuat CSS legacy (`psacademy.css`, `ps*.css`) untuk ukuran form `.vla-topbar`, kontras heading, nol gambar 404/merek PortSwigger/Web Security Academy, sambil mempertahankan diagram konsep teknis kerentanan.
