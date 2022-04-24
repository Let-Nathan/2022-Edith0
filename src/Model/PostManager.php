<?php

namespace App\Model;

use App\Model\AbstractManager;

class PostManager extends AbstractManager
{
    public const TABLE = 'posts';

    public function selectAllFeedPost(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE group_id IS NULL';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function insertPost(string $body, ?string $mediaUrl, $mediaType, int $userId, ?int $groupId): ?string
    {
        $query = "INSERT INTO " . self::TABLE . " (body, media_url, media_type, user_id, group_id)
            VALUES (:body, :media_url, :media_type, :user_id, :group_id)";

        $sth = $this->pdo->prepare($query);

        $sth->execute([
            'body' => $body,
            'media_url' => $mediaUrl,
            'media_type' => $mediaType,
            'user_id' => $userId,
            'group_id' => $groupId,
        ]);

        return $this->pdo->lastInsertId();
    }
}
