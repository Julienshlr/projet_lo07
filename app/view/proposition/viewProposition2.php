
<!-- ----- début viewProposition2 -->
<?php

require ($root . '/app/view/fragment/fragmentProjetHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentProjetMenu.php';
      include $root . '/app/view/fragment/fragmentProjetJumbotron.html';
      ?>
  </div>
      
    
  <div class="container mt-3 p-5">
    <h2>Innovation : Amélioration de l’architecture MVC</h2>

    <p>
      Dans notre projet, nous avons proposé une amélioration de l’architecture MVC en introduisant un contrôleur parent générique :
      <code>ControllerConnection</code>. Ce contrôleur centralise les fonctions communes à tous les rôles (étudiant, examinateur, responsable).
    </p>

    <p>
      Les autres contrôleurs, comme <code>ControllerEtudiant</code>, <code>ControllerResponsable</code> et <code>ControllerExaminateur</code>,
      héritent de ce contrôleur de base. Cela nous permet d’<strong>éviter la duplication de code</strong> et de
      <strong>centraliser la logique partagée</strong>, comme la gestion des logs, la connection, l'inscription ou l’accès aux données utilisateur.
    </p>

    <h4>Implémentation</h4>
    <p>Exemple simplifié :</p>

    <pre><code>
// ControllerConnection.php
class ControllerConnection {
  public static function enregistrerLog($message) {
    ModelConnection::insertLog($message);
  }
}

// ControllerEtudiant.php
class ControllerEtudiant extends ControllerConnection {
  public static function prendreRdv() {
    // Traitement de la fonction...
    self::enregistrerLog("Vous avez pris un rendez-vous.");
  }
}
    </code></pre>

    <h4>Avantages</h4>
    <ul>
      <li>Lisibilité accrue : les contrôleurs métier ne contiennent que la logique métier.</li>
      <li>Réutilisabilité : une fonction comme <code>enregistrerLog()</code> est disponible partout.</li>
      <li>Modularité : on peut facilement étendre <code>ControllerConnection</code> pour gérer d’autres éléments communs (authentification, permissions, etc.).</li>
    </ul>

    <h4>Conclusion</h4>
    <p>
      Cette amélioration respecte parfaitement les principes du modèle MVC tout en rendant le code plus propre, plus maintenable,
      et prêt à accueillir d'autres rôles ou fonctionnalités sans alourdir la logique de chaque contrôleur individuel.
    </p>
  </div>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewProposition2 -->
  
  
  