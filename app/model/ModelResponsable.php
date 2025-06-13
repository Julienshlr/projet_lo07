
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
  
}
?>
<!-- ----- fin ModelResponsable -->
