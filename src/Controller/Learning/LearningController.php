<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\PageManager;

class LearningController extends AbstractController
{
    public function show(int $id): ?string
    {
        $pageManager = new PageManager();
        $eLearning = $pageManager->selectById($id);
        if (!$eLearning) {
            header('Location: /learning');
            return null;
        }

        return $this->twig->render('Learning/pages.html.twig', ['eLearning' => $eLearning]);
    }
}
