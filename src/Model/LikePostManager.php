<?php

namespace App\Model;

class LikePostManager extends AbstractManager
{
    public const TABLE = 'users_posts_likes';

    public function countPostLikes(int $id): int
    {
        $query = "SELECT COUNT(*) FROM" . self::TABLE . " WHERE post_id = $id";
        return $this->pdo->query($query)->fetchAll();
    }
}
