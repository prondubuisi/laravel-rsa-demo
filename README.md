# Laravel-RSA-Demo

An app to use RSA encryption as part of Laravel API operation

## User

| `Endpoint` | `api/users/register` |      |
| :---------| :------------ | ----- |
| Request Type |  POST       |    
| Description  | Creates a new User, generates public and private keys for user which is stored in database, and also stored in storage/keys folder |
|             |                      |
|  `Field`      | `Limits` |  `Required`    |
| email      | Standard email | YES         |
| username      | At least one character | YES |
| password | At least 6 characters     |    YES |



## Message

| `Endpoint` | `api/messages/decrypt` | |
| :---------| :------------ | --------|
| Request Type |  `POST` |
| Description | `Encrypts and decrypts dummy test, proof of concept for RSA encryption` |
|             |             |
|  `Field`      | `Limits` |  `Required`    |

## Installation

clone repository
Then install dependencies using [Composer](https://getcomposer.org/doc/00-intro.md)
```bash
$ composer install
```

Copy `.env.example` to `.env`
```bash
$ cp .env.example .env
```
Add your database credentials as appropriate

``` $ php artisan key:generate```

``` $ php artisan migrate```

``` $ php artisan storage:link ```

move the keys folder in project root to storage/app in project root, this application depends on the keys here for encryption

## Run
Run the application with the following command
```bash
$ php artisan serve
```



## Packages used
Apart from the default Laravel packages, I used [Vlucas Pikirasa](https://github.com/vlucas/pikirasa) package for RSA as the package was quite adaptable to the use case at hand.

## What my API endpoints achieve
I created a users/register endpoint which takes username, email and password as payload and creates a user, plus assigns public and private keys to the user, which is added to the public_key and private_key fields in the users table.

Also created messages/decrypt endpoint which has no payloads, but proves that encryption/decryption is possible with RSA if public and private keys are stored in a textfile, the keys used for this are found on folder keys/default. 

## What I have learnt

I spent lots of time  trying to store and use public and private keys as text/string, this is almost impossible as spaces/text identation mean a lot for .pem files. I finally used files for storage and I was able to encrypt and decrypt a random string.


















 
