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

#Use Postman for api test
Use Header  
Content-Type : application/json  
Content-Type : application/json  

Open yaml swagger documentation in  
coppy the yaml from  
https://github.com/ddalev/example_api/blob/master/openapi-yaml-client-generated/openapi.yaml  
paste the yaml inside swagger editor and will generate documentation
https://editor.swagger.io/

# start containers
docker start app &&
docker start db &&
docker start webserver

# stop containers
docker stop app &&
docker stop db &&
docker stop webserver

# remove containers
docker rm app &&
docker rm db &&
docker rm webserver