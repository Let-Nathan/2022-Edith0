<?php

namespace App\Model;

class CommentsManager extends AbstractManager
{
    public const TABLE = 'comments';

    public function countPostComments(int $postId): int
    {
        $query = 'SELECT COUNT(*) FROM ' . self::TABLE . ' WHERE post_id = ' . $postId;

        return $this->pdo->query($query)->fetchColumn();
    }

    public function selectByPostId(int $postId): array
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE post_id = " . $postId . " ORDER BY created_at";

        return $this->pdo->query($query)->fetchAll();
    }
}
