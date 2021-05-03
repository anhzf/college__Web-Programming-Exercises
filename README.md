# UTS Pemrograman Web
Sekedar tugas untuk membuat game quiz matematika penjumlahan sederhana menggunakan PHP & MySQL yang memiliki sistem skor. Seorang pemain dapat bersaing dengan pemain lain untuk masuk ke top 10 pemain :)

Demo: https://anhzf-college-project.000webhostapp.com/uts

| Nama  | Alwan Nuha Zaky Fadhila |
| ----- | ----------------------- |
| NIM   | K3519010                |
| Kelas | PTIK B                  |

## Fitur
- Identitas, seorang pemain diharuskan memiliki identitias untuk bermain dengan cara login pada halaman utama
- Papan peringkat, seorang pemain dapat merebutkan posisi sebagai pemain pencetak skor tertinggi

![Math Quiz Preview](docs/preview1.png)
![Math Quiz Preview](docs/preview2.png)
![Math Quiz Preview](docs/preview3.png)

# Langkah instalasi untuk komputer lokal

## Requirement
- Server PHP dan MySQL, silahkan menggunakan [Xampp](https://www.apachefriends.org/download.html) untuk paket lengkap

## Langkah-langkah
1. Dapatkan projek ke pc

   Clone repository ini atau download zip code projek ini kemudian ekstrak file zip tersebut

2. Setup database/migrasi database

   Setelah itu masuk ke folder projek tersebut kemudian eksekusi query SQL yang berada di `database.sql`
   > bagi pengguna phpmyadmin silahkan buat/masuk ke database kemudian masuk ke tab SQL, setelah itu paste dan klik `go`

3. Setup konfigurasi projek

   Silahkan buka `config.php` kemudian isikan sesuai preferensi kalian

4. Menjalankan server

   - Bagi pengguna xampp cukup taruh folder projek ke folder `/htdocs` dimana program xampp terinstall, kemudian buka xampp control panel aktifkan apache dan mysql. Done!
   - Atau menggunakan server bawaan PHP dengan menuliskan command berikut
    ```bash
      php -S localhost:[port] -t pages
    ```

    > Perlu diperhatikan bahwa folder `/pages` bisa direname bahkan dipindahkan keluar folder projek menyesuaikan keinginan kalian dengan ketentuan pada awalan setiap script yang berada didalam folder `/pages` tersebut harus dapat memanggil script `core.php`
