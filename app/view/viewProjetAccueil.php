
<!-- ----- debut de la page projet_accueil -->
<?php include 'fragment/fragmentProjetHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include 'fragment/fragmentProjetMenu.php';
    include 'fragment/fragmentProjetJumbotron.html';
    ?>
  </div>
  <?php
    if (!empty($_SESSION['welcome_message'])) { ?>
    <div class="alert alert-success alert-dismissible fade show m-5" role="alert">
      <?php echo $_SESSION['welcome_message']; unset($_SESSION['welcome_message']); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    
   <pre>
    <?php print_r($_SESSION); ?>
    </pre>

  <?php
  include 'fragment/fragmentProjetFooter.html';
  ?>

  <!-- ----- fin de la page projet_accueil -->

</body>
</html>