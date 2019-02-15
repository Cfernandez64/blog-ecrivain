<h3>Liste des commentaires</h3>
<em class="text-muted">Les commentaires signalés apparaissent en rouge.</em>
<div class="mb-5 mt-3">
  <div class="row justify-content-between font-weight-bolder">
    <div class="col-2">
      Article
    </div>
    <div class="col-3">
      Pseudo
    </div>
    <div class="col-5">
      Contenu
    </div>
  </div>
<?php
foreach ($listeComments as $comment)
{
   ?>
    <div class="row justify-content-between <?php if ($comment['signalement'] == 1){echo('text-danger');}?>">
      <div class="col-2">
        <?= $comment['news']?>
      </div>
      <div class="col-3">
        <?= $comment['pseudo']?>
      </div>
      <div class="col-5">
        <?= $comment['contenu']?>
      </div>
    </div>
  <?php } ?>
</div>
