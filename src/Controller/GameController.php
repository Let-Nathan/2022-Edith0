<?php

namespace App\Controller;

class GameController extends AbstractController {

    public function init()
    {
        return $this->twig->render('game404.html.twig');
    }
}
