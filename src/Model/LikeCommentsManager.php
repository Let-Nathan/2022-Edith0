<?php

namespace App\Model;

class LikeCommentsManager extends AbstractManager
{
    public const TABLE = 'users_comments_likes';

    public function countPostLikes(int $commentsId): array
    {
        $query = "SELECT COUNT(*) FROM" . self::TABLE . " WHERE comments_id = $commentsId";
        return $this->pdo->query($query)->fetchAll();
    }
}
