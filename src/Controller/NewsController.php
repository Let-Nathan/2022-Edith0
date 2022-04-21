<?php

namespace App\Controller;

use App\Model\NewsManager;

class NewsController extends AbstractController{

    public function showNews(): string{

        $newsManager = new NewsManager();
        $news = $newsManager->selectAll();
        return $this->twig->render('News/show.html.twig', ['news' => $news]);
    }
}
