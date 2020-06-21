# example_api
Example Laravel Api

# Build Docker container
cd laravel && 
docker-compose up -d

# To generate tables and example records
docker exec -ti app bash

# Install dependencies
composer install

# Create tables
php artisan migrate

# Generate 30 sample records
php artisan db:seed

# start containers
docker start app
docker start db
docker start webserver

# stop containers
docker stop app
docker stop db
docker stop webserver

# remove containers
docker rm app
docker rm db
docker rm webserver