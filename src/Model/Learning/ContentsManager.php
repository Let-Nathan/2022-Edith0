<?php

namespace App\Model\Learning;

use App\Model\AbstractManager;

class ContentsManager extends AbstractManager
{
    public const TABLE = 'elearning_content';

    public function selectContentId($learningId): array
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE elearning_id = " . $learningId;
        return $this->pdo->query($query)->fetchAll();
    }
}
