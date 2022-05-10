<?php

namespace App\Controller;

use App\Model\NewsManager;
use App\Model\LikesNewsManager;
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

    public function addNews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];

             $addNews = array_map('trim', $_POST);

            if (empty($addNews['title'])) {
                $errors[] = 'The title is required';
            }
            if (empty($addNews['media_url'])) {
                $errors[] = 'The media is required';
            }
            if (empty($addNews['body'])) {
                $errors[] = 'The body is required';
            }
            if (!empty($addNews['title']) && strlen($addNews['title']) > 255) {
                $errors[] = 'Too many characters in the title';
            }
            if (!empty($addNews['media_url']) && strlen($addNews['media_url']) > 255) {
                $errors[] = 'Too many characters in the media Url';
            }
            if (!empty($addNews['body']) && strlen($addNews['body']) > 5000) {
                $errors[] = 'Too many characters in the body';
            }

            if (empty($errors)) {
                $addNewsManager = new NewsManager();
                $addNewsManager->InsertNews($addNews['title'], $addNews['media_url'], $addNews['body']);

                header('Location:/news');
            }
        }
        return $this->twig->render('/news/add.html.twig');
    }
}
