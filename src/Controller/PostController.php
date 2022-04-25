<?php

namespace App\Controller;

use App\Model\DocumentManager;
use App\Model\PostManager;
use App\Services\FileExeption;
use App\Upload\FileModel;
use App\Upload\FileUploader;

class PostController extends AbstractController
{
    public function addPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];

            // check body
            if (!isset($_POST['body']) || strlen($_POST['body']) < 10) {
                $_SESSION['postBody'] = $_POST['body'];
                $errors[] = 'Your post must be of at least 10 characters';
            }

            $fileUploader = new FileUploader();

            // upload media
                $fileModel = new FileModel($_FILES['media']);
                $mediaUrl = null;
            try {
                $mediaUrl = $fileUploader->uploadMedia($fileModel, $_SESSION['user_id']);
            } catch (FileExeption $e) {
                $errors[] = $e->getMessage();
            }

            if (!$errors) {
                unset($_SESSION['errors']);
                unset($_SESSION['postBody']);

                $postManager = new PostManager();
                $postId = $postManager->insertPost(
                    $_POST['body'],
                    $mediaUrl,
                    $fileModel->getType(),
                    $_SESSION['user_id'],
                    null
                );

                $documentManager = new DocumentManager();
                foreach ($_FILES['files']['tmp_name'] as $i => $tmpName) {
                    try {
                        $fileModel = new FileModel($_FILES['files'], $i);
                        if (file_exists($tmpName)) {
                            $documentUrl = $fileUploader->uploadDocument($fileModel, $_SESSION['user_id']);
                            $documentManager->insertDocument($documentUrl, intval($postId));
                        }
                    } catch (FileExeption $e) {
                        $_SESSION['errors'][] = $e->getMessage();
                        $postManager->delete(intval($postId));
                    }
                }

                header('Location: /feed');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: /feed');
            }
        }
    }
}
