# PR Online Judge

A simple online judge for the Modern Web Application course.

## Requirements

This project uses [Laravel Sail](https://laravel.com/docs/10.x/sail). The only required tool you need to have locally installed is [Docker](https://www.docker.com/)

## Installation

1. Clone the repository
2. Install the dependencies

    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
    ```

3. (Optional) Configure a shell alias.

    This will allow you to run Sail commands without having to type `./vendor/bin/sail` each time.

    ```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
    ```

## Usage

1. Start the containers

    ```bash
    ./vendor/bin/sail up -d
    # or if you configured the alias:
    sail up -d
    ```

2. Run the migrations

    ```bash
    sail artisan migrate
    # or optionally, to seed the database:
    sail artisan migrate --seed
    ```

3. Visit [localhost](http://localhost) in your browser
