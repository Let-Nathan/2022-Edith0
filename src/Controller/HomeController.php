<?php

namespace App\Controller;

use App\Model\CommentsManager;
use App\Model\DocumentsManager;
use App\Model\LikesPostsManager;
use App\Model\PostManager;
use App\Model\UsersManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $postManager = new PostManager();
        $userManager = new UsersManager();
        $commentsManager = new CommentsManager();
        $likesPostManager = new LikesPostsManager();
        $documentsManager = new DocumentsManager();

        $posts = $postManager->selectAll('last_update_datetime', 'DESC');

        foreach ($posts as $i => $post) {
            $posts[$i]['user'] = $userManager->selectOneById($post['users_id']);
            $posts[$i]['comments'] = $commentsManager->selectByPostId($post['id']);
            $posts[$i]['nLikes'] = $likesPostManager->countPostLikes($post['id']);
            $posts[$i]['documents'] = $documentsManager->getByPostId($post['id']);
        }

        return $this->twig->render('Home/index.html.twig', [
            'posts' => $posts,
            ]);
    }
}
