<?php require_once dirname(__FILE__)."/lib/session.php";



//previent les attaques de fixations de sessions
session_regenerate_id(true);
//supprime les données du serveur
session_destroy();

//supprime la session de la memoire PHP
unset($_SESSION);



header("location:/frontEnd/connexion.php");


?>