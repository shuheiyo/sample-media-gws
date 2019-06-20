# Sample Media GWS (Gurunavi Web Service)
This is a sample app that searches for restaurant information near the current location using the Gurunavi API.
## Running the site locally
### Prerequisites

To use this run confifuration, you need the [Docker Desktop for Mac][docker] installed and runnning.

[docker]:https://www.docker.com/products/docker-desktop

### Preferences
1. Create project folder:
    ```
    $ mkdir smgws && cd smgws
    ```

1. Clone the Laradock
    ```
    $ git clone https://github.com/Laradock/laradock.git
    ```

1. Setting the Laradock
    ```
    $ cd laradock && cp env-example .env
    $ vi .env
    ```

    ```Docker
    ### Paths #####################################
    
    DATA_PATH_HOST=~/.laradock/smgws_data

    ### Docker compose files ######################
    
    COMPOSE_PROJECT_NAME=smgws_laradock

    ### MYSQL #####################################
    MYSQL_VERSION=5.7
    MYSQL_DATABASE=default
    MYSQL_USER=default
    MYSQL_PASSWORD=secret
    ```

1. Setting MySQL
    ```
    $ cd mysql && vi my.cnf
    ```
    ```Docker
    # add on the bottom line
    explicit_defaults_for_timestamp = true
    ```
    ```
    $ cd ..
    ```

1. Build Docker
    ```
    $ docker-compose up -d nginx mysql
    ```
1. Create the project
    ```
    $ docker-compose exec workspace bash
    ```
    ```nginx
    /var/www# composer create-project --prefer-dist laravel/laravel sample-media-gws "5.8.*"
    /var/www# cd sample-media-gws
    /var/www/sample-media-gws# vi .env
    ```
    ```Docker
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=default
    DB_USERNAME=default
    ```
    ```nginx
    /var/www/sample-media-gws# php artisan migrate
    /var/www/sample-media-gws# exit
    ```

1. Change the PATH environment variable
    ```
    $ docker-compose down
    $ vi .env
    ```
    ```Docker
    APP_CODE_PATH_HOST=../sample-media-gws/
    ```

1. Replace the project
    ```
    $ cd ..
    $ rm -rf sample-media-gws
    $ git clone https://github.com/shuheiyo/sample-media-gws.git
    ```

1. Build Docker again
    ```
    $ cd laradock
    $ docker-compose up -d nginx mysql
    ```
1. Access the localhost on the browser
    
    You can access this app !
