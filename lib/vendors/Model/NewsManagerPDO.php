<?php
namespace Model;

use \Entity\News;

class NewsManagerPDO extends NewsManager
{
  protected function add(News $news)
  {
    $requete = $this->dao->prepare('INSERT INTO news SET chapitre = :chapitre, titre = :titre, contenu = :contenu, image = :image, dateAjout = NOW(), dateModif = NOW()');

    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':chapitre', $news->chapitre());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->bindValue(':image', $news->image());

    $requete->execute();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM news')->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM news WHERE id = '.(int) $id);
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, chapitre, titre, contenu, dateAjout, image, dateModif FROM news ORDER BY id DESC';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');

    $listeNews = $requete->fetchAll();

    foreach ($listeNews as $news)
    {
      $news->setDateAjout(new \DateTime($news->dateAjout()));
      $news->setDateModif(new \DateTime($news->dateModif()));
    }

    $requete->closeCursor();

    return $listeNews;
  }

  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, chapitre, titre, contenu, dateAjout, dateModif, image FROM news WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();

    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');

    if ($news = $requete->fetch())
    {
      $news->setDateAjout(new \DateTime($news->dateAjout()));
      $news->setDateModif(new \DateTime($news->dateModif()));

      return $news;
    }

    return null;
  }

  protected function modify(News $news)
  {
    $requete = $this->dao->prepare('UPDATE news SET chapitre = :chapitre, titre = :titre, contenu = :contenu, image = :image, dateModif = NOW() WHERE id = :id');

    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':chapitre', $news->chapitre());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->bindValue(':image', $news->image());
    $requete->bindValue(':id', $news->id(), \PDO::PARAM_INT);

    $requete->execute();
  }
}
