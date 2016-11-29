<?php session_start(); ?>
<html>
<head>
	<title>Aquarelle.com</title>
	<meta charset="utf-8" />
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>
<div>


	<div>
	<?php
	if ($_SESSION['connect'] == true)
		{ ?>
		<h2>Bienvenue dans l'espace administrateur. <br /><br /><br />
		N'oubliez pas de cliquer sur le lien "Déconnexion" une fois vos tâches accomplies.</h2>

		<li><a href="liste_news.php">Liste des News</a></li></br>
		<li><a href="rediger_news.php">Rediger une nouvelle news</a></li></br>
		<li><a href="liste_produits.php">Liste des Produits</a></li></br>
		<li><a href="ajouter_produits.php">Ajouter un nouveau Produit</a></li></br>
		<li><a href="login.php?action=deconnexion">Déconnexion</a></li>


		<?php }
	else
		{ ?>
		<h2>Erreur</h2>
		<p>Mot de passe incorrect (attention au majuscule/minuscule).</p>

		<?php
		include ('login.php');
		} ?>
	</div>
</div>
</body>
</html>
