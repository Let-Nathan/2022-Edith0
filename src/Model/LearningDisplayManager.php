<?php

namespace App\Model;

class LearningDisplayManager extends AbstractManager
{
    public const TABLE = 'elearning_display';
    public function selectById($id): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE content_id=:id");
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch();
    }
}
