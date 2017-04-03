<?php

namespace App\Database;

use PDO;
use PDOException;

class DB
{
  /**
  * The PDO instance.
  *
  * @var PDO
  */
  public $pdo;
  /**
  * Create a new PDO connection.
  *
  * @param array $config
  */
  public function __construct($config)
  {
    try {
      $this->pdo = new PDO(
        $config['connection'].';dbname='.$config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
