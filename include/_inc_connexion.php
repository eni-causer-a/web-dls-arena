<?php
try
{
	$cnx = new PDO('mysql:host='.$PARAM_HOTE.';port='.$PARAM_port.';dbname='.$PARAM_BDD,$PARAM_USER,$PARAM_PWD);
}
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}
?>
