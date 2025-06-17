<!-- ----- début viewInsertedProjet -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
<?php
  if ($result['status'] === 'ok') {
      echo '<div class="alert alert-success">Projet ajouté avec succès !</div>';
  } elseif ($result['status'] === 'groupe_invalide') {
      echo '<div class="alert alert-warning">Le nombre d\'étudiants doit être compris entre 1 et 5.</div>';
  } else {
      echo '<div class="alert alert-danger">Erreur lors de l\'ajout du projet.</div>';
  }
?>
<a class="btn btn-primary mt-3" href="router2.php?action=readAllProjects">Retour à la liste</a>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewInsertedProjet -->


