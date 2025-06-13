
<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerProjet.php');
require ('../controller/ControllerConnection.php');
require ('../controller/ControllerEtudiant.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- On fusionne $_POST pour les données postées (ex: les identifiants de connexion)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $param = array_merge($param, $_POST);
}

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- On supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "#" :
  ControllerResponsable::$action($args);
  break;

 case "#" :
    ControllerExaminateur::$action($args);
    break;
 
 case "readAllRDV" :
 case "readCreneauDispo" :
    ControllerEtudiant::$action($args);
    break;
 
 case "#" :
    ControllerInnovation::$action($args);
    break;

 case "login" :
 case "register" :
 case "logout" :
 case "readLogin" :
 case "readRegister" :
    ControllerConnection::$action($args);
    break;

 // Tache par défaut
 default:
  $action = "projetAccueil";
  ControllerProjet::$action($args);
}
?>
<!-- ----- Fin Router2 -->

