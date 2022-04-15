<?php

namespace App\Model;

class DocumentManager extends AbstractManager
{
    public const TABLE = 'documents';

    public function selectByPostId($id): array
    {
        $query = 'SELECT * FROM' . self::TABLE . 'WHERE post_id = ' . $id;
        return $this->pdo->query($query)->fetchAll();
    }
}
