
<!-- ----- debut ModelEtudiant -->

<?php
require_once 'Model.php';

class ModelEtudiant {
  
  public static function getAllRDV($id_etu) {
    try {
      $database = Model::getInstance();
      $query = "select r.id, c.creneau, p.label as projet, exam.nom as exam_nom, exam.prenom as exam_prenom
                from rdv r, creneau c, projet p, personne exam
                where r.creneau = c.id
                and c.projet = p.id
                and c.examinateur = exam.id
                and r.etudiant = :id_etu";
      $statement = $database->prepare($query);
      $statement->execute([":id_etu" => $id_etu]);
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results;
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
     }
  }
  
  // Obtenir les créneaux disponibles (ceux pas encore pris)
  public static function getCreneauxDisponibles() {
    try {
      $database = Model::getInstance();
      $query = "SELECT c.id, c.creneau, p.label AS projet, exam.nom AS exam_nom, exam.prenom AS exam_prenom
                FROM creneau c, projet p, personne exam
                WHERE c.projet = p.id 
                AND c.examinateur = exam.id 
                AND c.id NOT IN (
                    SELECT r.creneau
                    FROM rdv r, creneau c2, projet p2
                    WHERE r.creneau = c2.id 
                    AND c2.projet = p2.id
                    GROUP BY r.creneau, p2.groupe
                    HAVING COUNT(*) >= p2.groupe
                    )";

      $statement = $database->query($query);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }
  
  // Enregistrer un nouveau RDV pour un étudiant
  public static function prendreRDV($id_creneau, $id_etu) {
    try {
      $database = Model::getInstance();
      $query = "insert into rdv (creneau, etudiant) VALUES (:creneau, :etudiant)";
      $statement = $database->prepare($query);
      $statement->execute([
        ':creneau' => $id_creneau,
        ':etudiant' => $id_etudiant
      ]);
      return $id_creneau;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }
}
?>
<!-- ----- fin ModelEtudiant -->
