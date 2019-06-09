
  

# URL Shortener

URL Shortener written in Laravel 5.8 using a LEMP stack (Nginx, PHP, and MariaDB) docker image.

1.  [Installation](#installation)

2.  [Usage](#usage)

3.  [Challenges and Design Decisions](#challenges-and-design-decisions)

4.  [Future improvements](#future-improvements)

5.  [Third-Party Libraries](#third-party-libraries)

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

After that you need to generate a key that will be stored in your .env file:

```sh
$ docker-compose exec php php artisan key:generate
```

To run all the migrations, execute the  `migrate`  Artisan command. This will create database schema in our MariaDB container.
```
docker-compose exec php php artisan migrate
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

You can add mock data to easily test the API. This will insert 150 random URLs:

```
$ docker-compose exec php php artisan db:seed
```
If you want more data just re-run the command above.

### Postman Collection

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/afcd3916b2b098e73862)

## Usage

  

All API endpoints start with `/api/`.

  

|Method|Endpoint|Request|Use |
|--|--|--|--|
|GET|/api/url||Return all short URLs in the system. (Testing)|
|GET|/api/{code}| A short code|Returns the URL that the app is redirecting you to. |
|GET|/api/top| |Return top 100 URLs |
|POST|/api/url|url: Full URL, nsfw: boolean|Returns a JSON with a short code or errors|
|GET|/{code}|A short code|Redirect you to a URL|

## Challenges and Design Decisions

### How to generate short code

The heavy part of this project was to choose a good algorithm to generate the short codes. The algorithm was inspired in [this blog](https://medium.com/@adhasmana/system-design-create-a-url-shortening-service-part-2-design-the-write-api-6197c1e0aa1c) by [Abhinav Dhasmana](https://medium.com/@adhasmana).

Our codes are 6 characters long. Let's say we have the following characters to generate our short codes:

- A-Z(26)

- a-z(26)

- 0–9(10)

62 characters or Base62. I used Base62 instead of Base64 because Base64 has the characters `+` and `/` that are not safe for a URL. With 62 characters and 6 characters long every short code we have

> 62<sup>6</sup> = 56.800.235.584

We have more than 56 billion unique short codes we can store in our database!

We hash the long URL using base64 and take the first 6 characters of that string as our short code.

### Same short code for two URLs

Because we are taking the first 6 characters, it is possible that 2 different URLs use the same short code. I found this bug when trying to add Amazon and Google. Using [https://base62.io/](https://base62.io/)

> https://www.google.com/ = GvB1DW...

> https://www.amazon.com/ = GvB1DW...

As you see, both URL starts with the same code so I got a duplicate error in the DB when trying to add Amazon. The solution was to start with the first 6 characters of the hash and see if there is any other url with that key and take the next 6 characters if the first code is already in use, until you get a new code.

### Top 100 URLs

I had to change the urls table because I forgot to add something to rank the urls. Later I find out that if you add a `+` to any [Bitly](https://bitly.com/) url i.e. [https://bitly.com/1dNVPAW+](https://bitly.com/1dNVPAW+) it shows you information about the link you're being redirected and one of them is a **Click** counter. That gave me the idea to use a click counter as a method to rank every URL.

#### Other Design Decisions

- I used Laravel because is the PHP Framework I have more experience with.

- By definition, every URL has the scheme part. This is the *https://* part. If you try to add a url without that part you will get a Bad Request response.

- The front-end uses the [Rapid – Multipurpose Bootstrap Business Template](https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/)

## Future improvements

- [ ] Replace the RDBMS with a non-relational database for better scalability.

- [ ] Secure the API with OAuth2 tokens i.e. [Laravel Passport](https://laravel.com/docs/5.8/passport)

- [ ] Custom top instead of top 100 every time. Also the option to select between desc or asc order.

- [ ] Automatically complete the scheme in the URL if is not present (Web client)

- [ ] Replace error alert with actual error message on the site.

### Third-Party Libraries

| GitHub | Use in the app |
|--------------------------------------------------------------------------------------------------|-------------------------------|
| [tuupola/base62](https://github.com/tuupola/base62) | Base62 and encoding algorithm |