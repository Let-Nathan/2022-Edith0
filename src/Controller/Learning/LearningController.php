<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\LEarning\PageManager;

class LearningController extends AbstractController
{
    public function show(): string
    {
        if (isset($_GET['id'])) {
            $pageManager = new PageManager();
            $id = intval($_GET['id']);
            $eLearning = $pageManager->selectById($id);

            if (empty($eLearning)) {
                header('Location: /learning');
            }
        }
        return $this->twig->render('Learning/contents.html.twig', ['manager' => $eLearning]);
    }
}
