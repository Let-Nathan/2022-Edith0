<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\ContentsManager;
use App\Model\Learning\LearningManager;
use App\Model\Learning\PageManager;

class CreationController extends AbstractController
{
    public function addLearning(): string
    {
        $learningManager = new LearningManager();
        $learnings = $learningManager->selectAll('id', 'ASC');

        /**
         * @TODO Verification
         */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pageManager = new PageManager();
            $contentsManager = new ContentsManager();

        /**
         * @POST For the pages content
         */

                //$_POST for learning pages contents & catégories
                $learningId = intval($_POST['contentId']);
                $title = $_POST['title'];
                $titleBody = $_POST['title-body'];
                $body = $_POST['body'];
                $imgHeader = '';
                $header = '';
                $imgBody = '';
                $imgContainer = '';
                $description = substr($body, 0, 50);
            //Set default parent img for learning container ('WIP')
            foreach ($learnings as $values) {
                if ($values['id'] === $learningId) {
                    $imgContainer = $values['img_url'];
                }
            }
                //Get the return of last insert id in Table, and insert into Content
               $lastInsertId = $contentsManager->addContents(
                   $title,
                   $imgContainer,
                   $description,
                   $learningId
               );
                //Insert the pages content into pages bdd
                $pageManager->addLearning(
                    $lastInsertId,
                    $title,
                    $titleBody,
                    $body,
                    $imgHeader,
                    $header,
                    $imgBody
                );

                header('Location: /learning');
        }
        return $this->twig->render('Learning/add.html.twig', ['learning' => $learnings]);
    }
}
