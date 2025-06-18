<!-- ----- début viewAjouterListeCreneaux -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
<?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
<?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Ajouter des créneaux consécutifs</h2>
  <form method="post" action="router2.php">
    <input type="hidden" name="action" value="readAjouterListeCreneaux">

    <div class="mb-3">
      <label class="form-label" for="projet">Projet :</label>
      <select class="form-select" name="projet" required>
        <option disabled selected>-- Sélectionner un projet --</option>
        <?php foreach ($projets as $p): ?>
          <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['label']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label" for="creneau">Date/heure de début :</label>
      <input type="datetime-local" class="form-control" name="creneau" required>
    </div>

    <div class="mb-3">
      <label class="form-label" for="nb">Nombre de créneaux (1–10) :</label>
      <input type="number" class="form-control" name="nb" min="1" max="10" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter les créneaux</button>
  </form>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewAjouterListeCreneaux -->

