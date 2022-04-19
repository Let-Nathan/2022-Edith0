<?php

namespace App\Controller;

use App\Model\PostManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $postManager = new PostManager();

        $posts = $postManager->selectAll('last_update_datetime', 'DESC');


        return $this->twig->render('Home/index.html.twig', ['data' => $posts]);
    }
}
