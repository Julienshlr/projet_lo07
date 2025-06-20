
<!-- ----- début viewCreneauReserve -->
<?php

require ($root . '/app/view/fragment/fragmentProjetHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentProjetMenu.php';
      include $root . '/app/view/fragment/fragmentProjetJumbotron.html';
      ?>
  </div>
  <div class="container mt-3 p-5">
    <div class="alert alert-success" role="alert">
      <h2 class="alert-heading text-success">Rendez-vous confirmé !</h2>
      <p>Vous avez pris rendez-vous pour le créneau suivant :</p>
      <hr>
      <ul class="list-group">
        <li class="list-group-item text-success"><strong>Créneau :</strong> <?php echo htmlspecialchars($result['creneau']); ?></li>
        <li class="list-group-item text-success"><strong>Projet :</strong> <?php echo htmlspecialchars($result['projet']); ?></li>
        <li class="list-group-item text-success"><strong>Examinateur :</strong> <?php echo htmlspecialchars($result['exam_nom'] . ' ' . $result['exam_prenom']); ?></li>
      </ul>
    </div>
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewCreneauReserve -->
  
  
  