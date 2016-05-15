## Lifesavers - Dashboard for blood banks
This is a simple project that help blood banks to manager their donor and patient records. The application is written using the Laravel 4 PHP framework and the front end is written using bootstrap.
Username: administrator
Password: password

Online demo: http://lifesavers.herokuapp.com

## Installation

### Step 1: Clone the repo
```
git clone https://github.com/rajabishek/lifesavers
```

### Step 2: Prerequisites
This will install the dependencies of this website. It will pull in several packages like Laravel Framework, Symphony components.
```
composer install
php artisan migrate
```

### Step 3: Serve
```
php artisan serve
```

### Note about Apache
If you use Apache to serve this, you will need to add the following 2 lines to your .htaccess (or your virtualhost configuration):
```
RewriteCond %{HTTP:Authorization} ^(.*)
RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]
```

## License
MIT License. See LICENSE file.