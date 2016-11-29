<?php
if (isset ($_GET['action'])) {
	if ( $_GET['action'] == 'inscription' ) {
		// après validation des champs

		if ($_POST['password'] != $_POST['repassword'] ) {
			echo "Mot de passe non identique";
			echo "<br />";
			echo "<a href='index.php'>Retour</a>";
		}
		else
		{

			session_start();


			// include ("menu.php");
			// connexion à la base de données
			include("../include/_inc_parametres.php");
			include("../include/_inc_connexion.php");

            $req = $PDO->prepare("INSERT INTO utilisateurs (nom, prenom; pseudo, classe, mdp, email) VALUES (:nom, :prenom, :pseudo, :classe, :mdp, :email)");
            $req_pre->bindValue(':nom', $_POST['nom'] , PDO::PARAM_STR);
            $req_pre->bindValue(':prenom', $_POST['prenom'] , PDO::PARAM_STR);
            $req_pre->bindValue(':pseudo', $_POST['pseudo'] , PDO::PARAM_STR);
            $req_pre->bindValue(':classe', $_POST['classe'] , PDO::PARAM_STR);
            $req_pre->bindValue(':mdp', sha1($_POST['password']) , PDO::PARAM_STR);
            $req_pre->bindValue(':email', $_POST['email'] , PDO::PARAM_STR);

            $req_pre->execute();

			$_SESSION['connect'] = $mdp == sha1($_POST['password']);
			$_SESSION['id'] = $_POST['ident'];

			?>
    <html>

    <head>
        <meta http-equiv="refresh" content="0 ; url=accueil.php">
    </head>

    <body>





	<form method="post" target="page" action="login.php?action=connexion">
		<table>
			<tr>
				<td>Nom :</td>
				<td><input type="text" name='nom' /></td>
			</tr>
			<tr>
				<td>Prénom :</td>
				<td><input type="text" name='prenom' /></td>
			</tr>
			<tr>
				<td>Pseudo :</td>
				<td><input type="text" name='pseudo' /></td>
			</tr>
			<tr>
				<td>Classe :</td>
				<td><select name="classe">
                      <option value="SIO1">SIO1</option>
                      <option value="SIO2">SIO2</option>
                      <option value="ASS1">ASS1</option>
                      <option value="ASS2">ASS2</option>
                      <option value="MUC1">MUC1</option>
                      <option value="MUC2">MUC2</option>
                      <option value="DCG1">DCG1</option>
                      <option value="DCG2">DCG2</option>
                      <option value="DCG3">DCG3</option>
                      <option value="NRC1">NRC1</option>
                      <option value="NRC2">NRC2</option>

                </select></td>
			</tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" name='email' /></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td><input type="password" name='password' /></td>
            </tr>
            <tr>
                <td>Confirmation Mot de passe : </td>
                <td><input type="password" name='repassword' /></td>
            </tr>

			<tr>
				<td></td>
				<td><input type="submit" value="Valider"/></td>
			</tr>
		</table>
	</form>
	 </body>
</html>
