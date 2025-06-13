<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!-- ----- debut ControllerEtudiant -->
<?php
require_once '../model/ModelEtudiant.php';

class ControllerEtudiant {
    
 // --- Liste des RDV
 public static function readAllRDV() {
  $id_etu = $_SESSION['login_id'];
  $results = ModelEtudiant::getAllRDV($id_etu);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/etudiant/viewAll.php';
  if (DEBUG)
   echo ("ControllerConnection : login : vue = $vue");
  require ($vue);
 }
 
 // Prendre RDV
 public static function readCreneauDispo() {
  $results = ModelEtudiant::getCreneauxDisponibles();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/etudiant/viewCreneauDispo.php';
  require($vue);
 }
    
}
?>
<!-- ----- fin ControllerEtudiant -->


