<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;
use PDOStatement;

class UserRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findAll(): PDOStatement
    {
        return $this->pdo->query("SELECT * FROM `user`");
    }

}
