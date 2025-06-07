
<!-- ----- début viewRegisterConfirmed -->
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
        L'inscription a été réalisée avec succès !
      </div>

      <a href="router2.php?action=login" class="btn btn-primary mt-3">Aller à la page de connexion</a>
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewRegisterConfirmed -->
  
  
  