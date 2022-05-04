<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\ContentsManager;
use App\Model\Learning\LearningManager;

class ContentController extends AbstractController
{
    public function list(): string
    {
        $learningManager = new LearningManager();
        $contentsManager = new ContentsManager();
        // Display Learning
        $learning = $learningManager->selectAll('id', 'ASC');
        // Show content of each Learning catégories
        foreach ($learning as $index => $value) {
            $learning[$index]['content'] = $contentsManager->selectContentId($value['id']);
        }
        return $this->twig->render('Learning/categories.html.twig', ['learning' => $learning]);
    }
}
