<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!-- ----- debut ControllerEtudiant -->
<?php
require_once '../model/ModelEtudiant.php';
require_once 'ControllerConnection.php';

class ControllerEtudiant extends ControllerConnection {
    
 // --- Liste des RDV
 public static function readAllRDV() {
  $id_etu = $_SESSION['login_id'];
  $results = ModelEtudiant::getAllRDV($id_etu);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/etudiant/viewAll.php';
  if (DEBUG)
   echo ("ControllerEtudiant : readAllRDV : vue = $vue");
  require ($vue);
 }
 
 // Récupère les créneaux disponibles pour un RDV
 public static function readCreneauDispo() {
  $results = ModelEtudiant::getCreneauxDisponibles();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/etudiant/viewCreneauDispo.php';
  require($vue);
 }
 
 // Prendre RDV
 public static function prendreRDV() {
  // Insère le créneau
  $id_creneau = ModelEtudiant::enregistrerRDV($_GET['creneau'], $_SESSION['login_id']);
  
  // Récupère les infos pour la vue
  $result = ModelEtudiant::getInfoCreneau($id_creneau);
  
  // Insère la notif dans la table log
  $message = "Vous avez enregistré un RDV pour le projet <strong>" . $result['projet'] . "</strong> au créneau <strong>" . $result['creneau'] 
          . "</strong> avec l'examinateur <strong>" . $result['exam_nom'] . " " . $result['exam_prenom'] . "</strong>";
  $notif = self::enregistrerLog($message);
  
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/etudiant/viewCreneauReserve.php';
  require($vue);
 }
    
}
?>
<!-- ----- fin ControllerEtudiant -->


