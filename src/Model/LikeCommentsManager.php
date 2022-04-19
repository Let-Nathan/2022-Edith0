<?php

namespace App\Model;

class LikeCommentsManager extends AbstractManager
{
    public const TABLE = 'users_comments_likes';

    public function countCommentLikes(int $commentsId): int
    {
        $query = "SELECT COUNT(*) as nLikes FROM " . self::TABLE . " WHERE comment_id = " . $commentsId;

        return $this->pdo->query($query)->fetch()['nLikes'];
    }
}
