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

    public function toggleLikePost($postId): void
    {
        $userManager = new UsersManager();

        if ($userManager->userLikesPost($_SESSION['user_id'], $postId)) {
            $userManager->deleteLikePost($_SESSION['user_id'], $postId);
        } else {
            $userManager->insertLikePost($_SESSION['user_id'], $postId);
        }

        header('Location: /feed#' . $postId);
    }

    public function toggleLikeComment($commentId): void
    {
        $userManager = new UsersManager();

        if ($userManager->userLikesComment($_SESSION['user_id'], $commentId)) {
            $userManager->deleteLikeComment($_SESSION['user_id'], $commentId);
        } else {
            $userManager->insertLikeComment($_SESSION['user_id'], $commentId);
        }

        header('Location: /feed#' . $commentId);
    }
}
