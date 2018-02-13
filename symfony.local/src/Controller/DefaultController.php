<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    protected $users = [
        'admin' => '$2y$10$WI5Kx1dJWYCkv7owgeWY5eMy4H1T7R4kDRsPA/VBE1J0JulQhsq/2'
    ];

    /**
     * @return Response
     */
    public function index(Request $request)
    {
        if (!$this->authenticateUser($request)) {
            return new Response('', 401);
        }

//        return new Response();
        return $this->render('base.html.twig', [
            'user_name' =>  $request->headers->get('X-UserName')
        ]);
    }

    /**
     * @return bool
     */
    protected function authenticateUser($request)
    {
        $user = $request->headers->get('X-UserName');
        $password = $request->headers->get('X-Password');

        if (!array_key_exists($user, $this->users)) {
            return false;
        }

        return password_verify($password, $this->users[$user]);
    }
}