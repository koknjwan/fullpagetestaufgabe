# Testaufgabe ( fullpage.js )

## Description

This Laravel project utilizes the following technologies:

-   Fullpage 4.x
-   JQuery 3.x
-   Bootstrap 5.x
-   Fontawesome 6.x

The project consists of a single welcome page. Questions are stored in JSON format within a MySQL table.

## Installation

1. Clone the project from GitHub.
2. Run `composer install` to install project dependencies.
3. Copy the `.env` file by running `cp .env.example .env`.
4. Generate key `php artisan key:generate`.
5. Adjust your `.env` file with your database configuration.
6. Run `php artisan migrate` to create the necessary database tables.
7. Seed the database with questions by running `php artisan db:seed --class=QuestionsSeeder`.

## Usage

To use the project:

1. Ensure your environment is set up correctly.
2. Run `php artisan serve` to start the server.
3. Access the application in your web browser.
