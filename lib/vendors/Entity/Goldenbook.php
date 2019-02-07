<?php
namespace Entity;

use \OCFram\Entity;

class Goldenbook extends Entity
{
  protected $pseudo,
            $contenu,
            $date;

  const PSEUDO_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  public function isValid()
  {
    return !(empty($this->pseudo) || empty($this->contenu));
  }

  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->erreurs[] = self::PSEUDO_INVALIDE;
    }

    $this->pseudo = $pseudo;
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->contenu = $contenu;
  }

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function contenu()
  {
    return $this->contenu;
  }

  public function date()
  {
    return $this->date;
  }
}
