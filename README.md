# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation

1. buka terminal lalu ketikan composer update & yarn
2. setelah selesai ketikan php artisan spark migrate
3. ketik php artisan db:seed UserSeeder
4. ketik php artisan db:seed BannerSeeder
5. ketik php artisan db:seed ProfilSeeder
6. silahkan ketikan /login untuk masuk ke dalam admin menu
7. untuk email dan password bisa di lihat pada file UserSeeder

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.
