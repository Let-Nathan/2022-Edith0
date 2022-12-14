<?php

namespace App\Controller;

use App\Model\CommentManager;
use App\Model\DocumentManager;
use App\Model\PostManager;
use App\Model\UserManager;

class RssController extends AbstractController
{
    public function feed(): string
    {
        $postManager = new PostManager();

        $userManager = new UserManager();
        $commentsManager = new CommentManager();
        $documentManager = new DocumentManager();

        // select all posts
        $posts = $postManager->selectAllFeedPost('last_update_datetime', 'DESC');

        // for each post get from the db:
        //      user, number of likes, all documents attached to it,
        //      calculate time passed from las update, all comments related to it.
        foreach ($posts as $i => $post) {
            $posts[$i]['user'] = $userManager->selectOneById($post['user_id']);
            $posts[$i]['usersIdLiked'] = $postManager->selectUsersIdLikedPost($post['id']);
            $posts[$i]['nLikes'] = count($posts[$i]['usersIdLiked']);
            $posts[$i]['documents'] = $documentManager->getByPostId($post['id']);

            $posts[$i]['comments'] = $commentsManager->selectByPostId($post['id']);

            //$post[$i]['link'] = $post['link'];

            // for each comment get from db:
            //      the user, number of likes and calculate time passed from creation
            foreach ($posts[$i]['comments'] as $j => $comment) {
                $posts[$i]['comments'][$j]['user'] = $userManager->selectOneById($comment['user_id']);
                $posts[$i]['comments'][$j]['usersIdLiked'] = $postManager->selectUsersIdLikedComment($comment['id']);
                $posts[$i]['comments'][$j]['nLikes'] = count($posts[$i]['comments'][$j]['usersIdLiked']);
            }
        }
        header('Content-Type: application/xml; charset=utf-8');
        return $this->twig->render('Rss/feed.xml.twig', ['posts' => $posts]);
    }
}
