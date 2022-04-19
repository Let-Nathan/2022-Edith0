<?php

namespace App\Model;

class LikePostsManager extends AbstractManager
{
    public const TABLE = 'users_posts_likes';

    public function countPostLikes(int $postId): int
    {
        $query = "SELECT COUNT(*) FROM " . self::TABLE . " WHERE post_id= " . $postId;

        return $this->pdo->query($query)->fetchColumn();
    }
}
