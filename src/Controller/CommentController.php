<?php

namespace App\Controller;

use App\Model\CommentManager;

class CommentController extends AbstractController
{
    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentManager = new CommentManager();

            if (!empty($_POST['body'])) {
                $commentManager->insertComment($_POST['body'], intval($_POST['postId']), intval($_SESSION['user_id']));
            }
        }

        header('Location: /feed#' . $_POST['postId']);
    }

    public function deleteComment(int $id)
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->selectOneById($id);

        if ($comment['user_id'] === $_SESSION['user_id']) {
            $commentManager->delete($id);
        }


        header('Location: /feed');
    }
}
