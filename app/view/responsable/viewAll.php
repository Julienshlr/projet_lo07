
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
        $cols = array_keys($results[0]);
        $datas = $results;
      ?>
      
  <div class="container mt-3 p-5">
    <table class = "table table-success table-striped table-bordered">
      <thead>
        <tr>
            <?php
            $titresCols = [
                'label' => 'Label',
                'nom' => "Nom du responsable",
                'groupe' => "Taille du groupe"
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
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  