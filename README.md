# PistoneBle3
DREAMS
-------------
DREAMS project written in Blade PHP with Laravel MVC.
MongoDB based with laravel-mongodb API written by jenssegers.

Code v1.0 Updated 06/02/2022.

Policy Maker side.

Installation:


-  Download + install php: in php install php composer
-  Download and install php composer: No developer; browse php folder and choose php application; add path
-   Downlaod + installation Laravel project folder
-  Download MongoDB Compass
- Create MongoDB server via atlas
-  Connect to MongoDB Server (Atlas) via laravel: 
- - open file config/database.php, and modify here:
```php
'mongodb' => [
                  'driver' => 'mongodb',
                  'dsn' => env('DB_URI', 'mongodb+srv://<username>:<password>@<database_url>'),
                  'database' => '<database_name>',
       ]
```
- Upload MongoDB document in your own MongoDB server.
- Download + install certificate SSL to connect via Laravel to MongoDB server.
- Download DREAMS code via GitHub
- Select directory of DREAMS code
- Start DREAMS server via command: 
```
php artisan serve
```
-Connect on :
```
localhost:8000
```
