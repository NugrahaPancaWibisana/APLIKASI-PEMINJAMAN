<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# APLIKASI-PEMINJAMAN

# Cara Menjalankan Proyek Laravel

1. Clone repositori:
   ```sh
   git clone 'link proyek github'
   ```

2. Masuk ke dalam repositori
   ```sh
   cd ./aplikasi-peminjaman
   ```

3. Download package
   ```sh
   composer i
   ```

4. copy environment
   ```sh
   cp .env.example .env
   ```

5. Generate application key
   ```sh
   php artisan key:generate
   ```

6. Jalankan migrasi database
   ```sh
   php artisan migrate
   ```

7. Seed database dengan data awal
   ```sh
   php artisan db:seed
   ```

8. Jalankan server
   ```sh
   php artisan serve
   ```
