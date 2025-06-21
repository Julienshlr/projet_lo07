
<!-- ----- début viewProposition1 -->
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
    <h2>Innovation originale : Système de notifications d'activité récente</h2>

    <p>
      Afin d’améliorer l'expérience utilisateur, nous avons intégré un système de notifications qui affiche, à chaque utilisateur, 
      un historique de ses actions importantes réalisées sur la plateforme. Par exemple :
    </p>

    <ul>
      <li>Un étudiant est notifié qu'il a un nouveau rendez-vous sur un projet, à une horaire et avec un examinateur précis.</li>
      <li>Un examinateur est notifié après avoir proposé un nouveau créneau.</li>
      <li>Un responsable est notifié lorsqu’il ajoute un nouveau projet.</li>
    </ul>

    <p>
      Ces messages sont enregistrés dans une table <code>log</code> et sont affichés directement sur la page d’accueil, dans un encart
      prévu à cet effet. Cela permet à l'utilisateur de garder une trace visible de ses dernières actions sans avoir besoin de naviguer
      dans plusieurs menus.
    </p>

    <h4>Implémentation technique</h4>
    <p>
      Lors de chaque action importante (prise de rendez-vous, ajout de projet, ajout de créneau…), une fonction <code>insertLog()</code>
      est appelée. Elle insère un message dans la base de données, accompagné de la date et de l'identifiant de l'utilisateur.
    </p>

    <pre><code>
        $message = "2025-06-21 17:50:49 — Vous avez réservé un rendez-vous pour le projet <strong>XYZ</strong>";
        ModelConnection::insertLog($message);
    </code></pre>

    <p>
      Ces messages sont ensuite récupérés et affichés dynamiquement dans une section de la page d'accueil, classés par date, pour
      chaque utilisateur connecté.
    </p>

    <h4>Pourquoi c’est original ?</h4>
    <p>
      Ce système de notification n’est pas demandé dans le cahier des charges, mais il apporte une vraie valeur ajoutée :
    </p>
    <ul>
      <li>Il améliore la transparence des actions réalisées.</li>
      <li>Il donne une dimension plus interactive à l’application.</li>
      <li>Il est très simple à maintenir et à étendre pour d'autres types d'événements à l’avenir.</li>
    </ul>
  </div>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewProposition1 -->
  
  
  