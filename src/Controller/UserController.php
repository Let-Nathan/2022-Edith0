<?php

namespace App\Controller;

class UserController extends AbstractManager
{
    public function login()
    {

    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }
}
