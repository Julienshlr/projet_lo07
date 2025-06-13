<?php
$loginId = $_SESSION['login_id'] ?? 0;
$user = $_SESSION['utilisateur'] ?? "?";
$role_responsable = $_SESSION['role_responsable'] ?? 0;
$role_examinateur = $_SESSION['role_examinateur'] ?? 0;
$role_etudiant = $_SESSION['role_etudiant'] ?? 0;
$login = $_SESSION['login'] ?? "?";
?>

<!-- ----- début fragmentProjetMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router2.php?action=ProjetAccueil">SCHIELER - PERROUX | <?php echo $user ?> |</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <?php if ($role_responsable === 1) { ?>
        <!-- Menu Responsable -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Responsable</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=readAllProjects">Liste de mes projets</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Ajout d'un projet</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=">Liste des examinateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Ajout d'un examinateur</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Liste des examinateurs d'un projet</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=">Planning d'un projet</a></li>
          </ul>
        </li>
        <?php } ?>
        
        <?php if ($role_examinateur === 1) { ?>
        <!-- Menu Examinateur -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Examinateur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=">Liste des projets</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Liste complète de mes créneaux</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Liste de mes créneaux pour un projet</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Ajouter un créneau à un projet</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Ajouter des créneaux consécutifs</a></li>
          </ul>
        </li>
        <?php } ?>
        
        <?php if ($role_etudiant === 1) { ?>
        <!-- Menu Etudiant -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Etudiant</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=readAllRDV">Liste de mes RDV</a></li>
              <li><a class="dropdown-item" href="router2.php?action=readCreneauDispo">Prendre un RDV pour un projet</a></li>
          </ul>
        </li>
        <?php } ?>
        
        <!-- Menu Innovations -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router2.php?action=">Proposez une amélioriation du code MVC</a></li>
          </ul>
        </li>
        
        <!-- Menu Se connecter -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo ($loginId != 0) ? 'Profil' : 'Se connecter'; ?></a>
          <ul class="dropdown-menu">
            <?php if ($loginId != 0){ ?>
                <li class="dropdown-item-text">ID : <?php echo $loginId ?></li>
                <li class="dropdown-item-text">👤 <?php echo $login ?></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="router2.php?action=logout">Deconnexion</a></li>
            <?php } 
            else { ?>
            <li><a class="dropdown-item" href="router2.php?action=login">Login</a></li>
            <li><a class="dropdown-item" href="router2.php?action=register">S'inscrire</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentProjetMenu -->

