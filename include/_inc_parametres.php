<?php
// ce fichier est destiné à être inclus dans les pages PHP qui ont besoin de se connecter à une base de données
// 2 possibilités pour inclure ce fichier :
//     include_once ('_inc_parametres.php');
//     require_once ('_inc_parametres.php');

// connexion de l'application cliente au SGBD MySQL
$PARAM_HOTE = "sql.amaury-causer.com";		// nom du serveur de données
$PARAM_port = '10009';
$PARAM_USER = "wvhhcw_dlsarena";		// nom de l'utilisateur
$PARAM_PWD  = "arenadls";				// son mot de passe
$PARAM_BDD  = "wvhhcw_dlsarena";		// nom de la base de données
?>
