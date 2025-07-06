# Cinema Gemilang - Website & CMS

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4F549A?style=for-the-badge&logo=livewire&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-77C1D2?style=for-the-badge&logo=alpine.js&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-D85C4B?style=for-the-badge)

Repositori ini berisi source code untuk proyek website dan admin panel Cinema Gemilang.

## 📝 Deskripsi Proyek

Proyek ini bertujuan untuk membangun platform digital lengkap untuk Cinema Gemilang, yang terdiri dari:

1.  **Frontend (Situs Publik):** Tempat user melihat daftar film, jadwal tayang, dan melakukan booking tiket.
2.  **Admin Panel (CMS):** Panel administrasi untuk staf guna mengelola data film, studio, jadwal, dan booking.

## 🛠️ Teknologi yang Digunakan

- **Backend:** Laravel 11
- **Frontend:** Blade, Livewire 3, Alpine.js, Tailwind CSS
- **Admin Panel:** Filament 3
- **Database:** MySQL / PostgreSQL (sesuai pilihan server)
- **Server:** PHP 8.2+

## 🚀 Instalasi & Setup Lokal

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal Anda.

1.  **Clone Repository**

    ```bash
    git clone [https://github.com/](https://github.com/)[username-anda]/cinema-gemilang.git
    cd cinema-gemilang
    ```

2.  **Install Dependencies**
    Pastikan Anda memiliki Composer dan NPM terinstall.

    ```bash
    # Install PHP dependencies
    composer install

    # Install JavaScript dependencies
    npm install
    ```

3.  **Setup Environment**
    Salin file `.env.example` menjadi `.env` dan konfigurasikan koneksi database Anda.

    ```bash
    cp .env.example .env
    ```

    Selanjutnya, buka file `.env` dan sesuaikan variabel `DB_*` (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

4.  **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5.  **Jalankan Migrasi & Seeder**
    Perintah ini akan membuat struktur tabel di database dan mengisinya dengan data awal (jika ada).

    ```bash
    php artisan migrate --seed
    ```

6.  **Jalankan Aplikasi**

    ```bash
    # Jalankan development server
    php artisan serve

    # Jalankan Vite untuk kompilasi asset (CSS & JS)
    npm run dev
    ```

Aplikasi sekarang akan berjalan di `http://127.0.0.1:8000`.
Admin panel dapat diakses di `http://127.0.0.1:8000/admin`.

## 🎯 Target Fitur Utama

- [ ] **Admin:** Manajemen Film (CRUD)
- [ ] **Admin:** Manajemen Studio (CRUD)
- [ ] **Admin:** Manajemen Jadwal (CRUD)
- [ ] **Frontend:** Tampilan Daftar Film (Now Playing & Coming Soon)
- [ ] **Frontend:** Halaman Detail Film
- [ ] **Frontend:** Proses Booking dengan Peta Kursi Interaktif
- [ ] **Frontend:** Halaman Riwayat Tiket User

---
