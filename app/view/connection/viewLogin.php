
<!-- ----- début viewLogin -->
<?php

require ($root . '/app/view/fragment/fragmentProjetHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentProjetMenu.html';
      include $root . '/app/view/fragment/fragmentProjetJumbotron.html';
      ?>
      
      <form role="form" method='post' action='router2.php'>
        <div class="form-group">      
          <label class='w-25' for="login">Login</label><input type="text" name="login" size="30" value="Nom d'utilisateur"> <br/>                          
          <label class='w-25' for="mdp">Password</label><input type="password" name="mdp" size="30" value="Mot de passe">     
        </div>
        <br/> 
        <button class="btn btn-primary" type="submit">Se connecter</button>
      </form>

    
  </div>
  <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>

  <!-- ----- fin viewLogin -->
  
  
  