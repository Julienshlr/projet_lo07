
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
 
 // --- Récupère le résultat du login
 public static function readLogin() {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $result = ModelConnection::verifIdentifiants($login, $mdp);
    switch ($result['status']) {
        case 'login_inconnu':
            ControllerConnection::loginInexistant();
            break;

        case 'mdp_incorrect':
            ControllerConnection::mauvaisMDP();
            break;
        
        case 'ok':
            include 'config.php';
            $_SESSION['login_id'] = $result['id'];
            $_SESSION['utilisateur'] = $result['nom'] . ' ' . $result['prenom'];
            $_SESSION['role_responsable'] = $result['role_responsable'];
            $_SESSION['role_examinateur'] = $result['role_examinateur'];
            $_SESSION['role_etudiant'] = $result['role_etudiant'];
            $_SESSION['login'] = $login;
            
            // Redirection via le routeur
            header("Location: ../router/router2.php?action=projetAccueil");
            exit();

    }

 }
 
 // --- Si login inexistant
 public static function loginInexistant() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $message = "Login inexistant. Veuillez réessayer.";
  $vue = $root . '/app/view/connection/viewLogin.php';
  if (DEBUG)
   echo ("ControllerConnection : loginInexistant : vue = $vue");
  require ($vue);
 }
 
 // --- Si login existant mais mauvais mdp
 public static function mauvaisMDP() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $message = "Mot de passe incorrect. Veuillez réessayer.";
  $vue = $root . '/app/view/connection/viewLogin.php';
  if (DEBUG)
   echo ("ControllerConnection : mauvaisMDP : vue = $vue");
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


