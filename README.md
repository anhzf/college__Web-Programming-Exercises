# Web Programming Exercises

Nama | Alwan Nuha Zaky Fadhila
-----|------------------------
NIM | K3519010
Kelas | PTIK B

Repository link: https://github.com/anhzf/Web-Programming-Exercises/tree/ftp

# Langkah instalasi untuk komputer lokal

## Requirement
- Server PHP dan MySQL, silahkan menggunakan [Xampp](https://www.apachefriends.org/download.html) untuk paket lengkap

## Langkah-langkah
1. Dapatkan projek ke pc

   Clone repository ini atau download zip code projek ini kemudian ekstrak file zip tersebut

2. Setup konfigurasi projek

   Silahkan buka `config.php` kemudian isikan sesuai preferensi kalian

3. Menjalankan server

   - Bagi pengguna xampp cukup taruh folder projek ke folder `/htdocs` dimana program xampp terinstall, kemudian buka xampp control panel aktifkan apache dan mysql. Done!
   - Atau menggunakan server bawaan PHP dengan menuliskan command berikut
    ```bash
      php -S localhost:[port] -t pages
    ```

    > Perlu diperhatikan bahwa folder `/pages` bisa direname bahkan dipindahkan keluar folder projek menyesuaikan keinginan kalian dengan ketentuan pada awalan setiap script yang berada didalam folder `/pages` tersebut harus dapat memanggil script `_init.php`, kemudian `_init.php` harus dapat memanggil `core.php`
