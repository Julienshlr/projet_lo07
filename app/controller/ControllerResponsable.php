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
    
}
?>
<!-- ----- fin ControllerResponsable -->