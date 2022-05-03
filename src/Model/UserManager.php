<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'users';

    public function getOneByEmail($email): ?array
    {
        $query = 'SELECT * FROM users WHERE email=:email';

        $sth = $this->pdo->prepare($query);
        $sth->execute(['email' => $email]);

        return $sth->fetch();
    }

    public function userLikesPost($userId, $postId): bool
    {
        $query = "SELECT COUNT(*) FROM users_posts_likes WHERE user_id = :user_id AND post_id = :post_id";

        $sth = $this->pdo->prepare($query);
        $sth->execute([
            'user_id' => $userId,
            'post_id' => $postId,
        ]);

        return $sth->fetchColumn();
    }

    public function insertLikePost($userId, $postId): void
    {
        $query = "INSERT INTO users_posts_likes (user_id, post_id) VALUES (:user_id, :post_id)";

        $sth = $this->pdo->prepare($query);
        $sth->execute([
            'user_id' => $userId,
            'post_id' => $postId,
        ]);
    }

    public function deleteLikePost($userId, $postId)
    {
        $query = "DELETE FROM users_posts_likes WHERE user_id = :user_id AND post_id = :post_id";

        $sth = $this->pdo->prepare($query);
        $sth->execute([
            'user_id' => $userId,
            'post_id' => $postId,
        ]);
    }

    public function userLikesComment($userId, $commentId): bool
    {
        $query = "SELECT COUNT(*) FROM users_comments_likes WHERE user_id = :user_id AND comment_id = :comment_id";

        $sth = $this->pdo->prepare($query);
        $sth->execute([
            'user_id' => $userId,
            'comment_id' => $commentId,
        ]);

        return $sth->fetchColumn();
    }

    public function insertLikeComment($userId, $commentId): void
    {
        $query = "INSERT INTO users_comments_likes (user_id, comment_id) VALUES (:user_id, :comment_id)";

        $sth = $this->pdo->prepare($query);
        $sth->execute([
            'user_id' => $userId,
            'comment_id' => $commentId,
        ]);
    }

    public function deleteLikeComment($userId, $commentId)
    {
        $query = "DELETE FROM users_comments_likes WHERE user_id = :user_id AND comment_id = :comment_id";

        $sth = $this->pdo->prepare($query);
        $sth->execute([
            'user_id' => $userId,
            'comment_id' => $commentId,
        ]);
    }
}
