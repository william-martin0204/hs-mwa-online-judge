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

5. Start the containers

    ```bash
    sail up -d
    ```

6. Generate the application key

    ```bash
    sail artisan key:generate
    ```

7. Run the migrations

    ```bash
    sail artisan migrate
    # or optionally, to seed the database:
    sail artisan migrate --seed
    ```

8. Link the disks to the public folder

    ```bash
    sail artisan storage:link
    ```

## Usage

1. Make sure that the app is running by having executed:

    ```bash
    sail up -d
    ```

2. Visit [localhost](http://localhost) in your browser

3. To stop the app run:

    ```bash
    sail down
    ```

## .env for production

If you want to deploy the app to a production environment, you will need to set the following variables in the `.env` file:

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=<your domain>`

- You need to setup the database connection. You can use the following variables as a guide:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=sail
    DB_PASSWORD=password
    ```

- You can set the `FLARE_KEY` variable to enable [Laravel Flare](https://flare.laravel.com/). This is a service that allows you to monitor errors in your app. You can create an account [here](https://flare.laravel.com/).

- You need to setup the mail server. Change the MAIL variables according to your mail server configuration.

- It's recommended that you configure the queue driver in order to send emails asynchronously. Do the proper configurations in your server and set the `QUEUE_CONNECTION` accordingly.

- The project code is prepared to do periodic backups. You need to do the proper configurations in your server scheduler. Use this command as an example:

    ```bash
    php8.2 /home/forge/proj.fvaldes.live/artisan schedule:run
    ```

    Also, change the AWS variables to match your S3 bucket configuration where the backups will go.

## Debugging

- You can use [Ray](https://myray.app/) to debug the app. The necessary dependencies are already installed.
- You can use a mailpit instance to test the email functionality. Visit [localhost:8025](http://localhost:8025) in your browser to see the emails sent by the app.

## Possible problems

- If entering [localhost](http://localhost) throws something like:

    >**file_put_contents(/var/www/html/storage/framework/sessions/Vfo6Qs5KzFik2Xc43dEd7LnoLKPR5X2EYPSnu8bW): Failed to open stream: Permission denied**

    go to the terminal and run:

    ```bash
    chmod -R gu+w storage
    chmod -R guo+w storage
    ```
