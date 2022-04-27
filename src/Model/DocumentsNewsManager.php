<?php

namespace App\Model;

class DocumentsNewsManager extends AbstractManager
{
    public const TABLE = 'news_documents';

    public function getByNewsId($newsId): array
    {
        $query = 'SELECT * FROM ' . self::TABLE . ' WHERE news_id = ' . $newsId;

        return $this->pdo->query($query)->fetchAll();
    }
}
