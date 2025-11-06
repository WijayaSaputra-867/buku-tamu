# 📘 Buku Tamu Laravel

Project ini adalah aplikasi **Buku Tamu** berbasis **Laravel**.  
Aplikasi ini digunakan untuk mencatat data tamu yang melakukan check-in di instansi atau organisasi.

---

## 🧩 1. Clone Repository

Clone repository dari GitHub:

```bash
git clone https://github.com/WijayaSaputra-867/buku-tamu.git
```

atau menggunakan SSH (disarankan agar tidak perlu token GitHub setiap push/pull):

```bash
git clone git@github.com:WijayaSaputra-867/buku-tamu.git
```

---

## 📂 2. Masuk ke Folder Project

```bash
cd buku-tamu
```

---

## 🧱 3. Install Dependensi PHP

Pastikan kamu sudah menginstal **Composer**.  
Kemudian jalankan perintah:

```bash
composer install
```

---

## 💾 4. Duplikasi File Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Lalu buka file `.env` dan ubah konfigurasi sesuai kebutuhan, misalnya:

```
APP_NAME="Buku Tamu"
APP_URL=http://127.0.0.1:8000

DB_DATABASE=buku_tamu
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🔑 5. Generate Application Key

```bash
php artisan key:generate
```

---

## 🗄️ 6. Setup Database

1. Buat database baru (misalnya dengan phpMyAdmin, TablePlus, atau command line).
2. Sesuaikan konfigurasi di `.env` seperti contoh di atas.
3. Jalankan migrasi tabel:

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

---

## ⚙️ 7. Install Dependensi Frontend

```bash
npm install
npm run build
```

---

## 🚀 8. Jalankan Server Lokal

```bash
php artisan serve
```

Server akan berjalan di:

```
http://127.0.0.1:8000
```

---

## ✅ 9. Selesai!

Sekarang project **Buku Tamu Laravel** sudah siap digunakan 🎉

---

### 🧰 Catatan Tambahan

-   PHP versi minimal: **8.1**
-   Pastikan ekstensi berikut aktif:
    -   `OpenSSL`, `PDO`, `Mbstring`, `Tokenizer`, `XML`, `Ctype`, `JSON`
-   Gunakan database seperti **MySQL** atau **PostgreSQL**

---

### 👨‍💻 Kontributor

-   **Wijaya Saputra** – [GitHub Profile](https://github.com/WijayaSaputra-867)
