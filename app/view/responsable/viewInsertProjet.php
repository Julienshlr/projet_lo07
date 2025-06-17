<!-- ----- début viewInsertProjet -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Ajouter un projet</h2>
  <form role="form" method="get" action="router2.php">
    <input type="hidden" name="action" value="createdProjet">
    <div class="mb-3">
      <label class="form-label">Titre du projet</label>
      <input class="form-control" type="text" name="label" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Nombre d'étudiants (1 à 5)</label>
      <input class="form-control" type="number" name="groupe" min="1" max="5" required>
    </div>
    <button class="btn btn-success" type="submit">Ajouter</button>
    <button class="btn btn-danger" type="reset">Effacer</button>
  </form>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewInsertProjet -->

