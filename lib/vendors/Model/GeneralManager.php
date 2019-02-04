<?php
namespace Model;

use \OCFram\Manager;
use \Entity\General;
use \OCFram\ImageUpload;

abstract class GeneralManager extends Manager
{
  /**
   * Méthode permettant d'ajouter une general.
   * @param $general General La general à ajouter
   * @return void
   */
  abstract protected function add(General $general);

  /**
   * Méthode permettant d'enregistrer une general.
   * @param $general General la general à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(General $general)
  {
    if ($general->isValid())
    {
      $general->isNew() ? $this->add($general) : $this->modify($general);
    }
    else
    {
      throw new \RuntimeException('La general doit être validée pour être enregistrée');
    }
  }

  /**
   * Méthode renvoyant le nombre de general total.
   * @return int
   */
  abstract public function count();

  /**
   * Méthode permettant de supprimer une general.
   * @param $id int L'identifiant de la general à supprimer
   * @return void
   */
  abstract public function delete($id);

  /**
   * Méthode retournant une liste de general demandée.
   * @param $debut int La première general à sélectionner
   * @param $limite int Le nombre de general à sélectionner
   * @return array La liste des general. Chaque entrée est une instance de General.
   */
  abstract public function getList($debut = -1, $limite = -1);

  /**
   * Méthode retournant une general précise.
   * @param $id int L'identifiant de la general à récupérer
   * @return General La general demandée
   */
  abstract public function getUnique($id);

  /**
   * Méthode permettant de modifier une general.
   * @param $general general la general à modifier
   * @return void
   */
  abstract protected function modify(General $general);
}
