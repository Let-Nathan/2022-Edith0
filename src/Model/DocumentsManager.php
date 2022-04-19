<?php

namespace App\Model;

class DocumentsManager extends AbstractManager
{
    public const TABLE = 'documents';

    public function getByPostId($postId): array
    {
        $query = 'SELECT * FROM ' . self::TABLE . ' WHERE post_id = ' . $postId;

        return $this->pdo->query($query)->fetchAll();
    }
}
