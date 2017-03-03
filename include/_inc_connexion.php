<?php
try
{
	$cnx = $bdd = new PDO('mysql:host=localhost;dbname=dlsarenadls', 'root', '');
}
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}
?>
