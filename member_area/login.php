<?php
if (isset ($_GET['action'])) {
	if ( $_GET['action'] == 'connexion' ) {
		// après validation de identifiant et du mot de passe

		if ($_POST['ident'] == '' OR $_POST['password'] == '') {
			echo "Merci de bien renseigner l'ensemble des champs";
			echo "<br />";
			echo "<a href='index.php'>Retour</a>";
		}
		else
		{
			// démarrage de la session et sauvegarde des informations dans 2 variables
			session_start();
			// affichage du menu
			// include ("menu.php");
			// connexion à la base de données
			include("../include/_inc_parametres.php");
			include("../include/_inc_connexion.php");

			// préparation de la requête : recherche de l'utilisateur
			$req_pre = $cnx->prepare("SELECT mdp FROM utilisateurs WHERE ident = :id");
			// liaison de la variable à la requête préparée
			$req_pre->bindValue(':id', $_POST['ident'] , PDO::PARAM_STR);
			$req_pre->execute();
			//le résultat est récupéré sous forme d'objet
			$ligne=$req_pre->fetch(PDO::FETCH_OBJ);
			// récupération du mot de passe
			$mdp = $ligne->mdp;

			// fermeture du curseur associé à un jeu de résultats
			$req_pre->closeCursor();

			$_SESSION['connect'] = $mdp == sha1($_POST['password']);
			$_SESSION['id'] = $_POST['ident'];

			?>
			<html>
			<head>
				<meta http-equiv="refresh" content="0 ; url=accueil.php">
			</head>
			<body>
			</body>
			</html>
			<?php
		}
	}

	elseif ( $_GET['action'] == 'deconnexion' )	{
		// après avoir cliqué sur le bouton Déconnexion de la page accueil.php
		// retour à la page du début du site
		?>
		<html>
		<head>
			<meta http-equiv="refresh" content="0 ; url=../index.php" target="page">
		</head>
		<body>
		</body>
		</html>
		<?php
	}
}
else
{
	?>
	<form method="post" target="page" action="login.php?action=connexion">
		<table>
			<tr>
				<td width="200px">Identifiant :</td>
				<td><input type="text" name="ident" style="margin-top: 5px;" /></td>
			</tr>
			<tr>
				<td>Mot de passe :</td>
				<td><input type="password" name="password" style="margin-top: 5px;" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Connexion" style="margin-top: 5px;" /></td>
			</tr>
		</table>
	</form>
	<?php
}
?>
