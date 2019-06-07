# URL Shortener
URL Shortener written in Laravel 5.8 using a LEMP stack (Nginx, PHP, and MariaDB) docker image.
## Installation
### Starting Docker 
Build the docker containers using docker-compose command:
```sh
    docker-compose build
```

To start the containers run:
```
    docker-compose up -d
```
Once the container are all up you have to install Laravel dependencies.


### Installing Laravel dependencies

Install Laravel dependencies using composer:
```sh
docker-compose exec php composer install
```
After that you just need to generate a key that will be stored in your .env file:
```sh
docker-compose exec php php artisan key:generate
```

Navigate to http://localhost:8080

### Stopping Docker containers
This will stop the docker containers:
```
    docker-compose kill
```
This will remove all stopped service containers:
```
    docker-compose rm
```

# Challenges
# Reasoning behind any design decisions
# Future improvements
