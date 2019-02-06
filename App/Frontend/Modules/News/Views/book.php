
<h2 class="mt-5 text-center">Filtrer par chapitre</h2>
<div class="text-center w-25 mx-auto mt-3 mb-4">
  <select id="filter" class="form-control">
    <option value="all">Choisir un chapitre</option>
    <option value="chapter-1">Chapitre 1</option>
    <option value="chapter-2">Chapitre 2</option>
    <option value="chapter-3">Chapitre 3</option>
  </select>
</div>


<div class="row justify-content-center listNews">
  <?php
  foreach ($listeNews as $news)
  {
  ?>
  <div class="col-md-4 newsSingle <?php echo('chapter-'.$news['chapitre'].'');?>">
    <div class="p-3">
      <div class="text-center">
        <h2 class="text-center"><a class="text-decoration-none" href="news-<?= $news['id'] ?>"><?= $news['titre'] ?></a></h2>
        <p class="text-muted text-center">Chapitre <?= $news['chapitre'] ?></p>

        <p class="text-muted text-center">Publié le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
        <?php
        if($news['image'])
        {
          echo('<p><img class="w-100" src="http://projetblog/images/'.$news['image'].'"/></p>');
        }
        ?>
        <p><?php echo ($news['contenu']); ?></p>
        <a href="news-<?= $news['id'] ?>" class="btn btn-primary">Lire la suite</a>
      </div>
    </div>
  </div>
  <?php
  }?>
</div>
