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
    <?php include("../navbar.php"); ?>
        <section class="featured" id="featured">
            <div class="container">
                <!-- Titre DLS -->
                <div class="row mar-bot40">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="align-center"> <i class="fa fa-gamepad fa-5x mar-bot20"></i>
                            <h2 class="slogan">DLS ARENA 4</h2>
                            <br/> </div>
                    </div>
                </div>
            </div>
        </section>

        <body>
            <?php
    if (isset($_SESSION['connect'])) // on vérifie si la session connect existe
    {
        if ( $_SESSION['connect'] == true ) // si l'utilisateur est confirmé, on affiche l'espace membre.
        {
            header('Location: accueil.php');
            exit();
        }
        else // si on arrive ici, il y a une erreur donc on détruit sa session et on le redirige vers l'index.
        {
            session_destroy();
            header('Location: index.php');
            exit();
        }
    }
    else //si l'utilisateur n'est pas connecté, on affiche la page login/inscription
    { ?>
                <section id="section-services" class="section pad-bot30 bg-white">
                    <div class="container">
                        <div class="row mar-bot40">
                            <!-- Login -->
                            <div class="col-lg-6">
                                <div class="align-center">



                                            <h3 style="margin-top:50px;">Vous pourrez vous connectez dès que les modalités des tournois seront fixées.
                                            <br><br> Inscrivez vous dès maintenants pour recevoir un email dès l'ouverture de l'inscription aux tournois.</h3>

                                         <img src="../img/fleche.png"></img>



                                    <!--<?//php include ('login.php'); ?>
                           <p><a href="sessiontest.php">Simuler une connexion</a></p>-->
                                </div>
                            </div>
                            <!-- Inscription -->
                            <div class="col-lg-6">
                                <div class="align-center">
                                    <h2>Inscription</h2>
                                    <?php include ('register.php');
                            if(isset($_SESSION['err_ins'])){
                                echo '<p>'.$_SESSION['err_ins'].'</p>' ;
                            }

                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php include("../footer.php"); ?>
                    <?php
    }



    ?>

       <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

	<script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/bootstrap.min.js"></script>

	<script src="../js/jquery.isotope.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="../js/skrollr.min.js"></script>
	<script src="../js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="../js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="../js/stellar.js"></script>
	<script src="../js/jquery.appear.js"></script>
	<script src="../js/validate.js"></script>
    <script src="../js/main.js"></script>

        </body>

    </html>
