<?php
namespace Entity;

use \OCFram\Entity;

class Connexion extends Entity
{
  protected $login,
            $password;

  const LOGIN_INVALIDE = 1;
  const PASSWORD_INVALIDE = 2;

  public function isValid()
  {
    return !(empty($this->login) || empty($this->password));
  }


  // SETTERS //

  public function setLogin($login)
  {
    if (!is_string($login) || empty($login))
    {
      $this->erreurs[] = self::LOGIN_INVALIDE;
    }

    $this->login = $login;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  // GETTERS //

  public function login()
  {
    return $this->login;
  }

  public function password()
  {
    return $this->password;
  }

}
