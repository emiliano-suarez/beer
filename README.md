# beer
Our beloved beer, site

## Requirements

You must have installed these technologies:
* [PHP]
* [MongoDb](https://docs.mongodb.com/manual/tutorial/install-mongodb-on-ubuntu/)

## Install app

```sh
$ cd /home/httpd/sites/
$ git clone git@github.com:emiliano-suarez/beer.git
$ cd beer
$ chmod 777 -R storage
$ composer install
$ php artisan cache:clear
```

## Configure virtual host (Apache)

Create this file:

```sh
$ sudo vim /etc/apache2/sites-available/beer.com.conf
```

And add these lines into it:

```javascript
<VirtualHost *:80>
        ServerAdmin webmaster@localhost
        ServerName beer-dev.com
        ServerAlias www.beer-dev.com
        DocumentRoot /home/httpd/sites/beer/public

        <Directory /home/httpd/sites/beer/public>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error-beer.log
        CustomLog ${APACHE_LOG_DIR}/access-beer.log combined
</VirtualHost>
```

Enable the new site:

```sh
$ sudo ln -s /etc/apache2/sites-available/beer.com.conf /etc/apache2/sites-enabled/beer.com.conf
$ sudo service apache2 restart
```

## Add local domain in your hosts file (optional)

```sh
$ sudo vim /etc/hosts
```

Add add this line at the end:

```sh
127.0.0.1       www.beer-dev.com
```

## Install Sendmail

```sh
$ sudo apt-get install sendmail
```
