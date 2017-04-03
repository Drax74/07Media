<?php

namespace App\Users;

class User
{
  /**
   * @var string
   */
  private $username;

  /**
   * @var string
   */
  private $email;

  public function __construct($username, $email)
  {
    $this->username = $username;
    $this->email = $email;
  }

  /**
   * Get User name
   * @return string
   */
  public function getName()
  {
    return $this->username;
  }

  /**
   * Get User email
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
}
