<?php

namespace App\Controller;

use App\Model\CommentManager;
use App\Model\DocumentManager;
use App\Model\LikeCommentsManager;
use App\Model\LikesPostsManager;
use App\Model\PostManager;
use App\Model\UsersManager;
use App\Model\TricksManager;

class FeedController extends AbstractController
{
    /**
     * Display feed
     */
    public function showFeed(): string
    {
        $postManager = new PostManager();
        $userManager = new UsersManager();
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

        // Sidebar - Tricks
        $tricksManager = new TricksManager();

        //Select all tricks
        $tricks = $tricksManager->selectAll();

        //Posts
        $twigParams = ['posts' => $posts, 'tricks' => $tricks];

        if (isset($_SESSION['errors'])) {
            $twigParams['errors'] = $_SESSION['errors'];
        }

        if (isset($_SESSION['postBody'])) {
            $twigParams['postBody'] = $_SESSION['postBody'];
        }

        return $this->twig->render('Home/index.html.twig', $twigParams);
    }
}
