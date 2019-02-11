<?php
namespace Model;
use \OCFram\Manager;
use \Entity\Connexion;

class ConnexionManager extends Manager
{
    public function connect($log)
    {
      $requete = $this->dao->prepare('SELECT * FROM users WHERE login = :login');
      $requete->bindValue(':login', $log->login());

      $requete->execute();
      $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Connexion');

      $data = $requete->fetch();

      return $data;
    }
}
