## Setup
1. npm install
2. composer install
3. php artisan key:generate
4. maak een .env bestand aan aan de hand van .env.example
5. verander de database informatie in .env naar je eigen informatie.
6. Maak database aan met de naam die in je .env staat
7. php artisan migrate

## Development
1. php artisan serve
2. npm run watch
3. Database aanzetten (XAMPP/WampServer/Laragon)

## Seeder
1. php artisan migrate:fresh
2. composer dump-autoload
3. Ga naar database/seeds/menuSeeder.php
4. volg de instructies daar (Eerst menuSeeder, dan reservationTableSeeder)
5. php artisan db:seed

## Roles
1. In de web.php moeten routes beveiligd worden
2. ->middleware('verified') of ->middleware('auth') is om te kijken of een user ingelogd is
3. ->middleware('employee') kijkt of de gebruiker de rol van personeelslid heeft, admin's kunnen deze paginas ook gebruikern
4. ->middleware('admin') is voor paginas die alleen de admin kan bezoeken
5. ->middleware('notBlocked') is om te kijken of een ingelogde user geblokkeerd is. als dit zo is logt hij uit. Deze middleware moet alleen gebruikt worden op paginas waar een gebruiker voor ingelogd moet zijn
