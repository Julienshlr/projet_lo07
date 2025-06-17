<!-- ----- début viewAllExaminateurs -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
<div class="container">
  <?php
  include $root . '/app/view/fragment/fragmentProjetMenu.php';
  include $root . '/app/view/fragment/fragmentProjetJumbotron.html';
  ?>
</div>

<div class="container mt-3 p-5">
  <h2>Liste des examinateurs</h2>
  <table class="table table-bordered table-striped table-hover table-success">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $examinateur) : ?>
        <tr>
          <td><?= htmlspecialchars($examinateur['nom']) ?></td>
          <td><?= htmlspecialchars($examinateur['prenom']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewAllExaminateurs -->
