<?php
namespace Model;

use \Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET news = :news, pseudo = :pseudo, contenu = :contenu, date = NOW()');

    $q->bindValue(':news', $comment->news(), \PDO::PARAM_INT);
    $q->bindValue(':pseudo', $comment->pseudo());
    $q->bindValue(':contenu', $comment->contenu());

    $q->execute();

    $comment->setId($this->dao->lastInsertId());
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }

  public function deleteFromNews($news)
  {
    $this->dao->exec('DELETE FROM comments WHERE news = '.(int) $news);
  }

  public function getList()
  {
    $sql = 'SELECT id, pseudo, news, contenu, date, signalement FROM comments ORDER BY signalement DESC, id DESC';

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

    $listeComments = $requete->fetchAll();

    $requete->closeCursor();

    return $listeComments;
  }

  public function getListOf($news)
  {
    if (!ctype_digit($news))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }

    $q = $this->dao->prepare('SELECT id, news, pseudo, contenu, date FROM comments WHERE news = :news');
    $q->bindValue(':news', $news, \PDO::PARAM_INT);
    $q->execute();

    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

    $comments = $q->fetchAll();

    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }

    return $comments;
  }

  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET pseudo = :pseudo, contenu = :contenu WHERE id = :id');

    $q->bindValue(':pseudo', $comment->pseudo());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);

    $q->execute();
  }

  public function signal($id)
  {
    $q = $this->dao->prepare('UPDATE comments SET signalement = :signalement WHERE id = '.(int) $id);
    $q->bindValue(':signalement', '1');
    $q->execute();
  }

  public function approve($id)
  {
    $q = $this->dao->prepare('UPDATE comments SET signalement = :signalement WHERE id = '.(int) $id);
    $q->bindValue(':signalement', '0');
    $q->execute();
  }

  public function getUnique($id)
  {
    $q = $this->dao->prepare('SELECT id, news, pseudo, contenu FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();

    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

    return $q->fetch();
  }
}
