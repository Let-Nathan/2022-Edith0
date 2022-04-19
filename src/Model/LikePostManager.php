<?php

namespace App\Model;

class LikePostManager extends AbstractManager
{
    public const TABLE = 'users_posts_likes';

    public function countPostLikes(int $postId): array
    {
        $query = "SELECT COUNT(*) FROM " . self::TABLE . " WHERE posts_id= $postId";
        return $this->pdo->query($query)->fetchAll();
    }
}
