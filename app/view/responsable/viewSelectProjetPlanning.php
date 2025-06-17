<!-- ----- début viewSelectProjetPlanning -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Sélectionnez un projet pour voir le planning</h2>
  <form method="get" action="router2.php">
    <input type="hidden" name="action" value="readPlanningParProjet">
    <div class="mb-3">
      <label for="projet" class="form-label">Projet :</label>
      <select class="form-select" name="projet" id="projet" required>
        <option disabled selected>-- Choisissez un projet --</option>
        <?php foreach ($projets as $p): ?>
          <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['label']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Voir le planning</button>
  </form>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewSelectProjetPlanning -->
