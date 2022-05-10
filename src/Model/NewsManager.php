<?php

namespace App\Model;

use App\Model\AbstractManager;

class NewsManager extends AbstractManager
{
    public const TABLE = 'news';

    public function addNews(
        int $id,
        string $title,
        string $media,
        string $body,
    ) {
        $query = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            "(id, title, media, body)" .
            " VALUES (:id, :title, :media, :body)");
        $query->execute([
            'contentId' => $id,
            'title' => $title,
            'media' => $media,
            'body' => $body,
        ]);
    }

    public function insertNews(
        string $title,
        ?string $mediaUrl,
        ?string $body,
    ) {

        $query = "INSERT INTO " . self::TABLE . " (title, media_url, body, user_id)
        VALUES (:title, :media_url, :body, :userId)";

        $sth = $this->pdo->prepare($query);

        $sth->execute([
            'userId' => $_SESSION['user_id'],
            'title' => $title,
            'media_url' => $mediaUrl,
            'body' => $body,
        ]);

        return $this->pdo->lastInsertId();
    }

    public function selectAllNews(string $orderBy = 'create_at', string $direction = 'DESC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
