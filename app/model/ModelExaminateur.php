<?php
require_once 'Model.php';

class ModelExaminateur {

  public static function getProjetsAvecCreneaux($id_exam) {
    try {
      $database = Model::getInstance();
      $query = "SELECT DISTINCT p.id, p.label
                FROM projet p
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

}
?>
