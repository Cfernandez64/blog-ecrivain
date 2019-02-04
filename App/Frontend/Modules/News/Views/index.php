<h2 class="text-center mt-3 mb-3">Mes derniers billets</h2>
<div class="row justify-content-around">

<?php
foreach ($listeNews as $news)
{
?>
<div class="col-md-4">
  <div class="card bg-white shadow-sm p-3">
    <img src=""/>
    <div class="card-body">
      <h2 class="card-title"><a href="news-<?= $news['id'] ?>"><?= $news['titre'] ?></a></h2>
      <p class="text-muted">Chapitre <?= $news['chapitre'] ?></p>
      <p class="card-text"><?= $news['contenu'] ?></p>
      <a href="news-<?= $news['id'] ?>" class="btn btn-primary">Lire la suite</a>
    </div>
  </div>
</div>
<?php
}?>
</div>
