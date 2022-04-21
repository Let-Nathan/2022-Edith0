<?php

namespace App\Model;

class LikesNewsManager extends AbstractManager
{
    public const TABLE = 'users_news_likes';

    public function countNewsLikes(int $newsId): int
    {
        $query = "SELECT COUNT(*) FROM " . self::TABLE . " WHERE news_id= " . $newsId;

        return $this->pdo->query($query)->fetchColumn();
    }
}
