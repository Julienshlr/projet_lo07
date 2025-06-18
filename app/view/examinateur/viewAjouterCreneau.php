<!-- ----- début viewAjouterCreneau -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
<?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
<?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Ajouter un créneau à un projet</h2>
  <form method="post" action="router2.php">
    <input type="hidden" name="action" value="readAjouterCreneau">

    <div class="mb-3">
      <label class="form-label" for="projet">Projet :</label>
      <select class="form-select" name="projet" id="projet" required>
        <option disabled selected>-- Sélectionner un projet --</option>
        <?php foreach ($projets as $p): ?>
          <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['label']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label" for="creneau">Date et heure :</label>
      <input type="datetime-local" class="form-control" id="creneau" name="creneau" required>
    </div>

    <button type="submit" class="btn btn-success">Ajouter</button>
  </form>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewAjouterCreneau -->
