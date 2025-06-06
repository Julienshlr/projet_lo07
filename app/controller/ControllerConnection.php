
<!-- ----- debut ControllerConnection -->
<?php
require_once '../model/ModelConnection.php';

class ControllerConnection {
    
 // --- Formulaire de connection
 public static function login() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connection/viewLogin.php';
  if (DEBUG)
   echo ("ControllerConnection : login : vue = $vue");
  require ($vue);
 }
 
 // --- Formulaire d'inscription
 public static function register() {
  $results = ModelConnection::register();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connection/viewLogin.php';
  if (DEBUG)
   echo ("ControllerConnection : register : vue = $vue");
  require ($vue);
 }
 
 // --- Déconnection
 public static function logout() {
  $results = ModelConnection::logout();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connection/viewLogin.php';
  if (DEBUG)
   echo ("ControllerConnection : logout : vue = $vue");
  require ($vue);
 }
    
}
?>
<!-- ----- fin ControllerConnection -->


