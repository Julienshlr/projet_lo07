
<!-- ----- début viewLogin -->
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
      <h2>Formulaire de connexion</h2>
      <form role="form" method='post' action='router2.php'>
        <input type="hidden" name='action' value='readLogin'>
        <div class="form-group">  
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
        <button class="btn btn-primary" type="submit">Se connecter</button>
      </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewLogin -->
  
  
  