<?php

namespace App\Auth;

use App\Users\User;
use App\Database\QueryBuilder;

class Register
{
  /**
  * The QueryBuilder instance.
  *
  * @var QueryBuilder
  */
  private $queryBuilder;

  /**
  * Create a new QueryBuilder instance.
  *
  * @param $post array
  * if one of post elements empty
  * else proceed with registration process
  */
  public function __construct($post)
  {
    $this->queryBuilder = new QueryBuilder;

    if (empty($post['name']) || empty($post['email']) || empty($post['password'])) {
      return false;
    }

    $this->registerUser($post);
  }

  /**
  * Check if user exists, if not, insert into DB
  * @param $post array
  */
  private function registerUser($post)
  {
    $existingUser = $this->queryBuilder->findUser('users', $post['email']);

    if ($existingUser) {
      $_SESSION['existingEmail'] = $post['email'];
      header('Location: index.php');

      return false;
    }

    unset($_SESSION['existingEmail']);
    $user = new User($post['name'], $post['email']);
    $_SESSION['user'] = $user;
    $this->queryBuilder->insertUser('users', $post);

    header('Location: home.php');
  }
}
