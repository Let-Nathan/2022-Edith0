<?php

namespace App\Model;

class DocumentManager extends AbstractManager
{
    public const TABLE = 'documents';

    public function selectByPostId($documentsId): array
    {
        $query = 'SELECT * FROM' . self::TABLE . 'WHERE post_id = ' . $documentsId;
        return $this->pdo->query($query)->fetchAll();
    }
}
