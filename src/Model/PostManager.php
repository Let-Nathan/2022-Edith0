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

    public function insertPost(
        string $body,
        ?string $mediaUrl,
        ?string $link,
        int $userId,
        ?int $groupId = null
    ): ?string {

        $query = "INSERT INTO " . self::TABLE . " (body, media_url, link, user_id, group_id)
            VALUES (:body, :media_url, :link, :user_id, :group_id)";

        $sth = $this->pdo->prepare($query);

        $sth->execute([
            'body' => $body,
            'media_url' => $mediaUrl,
            'link' => $link,
            'user_id' => $userId,
            'group_id' => $groupId,
        ]);

        return $this->pdo->lastInsertId();
    }

    public function selectUsersIdLikedPost(int $postId)
    {
        $query = "SELECT user_id FROM users_posts_likes WHERE post_id = " . $postId;

        return $this->pdo->query($query)->fetchAll();
    }

    public function selectUsersIdLikedComment(int $commentId)
    {
        $query = "SELECT user_id FROM users_comments_likes WHERE comment_id = " . $commentId;

        return $this->pdo->query($query)->fetchAll();
    }
}
