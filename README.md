<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Installation

1. Clone the repo and `cd` into it
2. `composer install`
3. Rename or copy `.env.example` file to `.env` or run this script `php -r "file_exists('.env') || copy('.env.example', '.env');"`
4. `php artisan key:generate`
5. Setup a database and add your database credentials in your `.env` file
6. `php artisan migrate` (`php artisan migrate --seed` if you want to seed my data)
7. `npm install`
8. `npm run dev`
9. `php artisan serve`
10. Visit `localhost:8000` in your browser

## Account (run `php artisan migrate --seed`)
email: admin@example.com

password: 123123123
