<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = trim($_POST['email']);
                $userManager = new UserManager();

                $user = $userManager->getOneByEmail($email);

                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];

                    header('Location: /feed');
                } else {
                    $error = 'The password is incorrect';
                }
            }
        }

        return $this->twig->render('User/login.html.twig', ['error' => $error]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }

    public function toggleLikePost($postId): void
    {
        $userManager = new UserManager();

        if ($userManager->userLikesPost($_SESSION['user_id'], $postId)) {
            $userManager->deleteLikePost($_SESSION['user_id'], $postId);
        } else {
            $userManager->insertLikePost($_SESSION['user_id'], $postId);
        }

        header('Location: /feed#' . $postId);
    }

    public function toggleLikeComment($commentId): void
    {
        $userManager = new UserManager();

        if ($userManager->userLikesComment($_SESSION['user_id'], $commentId)) {
            $userManager->deleteLikeComment($_SESSION['user_id'], $commentId);
        } else {
            $userManager->insertLikeComment($_SESSION['user_id'], $commentId);
        }

        header('Location: /feed#' . $commentId);
    }
}
