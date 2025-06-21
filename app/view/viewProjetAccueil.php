
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
    
  <div class="container mt-3 p-5"> 
    <div class="alert alert-success" role="alert">
      <h2 class="alert-heading text-success">Votre activité récente :</h2>

      <?php if (empty($results)) { ?>
        <p class="mb-0">Aucune activité récente pour le moment.</p>
      <?php } else { ?>
        <ul id="log-list">
          <?php foreach ($results as $log) { ?>
            <li><?= $log['date'] ?> — <?= $log['message'] ?></li>
          <?php } ?>
        </ul>
      <?php } ?>
    </div>
  </div>


  <?php
  include 'fragment/fragmentProjetFooter.html';
  ?>

  <!-- ----- fin de la page projet_accueil -->

</body>
</html>