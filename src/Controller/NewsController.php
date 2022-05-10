<?php

namespace App\Controller;

use App\Model\NewsManager;
use App\Model\LikesNewsManager;
use App\Model\UserManager;
use App\Services\FileExeption;
use App\Upload\FileModel;
use App\Upload\FileUploader;

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

            // verification body
            if (!isset($_POST['body']) || strlen($_POST['body']) < 10) {
                $_SESSION['postBody'] = $_POST['body'];
                $errors[] = 'Your post must be of at least 10 characters';
            }

            $addNews = array_map('trim', $_POST);

            // verification champs news
            if (empty($addNews['title'])) {
                $errors[] = 'The title is required';
            }
            if (empty($addNews['body'])) {
                $errors[] = 'The body is required';
            }
            if (!empty($addNews['title']) && strlen($addNews['title']) > 255) {
                $errors[] = 'Too many characters in the title';
            }
            if (!empty($addNews['body']) && strlen($addNews['body']) > 5000) {
                $errors[] = 'Too many characters in the body';
            }

            // upload media

            $fileUploader = new FileUploader();

            $fileModel = new FileModel($_FILES['media']);
            $mediaUrl = null;
            if (file_exists($fileModel->getTmpName())) {
                try {
                    $mediaUrl = $fileUploader->uploadMedia($fileModel);
                } catch (FileExeption $e) {
                    $errors[] = $e->getMessage();
                }
            }

            if (empty($errors)) {
                $addNewsManager = new NewsManager();
                $addNewsManager->InsertNews($addNews['title'], $addNews['media_url'], $addNews['body']);

                header('Location:/news');
            }
        }
        return $this->twig->render('/news/add.html.twig');
    }

    public function deleteNews(int $id)
    {
        // TODO: delete all related documents and image from filesystem
        $newsManager = new NewsManager();
        $news = $newsManager->selectOneById($id);

        if ($news['user_id'] === $_SESSION['user_id']) {
            $newsManager->delete($id);
        }

        header('Location: /feed');
    }
}
