<?php

namespace App\Controller;

use App\Model\CommentsManager;
use App\Model\DocumentsManager;
use App\Model\LikeCommentsManager;
use App\Model\LikesPostsManager;
use App\Model\PostManager;
use App\Model\UsersManager;
use App\Services\TimeAgoModel;

class FeedController extends AbstractController
{
    /**
     * Display feed
     */
    public function showFeed(): string
    {
        $postManager = new PostManager();
        $userManager = new UsersManager();
        $commentsManager = new CommentsManager();
        $likesPostManager = new LikesPostsManager();
        $likesCommentsManager = new LikeCommentsManager();
        $documentsManager = new DocumentsManager();

        // select all posts
        $posts = $postManager->selectAll('last_update_datetime', 'DESC');

        // for each post get from the db:
        //      user, number of likes, all documents attached to it,
        //      calculate time passed from las update, all comments related to it.
        foreach ($posts as $i => $post) {
            $posts[$i]['user'] = $userManager->selectOneById($post['users_id']);
            $posts[$i]['nLikes'] = $likesPostManager->countPostLikes($post['id']);
            $posts[$i]['documents'] = $documentsManager->getByPostId($post['id']);
            $posts[$i]['timeAgo'] = TimeAgoModel::getTimeAgo($post['last_update_datetime']);

            $posts[$i]['comments'] = $commentsManager->selectByPostId($post['id']);

            // for each comment get from db:
            //      the user, number of likes and calculate time passed from creation
            foreach ($posts[$i]['comments'] as $j => $comment) {
                $posts[$i]['comments'][$j]['user'] = $userManager->selectOneById($comment['users_id']);
                $posts[$i]['comments'][$j]['nLikes'] = $likesCommentsManager->countCommentLikes($comment['id']);
                $posts[$i]['comments'][$j]['timeAgo'] = TimeAgoModel::getTimeAgo($comment['created_at']);
            }
        }

        return $this->twig->render('Home/index.html.twig', [
            'posts' => $posts,
            ]);
    }
}
