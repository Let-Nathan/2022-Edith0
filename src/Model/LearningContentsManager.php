<?php

namespace App\Model;

class LearningContentsManager extends AbstractManager
{
    public const TABLE = 'elearning_content';

    public function selectContentId($learningId)
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE elearning_id = " . $learningId;
        return $this->pdo->query($query)->fetchAll();
    }
}
