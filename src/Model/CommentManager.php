<?php

namespace App\Model;

class CommentManager extends AbstractManager
{
    public const TABLE = 'comments';

    public function countPostLikes(int $id): int
    {
        $query = "SELECT COUNT(*) FROM" . self::TABLE . " WHERE id_post = $id";
        return $this->pdo->query($query)->fetchAll();
    }

}
