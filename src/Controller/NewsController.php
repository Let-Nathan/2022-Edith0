<?php

namespace App\Controller;

use App\Model\ArticleContent\ArticleContentManager;
use App\Model\Learning\PageManager;
use App\Model\LikesNewsManager;
use App\Model\NewsManager;
use App\Model\UserManager;

class NewsController extends AbstractController
{
    /**
     * Display news
     */
    public function showNews(): string
    {
        $newsManager = new NewsManager();
        $userManager = new UserManager();
        $likesNewsManager = new LikesNewsManager();

        $news = $newsManager->selectAll();

        foreach ($news as $i => $new) {
            $news[$i]['user'] = $userManager->selectOneById($new['user_id']);
            $news[$i]['nLikes'] = $likesNewsManager->countNewsLikes($new['id']);
        }
        return $this->twig->render('News/show.html.twig', ['news' => $news]);
    }
}
