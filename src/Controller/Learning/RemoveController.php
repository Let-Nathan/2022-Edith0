<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\ContentsManager;

class RemoveController extends AbstractController
{
    public function deleteLearning(): void
    {
        $contentId = intval($_GET['id']);
        $contentManager = new ContentsManager();
        $contentManager->delete($contentId);
        header('Location: /learning');
    }
}
