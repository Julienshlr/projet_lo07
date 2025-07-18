<!-- ----- début viewExaminateursParProjet -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
  <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
</div>

<div class="container mt-3 p-5">
  <h2>Examinateurs affectés à ce projet</h2>
  <?php if (empty($results)) : ?>
    <div class="alert alert-warning">Aucun examinateur affecté à ce projet.</div>
  <?php else : ?>
    <table class="table table-striped table-bordered table-hover table-success">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $exam) : ?>
          <tr>
            <td><?= htmlspecialchars($exam['nom']) ?></td>
            <td><?= htmlspecialchars($exam['prenom']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewExaminateursParProjet -->

