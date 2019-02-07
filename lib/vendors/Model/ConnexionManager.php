<?php
namespace Model;
use \OCFram\Manager;
use \Entity\Connexion;

abstract class ConnexionManager extends Manager
{
  abstract protected function connect(Connexion $log);
}
