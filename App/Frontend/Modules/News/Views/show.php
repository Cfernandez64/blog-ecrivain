
<div class="container">
  <div class="col-md-8 offset-md-2 mt-5">


    <h2 class="text-center"><?= $news['titre'] ?></h2>
    <hr>
    <p class="text-muted text-center">Chapitre <em><?= $news['chapitre'] ?></em></p>
    <p><img class="w-100" src="http://projetblog/images/<?php echo ($news['image']);?>"/></p>

    <p><?= nl2br($news['contenu']) ?></p>

    <?php if ($news['dateAjout'] != $news['dateModif']) { ?>
      <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
    <?php } ?>

  </div>

  <div class="col-md-8 offset-md-2 mt-1 text-center mb-4">
    <p class="back"><a class="text-muted  text-decoration-none" href="/livre"><img src="/images/open-book.png" alt="booking"> <small>Revenir aux articles</small></a></p>
  </div>
</div>




<div class="bg-dark mt-3 p-3 container-fluid">
  <div class="container">
      <div class="col-md-8 offset-md-2 mt-3 text-white">
        <?php
        if (empty($comments))
        {
          ?>
          <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
          <?php
        } else
        {
          echo("<h3 class='border-bottom pb-3 mb-3'>".count($comments). " commentaires</h3>");
        }

        foreach ($comments as $comment)
        {
          ?>

          <p class="mb-1"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong>
            <small class="text-muted"> - <?= $comment['date']->format('d/m/Y à H\hi') ?></small></p>
            <?php if ($user->isAuthenticated()) { ?> -
              <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
              <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
            <?php } ?>
            <p class="pb-3"><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>

            <?php
          }
          ?>

          <form action="" class="border-top pt-4" method="post">
            <h3 class="pb-3">Commenter</h3>
            <p>
              <?= $form ?>

              <input type="submit" class="btn btn-outline-light" value="Ajouter un commentaire" />
            </p>
          </form>
    </div>

  </div>

  </div>
