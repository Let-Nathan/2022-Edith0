<?php

namespace App\Model;

class LikeCommentsManager extends AbstractManager
{
    public const TABLE = 'users_comments_likes';

    public function countPostLikes(int $id): int
    {
        $query = "SELECT COUNT(*) FROM" . self::TABLE . " WHERE comments_id = $id";
        return $this->pdo->query($query)->fetchAll();
    }
}
