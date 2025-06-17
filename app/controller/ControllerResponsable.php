?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!-- ----- debut ControllerResponsable -->
<?php
require_once '../model/ModelResponsable.php';

class ControllerResponsable {
    
 // --- Liste des RDV
 public static function readAllProjects() {
  $id_respo = $_SESSION['login_id'];
  $results = ModelResponsable::getAllProjects($id_respo);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/responsable/viewAll.php';
  if (DEBUG)
   echo ("ControllerConnection : login : vue = $vue");
  require ($vue);
 }
 // Affiche le formulaire d'ajout
public static function createProjet() {
    include 'config.php';
    $vue = $root . '/app/view/responsable/viewInsertProjet.php';
    require($vue);
}

// Traite le formulaire
public static function createdProjet() {
    $label = htmlspecialchars($_GET['label'] ?? '');
    $groupe = intval($_GET['groupe'] ?? 0);
    $id_responsable = $_SESSION['login_id'];

    $result = ModelResponsable::insertProjet($label, $id_responsable, $groupe);

    include 'config.php';
    $vue = $root . '/app/view/responsable/viewInsertedProjet.php';
    require($vue);
}

public static function readAllExaminateurs() {
    $results = ModelResponsable::getAllExaminateurs();
    include 'config.php';
    $vue = $root . '/app/view/responsable/viewAllExaminateurs.php';
    require($vue);
}

    
}
?>
<!-- ----- fin ControllerResponsable -->