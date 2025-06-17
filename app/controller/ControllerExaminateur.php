<?php

require_once '../model/ModelExaminateur.php';

class ControllerExaminateur {

    public static function readAllProjets() {
        $id_exam = $_SESSION['login_id'];
        $results = ModelExaminateur::getProjetsAvecCreneaux($id_exam);
        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewAllProjets.php';
        require($vue);
    }

    public static function readAllCreneaux() {
        $id_exam = $_SESSION['login_id'];
        $results = ModelExaminateur::getTousMesCreneaux($id_exam);
        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewAllCreneaux.php';
        require($vue);
    }
}
?>

