#!/bin/sh
echo "APP_KEY=base64:8w+qk6prjvwYRKqKXYFkk4DVSWyAruGkMMZXzq2ZXQg=" > /var/www/html/.env
php artisan database:migrate
php artisan serve --host=0.0.0.0 --port=80
