<!-- ----- début viewLogout -->
<?php
require($root . '/app/view/fragment/fragmentProjetHeader.html');
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
      <h2 class="alert-heading text-success">Vous êtes déconnecté</h2>
      <p>Merci de votre visite et à bientôt !</p>
    </div>
    <a href="router2.php?action=login" class="btn btn-primary mt-3">Aller à la page de connexion</a>
  </div>

  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
<!-- ----- fin viewLogout -->
