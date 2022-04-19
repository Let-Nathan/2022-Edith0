<?php

namespace App\Controller;

use App\Model\CommentsManager;
use App\Model\DocumentsManager;
use App\Model\LikePostManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {        return $this->twig->render('Home/index.html.twig', [
            'data' => 'HomeController->index()'
            ]);
    }
}
