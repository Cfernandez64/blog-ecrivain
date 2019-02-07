
<h2 class="mt-5 text-center">Derniers épisodes publiés</h2>
<p class="text-center"><small><a href="/livre">Voir tous les épisodes</a></small></p>

<?php
foreach ($listeNews as $news)
{
?>
<div class="col-md-10 offset-md-1">
  <div class="p-3">
    <img src=""/>
    <div class="card-body text-center">
      <h2 class="card-title text-center"><a class="text-decoration-none" href="news-<?= $news['id'] ?>"><?= htmlspecialchars($news['titre']) ?></a></h2>
      <p class="text-muted text-center">Chapitre <?= htmlspecialchars($news['chapitre']) ?></p>

      <p class="text-muted text-center">Publié le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
      <?php
      if($news['image'])
      {
        echo('<img class="w-100" src="http://projetblog/images/'.htmlspecialchars($news['image']).'"/>');
      }
      ?>
      <p class="card-text text-left"><?= htmlspecialchars($news['contenu']) ?></p>
      <a href="news-<?= $news['id'] ?>" class="btn btn-primary">Lire la suite</a>
    </div>
  </div>
</div>
<?php
}?>
