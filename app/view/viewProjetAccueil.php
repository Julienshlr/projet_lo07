
<!-- ----- debut de la page projet_accueil -->
<?php include 'fragment/fragmentProjetHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include 'fragment/fragmentProjetMenu.php';
    include 'fragment/fragmentProjetJumbotron.html';
    ?>
  </div>   
   <pre>
    <?php print_r($_SESSION); ?>
    </pre>

  <?php
  include 'fragment/fragmentProjetFooter.html';
  ?>

  <!-- ----- fin de la page projet_accueil -->

</body>
</html>