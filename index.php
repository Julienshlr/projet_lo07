<?php
session_start();
$_SESSION['login_id'] = 0;
$_SESSION['utilisateur'] = "?";
header('Location: app/router/router2.php?action=truc');

?>

