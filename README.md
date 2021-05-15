## About laravel inertiajs admin

I have created this project to start with basic admin panel features like user management with Roles. 

![](https://raw.githubusercontent.com/amitm13/laravel-inertiajs-admin/master/screenshot.png)

## Installation

Clone the repo locally:

```sh
git clone https://github.com/amitm13/laravel-inertiajs-admin laravel-admin
cd laravel-admin
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an MySql database. You can also use another database (Sqlite, Postgres), simply update your configuration accordingly.

configure database in .env
```sh
DB_DATABASE=inertia_admin
```

Run database migrations:

```sh
php artisan migrate
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go!

Note: as there is no user by default. please register first to use admin panel.
