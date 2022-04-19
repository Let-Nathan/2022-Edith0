<?php

namespace App\Model;

class CommentManager extends AbstractManager
{
    public const TABLE = 'comments';

    public function countPostComment(int $commentsId): array
    {
        $query = "SELECT COUNT(*) FROM" . self::TABLE . " WHERE id_post = $commentsId";
        return $this->pdo->query($query)->fetchAll();
    }
}
