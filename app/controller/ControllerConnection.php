
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
            
            // Message de bienvenue
            $_SESSION['welcome_message'] = "Bienvenue " . $_SESSION['utilisateur'] . " !";
            
            // Redirection via le routeur
            header("Location: ../router/router2.php?action=projetAccueil");
            exit();

    }

 }
 
 // --- Si login inexistant
 public static function loginInexistant() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $message = "Login inexistant. Veuillez réessayer ou vous inscrire.";
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
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connection/viewRegister.php';
  if (DEBUG)
   echo ("ControllerConnection : register : vue = $vue");
  require ($vue);
 }
 
 // --- Récupère le résultat de l'inscription
 public static function readRegister() {
  // Récupération des données du formulaire
  $role_responsable = isset($_POST['role_responsable']) ? 1 : 0;
  $role_examinateur = isset($_POST['role_examinateur']) ? 1 : 0;
  $role_etudiant = isset($_POST['role_etudiant']) ? 1 : 0;
  $nom = strtoupper(htmlspecialchars($_POST['nom']));
  $prenom = ucfirst(strtolower(htmlspecialchars($_POST['prenom'])));
  $login = htmlspecialchars($_POST['login']);
  $mdp = htmlspecialchars($_POST['mdp']);
  
  $result = ModelConnection::register($nom, $prenom, $login, $mdp, $role_responsable, $role_examinateur, $role_etudiant);
  
  switch ($result['status']) {
        case 'login_existant' :
            // ----- Construction chemin de la vue
            include 'config.php';
            $message = "Login existant. Veuillez trouver un autre nom d'utilisateur ou vous connecter.";
            $vue = $root . '/app/view/connection/viewRegister.php';
            if (DEBUG)
             echo ("ControllerConnection : ReadRegister : vue = $vue");
            require ($vue);
            break;
        
        case 'ok' :
            // ----- Construction chemin de la vue
            include 'config.php';
            $vue = $root . '/app/view/connection/viewRegisterConfirmed.php';
            if (DEBUG)
             echo ("ControllerConnection : ReadRegister : vue = $vue");
            require ($vue);
            break;
    }
 }
 
 
 // --- Déconnection
 public static function logout() {
     
   session_start();
   // Supprime toutes les variables de session
   $_SESSION = array();

   // Détruit la session
   session_destroy();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connection/viewLogout.php';
  if (DEBUG)
   echo ("ControllerConnection : logout : vue = $vue");
  require ($vue);
 }
    
}
?>
<!-- ----- fin ControllerConnection -->


