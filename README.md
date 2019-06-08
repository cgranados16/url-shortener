
# URL Shortener
URL Shortener written in Laravel 5.8 using a LEMP stack (Nginx, PHP, and MariaDB) docker image.

1. [Installation](#installation)
2. [Challenges and Design Decisions](#challenges)
3. [Future improvements](#future-improvements)
4. [Third-Party Libraries](#third-party-libraries)
## Installation
Clone the repo and cd into the folder:
```sh
$ git clone https://github.com/cgranados16/url-shortener.git
$ cd url-shortener
```
### Starting Docker 
Build the docker containers using docker-compose command:
```sh
$ docker-compose build
```

Then start the containers with:
```
$ docker-compose up -d
```
Once the container are all up you have to install Laravel dependencies.


### Installing Laravel dependencies

Install Laravel dependencies using composer:
```sh
$ docker-compose exec php composer install
```
After that you just need to generate a key that will be stored in your .env file:
```sh
$ docker-compose exec php php artisan key:generate
```

### Running the app
Make sure all the containers are up:
```
$ docker-compose up -d
```
Navigate to http://localhost:8080
### Stopping Docker containers
This will stop the docker containers:
```
$ docker-compose kill
```
This will remove all stopped service containers:
```
$ docker-compose rm
```
## Testing
You can add mock data to easily test the API. This will insert 1000 random URLs:
```
$ docker-compoenter code herese exec php php artisan db:seed
```

### Postman Collection

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/afcd3916b2b098e73862)
## Challenges
## Reasoning behind any design decisions
## Future improvements

### Third-Party Libraries
|GitHub| Use in the app|
|--|--|
| [tuupola/base62](%5Bhttps://github.com/tuupola/base62%5D%28https://github.com/tuupola/base62%29) | Base62 and encoding algorithm |
|  |  |

