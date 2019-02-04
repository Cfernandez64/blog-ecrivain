<?php
namespace Model;

use \Entity\General;

class GeneralManagerPDO extends GeneralManager
{
  protected function add(General $general)
  {
    $requete = $this->dao->prepare('INSERT INTO general SET titre = :titre, contenu = :contenu');

    $requete->bindValue(':titre', $general->titre());
    $requete->bindValue(':contenu', $general->contenu());

    $requete->execute();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM general')->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM general WHERE id = '.(int) $id);
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, titre, contenu FROM general ORDER BY id DESC';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\General');

    $listeGeneral = $requete->fetchAll();

    $requete->closeCursor();

    return $listeGeneral;
  }

  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, titre, contenu FROM general WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();

    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\General');

    if ($general = $requete->fetch())
    {
      return $general;
    }

    return null;
  }

  protected function modify(General $general)
  {
    $requete = $this->dao->prepare('UPDATE general SET titre = :titre, contenu = :contenu WHERE id = :id');

    $requete->bindValue(':titre', $general->titre());
    $requete->bindValue(':contenu', $general->contenu());
    $requete->bindValue(':id', $general->id(), \PDO::PARAM_INT);

    $requete->execute();
  }
}
