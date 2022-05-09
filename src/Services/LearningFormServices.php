<?php

namespace App\Services;

use App\Model\Learning\ContentsManager;
use App\Model\Learning\PageManager;

class LearningFormServices
{
    public function errorsCheck($id, $title, $header, $titleBody, $body): ?array
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
        if (empty($id)) {
            $errors['category'] = 'You must choose a category before send .';
        }
        if (strlen($header) <= 5) {
            $errors['header'] = 'Description must have at least 5 characters.';
        }
        if (strlen($titleBody) <= 5) {
            $errors['titleBody'] = 'Title must have at least 5 characters';
        }
        if (strlen($body) <= 30) {
            $errors['body'] = 'Your eLearning must have some contents';
        }
            return $errors;
    }

    public function insert(array $content, array $learning): void
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
