<h3 class="mt-5 mb-3">Liste des commentaires</h3>
<em class="text-muted">Les commentaires signalés apparaissent en rouge.</em>
<div class="mb-5 mt-3">
  <div class="row p-2 justify-content-start font-weight-bolder border-bottom">
    <div class="col-1 no-mobile">
      Article
    </div>
    <div class="col-4 col-md-2">
      Pseudo
    </div>
    <div class="col-8 col-md-5">
      Contenu
    </div>
    <div class="no-mobile col-md-1">
      Modifier
    </div>
    <div class="no-mobile col-md-1">
      Approuver
    </div>
    <div class="no-mobile col-md-1">
      Supprimer
    </div>
  </div>
<?php
foreach ($listeComments as $comment)
{
   ?>
    <div class="border-bottom p-2 row justify-content-start <?php if ($comment['signalement'] == 1){echo('text-danger');}?>">
      <div class="col-1 col-md-1 no-mobile">
        <?= $comment['news']?>
      </div>
      <div class="col-4 col-md-2">
        <?= $comment['pseudo']?>
      </div>
      <div class="col-8 col-md-5">
        <?= $comment['contenu']?>
      </div>
      <div class="col-3 col-md-1">
        <a href="comment-update-<?= $comment['id'] ?>">Modifier</a>
      </div>
      <div class="col-4 col-md-1">
        <?php
          if ($comment['signalement'] == 1)
          { ?>
            <a href="comment-approve-<?= $comment['id'] ?>">Approuver</a>
          <?php } else {
            echo('Approuvé');
          } ?>
      </div>
      <div class="col-3 col-md-1">
        <a href="comment-delete-<?= $comment['id'] ?>">Supprimer</a>
      </div>
    </div>
  <?php } ?>
</div>
