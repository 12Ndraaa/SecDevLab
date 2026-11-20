# Project Environment Rules

- Gunakan toolchain **Laragon** untuk semua perintah PHP, Composer, Artisan, dan MySQL:
  - PHP CLI: `C:\laragon\bin\php\php-8.3.26-nts-Win32-vs16-x64\php.exe`
  - MySQL CLI: `C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysql.exe`
- Dilarang memakai atau mereferensikan XAMPP (`C:\xampp`) meskipun `php` di `PATH` sistem masih menunjuk ke XAMPP.
- Database runtime target adalah **MySQL Laragon** (`portswigger_labs`); SQLite `:memory:` hanya dipakai oleh konfigurasi tes `phpunit.xml`.
