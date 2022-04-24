<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Services\FileExeption;
use App\Services\FileService;

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

            // check media
            if (file_exists($_FILES['media']['tmp_name'])) {
                $authorizedExtensions = ['jpg','png', 'gif', 'webp', 'mp4'];
                $maxFileSize = 60000000;

                if (filesize($_FILES['media']['tmp_name']) > $maxFileSize) {
                    $errors[] = 'The max upload size for a media content is 60MB';
                }

                if (!in_array(pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION), $authorizedExtensions)) {
                    $errors[] = "Media content must be of type 'jpg', 'png', mp4";
                }

                $mediaDir = 'uploads/uid-' . $_SESSION['user_id'] . '/';
                $mediaName = uniqid('', true) . '.' . pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
                $mediaUrl = FileService::saveUploadedFile($_FILES['media']['tmp_name'], $mediaDir, $mediaName);
                $mediaType = $_FILES['media']['type'];
            }

            if (!$errors) {
                unset($_SESSION['errors']);
                unset($_SESSION['postBody']);

                $postManager = new PostManager();

                $postId = $postManager->insertPost(
                    $_POST['body'],
                    $mediaUrl ?? null,
                    $mediaType ?? null,
                    $_SESSION['user_id'],
                    null
                );

                try {
                    $documentController = new DocumentController();
                    $documentController->addDocuments($_FILES['files'], intval($postId));
                } catch (FileExeption $e) {
                    $_SESSION['errors'][] = $e->getMessage();
                    $postManager->delete(intval($postId));
                }

                header('Location: /feed');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: /feed');
            }
        }
    }
}
