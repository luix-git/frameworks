1. Изменён текст на главных страницах.

Yii:
yii.local/views/site/index.php

Symfony
symfony.local/app/Resources/views/default/index.html.twig

Laravel
laravel.local/resources/views/welcome.blade.php


2. Созданы контроллеры, добавлена авторизация пользователей.

Yii:
- Создан "MainController" в котором реализована проверка пользователя.
- В конфиге web.php:
-- переопределён маршрут по умолчанию:
    'defaultRoute' => 'main/index',
-- включены "PrettyUrl":
    'enablePrettyUrl' => true,

Symfony:
- Создан контроллер index в классе "DefaultController"
- Добавлен маршрут в конфиге routes.yml:
    index:
        path: /
        controller: App\Controller\DefaultController::index

Laravel:
- Создан middleware "CheckUser"
- Добавлен в роут:
    Route::get('/', function () {
        return view('welcome');
    })->middleware('check.user');