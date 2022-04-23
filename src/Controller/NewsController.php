<?php

namespace App\Controller;

use App\Model\LikesNewsManager;
use App\Model\NewsManager;
use App\Model\UsersManager;

class NewsController extends AbstractController
{
    /**
     * Display news
     */

    public function showNews(): string
    {

        $newsManager = new NewsManager();
        $userManager = new UsersManager();
        $likesNewsManager = new LikesNewsManager();

        $news = $newsManager->selectAll();

        foreach ($news as $i => $new) {
            $news[$i]['user'] = $userManager->selectOneById($new['user_id']);
            $news[$i]['nLikes'] = $likesNewsManager->countNewsLikes($new['id']);
        }
        return $this->twig->render('News/show.html.twig', ['news' => $news]);
    }
}
