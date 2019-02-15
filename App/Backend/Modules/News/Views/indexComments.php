<h3>Liste des commentaires</h3>
<em class="text-muted">Les commentaires signalés apparaissent en rouge.</em>
<div class="mb-5 mt-3">
  <div class="row p-2 justify-content-between font-weight-bolder border-bottom">
    <div class="col-1">
      Article
    </div>
    <div class="col-2">
      Pseudo
    </div>
    <div class="col-5">
      Contenu
    </div>
    <div class="col-1">
      Modifier
    </div>
    <div class="col-1">
      Approuver
    </div>
    <div class="col-1">
      Supprimer
    </div>
  </div>
<?php
foreach ($listeComments as $comment)
{
   ?>
    <div class="border-bottom p-2 row justify-content-between <?php if ($comment['signalement'] == 1){echo('text-danger');}?>">
      <div class="col-1">
        <?= $comment['news']?>
      </div>
      <div class="col-2">
        <?= $comment['pseudo']?>
      </div>
      <div class="col-5">
        <?= $comment['contenu']?>
      </div>
      <div class="col-1">
        <a href="comment-update-<?= $comment['id'] ?>">Modifier</a>
      </div>
      <div class="col-1">
        <a href="comment-approve-<?= $comment['id'] ?>">Approuver</a>
      </div>
      <div class="col-1">
        <a href="comment-delete-<?= $comment['id'] ?>">Supprimer</a>
      </div>
    </div>
  <?php } ?>
</div>
