<?php

namespace App\Model;

class LikeCommentsManager extends AbstractManager
{
    public const TABLE = 'users_comments_likes';

    public function countCommentsLikes(): int
    {
        $query = 'SELECT COUNT(*) FROM' . self::TABLE ;
        return $this->countCommentsLikes();
    }
}
