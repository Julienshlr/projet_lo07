
<!-- ----- debut ModelConnection -->

<?php
require_once 'Model.php';

class ModelConnection {
  private $id, $nom, $prenom, $role_responsable, $role_examinateur, $role_etudiant, $login, $password;

  public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $role_responsable = NULL, $role_examinateur = NULL, $role_etudiant = NULL, $login = NULL, $password = NULL) {
  // valeurs nulles si pas de passage de parametres
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->role_responsable = $role_responsable;
   $this->role_examinateur = $role_examinateur;
   $this->role_etudiant = $role_etudiant;
   $this->login = $login;
   $this->password = $password;
  }
  
  public function getId() {
      return $this->id;
  }

  public function getNom() {
      return $this->nom;
  }

  public function getPrenom() {
      return $this->prenom;
  }

  public function getRole_responsable() {
      return $this->role_responsable;
  }

  public function getRole_examinateur() {
      return $this->role_examinateur;
  }

  public function getRole_etudiant() {
      return $this->role_etudiant;
  }

  public function getLogin() {
      return $this->login;
  }

  public function getPassword() {
      return $this->password;
  }

  public function setId($id): void {
      $this->id = $id;
  }

  public function setNom($nom): void {
      $this->nom = $nom;
  }

  public function setPrenom($prenom): void {
      $this->prenom = $prenom;
  }

  public function setRole_responsable($role_responsable): void {
      $this->role_responsable = $role_responsable;
  }

  public function setRole_examinateur($role_examinateur): void {
      $this->role_examinateur = $role_examinateur;
  }

  public function setRole_etudiant($role_etudiant): void {
      $this->role_etudiant = $role_etudiant;
  }

  public function setLogin($login): void {
      $this->login = $login;
  }

  public function setPassword($password): void {
      $this->password = $password;
  }
  
  // Retourne une liste des id
  public static function getAllId() {
     try {
      $database = Model::getInstance();
      $query = "select id from personne";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
      return $results;
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
     }
  }
  
  // Vérifie les identifiants
  public static function verifIdentifiants($login, $mdp) {
    try {
        $database = Model::getInstance();

        // Chercher l'utilisateur par login
        $query = "select * from personne where login = :login";
        $statement = $database->prepare($query);
        $statement->execute(['login' => $login]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return ['status' => 'login_inconnu'];
        }

        // Vérification du mot de passe
        if ($result['password'] === $mdp) {
            return ['status' => 'ok', 
                    'id' => $result['id'],
                    'nom' => $result['nom'],
                    'prenom' => $result['prenom'],
                    'role_responsable' => $result['role_responsable'],
                    'role_examinateur' => $result['role_examinateur'],
                    'role_etudiant' => $result['role_etudiant']];
        } else {
            return ['status' => 'mdp_incorrect'];
        }

    } catch (PDOException $e) {
        printf("%s - %s<br>\n", $e->getCode(), $e->getMessage());
        return null;
    }
  }
  
  // Enregistre un nouvel utilisateur
  public static function register($nom, $prenom, $login, $mdp, $role_responsable, $role_examinateur, $role_etudiant) {
     try {
        $database = Model::getInstance();
        
        // Vérifier si le login existe déjà
        $query = "select id from personne where login = :login";
        $statement = $database->prepare($query);
        $statement->execute([':login' => $login]);

        if ($statement->rowCount() > 0) {
            return ['status' => 'login_existant'];
        }
        
        // recherche de la valeur de la clé = max(id) + 1
        $query = "select max(id) from personne";
        $statement = $database->query($query);
        $tuple = $statement->fetch();
        $id = $tuple['0'];
        $id++;

        // Insertion du nouvel utilisateur
        $insert = "insert into personne (id, nom, prenom, role_responsable, role_examinateur, role_etudiant, login, password)
                   values (:id, :nom, :prenom, :res, :exam, :etu, :login, :mdp)";
        $statement = $database->prepare($insert);
        $statement->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':res' => $role_responsable,
            ':exam' => $role_examinateur,
            ':etu' => $role_etudiant,
            ':login' => $login,
            ':mdp' => $mdp
        ]);

        return ['status' => 'ok'];
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
     }
  }




}
?>
<!-- ----- fin ModelConnection -->
