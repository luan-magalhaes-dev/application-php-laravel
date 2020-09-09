#!/bin/bash

FILE=../.env
if [ ! -f "$FILE" ]; then
    echo ".env does not exists."
    cd .. && cp .env.example .env
    echo ".env created. Configure database connection and run again..."
fi

docker-compose up -d
sleep 5
docker-compose exec php-fpm composer install
docker-compose exec php-fpm php artisan key:generate
sleep 1
docker-compose exec php-fpm php artisan migrate
docker-compose exec php-fpm chmod -R 777 storage/ vendor/
