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

		<section class="featured">
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
							<p>
							Évènement sur une journée, consacré aux jeux vidéo et au monde vidéoludique,
							            organisé le Samedi 25 Mars 2017 de 9h à 17h30 (heure provisoire?)
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

						  <ul><li><img src="./img/csgologo.jpg"/></li>
                              <br/>
						  <li><p>Counter-Strike: Global Offensive est un jeu de tir à la première personne multijoueur en ligne basé sur le jeu d'équipe.</p></li>
                            <li>Nombre de joueurs par équipe: 1</li>
                            <li>Nombre d'équipes maximum: 5/32 </li> <!--//mettre en dynamique -->
                            <li>L'arbre du tournoi</li> <!-- //Bouton -->
                            <li>Inscription</li> <!-- //Bouton -->
                        </ul>

					</div>
				</div>

				<div class="col-lg-6" >
					<div class="align-center">
                        <ul><li><img src="img/battleriteLogo.png" /></li>
                            <br/>
                            <li><p>BATTLERITE est un jeu de combat par équipe dans une arène ce jouant à deux contre deux.</p></li>
                            <li>Nombre de joueurs par équipe: 2</li>
                            <li>Nombre d'équipes maximum: 2/16 </li> <!--mettre en dynamique -->
                            <li>L'arbre du tournoi</li>
                            <li>Inscription</li>
                        </ul>

					</div>
				</div>


			</div>
			<div class="row mar-bot40">
				<div class="col-lg-6" >
					<div class="align-center">
						  <ul><li><img src="./img/FifaLogo.jpg"/></li>
                              <br/>
						  <li><p>FIFA est un jeux de football</p></li>
                            <li></li>
                            <li></li> <!--//mettre en dynamique -->
                            <li></li> <!-- //Bouton -->
                            <li></li> <!-- //Bouton -->
                        </ul>
					</div>
				</div>

				<div class="col-lg-6" >
					<div class="align-center">
						  <ul><li><img src="./img/league-of-legends-logo.jpg"/></li>
                              <br/>
						  <li><p></p></li>
                            <li></li>
                            <li></li> <!--//mettre en dynamique -->
                            <li></li> <!-- //Bouton -->
                            <li></li> <!-- //Bouton -->
                        </ul>
					</div>
				</div>


			</div>

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
