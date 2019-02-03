
<div class="bg-white shadow-sm p-3">


  <h2 class="text-center"><?= $news['titre'] ?></h2>
  <hr>
  <p class="text-muted text-center">Par <em><?= $news['auteur'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
  <img src="http://projetblog/images/<?php echo ($news['image']);?>"/>

  <p><?= nl2br($news['contenu']) ?></p>

  <?php if ($news['dateAjout'] != $news['dateModif']) { ?>
    <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
  <?php } ?>

</div>

<div class="bg-white shadow-sm mt-3 p-3">



<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>

<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
?>

    <p><strong><?= htmlspecialchars($comment['auteur']) ?></strong><br/>
    <span class="text-muted"> le <?= $comment['date']->format('d/m/Y à H\hi') ?></span></p>
    <?php if ($user->isAuthenticated()) { ?> -
      <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>

    <p class="border-bottom pb-2"><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>

<?php
}
?>

</div>
