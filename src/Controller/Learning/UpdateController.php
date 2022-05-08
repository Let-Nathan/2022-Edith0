<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\ContentsManager;
use App\Model\Learning\PageManager;

class UpdateController extends AbstractController
{
    public function updateLearning(int $id): string
    {
        $pageManager = new PageManager();
        $content = $pageManager->selectById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pageManager = new PageManager();
            $contentsManager = new ContentsManager();

            $learningId = intval($_POST['contentId']);
            $title = trim($_POST['title'], '');
            $titleBody = trim($_POST['title-body'], '');
            $body = trim($_POST['body'], '');
            $header = trim($_POST['header'], '');
            $description = substr($body, 0, 50);
            $imgBody = '';
            $imgHeader = '';
            $imgContainer = '';

            $content = [$title, $imgContainer, $description, $learningId];
            $learning = [$title, $titleBody, $body, $imgHeader, $header, $imgBody];

            /**
             * @CHEKING POST VALUES
             */
            $insertController = new InsertController();
            $errors = $insertController->errorsCheck($title, $learningId, $header, $titleBody, $body);

            /**
             * @EMPTY-ERRORS => insert
             */
            if (!$errors) {
                $insertController->insertCheck($content, $learning);
                header('Location: /learning');
            }
        }
        return $this->twig->render("Learning/update.html.twig", ['content' => $content]);
    }
}
