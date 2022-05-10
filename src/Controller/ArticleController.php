<?php

namespace App\Controller;

use App\Model\ArticleManager;

class ArticleController extends AbstractController
{
    /**
     * Get one row from database by ID.
     */
    public function showArticle($id): string
    {
        $articleManager = new ArticleManager();

        $news = $articleManager -> selectOneById($id);
        return $this->twig->render('News/article.html.twig', ['news' => $news]);
    }
}
