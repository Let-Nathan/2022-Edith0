<?php

namespace App\Model;

class CommentManager extends AbstractManager
{
    public const TABLE = 'comments';

    public function countComments(): int
    {
        $query = 'SELECT COUNT(*) FROM' . self::TABLE ;
        return $this->countComments();
    }
}
