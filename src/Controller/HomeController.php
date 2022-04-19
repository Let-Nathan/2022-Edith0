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
        return $this->twig->render('Home/index.html.twig', ['data' => '']);
    }
}
