## Initial setup

### Setelah melakukan clone jalankan perintah berikut :

### **Pastikan menjalankan perintah secara berurutan!1!1!**

1. Buka aplikasi folder menggunakan perintah `cd` pada cmd atau terminal.
2. Jalankan `composer install` di cmd atau terminal.
3. Jalankan `npm install`.
4. Jalankan `npm run dev`. jika muncul error maka jalankan `npm install laravel-mix@latest` lalu
   jalankan `npm clean-install` kemudian ulangi langkah ke 4 dengan menjalankan `npm run dev`.
5. Buat file `.env` kemudian salin isi dari file `.env.example` ke dalam file `.env` tadi. atau bisa juga dengan
   menggunakan command promt Windows dengan mengetik `copy .env.example .env`, bila menggunakan
   Ubuntu `cp .env.example .env`.
6. Buka file `.env` dan ubah nama database (`DB_DATABASE`) menjadi apa pun yang kalian miliki, username (`DB_USERNAME`)
   dan password (`DB_PASSWORD`) sesuai dengan konfigurasi kalian. Secara default, username adalah root dan kalian dapat
   membiarkan password kosong. (**Ini untuk Xampp**)
7. Run `php artisan key:generate`
8. Run `php artisan migrate`
9. Run `php artisan db:seed`
10. Run `php artisan serve`
11. Run `npm run watch` Otomatis aplikasi terbuka di browser.
