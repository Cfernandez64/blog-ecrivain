<div class="container">
  <div class="col-md-8 offset-md-2 mt-3">
    <h2 class="text-center mb-5 border-bottom pb-3">Livre d'or</h2>
    <?php

    foreach ($golds as $gold)
    {
      ?>
      <div class="row">
        <div class="col-2">
        <?php if($gold['image'])
          {
            echo('<p><img class="w-75" src="http://myfencingteam.fr/images/users/'.htmlspecialchars($gold['image']).'"/></p>');
          }
          ?>
        </div>
        <div class="col-10">
          <p>
            <strong><?= htmlspecialchars($gold['pseudo']) ?></strong>
            <small class="text-muted"> - <?= $gold['date']->format('d/m/Y à H\hi') ?></small>
          </p>
          <p class="pb-3"><?= nl2br(htmlspecialchars($gold['contenu'])) ?></p>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
<div class="bg-dark mt-3 p-3 container-fluid">
  <div class="container">
    <div class="col-md-8 offset-md-2 mt-3 text-white">
      <form action="" method="post"  enctype="multipart/form-data">
      <h3 class="pb-3 border-bottom">Ajouter un message</h3>
      <p>
      <?= $form ?>

      <input type="submit" class="btn btn-outline-light" value="Ajouter un message" />
      </p>
      </form>
    </div>
  </div>
</div>
