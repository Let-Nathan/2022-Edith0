<?php

namespace App\Model\Learning;

use App\Model\AbstractManager;

class PageManager extends AbstractManager
{
    public const TABLE = 'elearning_display';
    public function selectById($id): ?array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE content_id=:id");
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetchAll();
    }
}
