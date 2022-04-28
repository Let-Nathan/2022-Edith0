<?php

namespace App\Controller;

use App\Model\LearningManager;
use App\Model\LearningContentsManager;

class LearningController extends AbstractController
{
    public function list(): string
    {
        $learningManager = new LearningManager();
        $learningContentsManager = new LearningContentsManager();
        // Display Learning
        $learning = $learningManager->selectAll('id', 'ASC');
        // Show content of each Learning catégories
        foreach ($learning as $index => $value) {
            $learning[$index]['content'] = $learningContentsManager->selectContentId($value['id']);
        }
        return $this->twig->render('Learning/categories.html.twig', ['learning' => $learning]);
    }
}
