@echo off
set /p project_name=Insert project name: 
composer create-project symfony/framework-standard-edition ./%project_name%