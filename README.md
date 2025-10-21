# Praktikum Web Programming - Modul 6: PHP

**Kadek Gandhi Wahyu Jaya Suastika**
**1202230017**

---

## Deskripsi Proyek

Proyek ini adalah implementasi halaman login sederhana yang dibuat untuk memenuhi tugas Praktikum Pemrograman Web (Modul 6). Proyek ini berfokus pada penggunaan **PHP** sebagai bahasa *server-side* untuk menangani validasi formulir.

Proyek ini terdiri dari dua file utama:
1.  `login.html`: Halaman antarmuka (frontend) yang berisi formulir login. Halaman ini menggunakan HTML untuk struktur dan CSS internal untuk styling.
2.  `login.php`: Skrip backend yang menerima data dari `login.html` menggunakan metode `POST`. Skrip ini bertanggung jawab untuk memvalidasi input pengguna.

## Fitur Utama

* **Formulir Login:** Halaman `login.html` menyediakan antarmuka formulir yang ramah pengguna untuk memasukkan username dan password.
* **Validasi Sisi Server (Server-Side Validation):** Semua logika validasi (pengecekan input kosong dan pencocokan kredensial) diproses secara eksklusif di server oleh `login.php`. Ini adalah praktik keamanan yang penting untuk mencegah manipulasi di sisi klien.
* **Otentikasi Berbasis Array:** Sesuai ketentuan tugas, skrip ini tidak terhubung ke database. Sebagai gantinya, data pengguna yang valid disimpan (hardcoded) dalam sebuah *associative array* di dalam file `login.php`.
    ```php
    $pengguna_valid = [
        "admin" => "rahasia123",
        "gandhi" => "webprog"
    ];
    ```
* **Manajemen Sesi:** Setelah login berhasil, skrip `login.php` menggunakan `session_start()` dan `$_SESSION` untuk "mengingat" pengguna.
* **Umpan Balik (Feedback) Pengguna:**
    * **Login Berhasil:** Pengguna akan melihat halaman sukses yang dibuat secara dinamis oleh PHP. Halaman ini menggunakan CSS yang sama dengan `login.html` untuk memberikan tampilan yang konsisten.
    * **Login Gagal:** Jika username atau password salah (atau kosong), skrip akan membaca konten `login.html`, menyisipkan pesan error yang relevan ke dalamnya, dan menampilkannya kembali kepada pengguna.

## Teknologi yang Digunakan

* **HTML5**
* **CSS3** (Internal Stylesheet)
* **PHP**

## Cara Menjalankan Proyek

Proyek ini membutuhkan server lokal untuk menjalankan skrip PHP.

1.  Pastikan Anda memiliki server lokal seperti **XAMPP** atau **WAMP** yang sudah terinstal dan layanan **Apache**-nya berjalan.
2.  Salin atau kloning folder proyek ini ke dalam direktori `htdocs` di dalam folder instalasi XAMPP Anda.
    (Contoh lokasi: `C:\xampp\htdocs\nama-folder-proyek`)
3.  Buka browser web Anda (Chrome, Firefox, dll.).
4.  Akses file `login.html` melalui alamat `localhost`, **bukan** dengan membuka file secara langsung (File > Open).
5.  Ketik URL:
    `http://localhost/nama-folder-proyek/login.html`
