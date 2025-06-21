<?php

require_once '../model/ModelExaminateur.php';
require_once 'ControllerConnection.php';

class ControllerExaminateur extends ControllerConnection{

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

    public static function ajouterCreneau() {
        $id_exam = $_SESSION['login_id'];
        $projets = ModelExaminateur::getAllProjets($id_exam);
        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewAjouterCreneau.php';
        require($vue);
    }

    public static function readAjouterCreneau() {
        $id_exam = $_SESSION['login_id'];
        $id_projet = $_POST['projet'];
        $datetime = $_POST['creneau'];

        // Convertir format input en timestamp SQL
        $formatted = date("Y-m-d H:i:s", strtotime($datetime));

        $result = ModelExaminateur::insertCreneau($id_exam, $id_projet, $formatted);
        
        // Insère la notif dans la table log
        $results = ModelExaminateur::getOneProjet($id_projet);
        $message = "Vous avez inséré un nouveau créneau au projet <strong>". $results['label'] . "</strong>";
        $notif = self::enregistrerLog($message);

        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewCreneauAjoute.php';
        require($vue);
    }

    public static function ajouterListeCreneaux() {
        $projets = ModelExaminateur::getAllProjets();
        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewAjouterListeCreneaux.php';
        require($vue);
    }

    public static function readAjouterListeCreneaux() {
        $id_exam = $_SESSION['login_id'];
        $id_projet = $_POST['projet'];
        $datetime = $_POST['creneau'];
        $nb = intval($_POST['nb']);

        if ($nb < 1 || $nb > 10) {
            $result = ['status' => 'error', 'message' => 'Le nombre de créneaux doit être entre 1 et 10'];
        } else {
            $formatted = date("Y-m-d H:i:s", strtotime($datetime));
            $result = ModelExaminateur::insertListeCreneaux($id_exam, $id_projet, $formatted, $nb);
            
            // Insère la notif dans la table log
            $results = ModelExaminateur::getOneProjet($id_projet);
            $message = "Vous avez inséré <strong>" . $nb . "</strong> créneaux au projet <strong>". $results['label'] . "</strong>";
            $notif = self::enregistrerLog($message);
        }
        

        include 'config.php';
        $vue = $root . '/app/view/examinateur/viewListeCreneauxAjoutes.php';
        require($vue);
    }
}
?>

