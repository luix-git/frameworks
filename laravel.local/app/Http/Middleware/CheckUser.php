<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CheckUser
{
    protected $users = [
        'admin' => '$2y$10$WI5Kx1dJWYCkv7owgeWY5eMy4H1T7R4kDRsPA/VBE1J0JulQhsq/2'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userName = $request->header('X-UserName');
        $password = $request->header('X-Password');

        if (!$this->authenticateUser($userName, $password)) {
            return new Response('', 401);
        }
        return $next($request);
    }

    /**
     * @param $userName
     * @param $password
     * @return bool
     */
    protected function authenticateUser($userName, $password)
    {
        if (!array_key_exists($userName, $this->users)) {
            return false;
        }

        return password_verify($password, $this->users[$userName]);
    }
}
