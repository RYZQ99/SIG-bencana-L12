# SIG Bencana Alam Malang Raya

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
git clone <https://github.com/RYZQ99/SIG-bencana-L12>
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
> Jalankan code docker compose exec app php artisan db:seed
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

* Rizky Anugrah

---

**Universitas**

Pengembangan Sistem Informasi Geografis (SIG) Pemetaan Kerentanan Bencana Alam di Malang Raya sebagai bagian dari penelitian tugas akhir.
