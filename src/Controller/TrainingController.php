<?php

namespace App\Controller;

use App\Model\LearningDisplayManager;

class TrainingController extends AbstractController
{
    public function show(): string
    {
        $manager = null;
        //WIP
        if ($_SERVER["REQUEST_METHOD"] === 'GET') {
            $id = $_GET['id'];
            $contentsManager = new LearningDisplayManager();
            $manager = $contentsManager->selectById($id);
        }
        return $this->twig->render('Learning/contents.html.twig', ['manager' => $manager]);
    }
}
