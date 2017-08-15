@echo off
set /p project_name=Insert project name: 
composer create-project --prefer-dist laravel/laravel ./%project_name%