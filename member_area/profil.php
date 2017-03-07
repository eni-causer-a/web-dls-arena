<?php
    session_start();
    include("../include/_inc_parametres.php");
    include("../include/_inc_connexion.php");
    if (isset ($_GET['action'])) {
	if ( $_GET['action'] == 'modification' ) {
		// après validation des champs

            $req_pre = $cnx->prepare("UPDATE utilisateurs SET nom = ':nom', prenom= ':prenom', pseudo= ':pseudo', classe= ':classe', email= ':email' WHERE pseudo = ':pseudoB'");
            $req_pre->bindValue(':nom', $_POST['nom'] , PDO::PARAM_STR);
               $req_pre->bindValue(':prenom', $_POST['prenom'] , PDO::PARAM_STR);
            $req_pre->bindValue(':pseudo', $_POST['pseudo'] , PDO::PARAM_STR);
            $req_pre->bindValue(':pseudoB', $_SESSION['pseudo'] , PDO::PARAM_STR);
            $req_pre->bindValue(':classe', $_POST['classe'] , PDO::PARAM_STR);
            $req_pre->bindValue(':email', $_POST['email'] , PDO::PARAM_STR);

            $req_pre->execute();

            $_SESSION['err_ins'] = "Modification effectué";
            $req_pre->closeCursor();
            ?>
            <!--<meta http-equiv="refresh" content="0 ; url=index.php"> -->


    <?php
        }
    }

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
    <?php include("../navbar.php"); ?>
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
            <section id="section-services" class="section pad-bot30 bg-white">
		<div class="container" style="height:100%">

			<div class="row mar-bot40" style="background-color:#dcdcdc;padding:50px;margin:50px;border-radius:32px;">

		<?php

            // préparation de la requête : recherche de l'utilisateur
			$req_pre = $cnx->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
			// liaison de la variable à la requête préparée
			$req_pre->bindValue(':pseudo', $_SESSION['pseudo'] , PDO::PARAM_STR);
			$req_pre->execute();
			//le résultat est récupéré sous forme d'objet
			$getinfo =$req_pre->fetch(PDO::FETCH_OBJ);
			// récupération du mot de passe
			$test = $getinfo->nom;
            $req_pre->closeCursor();






        ?>

        <form method="post" target="page" action="profil.php?action=modification">
            <table>
                <tr>
                    <td>Nom :</td>
                    <td>
                        <input type="text" name='nom' required style="margin-top: 5px;" value="<?php echo $getinfo->nom; ?>" pattern=".{2,}"/>
                    </td>
                </tr>
                <tr>
                    <td>Prénom :</td>
                    <td>
                        <input type="text" name='prenom' required style="margin-top: 5px;" value="<?php echo $getinfo->prenom; ?>" pattern=".{2,}" />
                    </td>
                </tr>
                <tr>
                    <td>Pseudo :</td>
                    <td>
                        <input type="text" name='pseudo' required style="margin-top: 5px;" value="<?php echo $getinfo->pseudo; ?>" pattern=".{2,}" />
                    </td>
                </tr>
                <tr>
                    <td>Classe :</td>
                    <td>
                        <select name="classe" style="margin-top: 5px;">
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td>
                        <input type="email" name='email' required style="margin-top: 5px;" value="<?php echo $getinfo->email; ?>" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" required style="margin-top: 5px;"/>
                    </td>
                </tr>
            </table>
        </form>



			</div>
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
