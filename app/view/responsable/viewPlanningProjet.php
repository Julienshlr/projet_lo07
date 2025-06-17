<!-- ----- début viewPlanningProjet -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Planning du projet</h2>

  <?php if (empty($results)) : ?>
    <div class="alert alert-warning">Aucun rendez-vous encore planifié pour ce projet.</div>
  <?php else : ?>
    <table class="table table-bordered table-striped table-hover table-success">
      <thead>
        <tr>
          <th>Étudiant</th>
          <th>Créneau</th>
          <th>Examinateur</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $row) : ?>
          <tr>
            <td><?= htmlspecialchars($row['etu_prenom'] . ' ' . $row['etu_nom']) ?></td>
            <td><?= htmlspecialchars($row['creneau']) ?></td>
            <td><?= htmlspecialchars($row['exam_prenom'] . ' ' . $row['exam_nom']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewPlanningProjet -->
