<div class="container">
  <div class="col-md-8 offset-md-2 mt-3">
    <h2 class="text-center mb-5 border-bottom pb-3">Livre d'or</h2>
    <?php

    foreach ($golds as $gold)
    {
      ?>
      <div class="mb-1 row justify-content-start align-items-center">
        <div class="col-1">
          <img class="pseudoImg" src="/images/ingots.png"/>
        </div>
        <div class="col-11">
          <strong><?= htmlspecialchars($gold['pseudo']) ?></strong>
          <small class="text-muted"> - <?= $gold['date']->format('d/m/Y à H\hi') ?></small>
        </div>
      </div>
      <?php if ($user->isAuthenticated()) { ?> -
        <a href="admin/gold-update-<?= $gold['id'] ?>.html">Modifier</a> |
        <a href="admin/gold-delete-<?= $gold['id'] ?>.html">Supprimer</a>
      <?php } ?>
      <p class="pb-3"><?= nl2br(htmlspecialchars($gold['contenu'])) ?></p>

      <?php
    }
    ?>

    <!--  <form action="" class="border-top pt-4" method="post">
    <h3 class="pb-3">Commenter</h3>
    <p>
    <?= $form ?>

    <input type="submit" class="btn btn-outline-light" value="Ajouter un message" />
  </p>
</form>-->
</div>

<div class="bg-dark mt-3 p-3 container-fluid">
  <div class="container">
    <div class="col-md-8 offset-md-2 mt-3 text-white">

    </div>
  </div>
</div>

</div>
