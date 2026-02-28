howmuch-eShop

Overview

howmuch-eShop is an e-commerce web application built with Laravel.
It includes authentication, role management, shopping cart functionality, and admin dashboard.

Tech Stack

PHP 8.3

Laravel 12

MySQL

Redis

Blade

Bootstrap

Laravel Breeze

MVC Architecture

Features

User authentication (Laravel Breeze)

Role-based authorization

Product and category CRUD

Shopping cart system

Admin dashboard

Redis caching

MySQL relational database

Installation
git clone https://github.com/ristanovica89/my-laravel.git
cd my-laravel/howmuch-eShop
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve