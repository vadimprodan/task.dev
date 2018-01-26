<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
<h1 align="center">Test task</h1>

## Initializing

1) Clone from git
``` bash
$ git clone https://github.com/vadimprodan/task.dev.git
$ cd task.dev
```

2) Install composer packages
``` bash
$ composer install
```

3) Set .env file and init DB
``` bash
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate
```

Test data for DB:
``` bash
$ php artisan db:seed
```
**Login:** admin
**Password:** 111111