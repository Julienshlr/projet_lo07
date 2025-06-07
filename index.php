<?php
session_start();

// Ne réinitialise que si aucune session active
if (!isset($_SESSION['login_id'])) {
    $_SESSION['login_id'] = 0;
    $_SESSION['utilisateur'] = "?";
}
header('Location: app/router/router2.php?action=truc');
exit();
?>

