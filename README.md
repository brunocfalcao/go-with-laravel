# Bruno

This repository contains the code for the Bruno Laravel App

## Local Development Setup

> This documentation assumes you are running OSX or Linux based OS.

> Please ensure your local port 80 is not used by local servers.

> This documentation assumes you are using a terminal to setup the project

1. Clone the repository to your local machine and cd into the directory with `cd Bruno`
2. Run `composer install` to install the PHP packages for the project
3. Create the `.env` file by copying `cp .env.example .env`
4. Run `php artisan key:generate` to generate command helps in the process of encryption so that there is no breach of privacy and private data.
5. Run `npm install` to install and node modules. You can also run this on your local machine using `npm install`.
6. Run `npm run dev` to process the frontend assets. You can also run this on your local machine using `npm run dev`.
7. Run `php artisan migrate` to setup the database table and records.
8. Run `php artisan db:seed --class=RolesAndPermissionsSeeder` to setup the roles in tables.
9. Run `php artisan db:seed --class=AdminSeeder` to setup the admin record in user table.
10. Go to `http://localhost:8000` for the local version of the app.
11. Run `php artisan schedule:run` this command will run to automate the cronjob in application.
12. Run `php artisan process:orders` this command will have to run after successfull payment through lemonsqueezy to fetch the records in a table of that order and also sending mail to the new user of ThankYou & Reset Password.
13. Run `php artisan update:products` this command will fetch the products from lemonsqueezy store so you can aceess to download the files from products and can able to download in order section through button.

> If you want to use a separate host such as `http://local.bruno.com`, use it in the .env and add `0.0.0.0 local.bruno.com` to your local hosts file.

## Server Requirements

> PHP 8.2.4
> node 16.14.2  
> npm 8.5.0

## Deployment

### Staging

### Production

## Daily Usage
