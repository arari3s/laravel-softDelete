# Laravel Soft Delete

![alt text](https://raw.githubusercontent.com/arari3s/laravel-softDelete/main/public/img/Screen%20Shot%202022-09-29%20at%208.47.05%20AM.png)

Cascade Delete & Restore when using Laravel SoftDeletes.

## Installation

```bash
# clone repo
git clone https://github.com/arari3s/laravel-softDelete.git

# go to laravel-softDelete directory
cd laravel-softDelete

# copy the .env.example file and change it to .env
cp .env.example .env

# Seed will create the name teacher and address.
php artisan migrate:fresh --seed

# download vendor
composer update

# generate key
php artisan key:generate
```
