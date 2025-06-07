
<!-- ----- debut config -->
<?php

// Si jamais on insère un lien direct sans passer par index alors la session
// peut ne pas être lancé donc au cas où
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

// ===============
// Configuration de la base de données sur dev-isi
$dsn = 'mysql:dbname=schielej;host=localhost;charset=utf8';
$username = 'schielej';
$password = '43UAbVZv';

if (!defined('LOCAL')) {
    define('LOCAL', FALSE);
}

if (LOCAL) {
    // Configuration de la base de données sur localhost
    $dsn = 'mysql:dbname=PROJET;host=localhost;charset=utf8';
    $username = 'root';
    $password = 'root';
}
 
// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

<!-- ----- fin config -->



