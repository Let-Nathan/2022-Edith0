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
}
