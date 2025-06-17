<!-- ----- début viewInsertExaminateur -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Ajouter un nouvel examinateur</h2>
  <form role="form" method="get" action="router2.php">
    <input type="hidden" name="action" value="createdExaminateur">
    <div class="mb-3">
      <label class="form-label">Nom</label>
      <input class="form-control" type="text" name="nom" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Prénom</label>
      <input class="form-control" type="text" name="prenom" required>
    </div>
    <button class="btn btn-success" type="submit">Ajouter</button>
  </form>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewInsertExaminateur -->
