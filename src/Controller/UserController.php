<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = trim($_POST['email']);
                $userManager = new UserManager();

                $user = $userManager->getOneByEmail($email);

                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];

                    header('Location: /feed');
                }
            }
        }
            return $this->twig->render('User/login.html.twig');
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }
}
