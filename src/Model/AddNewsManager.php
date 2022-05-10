<?php

namespace App\Model;

class AddNewsManager extends AbstractManager
{
    public const TABLE = 'news';

    public function insertNews(
        string $title,
        ?string $mediaUrl,
        ?string $body,
    ): ?string {

        $query = "INSERT INTO " . self::TABLE . " (title, media_url, body,)
            VALUES (:title, :media_url, :body)";

        $sth = $this->pdo->prepare($query);

        $sth->execute([
            'title' => $title,
            'media_url' => $mediaUrl,
            'body' => $body,
        ]);

        return $this->pdo->lastInsertId();
    }
}
