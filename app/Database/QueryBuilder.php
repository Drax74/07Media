<?php

namespace App\Database;

class QueryBuilder
{
  /**
  * The PDO instance.
  *
  * @var PDO
  */
  protected $pdo;

  /**
  * Set the pdo
  */
  public function __construct()
  {
    global $db;
    $this->pdo = $db->pdo;
  }

  /**
  * Find a record in a table.
  *
  * @param  string $table
  * @param  string  $field
  * @param  string  $value
  * @return boolean
  */
  public function findUser($table, $email)
  {
    $existingUser = [];

    try {
      $statement = $this->pdo->prepare("SELECT email FROM $table WHERE email=?");
      $statement->execute([$email]);
      $existingUser = $statement->fetch($this->pdo::FETCH_ASSOC);
    } catch (\Exception $e) {
      die($e->getMessage());
    }

    if ($existingUser) {
      return true;
    }

    return false;
  }

  /**
  * Insert a record into a table.
  *
  * @param  string $table
  * @param  array  $parameters
  * @return void
  */
  public function insertUser($table, $parameters)
  {
    $parameters = array_merge($parameters, ['password' => password_hash($parameters['password'], PASSWORD_BCRYPT)]);

    $sql = sprintf(
      'insert into %s (%s) values (%s)',
      $table,
      implode(', ', array_keys($parameters)),
      ':' . implode(', :', array_keys($parameters))
    );
    try {
      $statement = $this->pdo->prepare($sql);
      $statement->execute($parameters);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }
}
