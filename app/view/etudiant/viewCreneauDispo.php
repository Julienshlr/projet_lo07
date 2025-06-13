<!-- ----- début viewCreneauDispo -->
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
    <h2 class="mt-4">Prendre un rendez-vous</h2>

    <form role="form" method="get" action="router2.php">
      <div class="form-group mt-3">
        <input type="hidden" name="action" value="prendreRDV">
        <label for="creneau">Créneaux disponibles :</label>
        <select class="form-control" id="creneau" name="creneau" required>
        <option value="" disabled selected>-- Choisir un créneau --</option>
        <?php
        if (!empty($results)) {
          $current_projet = null;
          foreach ($results as $c) {
            $id = htmlspecialchars($c['id']);
            $creneau = htmlspecialchars($c['creneau']);
            $projet = htmlspecialchars($c['projet']);
            $exam = htmlspecialchars($c['exam_nom'] . ' ' . $c['exam_prenom']);

            if ($projet !== $current_projet) {
              if ($current_projet !== null) {
                echo "</optgroup>";
              }
              $current_projet = $projet;
              echo "<optgroup label=\"$projet\">";
            }

            echo "<option value=\"$id\">$creneau | $exam</option>";
          }
          echo "</optgroup>";
        } else {
          echo "<option disabled>Aucun créneau disponible</option>";
        }
        ?>
      </select>

      </div>
      <br>
      <button class="btn btn-primary" type="submit">Prendre RDV</button>
    </form>
    <br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
<!-- ----- fin viewCreneauDispo -->
