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

                            if ($page_actuelle[0]=="index.php") //si on est sur la page d'index, ce menu est affiché
                            { ?>
                            <li><a href="#featured">Accueil</a></li>
                            <li><a href="#section-services">Les Jeux</a></li>
						    <li><a href="#section-about">L'Equipe</a></li>
                            <li><a href="#section-Login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                            <?php
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
                            ?>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</div>
