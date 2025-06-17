<!-- ----- début viewInsertedExaminateur -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
<?php
  if ($result['status'] === 'ok') {
      echo "<div class='alert alert-success'>Examinateur ajouté avec succès. Login : <strong>{$result['login']}</strong>, mot de passe par défaut : <em>examinateur</em></div>";
  } elseif ($result['status'] === 'existant') {
      echo "<div class='alert alert-warning'>Cet examinateur existe déjà dans la base.</div>";
  } else {
      echo "<div class='alert alert-danger'>Erreur lors de l'ajout de l'examinateur.</div>";
  }
?>
<a class="btn btn-primary mt-3" href="router2.php?action=readAllExaminateurs">Retour à la liste</a>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewInsertedExaminateur -->
