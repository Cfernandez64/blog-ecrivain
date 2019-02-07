<?php
namespace Model;

use \Entity\Goldenbook;

class GoldenbookManagerPDO extends GoldenbookManager
{
  protected function add(Goldenbook $goldenbook)
  {
    $q = $this->dao->prepare('INSERT INTO goldenbook SET pseudo = :pseudo, contenu = :contenu, date = NOW()');

    $q->bindValue(':id', $goldenbook->id(), \PDO::PARAM_INT);
    $q->bindValue(':pseudo', $goldenbook->pseudo());
    $q->bindValue(':contenu', $goldenbook->contenu());

    $q->execute();

    $goldenbook->setId($this->dao->lastInsertId());
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM goldenbook WHERE id = '.(int) $id);
  }

  public function deleteFromNews($id)
  {
    $this->dao->exec('DELETE FROM goldenbook WHERE id = '.(int) $id);
  }

  public function getList()
  {
    $sql = 'SELECT id, pseudo, contenu, date FROM goldenbook ORDER BY id DESC';

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Goldenbook');

    $golds = $requete->fetchAll();

    foreach ($golds as $gold)
    {
      $gold->setDate(new \DateTime($gold->date()));
    }

    $requete->closeCursor();

    return $golds;
  }

  protected function modify(Goldenbook $goldenbook)
  {
    $q = $this->dao->prepare('UPDATE goldenbook SET pseudo = :pseudo, contenu = :contenu WHERE id = :id');

    $q->bindValue(':pseudo', $goldenbook->pseudo());
    $q->bindValue(':contenu', $goldenbook->contenu());
    $q->bindValue(':id', $goldenbook->id(), \PDO::PARAM_INT);

    $q->execute();
  }

  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, pseudo, contenu FROM goldenbook WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();

    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Goldenbook');

    return $q->fetch();
  }
}
