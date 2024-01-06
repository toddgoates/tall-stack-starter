# TALL Stack Starter

This is a template for the TALL stack (Tailwind CSS, Alpine JS, Laravel, and Livewire) with basic authentication features. The app has login, user registration, password resets, and toggleable passwords.

## Prerequisites

To run this project on MacOS, we suggest you use [Laravel Herd](https://herd.laravel.com/), [DBngin](https://dbngin.com/), and [MailPit](https://github.com/axllent/mailpit). For Windows, we suggest you create a Docker Compose file.

## Getting Started

Clone this repo onto your computer, then do the following:

1. Install Composer dependencies with
    ```
    composer install
    ```
1. Create an `.env` file with
    ```
    cp .env.example .env
    ```
1. Generate an application key with
    ```
    php artisan key:generate
    ```
1. Run database migrations and seed database with
    ```
    php artisan migrate --seed
    ```
1. Install NPM dependencies with
    ```
    npm install
    ```
1. Compile frontend assets with
    ```
    npm run dev
    ```

If you're using Laravel Herd, your site is now available at [http://tall-stack-starter.test](http://tall-stack-starter.test). If you're using Docker, it is available at localhost at whichever port you specified.
