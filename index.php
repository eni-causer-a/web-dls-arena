<?php
session_start();
$erreur = "";
if (isset ($_GET['action'])) {
if ( $_GET['action'] == 'sendidee' ) {
		// après validation des champs

		if ($_POST['idee'] == '') {

			$erreur = "Erreur: Champs vide";
		}
		else
		{
            if(isset($_SERVER['REMOTE_ADDR'])){$adr_ip=$_SERVER['REMOTE_ADDR'];}
            else{$adr_ip="Erreur";}
			// connexion à la base de données
			include("./include/_inc_parametres.php");
			include("./include/_inc_connexion.php");

            $req_pre = $cnx->prepare("INSERT INTO propositions (contenu, adr_ip) VALUES (:idee, :adr_ip)");
            $req_pre->bindValue(':idee', $_POST['idee'] , PDO::PARAM_STR);
            $req_pre->bindValue(':adr_ip',$adr_ip,PDO::PARAM_STR);

            $erreur = "Message envoyé";
            $req_pre->execute();
        }
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
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/style.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
        <link rel="stylesheet" href="./compiled/flipclock.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="./compiled/flipclock.js"></script>
		<script src="js/jquery.countdown.js"></script>

    </head>

    <body>

        <?php include('navbar.php'); ?>

		<section class="featured" id="featured">
			<div class="container">
				<div class="row mar-bot40">
					<div class="col-md-6 col-md-offset-3">

						<div class="align-center">
							<i class="fa fa-gamepad fa-5x mar-bot20"></i>
							<h2 class="slogan">DLS ARENA 4</h2>
							<br/>
							<div style="background-color:white; border-radius:16px;">
							    <h2 class="slogan" style="color:#70B9B0; padding:5px;"><div id="getting-started"></div></h2>

                                <script type="text/javascript">
                                  $("#getting-started")
                                  .countdown("2017/03/25 09:00", function(event) {
                                    $(this).text(
                                      event.strftime('%Dj %Hh %Mm %Ss')
                                    );
                                  });
                                </script>
                                </div>
							<br/>
							<p style="font-weight: 300;font-size:20px;">
							Évènement sur une journée, consacré aux jeux vidéo et au monde vidéoludique,
							            organisé le Samedi 25 Mars 2017 de 9h à 17h30
							</p>
						</div>

					</div>
				</div>
			</div>
		</section>

		<!-- services -->



		<section id="section-services" class="section pad-bot30 bg-white">
		<div class="container">

			<div class="row mar-bot40">
				<div class="col-lg-6" >
					<div class="align-center">
				            <img src="./img/csgologo.jpg" height="65px"/>
                            <br/>
				            <p>Counter-Strike: Global Offensive est un jeu de tir à la première personne multijoueur en ligne basé sur le jeu d'équipe.</p>
                            Nombre de joueurs par équipe: 1<br/>

                            <br/>
                        <button class="btn" disabled="disabled">Arbre du tournoi</button> <!-- //Bouton -->
                        <button class="btn" disabled="disabled">Inscription</button> <!-- //Bouton -->

                        <br/>
                        <br/>
					</div>
				</div>

				<div class="col-lg-6" >
					<div class="align-center">
                            <img src="img/battleriteLogo.png" height="65px"/>
                            <br/>
                            <p>BATTLERITE est un jeu de combat par équipe dans une arène ce jouant à deux contre deux.</p>
                            Nombre de joueurs par équipe: 2<br/>

                            <br/>
                        <button class="btn" disabled="disabled">Arbre du tournoi</button> <!-- //Bouton -->
                        <button class="btn" disabled="disabled">Inscription</button> <!-- //Bouton -->

                        <br/>
                        <br/>
                    </div>
				</div>


			</div>
			<div class="row mar-bot40">
				<div class="col-lg-6" >
					<div class="align-center">
                            <img src="./img/FifaLogo.jpg" height="65px"/>
                            <br/>
                            <p>FIFA est un jeu de simulation de football édité par Electronic Arts</p>
                            Nombre de joueurs par équipe: 1<br/>

                            <br/>
                            <br/>
                        <button class="btn" disabled="disabled">Arbre du tournoi</button> <!-- //Bouton -->
                        <button class="btn" disabled="disabled">Inscription</button> <!-- //Bouton -->

                        <br/>
                        <br/>
					</div>
				</div>

				<div class="col-lg-6" >
					<div class="align-center">
                            <img src="./img/league-of-legends-logo.jpg" height="65px"/>
                            <br/>
                            <p>League of Legends est un MOBA.
                            Le jeu se décompose en sessions, avec deux équipes qui s'affrontent par le biais de champions</p>
                            Nombre de joueurs par équipe: 5<br/>

                            <br/>
                        <button class="btn" disabled="disabled">Arbre du tournoi</button> <!-- //Bouton -->
                        <button class="btn" disabled="disabled">Inscription</button> <!-- //Bouton -->

                        <br/>
                        <br/>
					</div>
				</div>


			</div>

                <form method="post" target="page" action="?action=sendidee#section-services">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Boite à idées :</legend>

                    <!-- Appended Input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="appendedtext">Propositions :</label>
                        <div class="col-md-4">
                            <div class="input-group">
                               <table>
                                <td><input size="500"name="idee" class="form-control" placeholder="Jeux, idées" type="text"></td>
                                <td><input style="margin-left: 20px;" type="submit" value="Envoyer"/></td>
                                <?php echo '<p>'.$erreur.'</p>' ; ?>
                                </table>
                            </div>
                            <br/>
                        </div>
                    </div>
                </fieldset>
            </form>


		</div>
		</section>

		<!-- spacer section:testimonial -->


		<!-- about -->
		<section id="section-about" class="section appear clearfix">
		<div class="container">

				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
                            <h2 class="section-heading animated" data-animation="bounceInUp">Notre Equipe</h2>
							<p>Equipe du projet de la DLS ARENA</p>
						</div>
					</div>
				</div>

					<div class="row align-center mar-bot40">
						<div class="col-md-4">
							<div class="team-member">
								<figure class="member-photo"><img src="img/team/member1.jpg" alt="" height="200px"/></figure>
								<div class="team-detail">
									<h4>Arthur.H</h4>
									<span>Assistant chef de projet</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="team-member">
								<figure class="member-photo"><img src="img/team/memberSamuel.jpg" alt="" height="200px"/></figure>
								<div class="team-detail">
									<h4>Samuel.B</h4>
									<span>Chef de projet général</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="team-member">
								<figure class="member-photo"><img src="img/team/member-amaury.png" alt="" height="200px"/></figure>
								<div class="team-detail">
								<h4>Amaury.C</h4>
									<span>Chef de projet web</span>
								</div>
							</div>
						</div>

					</div>

					<div class="row align-center mar-bot40">
						<div class="col-md-4">
							<div class="team-member">
								<figure class="member-photo"><img src="img/team/member-flobius.png" alt="" height="200px"/></figure>
								<div class="team-detail">
									<h4>Florian.D</h4>
									<span>Développeur front-end</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="team-member">
								<figure class="member-photo"><img src="img/team/member-mathieu.png" alt="" height="200px"/></figure>
								<div class="team-detail">
									<h4>Mathieu.L</h4>
									<span>Administrateur de bases de données</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="team-member">
								<figure class="member-photo"><img src="img/team/member-killian.jpg" alt="" height="200px"/></figure>
								<div class="team-detail">
								<h4>Killian.L</h4>
									<span>Développeur back-end</span>
								</div>
							</div>
						</div>

					</div>


		</div>
		</section>
		<!-- /about -->

        <?php include('footer.php'); ?>
	<section id ="clock">


	<script type="text/javascript">
			var clock;

			$(document).ready(function() {

				// Grab the current date
				var currentDate = new Date();

				// Set some date in the past. In this case, it's always been since Jan 1
				var pastDate  = new Date(currentDate.getFullYear(), 0, 1);

				// Calculate the difference in seconds between the future and current date
				var diff = currentDate.getTime() / 1000 - pastDate.getTime() / 1000;

				// Instantiate a coutdown FlipClock
				clock = $('.clock').FlipClock(diff, {
					clockFace: 'DailyCounter'
				});
			});
		</script>

</section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/skrollr.min.js"></script>
	<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/validate.js"></script>
    <script src="js/main.js"></script>

	</body>
</html>
