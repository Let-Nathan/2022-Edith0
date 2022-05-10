<?php

namespace App\Model\Learning;

use App\Model\AbstractManager;

class PageManager extends AbstractManager
{
    public const TABLE = 'elearning_display';

    public function selectById(int $id): ?array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE content_id=:id");
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function addLearning(
        int $id,
        string $title,
        string $titleBody,
        string $body,
        string $imgHeader,
        string $header,
        string $imgBody,
    ) {
        $query = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            "(content_id, title, body, img_header, header, img_body, title_body)" .
            " VALUES (:contentId, :title, :body, :imgHeader, :header, :imgBody, :titleBody)");
        $query->execute([
            'contentId' => $id,
            'title' => $title,
            'body' => $body,
            'imgHeader' => $imgHeader,
            'header' => $header,
            'imgBody' => $imgBody,
            'titleBody' => $titleBody,
        ]);
    }

    public function upDate(
        int $id,
        int $contentId,
        string $title,
        string $titleBody,
        string $body,
        string $imgHeader,
        string $header,
        string $imgBody,
    ): ?int {
        $stmt = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET content_id = :content_id,
            title = :title,
            body = :body,
            img_header = :img_header,
            header = :header,
            img_body = :img_body,
            title_body = :title_body " .
            " WHERE id =" . $id);
        $stmt->execute([
            'title' => $title,
            'content_id' => $contentId,
            'body' => $body,
            'img_header' => $imgHeader,
            'header' => $header,
            'img_body' => $imgBody,
            'title_body' => $titleBody
        ]);
        return (int) $this->pdo->lastInsertId();
    }
}
