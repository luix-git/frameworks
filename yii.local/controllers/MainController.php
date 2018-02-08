<?php

namespace app\controllers;

use yii\base\Controller;

class MainController extends Controller
{
    protected $users = [
        'admin' => '$2y$10$WI5Kx1dJWYCkv7owgeWY5eMy4H1T7R4kDRsPA/VBE1J0JulQhsq/2'
    ];

    public function actionIndex()
    {
        if (!$this->authenticateUser()) {
            \Yii::$app->response->statusCode = 401;
            return null;
        }
    }

    /**
     * @return bool
     */
    protected function authenticateUser()
    {
        $request = \Yii::$app->request;
        $user = $request->headers['X-UserName'];
        $password = $request->headers['X-Password'];

        if (!array_key_exists($user, $this->users)) {
            return false;
        }

        return password_verify($password, $this->users[$user]);
    }
}