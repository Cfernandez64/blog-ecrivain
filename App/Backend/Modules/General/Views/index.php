<p style="text-align: center">Il y a actuellement <?= $nombreGeneral ?> pages. En voici la liste :</p>

<table>
  <tr><th>Chapitre</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
<?php
foreach ($listeGeneral as $general)
{
  echo '<tr><td>',  $general['titre'], '</td><td><a href="general-update-', $general['id'], '.html">Modifier</a> <a href="general-delete-', $general['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>
