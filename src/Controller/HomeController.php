<?php

namespace App\Controller;

use App\Model\LikePostManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $likePostManager = new LikePostManager();
        $n = $likePostManager->countPostLikes(1);
        return $this->twig->render('Home/index.html.twig', ['postLike' => $n]);
    }
}
