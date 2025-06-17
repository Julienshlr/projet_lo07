<?php

require_once 'Model.php';

class ModelExaminateur {

    public static function getProjetsAvecCreneaux($id_exam) {
        try {
            $database = Model::getInstance();
            $query = "SELECT DISTINCT p.label, r.nom AS responsable_nom, p.groupe
                  FROM projet p
                  JOIN personne r ON p.responsable = r.id
                  JOIN creneau c ON c.projet = p.id
                  WHERE c.examinateur = :id_exam
                  ORDER BY p.label";
            $statement = $database->prepare($query);
            $statement->execute([':id_exam' => $id_exam]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getTousMesCreneaux($id_exam) {
        try {
            $database = Model::getInstance();
            $query = "SELECT c.id, c.creneau, p.label AS projet_label
                  FROM creneau c
                  JOIN projet p ON c.projet = p.id
                  WHERE c.examinateur = :id_exam
                  ORDER BY c.creneau";
            $statement = $database->prepare($query);
            $statement->execute([':id_exam' => $id_exam]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getCreneauxPourProjet($id_exam, $id_projet) {
        try {
            $database = Model::getInstance();
            $query = "SELECT creneau
                  FROM creneau
                  WHERE examinateur = :id_exam AND projet = :id_projet
                  ORDER BY creneau";
            $statement = $database->prepare($query);
            $statement->execute([
                ':id_exam' => $id_exam,
                ':id_projet' => $id_projet
            ]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getProjetsDeLExaminateur($id_exam) {
        try {
            $database = Model::getInstance();
            $query = "SELECT DISTINCT p.id, p.label
                  FROM projet p
                  JOIN creneau c ON p.id = c.projet
                  WHERE c.examinateur = :id_exam
                  ORDER BY p.label";
            $statement = $database->prepare($query);
            $statement->execute([':id_exam' => $id_exam]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}

?>
