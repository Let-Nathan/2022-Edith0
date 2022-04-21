<?php

namespace App\Model;

class LikeCommentsNewsManager extends AbstractManager
{
    public const TABLE = 'users_comments_news_likes';

    public function countCommentNewsLikes(int $commentsNewsId): int
    {
        $query = "SELECT COUNT(*) FROM " . self::TABLE . " WHERE comment_news_id = " . $commentsNewsId;

        return $this->pdo->query($query)->fetchColumn();
    }
}
