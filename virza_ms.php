<?php 
/* 
https://fontawesome.com/v4/icons/

#vue ui 1-8> frontend || 9-34> backend   php artisan migrate:fresh --seed
vue create library_frontend => 
cd library_frontend => 
npm install vuex@next --save => 
npm install vue-router@4 => 
npm install => 
npm run serve => 

composer create-project --prefer-dist laravel/laravel:^10 laravel10
composer create-project --prefer-dist laravel/laravel virza_ms

cd virza_ms
composer require laravel/passport  --with-all-dependencies
php artisan migrate
php artisan passport:install

composer require jeroennoten/laravel-adminlte |=> https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Installation
php artisan adminlte:install
php artisan adminlte:install --only=main_views

php artisan make:controller DashboardController -r
php artisan make:controller PermissionsController -r

composer require spatie/laravel-permission |=> https://spatie.be/docs/laravel-permission/v5/installation-laravel
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate

composer require realrashid/sweet-alert |=> https://realrashid.github.io/sweet-alert/install

php artisan sweetalert:publish |=> https://realrashid.github.io/sweet-alert/config
composer require yajra/laravel-datatables-oracle:"^10.0" |=> https://yajrabox.com/docs/laravel-datatables/master/installation
@section('plugins.Datatables', true) |=> 
php artisan adminlte:plugins install --plugin=datatables |=> https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
 |=>  
 |=> 
php artisan make:command CreateRoutePermissionsCommand
php artisan permission:generate


php artisan make:controller RolesController -r
php artisan make:controller UsersController -r

php artisan adminlte:plugins install --plugin=select2             

php artisan make:seeder CreateSuperUserSeeder



php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan cache:clear

php artisan serve

// php artisan migrate:fresh --seed
php artisan migrate:fresh
php artisan permission:generate
php artisan db:seed













9:25s | https://www.youtube.com/watch?v=vAx7ZFUVrSY&list=PLbC4KRSNcMno2lP3Q7W3ZvS6NAeP6xut5&index=31

php artisan make:migration create_designation_table
php artisan make:controller Hrm/DesignationController -r
php artisan make:model Designation

php artisan make:migration create_employees_table
php artisan migrate
php artisan make:controller Hrm/EmployeeController -r
php artisan make:model Employee

php artisan storage:link

php artisan make:migration create_institution_table
php artisan migrate
php artisan make:controller InstitutionController -r
php artisan make:model Institution




php artisan route:list 





*/











; ?>

