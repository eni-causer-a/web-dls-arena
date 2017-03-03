<?php

if (isset ($_GET['action'])) {
	if ( $_GET['action'] == 'creation' ) {
		// après validation des champs
        session_start();

			// include ("menu.php");
			// connexion à la base de données
			include("../include/_inc_parametres.php");
			include("../include/_inc_connexion.php");

            $req_pre = $cnx->prepare("INSERT INTO InscriptionEquipe(idJoueur) VALUES (:pseudo)");
            $req_pre->bindValue(':pseudo', $_SESSION['pseudo'] , PDO::PARAM_STR);

            $req_pre->execute();
            $req_pre->closeCursor();

            $req_pre = $cnx->prepare("INSERT INTO equipes(nomEquipe, mdp, jeuInscrit) VALUES (:nomEquipe, :mdp, :jeu)");
            $req_pre->bindValue(':nomEquipe', $_POST['nomE'] , PDO::PARAM_STR);
            $req_pre->bindValue(':jeu', $_POST['jeu'] , PDO::PARAM_STR);
            $req_pre->bindValue(':mdp', sha1($_POST['password']) , PDO::PARAM_STR);

            $req_pre->execute();

            $_SESSION['err_ins'] = "Création réussie, connectez vous !";
            $req_pre->closeCursor();
            ?>
            <meta http-equiv="refresh" content="0 ; url=index.php">


    <?php

    }
}
    else{

			?>
        <form method="post" target="page" action="create.php?action=creation">
            <table >
                <tr>
                    <td>Nom de l'équipe :</td>
                    <td>
                        <input type="text" name='nomE' required style="margin-top: 5px;"/>
                    </td>
                </tr>

                <tr>
                    <td>Jeu :</td>
                    <td>
                        <select name="jeu" style="margin-top: 5px;">
                            <option value="League of legend">League of legend</option>
                            <option value="League of legend">Counter strike Global Offensive</option>
                            <option value="FIFA 17">FIFA 17</option>
                            <option value="Battlerite">Battlerite</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mot de passe : </td>
                    <td>
                        <input type="password" name='password' required style="margin-top: 5px;" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Valider" required style="margin-top: 5px;"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
    }

?>
