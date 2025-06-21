<?php

require_once '../model/ModelConnection.php';

class ControllerProjet {
 
 // --- page d'accueil
 public static function projetAccueil() {
  $results = ModelConnection::readLog();
  include 'config.php';
  $vue = $root . '/app/view/viewProjetAccueil.php';
  if (DEBUG)
   echo ("ControllerProjet : projetAccueil : vue = $vue");
  require ($vue);
 }
 
 
 // Proposition 1 : Amélioration de la structure MVC
    public static function projetProposition1() {
        include 'config.php';
        $vue = $root . '/app/view/documentation/viewProposition1.php';
        require($vue);
    }

    // Proposition 2 : Sécurisation des accès (ex: PDO::prepare partout + vérification input)
    public static function projetProposition2() {
        include 'config.php';
        $vue = $root . '/app/view/documentation/viewProposition2.php';
        require($vue);
    }
}
