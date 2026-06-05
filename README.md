## Tentang Proyek

**MenuGO** adalah aplikasi website berbasis Laravel yang dirancang untuk menampilkan dan mengelola menu makanan secara digital. Proyek ini dikembangkan sebagai bagian dari tugas besar mata kuliah **Pengembangan Aplikasi Website**.

Aplikasi ini memungkinkan pengguna untuk melihat daftar menu makanan dan minuman secara interaktif, serta memberikan kemudahan pengelolaan data menu bagi pihak admin.

---

## Fitur Utama

- Tampilan daftar menu makanan & minuman
- Pencarian dan filter menu
- Manajemen pesanan
- Autentikasi pengguna (Login & Register)
- Panel admin untuk kelola data menu
- Tampilan responsif (mobile-friendly)

---

## Teknologi yang Digunakan

| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| PHP | ^8.1 | Bahasa pemrograman utama |
| Laravel | ^10.0 | Framework backend |
| Laravel UI | ^4.6 | Autentikasi & tampilan UI |
| Laravel Sanctum | ^3.2 | API token authentication |
| Vite | terbaru | Bundler aset frontend |
| Blade | - | Template engine Laravel |
| MySQL | - | Database |

---

## Cara Instalasi & Menjalankan Proyek

### Prasyarat

Pastikan perangkat Anda sudah terpasang:

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL / MariaDB
- Git

### Langkah Instalasi

**1. Install Dependensi PHP**

```bash
composer install
```

**2. Install Dependensi JavaScript**

```bash
npm install
```

**3. Salin File Environment**

```bash
cp .env.example .env
```

**4. Generate Application Key**

```bash
php artisan key:generate
```

**5. Konfigurasi Database**

Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=menugoo
DB_USERNAME=root
DB_PASSWORD=
```

**6. Jalankan Migrasi & Seeder**

```bash
php artisan migrate --seed
```

**7. Buat Symlink Storage**

```bash
php artisan storage:link
```

**8. Build Aset Frontend**

```bash
npm run build
```

> Atau untuk mode development (hot reload):
> ```bash
> npm run dev
> ```

**9. Jalankan Server**

```bash
php artisan serve
```

Aplikasi dapat diakses di: [http://localhost:8000](http://localhost:8000)

---

## Struktur Direktori

```
WebisteMenuGO/
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Logika controller
│   │   └── Middleware/     # Middleware aplikasi
│   └── Models/             # Model Eloquent
├── config/                 # Konfigurasi aplikasi
├── database/
│   ├── migrations/         # File migrasi database
│   └── seeders/            # Data dummy/seeder
├── public/                 # Aset publik & entry point
├── resources/
│   ├── views/              # Template Blade
│   ├── css/                # Stylesheet
│   └── js/                 # JavaScript
├── routes/
│   ├── web.php             # Routing web
│   └── api.php             # Routing API
└── storage/                # File upload & log
```

---

## Tim Pengembang

| Nama | NIM | Peran |
|------|-----|-------|
| Dimas Dwi Suryo | 102062400139 | Backend Developer & Database |
| Ifli Najzahya Ramadhan | 102062400084 | Backend Developer |
| Dimas Arya Irwansyah | 102062400113 | Frontend Developer |
| Andrew Napitupulu | 102062400063 | Tester |

---

## Mata Kuliah

> **Pengembangan Aplikasi Website**
> Program Studi S1 Sistem Informasi

---
