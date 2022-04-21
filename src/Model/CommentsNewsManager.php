<?php

namespace App\Model;

class CommentsNewsManager extends AbstractManager
{
    public const TABLE = 'news_comments';

    public function countNewsComments(int $newsId): int
    {
        $query = 'SELECT COUNT(*) FROM ' . self::TABLE . ' WHERE news_id = ' . $newsId;

        return $this->pdo->query($query)->fetchColumn();
    }
}
