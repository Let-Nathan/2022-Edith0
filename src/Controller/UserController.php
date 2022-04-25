<?php

namespace App\Controller;

use App\Model\UsersManager;

class UserController extends AbstractController
{
    public function logout()
    {
        session_destroy();

        header('Location: /');
    }
}
