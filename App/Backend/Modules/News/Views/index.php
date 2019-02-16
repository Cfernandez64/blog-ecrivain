<div class="mt-2 mt-md-4 row p-2 justify-content-between align-items-center">
  <p class="col-12 col-md-8">Il y a actuellement <?= $nombreNews ?> épisode. En voici la liste :</p>
  <p class="col-12 col-md-2 no-mobile btn btn-success"><a href="dashboard/news-insert" class="text-white text-decoration-none">Ajouter un épisode</a></p>
</div>

<div class="mb-5 mt-3">
  <div class="row p-2 justify-content-start font-weight-bolder border-bottom">
    <div class="col-1 no-mobile">
      Chapitre
    </div>
    <div class="col-md-3 col-12">
      Titre
    </div>
    <div class="col-2 no-mobile">
      Date d'ajout
    </div>
    <div class="col-2 no-mobile">
      Dernière modif
    </div>
    <div class="col-4 no-mobile">
      Action
    </div>
  </div>
  <?php foreach ($listeNews as $news)
  {
     ?>
      <div class="border-bottom p-2 row justify-content-start">
        <div class="col-1 no-mobile">
          <?= $news['chapitre'] ?>
        </div>
        <div class="col-md-3 col-12">
          <?= $news['titre'] ?>
        </div>
        <div class="col-2 no-mobile">
          <?= $news['dateAjout']->format('d/m/Y à H\hi') ?>
        </div>
        <div class="col-2 no-mobile">
          <?= $news['dateModif']->format('d/m/Y à H\hi') ?>
        </div>
        <div class="col-md-1 col-3">
          <a href="dashboard/news-update-<?= $news['id'] ?>">Modifier</a>
        </div>
        <div class="col-md-1 col-3">
          <a href="dashboard/news-delete-<?= $news['id'] ?>">Supprimer</a>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="mt-5 row p-2 justify-content-between align-items-center">
    <p class="col-12 col-md-8 no-mobile">Vous avez actuellement <?= $nombreNews ?> épisode.</p>
    <p class="col-22 col-md-2 btn btn-success"><a href="dashboard/news-insert" class="text-white text-decoration-none">Ajouter un épisode</a></p>
  </div>
