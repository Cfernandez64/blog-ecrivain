<div class="mt-5 row p-2 justify-content-between align-items-center">
  <p class="col-8">Il y a actuellement <?= $nombreNews ?> épisode. En voici la liste :</p>
  <p class="col-2 btn btn-success"><a href="dashboard/news-insert" class="text-white text-decoration-none">Ajouter un épisode</a></p>
</div>

<div class="mb-5 mt-3">
  <div class="row p-2 justify-content-start font-weight-bolder border-bottom">
    <div class="col-1">
      Chapitre
    </div>
    <div class="col-3">
      Titre
    </div>
    <div class="col-2">
      Date d'ajout
    </div>
    <div class="col-2">
      Dernière modif
    </div>
    <div class="col-4">
      Action
    </div>
  </div>
  <?php foreach ($listeNews as $news)
  {
     ?>
      <div class="border-bottom p-2 row justify-content-start">
        <div class="col-1">
          <?= $news['chapitre'] ?>
        </div>
        <div class="col-3">
          <?= $news['titre'] ?>
        </div>
        <div class="col-2">
          <?= $news['dateAjout']->format('d/m/Y à H\hi') ?>
        </div>
        <div class="col-2">
          <?= $news['dateModif']->format('d/m/Y à H\hi') ?>
        </div>
        <div class="col-1">
          <a href="dashboard/news-update-<?= $news['id'] ?>">Modifier</a>
        </div>
        <div class="col-1">
          <a href="dashboard/news-delete-<?= $news['id'] ?>">Supprimer</a>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="mt-5 row p-2 justify-content-between align-items-center">
    <p class="col-8">Vous avez actuellement <?= $nombreNews ?> épisode.</p>
    <p class="col-2 btn btn-success"><a href="dashboard/news-insert" class="text-white text-decoration-none">Ajouter un épisode</a></p>
  </div>
