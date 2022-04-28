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
            if (file_exists($fileModel->getTmpName())) {
                try {
                    $mediaUrl = $fileUploader->uploadMedia($fileModel);
                } catch (FileExeption $e) {
                    $errors[] = $e->getMessage();
                }
            }

            // check url
            $postLink = null;
            if (isset($_POST['url']) && !empty($_POST['url'])) {
                if (!filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
                    $errors[] = 'Invalid link url';
                }
                $postLink = trim($_POST['url']);
            }

            if (!$errors) {
                unset($_SESSION['errors']);
                unset($_SESSION['postBody']);

                $postManager = new PostManager();
                $postId = $postManager->insertPost(
                    $_POST['body'],
                    $mediaUrl,
                    $postLink,
                    $_SESSION['user_id']
                );

                if (!$this->addDocuments(intval($postId))) {
                    $postManager->delete(intval($postId));
                }

                header('Location: /feed');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: /feed');
            }
        }
    }

    private function addDocuments(int $postId): bool
    {
        $documentManager = new DocumentManager();
        $fileUploader = new FileUploader();

        foreach ($_FILES['files']['tmp_name'] as $i => $tmpName) {
            if (file_exists($tmpName)) {
                try {
                    $fileModel = new FileModel($_FILES['files'], $i);
                    $documentUrl = $fileUploader->uploadDocument($fileModel);
                    $documentManager->insertDocument($documentUrl, intval($postId));
                } catch (FileExeption $e) {
                    $_SESSION['errors'][] = $e->getMessage();
                    return false;
                }
            }
        }
        return true;
    }

    public function deletePost(int $id)
    {
        // TODO: delete all related documents and image from filesystem
        $postManager = new PostManager();
        $postManager->delete($id);

        header('Location: /feed');
    }
}
