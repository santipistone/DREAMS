# PistoneBle3

DREAMS project written in Blade PHP with Laravel MVC.
MongoDB based with laravel-mongodb API written by jenssegers.

Code v1.0 Updated 06/02/2022.

Policy Maker side.

Installation:


1-  Download + install php: in php install php composer
2-  Download and install php composer: No developer; browse php folder and choose php application; add path
3-   Downlaod + installation Laravel project folder
4-  Download MongoDB Compass
5- Create MongoDB server via atlas
6-  Connect to MongoDB Server (Atlas) via laravel:open file config/database.php, and modify here:
'mongodb' => [
                  'driver' => 'mongodb',
                  'dsn' => env('DB_URI', 'mongodb+srv://<username>:<password>@<database_url>'),
                  'database' => '<database_name>',
       ]
7- Upload MongoDB document in your own MongoDB server.
8- Download + install certificate SSL to connect via Laravel to MongoDB server.
9- Start laravel server via command: php artisan serve.
