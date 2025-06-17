
<!-- ----- debut ModelResponsable -->

<?php
require_once 'Model.php';

class ModelResponsable {

    public static function getAllProjects($id_respo) {
        try {
            $database = Model::getInstance();
            $query = "select r.label, p.nom, r.groupe from projet r, personne p where r.responsable = :id_respo and r.responsable = p.id";
            $statement = $database->prepare($query);
            $statement->execute([":id_respo" => $id_respo]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insertProjet($label, $id_responsable, $groupe) {
        if ($groupe < 1 || $groupe > 5) {
            return ['status' => 'groupe_invalide'];
        }

        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from projet";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple[0] + 1;

            $query = "insert into projet (id, label, responsable, groupe) values (:id, :label, :responsable, :groupe)";
            $statement = $database->prepare($query);
            $statement->execute([
                ':id' => $id,
                ':label' => $label,
                ':responsable' => $id_responsable,
                ':groupe' => $groupe
            ]);
            return ['status' => 'ok'];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return ['status' => 'erreur'];
        }
    }

    public static function getAllExaminateurs() {
        try {
            $database = Model::getInstance();
            $query = "SELECT nom, prenom FROM personne WHERE role_examinateur = 1";
            $statement = $database->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!-- ----- fin ModelResponsable -->
