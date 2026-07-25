# SIG Bencana Malang Raya

Sistem Informasi Geografis (SIG) berbasis Laravel untuk menampilkan dan mengelola data kerentanan bencana di wilayah Malang Raya.

---

# Requirement

Pastikan perangkat telah menginstall:

- Docker Desktop
- Git

Tidak perlu menginstall:

- PHP
- Composer
- MySQL
- Node.js
- XAMPP

Semua dependency sudah berjalan menggunakan Docker.

---

# Clone Project

```bash
git clone <repository-url>

cd SIG-bencana-L12
```

---

# Setup Project

Jalankan satu kali setelah clone project.

```
scripts/setup.bat
```

Script akan otomatis:

- Menjalankan Docker
- Membuat file .env
- Generate APP_KEY
- Install Composer
- Install Node Module
- Menjalankan Migration Database

---

# Menjalankan Project

Untuk development cukup jalankan

```
scripts/start.bat
```

Project dapat diakses melalui

Laravel

http://localhost:8000

phpMyAdmin

http://localhost:8080

---

# Menghentikan Project

```
scripts/stop.bat
```

---

# Struktur Docker

```
Browser
    │
    ▼
 Nginx (8000)
    │
    ▼
Laravel PHP-FPM
    │
 ┌──┴─────────────┐
 ▼                ▼
MySQL         phpMyAdmin
3306             8080
```

---

# Container

| Container | Fungsi |
|------------|------------------------|
| app | Laravel PHP |
| nginx | Web Server |
| mysql | Database |
| phpmyadmin | Database Management |
| node | Vite Development |

---

# Command Docker

Melihat Container

```bash
docker ps
```

Masuk ke Laravel

```bash
docker compose exec app bash
```

Migration

```bash
php artisan migrate
```

Melihat Log

```bash
docker compose logs
```

---

# Troubleshooting

## Docker belum berjalan

Buka Docker Desktop kemudian jalankan kembali

```
scripts/setup.bat
```

---

## Laravel tidak dapat diakses

Pastikan container nginx dan app berjalan.

```
docker ps
```

---

## Database gagal terkoneksi

Pastikan container mysql memiliki status Running.

```
docker ps
```

---

## phpMyAdmin tidak dapat dibuka

Buka

http://localhost:8080

---

# Author

Rizky Anugraha# SIG Bencana Alam Malang Raya

Sistem Informasi Geografis (SIG) berbasis Laravel yang digunakan untuk memetakan tingkat kerentanan bencana alam di wilayah Malang Raya. Project ini telah dikonfigurasi menggunakan Docker sehingga seluruh developer dapat menjalankan project dengan environment yang sama tanpa perlu melakukan konfigurasi manual menggunakan XAMPP.

---

# Teknologi yang Digunakan

* Laravel 12
* PHP 8.2
* MySQL 8.0
* Nginx
* Node.js 22
* Docker & Docker Compose
* Vite
* Tailwind CSS

---

# Persyaratan

Pastikan software berikut telah terpasang pada komputer:

* Docker Desktop
* Git

> **Catatan:** Tidak diperlukan instalasi PHP, Composer, MySQL, maupun Node.js secara lokal karena seluruh environment berjalan di dalam Docker.

---

# Clone Project

```bash
git clone <repository-url>
cd SIG-bencana-L12
```

---

# Struktur Project

```
SIG-bencana-L12/
│
├── app/
├── bootstrap/
├── config/
├── database/
├── docker/
├── public/
├── resources/
├── routes/
├── storage/
│
├── scripts/
│   ├── setup.bat
│   ├── start.bat
│   └── stop.bat
│
├── docker-compose.yml
├── Dockerfile
├── .env.example
└── README.md
```

---

# Instalasi Project

Setelah project berhasil di-clone, jalankan:

```
scripts\setup.bat
```

Script ini akan secara otomatis:

* Menjalankan Docker Container
* Membuat file `.env`
* Menginstall Composer Dependency
* Membuat `APP_KEY`
* Menjalankan Database Migration
* Menginstall Node Modules

> Setup hanya perlu dilakukan **sekali** setelah project pertama kali di-clone.

---

# Menjalankan Project

Untuk memulai development, jalankan:

```
scripts\start.bat
```

Script akan secara otomatis:

* Menjalankan seluruh Docker Container
* Menjalankan Vite Development Server
* Membuka browser

---

# Menghentikan Project

Setelah selesai bekerja, jalankan:

```
scripts\stop.bat
```

Script akan menghentikan seluruh Docker Container dengan aman.

---

# Akses Aplikasi

Setelah project berhasil dijalankan, aplikasi dapat diakses melalui:

| Service    | URL                   |
| ---------- | --------------------- |
| Laravel    | http://localhost:8000 |
| phpMyAdmin | http://localhost:8080 |

---

# Perintah Docker yang Sering Digunakan

### Masuk ke Container Laravel

```bash
docker compose exec app bash
```

### Menjalankan Artisan

```bash
docker compose exec app php artisan
```

Contoh:

```bash
docker compose exec app php artisan migrate
```

```bash
docker compose exec app php artisan make:model NamaModel -m
```

---

### Menjalankan Composer

```bash
docker compose exec app composer install
```

```bash
docker compose exec app composer update
```

---

### Menjalankan NPM

```bash
docker compose exec node npm install
```

```bash
docker compose exec node npm run build
```

---

### Menampilkan Log

```bash
docker compose logs
```

Log Laravel:

```bash
docker compose logs app
```

Log MySQL:

```bash
docker compose logs mysql
```

Log Nginx:

```bash
docker compose logs nginx
```

---

### Melihat Status Container

```bash
docker compose ps
```

---

### Menghentikan Container

```bash
docker compose down
```

---

### Menjalankan Kembali Container

```bash
docker compose up -d
```

---

# Troubleshooting

## Docker Desktop belum berjalan

Pastikan Docker Desktop telah dijalankan sebelum menggunakan project.

---

## Gagal terhubung ke Database

Pastikan container MySQL sudah berjalan.

```bash
docker compose ps
```

---

## Container tidak berjalan

Periksa log Docker.

```bash
docker compose logs
```

---

## Migration gagal

Masuk ke container Laravel kemudian jalankan ulang migration.

```bash
docker compose exec app php artisan migrate
```

---

## Membersihkan Cache Laravel

```bash
docker compose exec app php artisan optimize:clear
```

---

# Catatan

Project ini menggunakan Docker sebagai environment utama. Seluruh proses pengembangan, termasuk PHP, Composer, MySQL, dan Node.js dijalankan di dalam container sehingga tidak bergantung pada konfigurasi software yang terpasang di komputer developer.

---

# Kontributor

**Developer**

* Rizky Anugrah Pratama

---

**Universitas**

Pengembangan Sistem Informasi Geografis (SIG) Pemetaan Kerentanan Bencana Alam di Malang Raya sebagai bagian dari penelitian tugas akhir.


Universitas Bhinneka Nusantara

2026