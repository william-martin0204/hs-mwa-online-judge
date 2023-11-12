# PR Online Judge

A simple online judge for the Modern Web Application course.

## Requirements

This project uses [Laravel Sail](https://laravel.com/docs/10.x/sail). The only required tool you need to have locally installed is [Docker](https://www.docker.com/)

## Installation

1. Clone the repository

    ```bash
    git clone https://github.com/fvaldes0109/hs-mwa-online-judge.git
    cd hs-mwa-online-judge
    ```

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

4. Copy the contents of `.env.example` file to `.env`

    ```bash
    cat .env.example > .env
    ```

5. Generate the application key

    ```bash
    ./vendor/bin/sail artisan key:generate
    # or if you configured the alias:
    sail artisan key:generate
    ```

## Usage

1. Start the containers

    ```bash
    sail up -d
    ```

2. Run the migrations (only the first time)

    ```bash
    sail artisan migrate
    # or optionally, to seed the database:
    sail artisan migrate --seed
    ```

3. Visit [localhost](http://localhost) in your browser

## Possible problems

- If running the migrations throws **SQLSTATE[HY000] [2002] Connection refused**, go to your `.env` file, set `DB_HOST=mysql` and re-run the migrations.

- If entering [localhost](http://localhost) throws something like:

    >**file_put_contents(/var/www/html/storage/framework/sessions/Vfo6Qs5KzFik2Xc43dEd7LnoLKPR5X2EYPSnu8bW): Failed to open stream: Permission denied**

    go to the terminal and run:

    ```bash
    chmod -R gu+w storage
    chmod -R guo+w storage
    ```
