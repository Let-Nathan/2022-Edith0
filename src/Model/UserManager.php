<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'users';

    public function getOneByEmail($email): ?array
    {
        $query = 'SELECT * FROM users WHERE email=:email';

        $sth = $this->pdo->prepare($query);
        $sth->execute(['email'=> $email]);

        return $sth->fetch();

    }
}
