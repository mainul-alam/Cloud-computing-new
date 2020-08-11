# Cloud-computing-new
Here I will do everything step by step again :

- Create 2 projects :

MAINUL@MAINUL-PC MINGW64 /c/xampp/htdocs/Cloud-computing-new (master)
$ composer create-project laravel/laravel CentralApp

MAINUL@MAINUL-PC MINGW64 /c/xampp/htdocs/Cloud-computing-new (master)
$ composer create-project laravel/laravel PhpRESTfulAPI

- Edit 2 files to create virtual host : 

C:\xampp\apache\conf\extra\httpd-vhosts
and
C:\Windows\System32\drivers\etc\hosts (view all file)

- Restart Xampp : both of the app should run

- Got the CentralApp and installe few package ( laravel documentation )

composer require laravel/ui

// Generate basic scaffolding...
php artisan ui bootstrap
php artisan ui vue
php artisan ui react

// Generate login / registration scaffolding...
php artisan ui bootstrap --auth
php artisan ui vue --auth
php artisan ui react --auth

npm install
npm run dev

- make controller for pages becasue (request -> rout -> controller ->views/model) 

php artisan make:controller PagesController

- For regirtration added an option 
