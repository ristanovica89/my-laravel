ShipmentApp

Overview

ShipmentApp is a Laravel-based web application for managing shipments and delivery records.
The application supports role-based access control and file upload functionality.

Tech Stack

PHP 8.3

Laravel 12

MySQL

Redis

Blade

Tailwind CSS

MVC Architecture

Features

Authentication and role-based authorization

Shipment CRUD operations

File upload for shipment documents

Redis caching for performance optimization

Responsive UI built with Blade and Tailwind

Structured using standard Laravel MVC pattern

Installation
git clone https://github.com/ristanovica89/my-laravel.git
cd my-laravel/ShipmentApp
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve