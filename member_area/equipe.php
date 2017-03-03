<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>DLS ARENA 4</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
		<link rel="stylesheet" href="../js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.css">
        <link rel="stylesheet" href="../css/style.css">
		<!-- skin -->
		<link rel="stylesheet" href="../skin/default.css">
        <link rel="stylesheet" href="../compiled/flipclock.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../compiled/flipclock.js"></script>
		<script src="../js/jquery.countdown.js"></script>

</head>
    <?php include("../navbar.php");
          include("../include/_inc_parametres.php");
          include("../include/_inc_connexion.php");?>

    <section class="featured" id="featured">
			<div class="container">
			    <!-- Titre DLS -->
				<div class="row mar-bot40">
					<div class="col-md-6 col-md-offset-3">

						<div class="align-center">
							<i class="fa fa-gamepad fa-5x mar-bot20"></i>
							<h2 class="slogan">ESPACE MEMBRE</h2>
							<br/>
						</div>
					</div>
				</div>
			</div>
		</section>
<body>
<?php
    if (isset($_SESSION['connect'])) // on re-vérifie si l'utilisateur est connecté, même procédé que la page précédente.
    {
        if ( $_SESSION['connect'] == true ) // si l'utilisateur est confirmé, on affiche l'espace membre.
        { ?>

        <?php
         //on vérifie si l'utilisateur a une équipe
			$req_pre = $cnx->prepare("SELECT * FROM inscriptionequipe, utilisateurs WHERE utilisateurs.pseudo=:pseudo AND idJoueur=utilisateurs.id");
			// liaison de la variable à la requête préparée
			$req_pre->bindValue(':pseudo', $_SESSION['pseudo'] , PDO::PARAM_STR);
			$req_pre->execute();
			//le résultat est récupéré sous forme d'objet
			$ligne=$req_pre->fetch(PDO::FETCH_OBJ);
			// récupération du résultat
            if(empty($ligne)){$equipe=false;}
            else
            {
                $equipe=true;
                if ($ligne->chef==1)
                {$chef=true;}
                else
                {$chef=false;}
            }

			// fermeture du curseur associé à un jeu de résultats
			$req_pre->closeCursor();
        ?>
            <section id="section-services" class="section pad-bot30 bg-white">
		<div class="container" style="height:100%">
        <?php
            if($equipe==true)
            {
                //Si le membre est chef d'équipe
                if($chef==true)
                {

                }
                //Si le membre est simple membre d'équipe
                else
                {

                }
            }
            //Si le membre n'a pas d'équipe
            else
            { ?>
            <div class="row mar-bot40"> <!-- Début div "Pas d'équipe" -->
				<div class="col-lg-6" > <!-- Créer une équipe -->
					<div class="align-center">
                            <h2>Créer une équipe</h2>
                            <?php
                            if(isset($_GET['action'])) //On arrive ici quand un formulaire a été rempli
                            {
                                if($_GET['action']=='creer') //Si c'est le formulaire de création
                                {
                                    if(!empty($_POST['nom']) && !empty($_POST['jeu']) && !empty($_POST['motdepasse']) )
                                    {
                                        $req_pre = $cnx->prepare("SELECT * FROM equipes WHERE nomEquipe = :nom");
                                        $req_pre->bindValue(':nom', $_POST['nom'] , PDO::PARAM_STR);
                                        $req_pre->execute();
                                        $ligne=$req_pre->fetch(PDO::FETCH_OBJ);
                                        // récupération du résultat
                                        if(!empty($ligne))
                                        {
                                            echo'Une équipe portant ce nom existe déjà';
                                        }
                                        else{
                                            $req_pre2 = $cnx->prepare("INSERT INTO equipes VALUES ('',:nom,:mdp,:jeu)");
                                            $req_pre2->bindValue(':nom', $_POST['nom'] , PDO::PARAM_STR);
                                            $req_pre2->bindValue(':mdp', $_POST['motdepasse'] , PDO::PARAM_STR);
                                            $req_pre2->bindValue(':jeu', $_POST['jeu'] , PDO::PARAM_STR);
                                            $req_pre2->execute();

                                            $req_preID = $cnx->prepare("SELECT id FROM equipes WHERE nomEquipe = :nom");
                                            $req_preID->bindValue(':nom', $_POST['nom'] , PDO::PARAM_STR);
                                            $req_preID->execute();
                                            $ligne=$req_preID->fetch(PDO::FETCH_OBJ);

                                            $idEquipe=$ligne->id;

                                            $req_pre3 = $cnx->prepare("INSERT INTO inscriptionequipe VALUES (:equipe,:joueur,1)");
                                            $req_pre3->bindValue(':equipe', $idEquipe , PDO::PARAM_STR);
                                            $req_pre3->bindValue(':joueur', $_SESSION['id'] , PDO::PARAM_STR);
                                            $req_pre3->execute();

                                            echo'Equipe créée !';
                                        }
                                    }
                                    else
                                    {
                                        echo'Merci de remplir tous les champs.';
                                    }
                                }
                                if($_GET['action']=='rejoindre') //Si c'est le formulaire pour rejoindre
                                {
                                    if(!empty($_POST['equipe']) && !empty($_POST['motdepasse']) )
                                    {
                                        $req_pre = $cnx->prepare("SELECT * FROM equipes WHERE id = :equipe");
                                        $req_pre->bindValue(':equipe', $_POST['equipe'] , PDO::PARAM_STR);
                                        $req_pre->execute();
                                        $ligne=$req_pre->fetch(PDO::FETCH_OBJ);
                                        // récupération du résultat
                                        if(empty($ligne))
                                        {
                                            echo'Cette équipe n\'existe pas' .$_POST['equipe'];
                                        }
                                        else{

                                            if ($ligne->mdp==$_POST['motdepasse'])
                                            {
                                                $req_pre2 = $cnx->prepare("INSERT INTO inscriptionequipe VALUES (:equipe,:joueur,0)");
                                                $req_pre2->bindValue(':equipe', $_POST['equipe'] , PDO::PARAM_STR);
                                                $req_pre2->bindValue(':joueur', $_SESSION['id'] , PDO::PARAM_STR);
                                                $req_pre2->execute();

                                                echo'Félicitations, vous avez rejoint l\'équipe !';
                                            }
                                            else
                                            {
                                                echo'Mot de passe erroné.';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo'Merci de remplir tous les champs.';
                                    }
                                }
                                //Le message s'affiche quoi qu'il arrive
                                echo"<br/>Vous allez être redirigé vers l'espace membre dans cinq secondes.
                                <br/>Si votre navigateur ne gère pas la redirection automatique (ou que vous êtes pressé.e) <a href='equipe.php'>vous pouvez cliquer sur ce lien </a>";
                                header('refresh:5;equipe.php');
                                exit();
                            }
                            else //Si aucun formulaire n'a pas été rempli, on arrive sur les formulaires
                            { ?>
                               <form method="post" target="page" action="equipe.php?action=creer">
                                <table style="margin: 0 auto;">
                                    <tr>
                                        <td>Nom :</td>
                                        <td>
                                            <input type="text" name='nom' required style="margin-top: 5px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jeu :</td>
                                        <td>
                                            <select name="jeu" style="margin-top: 5px;">
                                               <?php
                                                $req = $cnx->query("SELECT * FROM jeux");
                                                // liaison de la variable à la requête préparée
                                                $req->setFetchMode(PDO::FETCH_OBJ);
                                                //le résultat est récupéré sous forme d'objet
                                                $ligne=$req->fetch();
                                                while($ligne)
                                                {
                                                    echo'<option value="'.$ligne->id.'">'.$ligne->nomJeu.'</option>';
                                                    $ligne=$req->fetch();
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mot de passe :</td>
                                        <td>
                                            <input type="text" name='motdepasse' required style="margin-top: 5px;"/>
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
					</div>
				</div> <!-- FIN Créer une équipe -->

				<div class="col-lg-6" >  <!-- Rejoindre une équipe -->
					<div class="align-center">
                            <h2>Rejoindre une équipe</h2>
                            <form method="post" target="page" action="equipe.php?action=rejoindre">
                                <table style="margin: 0 auto;">
                                    <tr>
                                        <td>Equipe :</td>
                                        <td>
                                            <select name="equipe" style="margin-top: 5px;">
                                               <?php
                                                $req = $cnx->query("SELECT equipes.id idEquipe, nomEquipe, nomJeu FROM equipes, jeux WHERE jeuInscrit = jeux.id");
                                                // liaison de la variable à la requête préparée
                                                $req->setFetchMode(PDO::FETCH_OBJ);
                                                //le résultat est récupéré sous forme d'objet
                                                $ligne=$req->fetch();
                                                while($ligne)
                                                {
                                                    echo'<option value="' . $ligne->idEquipe . '">' . $ligne->nomEquipe . ' - ' . $ligne->nomJeu . '</option>';
                                                    $ligne=$req->fetch();
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mot de passe :</td>
                                        <td>
                                            <input type="text" name='motdepasse' required style="margin-top: 5px;"/>
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
					</div>
                </div> <!-- FIN Rejoindre une équipe -->
                            <?php
                            }
                            ?>


			</div> <!-- Fin div "Pas d'équipe" -->
            <?php
            }
            ?>
        </div>
    </section>
    <?php include("../footer.php"); ?>
       <?php
        }
        else // si on arrive ici, il y a une erreur donc on détruit sa session et on le redirige vers l'index.
        {
            session_destroy();
            header('Location: index.php');
            exit();
        }
    }
    else //si l'utilisateur n'est pas connecté, on le redirige vers la page login/inscription
    {
        session_destroy();
            header('Location: index.php');
            exit();
    }
    ?>

</body>
</html>
