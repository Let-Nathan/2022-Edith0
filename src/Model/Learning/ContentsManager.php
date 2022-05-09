<?php

namespace App\Model\Learning;

use App\Model\AbstractManager;

class ContentsManager extends AbstractManager
{
    public const TABLE = 'elearning_content';

    public function selectContentId($learningId): array
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE elearning_id = " . $learningId;
        return $this->pdo->query($query)->fetchAll();
    }

    public function addContents(
        string $title,
        string $imgUrl,
        string $body,
        int $learningId,
    ): int {
        $query = $this->pdo->prepare("INSERT INTO  " . self::TABLE . "(title, img_url, body, elearning_id)" .
        " VALUES (:title, :imgUrl, :body, :learningId)");
        $query->execute([
            'title' => $title,
            'imgUrl' => $imgUrl,
            'body' => $body,
            'learningId' => $learningId,
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    public function upDate(
        int $id,
        string $title,
        string $imgUrl,
        string $body,
        int $learningId,

    ): int {
        $stmt = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET title= :title,
            img_url = :img_url,
            body = :body,
            elearning_id = :elearning_id " .
            " WHERE id =" . $id);
        $stmt->execute([
            'title' => $title,
            'img_url' => $imgUrl,
            'body' => $body,
            'elearning_id' => $learningId
        ]);
        return (int) $this->pdo->lastInsertId();
    }
}
