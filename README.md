# CRUD Laravel Sederhana

UAS Rekayasa Web Semester 3

## Cara Install

Pastikan Anda telah menyiapkan lingkungan dengan benar. Anda membutuhkan minimal PHP 8.1, MySQL/MariaDB, dan composer.

1. Unduh proyek (atau kloning menggunakan GIT).
2. Copy `.env.example` lalu paste, kemudian rename menjadi `.env` dan konfigurasikan kredensial database Anda.
3. Buka direktori root proyek menggunakan windows terminal/command prompt.
4. Jalankan `composer install`.
5. Atur kunci aplikasi dengan menjalankan `php artisan key:generate --ansi`.
6. Jalankan migrasi database `php artisan migrate`.
7. Mulai server lokal dengan menjalankan `php artisan serve`.
8. Kunjungi di sini [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login) untuk menguji aplikasi.
