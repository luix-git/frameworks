@echo off
set /p project_name=Insert project name: 
composer create-project --prefer-dist yiisoft/yii2-app-basic ./%project_name%