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

# Use Postman for api test
Use Header  
Accept : application/json  
Content-Type : application/json  

Generate swagger documentation:  
coppy the yaml from  
https://github.com/ddalev/example_api/blob/master/openapi-yaml-client-generated/openapi.yaml  
paste the yaml inside swagger editor and will generate documentation  
https://editor.swagger.io/

# Alternative documentation 
Use Header  
Accept : application/json  
Content-Type : application/json  

Get list of all Players  
method GET  
http://127.0.0.1:8100/api/players  

filter by country 
http://127.0.0.1:8100/api/players?country=Bulgaria

Store Player  
method POST  
http://127.0.0.1:8100/api/player  
"name": "Dalev", *Required  
"country": "Bulgaria", *Required  
"birth_date": null

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