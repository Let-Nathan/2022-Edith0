<?php

namespace App\Controller\Learning;

use App\Controller\AbstractController;
use App\Model\Learning\ContentsManager;
use App\Model\Learning\PageManager;

class InsertController extends AbstractController
{
    public function errorsCheck($title, $learningId, $header, $titleBody, $body): ?array
    {
        $errors = [];
        switch ($title) {
            case strlen($title) <= 5:
                $errors['title'] = 'Title must have at least 5 characters.';
                break;
            case strlen($title) >= 79:
                $errors['title'] = 'Title must not exceed 80 characters.';
                break;
        }
        if (empty($learningId)) {
            $errors['category'] = 'You must choose a category before send .';
        }
        if (strlen($header) <= 5) {
            $errors['header'] = 'Description must have at least 5 characters.';
        }
        if (strlen($titleBody) <= 5) {
            $errors['titleBody'] = 'Title must have at least 5 characters';
        }
        if (strlen($body) <= 5) {
            $errors['body'] = 'Your eLearning must have at least 5 characters';
        }
        return $errors;
    }
    public function insertCheck(array $content, array $learning): void
    {

        $pageManager = new PageManager();
        $contentsManager = new ContentsManager();

        //INSERT & RETURN LAST INSERT ID
        $lastInsertId = $contentsManager->addContents(
            $content[0],
            $content[1],
            $content[2],
            $content[3]
        );
        //LAST INSERT (E LEARNING PAGES)
        $pageManager->addLearning(
            $lastInsertId,
            $learning[0],
            $learning[1],
            $learning[2],
            $learning[3],
            $learning[4],
            $learning[5]
        );
    }
}
