WeatherApp

Overview

WeatherApp is a Laravel web application that integrates an external weather API and provides authenticated user dashboards.

Tech Stack

PHP 8.3

Laravel 12

MySQL

Blade

Tailwind CSS

REST API

MVC Architecture

Features

External weather API integration

Authentication and role-based access

User dashboard

Dynamic weather data display

MySQL database integration

Clean MVC structure

Installation
git clone https://github.com/ristanovica89/my-laravel.git
cd my-laravel/weather-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve