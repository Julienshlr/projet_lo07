
<!-- ----- début viewAll -->
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
      
      <?php
      if (!empty($results)) {
        $cols = array_keys($results[0]);
        $datas = $results;
      }
      ?>
    
  <div class="container mt-3 p-5">
    <h2>Liste de vos rendez-vous</h2>
    <?php if (!empty($datas)) { ?>
    <table class = "table table-success table-striped table-bordered">
      <thead>
        <tr>
            <?php
            $titresCols = [
                'id' => 'ID',
                'creneau' => 'Créneau',
                'projet' => 'Projet',
                'exam_nom' => "Nom de l'examinateur",
                'exam_prenom' => "Prénom de l'examinateur"
            ];
            foreach ($cols as $col) {
             echo "<th scope = 'col'>" . $titresCols[$col] . "</th>";
            }
            ?>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results             
          foreach ($datas as $row) {
           echo "<tr>";
           foreach ($cols as $col) {
               echo "<td>$row[$col]</td>";
           }
           echo "</tr>";
          }
          ?>
      </tbody>
    </table>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            Vous n'avez pas de rendez-vous.
        </div>
    <?php } ?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  