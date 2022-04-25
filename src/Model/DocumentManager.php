<?php

namespace App\Model;

class DocumentManager extends AbstractManager
{
    public const TABLE = 'documents';

    public function insertDocument(string $url, int $postId)
    {
        $query = "INSERT INTO " . self::TABLE . " (url, post_id) VALUES (:url, :post_id)";

        $sth = $this->pdo->prepare($query);

        $sth->execute([
            'url' => $url,
            'post_id' => $postId,
        ]);
    }

    public function getByPostId($postId): array
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE post_id = " . $postId;

        return $this->pdo->query($query)->fetchAll();
    }
}
