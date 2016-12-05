<section id="header" class="appear"></section>
		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
			 <div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<h1><a class="navbar-brand" href="index.php" data-0="line-height:90px;" data-300="line-height:50px;">			DLS ARENA 4
					</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"></li>
						<?php
                            $page_actuelle=explode("/",$_SERVER['PHP_SELF']);
                            $page_actuelle=array_reverse($page_actuelle);
                            $sous_dossier=$page_actuelle[1];

                            if ($sous_dossier=="member_area") //si on est dans l'espace membre
                            {
                                if ($page_actuelle[0]=="index.php") //si on est sur la page index de l'espace membre (login/inscription)
                                { ?>

                                <li style="margin-top: 25px;"><a href="../index.php">Retour à l'Accueil</a></li>

                                    <?php
                                }
                                else //si on est dans la partie admin de l'espace membre (gestion des équipes, modifier son profil...)
                                { ?>
                                    <li><a href="../index.php">Retour à l'Accueil</a></li>
                                    <li><a href="../deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a></li>

                                <?php
                                }

                            }
                            else //si on est ailleurs (pour l'instant, s'applique uniquement aux pages du dossier principal)
                            {
                                if ($page_actuelle[0]=="index.php") //si on est sur la page d'index, ce menu est affiché
                                { ?>
                                    <li><a href="#featured">Accueil</a></li>
                                    <li><a href="#section-services">Les Jeux</a></li>
                                    <li><a href="#section-about">L'Equipe</a></li>

                                <?php
                                    if (isset($_SESSION['connect']))
                                    {
                                        if($_SESSION['connect']==true) // si l'utilisateur est connecté
                                        { ?>
                                    <li><a href="member_area/index.php"> Espace Membre</a></li>
                                    <li><a href="deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a></li>
                                    <?php
                                        }
                                        else // si on a une erreur
                                        {
                                            session_destroy();
                                            header('Location: index.php');
                                            exit();
                                        }
                                    }
                                    else // si l'utilisateur est déconnecté
                                    { ?>
                                    <li><a href="member_area/index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Inscription</a></li>
                                       <?php
                                    }

                                }
                                elseif ($page_actuelle[0]=="/dls/mentions-legales.php") //menu pour les mentions légales
                                { ?>
                                    <li><a href="index.php">Retour à l'accueil</a></li>;
                                <?php
                                }
                                else //autre menu (à modifier /!\)
                                { ?>
                                    <li><a href="index.php">Accueil</a></li>;
                                <?php
                                };
                            }

                            ?>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</div>
