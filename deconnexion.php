<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />		

<link rel="stylesheet" href="images/NewHorizon.css" type="text/css" />
<link rel="icon" href="images/logo_balle_tennis.jpg">

<title>ATopP | Se déconnecter</title>
	
</head>

<body>

	<!-- navigation starts here -->
	<div id="nav">
		
		<ul>
		<li> <a href="index.php">Accueil</a></li>
			<li id="current"><a href="connexion.php">Se connecter</a></li>
			<li><a href="joueurs.php">Joueurs</a></li>
			<li><a href="tournois.php">Tournois</a></li>		
		</ul>
	
	</div>

	<!-- header starts here -->
	<div id="header">	
	
		<div id="clouds"></div>
		
		<h1 id="logo-text"><a href="index.php" title="">ATopP</a></h1>	
		<p id="slogan">Explorez, Notez, Soyez au Top de l'action tennistique !</p>					
	
	</div>	
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">	 
	
		<div id="sidebar" >	
		
		<h3>A regarder</h3>			
			<ul class="sidemenu">
				<li><a href="joueurs.php">Liste des joueurs</a></li>
				<li><a href="tournois.php">Liste des tournois</a></li> 
				<li><a href="index.php">Retour à l'accueil</a></li>  
			</ul>	
				
				
			<h3>Comprendre le tennis</h3>
			<ul class="sidemenu">
			<li><a href="https://fr.wikipedia.org/wiki/Tennis">En savoir plus sur le tennis</a></li>
					<li><a href="https://fr.wikipedia.org/wiki/Surfaces_de_jeu_au_tennis">Les surfaces au tennis</a></li>
					<li><a href="https://www.lequipe.fr/Tennis/atp/epreuve-simple-messieurs/page-classement-individuel/general">Le classement masculin actuel</a></li>
					<li><a href="https://conseilsport.decathlon.fr/les-regles-de-base-du-tennis">Apprendre les règles</a></li>		
			</ul>
				
			<h3>Présentation</h3>
			<p>&quot;Le top des sites de tennis, le top des joueurs au niveau mondial, le top quoi !&quot;</p>		
			
			<p class="align-right">- Aymeric Massaria, Pierrick Dennemont</p>		
		
			<h3>Infos complémentaires</h3>			
			<p>Ce site a été réalisé dans le cadre de l'enseignement Base de Données 3, de <a href="https://www.univ-lyon2.fr/">l'Université Lumière Lyon 2</a>. Celui-ci, comme il le montre bien, a été créé sur le thème du tennis, une passion pour certains membres du binôme.
			</p>	
		
		</div>	
	
		<div id="main">		
				
			<a name="TemplateInfo"></a>				
			
			<h2>Deconnexion</h2>		
				
            <p>
				<?php
					if(empty($_SESSION['Id'])){
						echo ("Ah, vous vous êtes trompés de page. Il s'agit de la page pour se déconnecter, or vous n'êtes pas encore connectés. Dommage !<br>");
						echo ('Néanmoins, vous pouvez toujours visiter notre site en cliquant <a href="index.php">ici</a>.');
					}else{
						$_SESSION=array();
						session_destroy();
						echo("Vous vous êtes déconnectés. <br>");
						echo ('Pour revenir au menu, cliquez <a href="index.php">ici</a>.');
					}
				?>
            </p>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>

	<!-- footer starts here-->	
	<div id="footer-wrap">
	
		<!-- columns starts here-->		
		<div id="columns">
	
		<div class="col3">
				<h3>A propos de nous</h3>
				<ul>
					<li><a href="https://www.univ-lyon2.fr/">Pierrick Dennemont : pierrick.dennemont@univ-lyon2.fr</a></li>
					<li><a href="https://www.univ-lyon2.fr/">Aymeric Massaria : aymeric.massaria@univ-lyon2.fr</a></li>
					<li><a href="https://www.univ-lyon2.fr/">Université Lumière Lyon 2</a></li>
					<li><a href="https://www.univ-lyon2.fr/">Licence 3 MIASHS</a></li>
				</ul>
			</div>
			<div class="col3-center">
				<h3>Nos inspirations</h3>
				<ul>
					<li><a href="https://live-tennis.eu/fr/classement-atp-live">Classement de l'ATP</a></li>
					<li><a href="">Tennis masculin</a></li>
					<li><a href="">Année 2023-2024</li>
					<li><a href="https://fr.wikipedia.org/wiki/Tennis">En savoir plus sur le tennis</a></li>
				</ul>
			</div>
			<div class="col3">
				<h3>Plus d'infos</h3>
				<ul>
					<li><a href="https://fr.wikipedia.org/wiki/Tennis">En savoir plus sur le tennis</a></li>
					<li><a href="https://fr.wikipedia.org/wiki/Surfaces_de_jeu_au_tennis">Les surfaces au tennis</a></li>
					<li><a href="https://www.lequipe.fr/Tennis/atp/epreuve-simple-messieurs/page-classement-individuel/general">Le classement masculin actuel</a></li>
					<li><a href="https://conseilsport.decathlon.fr/les-regles-de-base-du-tennis">Apprendre les règles</a></li>				
				</ul>
			</div>
		
		<!-- columns ends -->
		</div>	
	
		<div id="footer-bottom">		
			<p>
			&copy; 2023 <strong>ATopP Compagny</strong>

         &nbsp;&nbsp;&nbsp;&nbsp;

			Design by us

			&nbsp;&nbsp;&nbsp;&nbsp;
			
			<a href="index.php">Home</a> |
            <a href="http://validator.w3.org/check?uri=referer">XHTML</a> |
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
			</p>		
		</div>	

</body>
</html>
