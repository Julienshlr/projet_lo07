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

    public static function selectProjetPourCreneaux() {
        $id_exam = $_SESSION['login_id'];
        $projets = ModelExaminateur::getProjetsDeLExaminateur($id_exam);
        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewSelectProjetCreneaux.php';
        require($vue);
    }

    public static function readCreneauxPourProjet() {
        $id_exam = $_SESSION['login_id'];
        $id_projet = $_GET['projet'] ?? null;

        if ($id_projet === null) {
            header('Location: router2.php?action=selectProjetPourCreneaux');
            exit();
        }

        $results = ModelExaminateur::getCreneauxPourProjet($id_exam, $id_projet);
        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewCreneauxParProjet.php';
        require($vue);
    }
}
?>

