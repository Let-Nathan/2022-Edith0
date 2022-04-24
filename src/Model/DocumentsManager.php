<?php

namespace App\Model;

class DocumentsManager extends AbstractManager
{
    public const TABLE = 'documents';

    public function getByPostId($postId): array
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE post_id = " . $postId;

        return $this->pdo->query($query)->fetchAll();
    }

    public function insertDocuments(array $documentsUrl, int $postId): void
    {
        $query = "INSERT INTO " . self::TABLE . " (url, post_id) VALUES (:url, :post_id)";

        $sth = $this->pdo->prepare($query);

        foreach ($documentsUrl as $doc) {
            $sth->execute([
                'url' => $doc,
                'post_id' => $postId,
            ]);
        }
    }
}
