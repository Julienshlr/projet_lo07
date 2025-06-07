
<!-- ----- début viewRegister -->
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
      <h2 class="text-danger">Formulaire d'inscription d'un nouvel utilisateur</h2>
      <br>
      <form role="form" method='post' action='router2.php'>
        <input type="hidden" name='action' value='readRegister'>
        <div class="form-group">
          <div class="mb-3">
            <div class="form-check">
              <label class="form-check-label" for="role_responsable">Responsable</label>
              <input class="form-check-input" type="checkbox" name="role_responsable" value="0" id="role_responsable">
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <label class="form-check-label" for="role_examinateur">Examinateur</label>
              <input class="form-check-input" type="checkbox" name="role_examinateur" value="0" id="role_examinateur">
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <label class="form-check-label" for="role_etudiant">Étudiant</label>
              <input class="form-check-input" type="checkbox" name="role_etudiant" value="0" id="role_etudiant">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="nom">Nom</label>
            <div class="input-group">
                <input class="form-control" type="text" name="nom" size="30" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="nom">Prénom</label>
            <div class="input-group">
                <input class="form-control" type="text" name="prenom" size="30" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="login">Login</label>
            <div class="input-group">
                <span class="input-group-text">👤</span>
                <input class="form-control" type="text" name="login" size="30" placeholder="Nom d'utilisateur" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="mdp">Password</label><br/>
            <div class="input-group">
                <span class="input-group-text">🔑</span>
                <input class="form-control" type="password" name="mdp" size="30" placeholder="Mot de passe" required>
            </div>
          </div>
        </div>
        <?php if (!empty($message)) { ?>
          <div class="alert alert-danger">
              <?php echo $message ?>
          </div>
        <?php } ?>
        <br/> 
        <button class="btn btn-primary" type="submit">S'inscrire</button>
        <button class="btn btn-danger" type="reset">Effacer</button>
      </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewRegister -->
  
  
  