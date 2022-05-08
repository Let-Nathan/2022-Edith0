<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\ContentsManager;

class RemoveController extends AbstractController
{
    public function deleteLearning(): string
    {
        $contentId = intval($_GET['id']);
        $contentManager = new ContentsManager();
        $contentManager->delete($contentId);
        header('Location: /learning');

        return $this->twig->render('Learning/pages.html.twig');
    }
}
