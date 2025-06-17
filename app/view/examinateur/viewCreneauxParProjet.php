<!-- ----- début viewCreneauxParProjet -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Mes créneaux pour ce projet</h2>

  <?php if (empty($results)) : ?>
    <div class="alert alert-warning">Aucun créneau proposé pour ce projet.</div>
  <?php else : ?>
    <table class="table table-bordered table-striped table-success">
      <thead>
        <tr>
          <th>Créneau (Date / Heure)</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $row) : ?>
          <tr>
            <td><?= htmlspecialchars($row['creneau']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewCreneauxParProjet -->

