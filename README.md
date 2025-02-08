# LARAVEL APP BRANDON

This app meets the requirements of the Laravel technical test. The app was created with Blade views to render the information, and the corresponding migrations, controllers, and models were also created. Due to time constraints, the authentication provided by Laravel by default was used, so the development of implementing a different authentication logic was pending. Laravel Sail was used, which provides the entire PHP and MySQL configuration environment with Docker. To get it working, you must follow these steps:

## Installation

Clone the repository and navigate to the folder

```bash
git clone https://github.com/brandonvera/crazy-test.git
cd crazy-test
```

## Usage

```bash
composer install

cp .env.example .env

php artisan key:generate

./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate
```

## Usage

To use the job, use:

```bash
./vendor/bin/sail artisan fetch-data

./vendor/bin/sail artisan queue:work
```