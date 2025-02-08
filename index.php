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


<title>ATopP | Menu</title>
	
</head>

<body>

	<!-- navigation starts here -->
	<div id="nav">
		
		<ul>
			<li id="current"><a href="index.php">Accueil</a></li>
			<?php
				if(empty($_SESSION)){
					echo '<li><a href="connexion.php">Se connecter</a></li>';
				}else{
					echo '<li><a href="deconnexion.php">Se déconnecter</a></li>';
				}
			?>
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
			
			<h2>Présentation</h2>		
			
			<?php
				if(empty($_SESSION)){
					echo'<p class="post-by"><strong><a href="connexion.php">Se connecter</a> - <a href="inscription.php">Créer un compte</a></strong></p>';
				}else{
					echo'<p class="post-by"><strong>Connecté en tant que '.$_SESSION['Pseudo'].' (en tant que "'.$_SESSION['Statut'].'") - <a href="utilisateur.php?id='.$_SESSION['Id'].'">Modifier mon profil</a></strong></p>';
				}
			?>
			
				
            <p>Bienvenue sur notre site :<strong> ATopP</strong> ! Celui-ci a été développé par deux étudiants issu de l'université Lumière Lyon 2. Les créateurs 
			ne sont autres qu'<strong>Aymeric Massaria</strong> et de <strong>Pierrick Dennemont</strong>. Notre site permet àce jour de se rendre compte du Top 100 mondial, en terme de tennis masculin, 
			sur l'année 2023-2024. Le palamrès de chacun entre d'eux est dispoible sur ATopP. De plus, l'ensemble des tournois officiels est consultable sur notre site web, conprenant 
			l'ensemble des catégories des tournois. Pour découvrir l'ensemble des fonctionnalités disponible, veuillez consultez la rubrique juste en-dessous de celle-ci.
            </p>

				
			<p class="post-footer align-right">					
			<span class="date">Date de création : Décembre 2023</span>	
			</p>
						
			<a name="SampleTags"></a>
			<h2>Liste des fonctionnalités</h2>
							
			<h3>Créer un profil</h3>				
			<p>
				En effet, et comme tout autre site de partage, il est disponible de se créer un profil pour notre site. Les utilisateurs sont anonymes, car l'usage d'un pseudo est
				obligatoire. En créant votre compte, votre statut sera automatiquement défini comme "Utilisateur". Néanmoins, les administrateurs du site (nous-mêmes) sommes en mesure de 
				modifier votre statut si cela semble nécessaire. Vos informations personnelles peuvent être modifiables à tout moment.<br>
				Cela étant dit vous pouvez vous connecter (ou vous inscrire) en cliquant sur le lien suivant - <a href="connexion.php">Se connecter</a>.
			</p>
		
			
			<h3>Noter un joueur</h3>			
			<p>
				Chaque utilisateur est en mesure, s'il est connecté, de renseigner une note de popularité pour chaque joueur ici du Top 100 mondial. Cependant, chaque note saisi, même si celle-ci 
				reste modifiable, ne peut pas être supprimé, alors faites attention lorsque vous donnez votre avis sur un joueur. Chaque joueur pourra être nôté avec une note allant de 0 à 100, afin d'en tirer 
				un classement se basant sur la popularité. L'ensemble des notes des autres utilisateurs ne pourra pas être consultés. <strong>Pour bénéficier de cette fonctionnalité, cliquez </strong><a href="joueurs.php">ici</a>.
			</p>
		
			<h3>Emettre un avis sur un tournoi</h3>
			<p>
				La dernière fonctionnalité disponible consiste à émettre un avis sur un ou plusieurs des tournois renseignés. Celle-ci comporte une note allant de 1 à 5 étoiles, d'un message pour expliquer votre choix,
				ainsi que d'une photo, en lien avec votre avis, ou votre ressenti sur ce tournoi. Attention : tous ces renseignements sont obligatoires si vous voulez que votre avis soit pris en compte ! Tout autre avis est consultable
				directement sur notre plateforme. Pour accéder à cette fonctionnalité, <strong>rendez-vous</strong> sur la liste des tournois par le menu ou en cliquant <a href="tournois.php">ici</a>.
			</p>
				
			<p>
				Cela étant dit, c'est à votre tour ! Partagez, soyer créatif !							
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
	
	<!-- footer ends-->		
	</div>

</body>
</html>
