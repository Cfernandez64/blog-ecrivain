
<div class="container">
  <div class="col-md-8 offset-md-2 mt-5">


    <h2 class="text-center"><?= htmlspecialchars($news['titre']) ?></h2>
    <hr>
    <p class="text-muted text-center">Chapitre <em><?= htmlspecialchars($news['chapitre']) ?></em></p>
    <p><img class="w-100" src="http://myfencingteam.fr/images/<?php echo (htmlspecialchars($news['image']));?>"/></p>

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
          $nbComments = count($comments);
          if ($nbComments > 1)
          {
            echo("<h3 class='border-bottom pb-3 mb-3'>".count($comments). " commentaires</h3>");
          } else
          {
            echo("<h3 class='border-bottom pb-3 mb-3'>".count($comments). " commentaire</h3>");
          }

        }

        foreach ($comments as $comment)
        {
          ?>
          <div class="row align-items-center">
            <div class="col-md-10">
              <p class="mb-1"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong>
                <small class="text-muted"> - <?= $comment['date']->format('d/m/Y à H\hi') ?></small></p>
                <?php if ($user->isAuthenticated()) { ?> -
                  <a href="admin/dashboard/comment-update-<?= $comment['id'] ?>">Modifier</a> |
                  <a href="admin/dashboard/comment-delete-<?= $comment['id'] ?>">Supprimer</a>
                <?php } ?>
                <p class="pb-3"><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
            </div>
            <div class="col-md-2">
              <p class="btn btn-outline-light signal" id="commentsignal-<?= $comment['id'] ?>">Signaler</p>
            </div>
          </div>
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


  <!-- Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Commentaire signalé !</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Nous avons bien pris en compte votre demande de signalement.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="failModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Erreur !</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Oups, il semble que nous ayons rencontré une erreur, veuillez réessayer.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
