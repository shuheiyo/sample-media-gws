# Sample Media GWS (Gurunavi Web Service)
This is a sample app that searches for restaurant information near the current location using the Gurunavi API.
## Running the site locally
### Prerequisites

To use this run confifuration, you need the [Docker Desktop for Mac][docker] installed and runnning.

[docker]:https://www.docker.com/products/docker-desktop

### Preferences
1. Create project folder
    ```
    $ mkdir smgws && cd smgws
    ```

1. Clone the Laradock and this repo
    ```
    $ git clone https://github.com/Laradock/laradock.git
    $ git clone https://github.com/shuheiyo/sample-media-gws.git
    ```

1. Setting the Laradock
    ```
    $ cd laradock && cp env-example .env
    $ vi .env
    ```

    ```Docker
    ### Paths #####################################
    
    APP_CODE_PATH_HOST=../sample-media-gws/
    
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
1. Setting Nginx
    ```
    $ cd nginx/sites
    $ vi default.conf
    ```
    ```Docker
    # listen 80 default_server;
    # listen [::]:80 default_server ipv6only=on;
    
    # For https
    listen 443 ssl default_server;
    listen [::]:443 ssl default_server ipv6only=on;
    ssl_certificate /etc/nginx/ssl/default.crt;
    ssl_certificate_key /etc/nginx/ssl/default.key;
    ```
    ```
    $ cd ..
    $ cd ..
    ```
1. Build Docker
    ```
    $ docker-compose up -d nginx mysql
    ```
1. Setting project
    ```
    $ docker-compose exec workspace bash
    ```
    ```nginx
    /var/www# composer install
    /var/www# php artisan migrate
    /var/www# php artisan key:generate
    /var/www# cp .env.example .env
    /var/www# vi .env
    ```
    ```Docker
    GWS_ACCESS_KEY_ID=                  # your gurunavi web service api key
    ```
    ```nginx
    /var/www# exit
    ```
1. Access the localhost on the browser
  
    https://localhost:443  
    You can use this app!