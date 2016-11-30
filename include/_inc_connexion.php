<?php
try
{
	$cnx = new PDO('mysql:host='.$PARAM_HOTE.'dbname='.$PARAM_BDD,$PARAM_USER,$PARAM_PWD);
}
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}
?>
