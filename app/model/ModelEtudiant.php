
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
      $query = "select c.id as id_creneau, c.creneau, p.label as projet, exam.nom as exam_nom, exam.prenom as exam_prenom
                from creneau c, projet p, personne exam
                where c.projet = p.id 
                and c.examinateur = exam.id 
                and c.id not in (
                    select r.creneau
                    from rdv r, creneau c2, projet p2
                    where r.creneau = c2.id 
                    and c2.projet = p2.id
                    group by r.creneau, p2.groupe
                    having count(*) >= p2.groupe
                    )
                order by c.projet, c.creneau";
                

      $statement = $database->prepare($query);
      $statement->execute();
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
