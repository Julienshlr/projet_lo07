<!-- ----- début viewAllProjets -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Projets pour lesquels vous avez proposé un créneau</h2>

  <?php if (empty($results)) : ?>
    <div class="alert alert-warning">Aucun projet trouvé.</div>
  <?php else : ?>
    <table class="table table-bordered table-striped table-success">
      <thead>
        <tr>
          <th>Projet</th>
          <th>Responsable</th>
          <th>Taille du groupe</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $projet) : ?>
          <tr>
            <td><?= htmlspecialchars($projet['label']) ?></td>
            <td><?= htmlspecialchars($projet['responsable_nom']) ?></td>
            <td><?= htmlspecialchars($projet['groupe']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewAllProjets -->
