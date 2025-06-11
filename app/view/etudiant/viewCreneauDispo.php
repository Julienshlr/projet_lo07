
<!-- ----- début viewCreneauDispo -->
<?php 
require ($root . '/app/view/fragment/fragmentProjetHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentProjetMenu.html';
      include $root . '/app/view/fragment/fragmentProjetJumbotron.html';
      ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='prendreRDV'>
        <label for="creneau">Créneaux disponibles : </label> <select class="form-control" id='creneau' name='creneau'>
            <?php
            foreach ($results as $creneau) {
             echo ("<option>$creneau</option>");
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Prendre RDV</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewId -->