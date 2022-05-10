<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\ContentsManager;
use App\Model\Learning\LearningManager;
use App\Model\Learning\PageManager;
use App\Services\LearningFormServices;

class UpdateController extends AbstractController
{
    public function updateLearning(int $id): string
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
        }
        $pageManager = new PageManager();
        $learningManager = new LearningManager();
        $learning = $learningManager->selectAll('id', 'DESC');
        $page = $pageManager->selectById($id);
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryId = intval($_POST['contentId']);
            $title = trim($_POST['title']);
            $titleBody = trim($_POST['title-body']);
            $body = trim($_POST['body']);
            $header = trim($_POST['header']);
            $description = substr($body, 0, 50);
            $imgHeader =  trim($_POST['imgHeader']);
            $imgBody = trim($_POST['imgBody']);
            $imgContainer = '';

            /**
             * @TODO Add bdd relational to stock container images
            */

            /**
             * @TODO POST images on add && update
             */
            /**
             * @TODO CHECK FOR IMAGES
             */
            $insertService = new LearningFormServices();
            $errors = $insertService->errorsCheck(
                $categoryId,
                $title,
                $header,
                $titleBody,
                $body,
                $imgHeader,
                $imgBody
            );


            foreach ($learning as $value) {
                if ($categoryId === $value['id']) {
                    $imgContainer = $value['img_url'];
                }
            }

            /**
             * @EMPTY-ERRORS => insert
             */
            if (!$errors) {
                $contentManager = new ContentsManager();
                $containerId = $contentManager->selectOneById($id);
                $contentManager->upDate(
                    $containerId['id'],
                    $title,
                    $imgContainer,
                    $description,
                    $categoryId
                );

                $pageManager->upDate(
                    $page['id'],
                    $containerId['id'],
                    $title,
                    $titleBody,
                    $body,
                    $imgHeader,
                    $header,
                    $imgBody
                );
                header('Location: /learning');
            }
        }
        return $this->twig->render("Learning/update.html.twig", [
            'content' => $page,
            'errors' => $errors,
            'learning' => $learning
        ]);
    }
}
