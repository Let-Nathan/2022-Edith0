<?php

namespace App\Model;

class CommentsManager extends AbstractManager
{
    public const TABLE = 'comments';

    public function countPostComments(int $postId): int
    {
        $query = 'SELECT COUNT(*) as nComments FROM ' . self::TABLE . ' WHERE post_id = ' . $postId;

        return $this->pdo->query($query)->fetch()['nComments'];
    }
}
