<?php

namespace App\Model;

class LikePostManager extends AbstractManager
{
    public const TABLE = 'users_posts_likes';

    public function countPostsLikes(): int
    {
        $query = 'SELECT COUNT(*) FROM' . self::TABLE;
        return $this->countPostsLikes();
    }
}
