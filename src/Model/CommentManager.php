<?php

namespace App\Model;

class CommentManager extends AbstractManager
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

    public function insertComment(string $body, int $postId, int $userId): void
    {
        $query = "INSERT INTO " . self::TABLE . "(body, post_id, user_id) VALUES (:body, :post_id, :user_id)";

        $sth = $this->pdo->prepare($query);

        $sth->execute([
            'body' => $body,
            'post_id' => $postId,
            'user_id' => $userId,
        ]);
    }
}
