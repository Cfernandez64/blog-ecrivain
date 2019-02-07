<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Goldenbook;
use \OCFram\ImageUpload;

abstract class GoldenbookManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un goldenbookaire.
   * @param $goldenbook Le goldenbookaire à ajouter
   * @return void
   */
  abstract protected function add(Goldenbook $goldenbook);

  /**
   * Méthode permettant de supprimer un goldenbookaire.
   * @param $id L'identifiant du goldenbookaire à supprimer
   * @return void
   */
  abstract public function delete($id);

  /**
   * Méthode permettant de supprimer tous les goldenbookaires liés à une news
   * @param $news L'identifiant de la news dont les goldenbookaires doivent être supprimés
   * @return void
   */
  abstract public function deleteFromNews($news);

  /**
   * Méthode permettant d'enregistrer un goldenbookaire.
   * @param $goldenbook Le goldenbookaire à enregistrer
   * @return void
   */
  public function save(Goldenbook $goldenbook)
  {
    if ($goldenbook->isValid())
    {

      $goldenbook->isNew() ? $this->add($goldenbook) : $this->modify($goldenbook);
    }
    else
    {
      throw new \RuntimeException('Le message doit être validé pour être enregistré');
    }
  }

  /**
   * Méthode retournant une liste de news demandée.
   * @param $debut int La première news à sélectionner
   * @param $limite int Le nombre de news à sélectionner
   * @return array La liste des news. Chaque entrée est une instance de News.
   */
  abstract public function getList();

  /**
   * Méthode permettant de modifier un goldenbookaire.
   * @param $goldenbook Le goldenbookaire à modifier
   * @return void
   */
  abstract protected function modify(Goldenbook $goldenbook);

  /**
   * Méthode permettant d'obtenir un goldenbookaire spécifique.
   * @param $id L'identifiant du goldenbookaire
   * @return Goldenbook
   */
  abstract public function get($id);
}
