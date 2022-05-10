<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\LearningManager;
use App\Services\LearningFormServices;

class CreationController extends AbstractController
{
    public function addLearning(): string
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
        }
        $learningManager = new LearningManager();
        $learnings = $learningManager->selectAll('id', 'ASC');
        $errors = [];

        /**
         * @TODO Verification
         */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $learningId = intval($_POST['contentId']);
            $title = trim($_POST['title']);
            $titleBody = trim($_POST['title-body']);
            $body = trim($_POST['body']);
            $header = trim($_POST['header']);
            $description = substr($body, 0, 50);
            $imgBody = trim($_POST['imgBody']);
            $imgHeader = trim($_POST['imgHeader']);
            $imgContainer = '';

            /**
             * @TODO Bdd relational to stock images
             */
            foreach ($learnings as $value) {
                if ($learningId === $value['id']) {
                    $imgContainer = $value['img_url'];
                }
            }
            $content = [$title, $imgContainer, $description, $learningId];
            $learning = [$title, $titleBody, $body, $imgHeader, $header, $imgBody];

            /**
             * @TODO insert link to add images & $_POST
             */
            /**
             * @CHEKING POST VALUES
             */
            $insertService = new LearningFormServices();
            $errors = $insertService->errorsCheck(
                $learningId,
                $title,
                $header,
                $titleBody,
                $body,
                $imgHeader,
                $imgBody
            );

            /**
             * @EMPTY-ERRORS => insert
             */
            if (!$errors) {
                $insertService->insert($content, $learning);
                header('Location: /learning');
            }
        }
        return $this->twig->render('Learning/add.html.twig', [
            'learning' => $learnings,
            'errors' => $errors
        ]);
    }
}
