<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;
use PDOStatement;

class UserRepository
{
    public function findAll(): PDOStatement
    {
        $pdo = $this->connection();
        return $pdo->query("SELECT * FROM `user`");
    }

    /**
    * I am adding this connection here just to make this more explicity.
    *
    * You could move this for a file Connection.php and inject here.
    *
    * But try to use Doctrine or Eloquent to handle this for you, Probably you won't find projects
    * using PDO into the code base.
    * */
    private function connection(): PDO
    {
        $pdo = new PDO("mysql:host=db;dbname=easy-php-setup", 'root', '123456');
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

        return $pdo;
    }
}
