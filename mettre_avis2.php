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

<title>ATopP | Emettre un avis</title>
	
</head>

<body>

	<!-- navigation starts here -->
	<div id="nav">
		
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<?php
				if(empty($_SESSION)){
					echo '<li><a href="connexion.php">Se connecter</a></li>';
				}else{
					echo '<li><a href="deconnexion.php">Se déconnecter</a></li>';
				}
			?>
			<li><a href="joueurs.php">Joueurs</a></li>
			<li id="current"><a href="tournois.php">Tournois</a></li>		
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
				<li><a href="tournois.php">Retour à la liste des tournois</a></li>
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
			
			<h2>Confirmation</h2>		
			
			<?php
				if(empty($_SESSION)){
					echo'<p class="post-by"><strong><a href="connexion.php">Se connecter</a> - <a href="inscription.php">Créer un compte</a></strong></p>';
				}else{
					echo'<p class="post-by"><strong>Connecté en tant que '.$_SESSION['Pseudo'].' (en tant que "'.$_SESSION['Statut'].'") - <a href="utilisateur.php?id='.$_SESSION['Id'].'">Modifier mon profil</a></strong></p>';
				}
			?>
				
            <p>
				<?php
					if(empty($_POST)){
						echo'Vous ne vous trouvez pas sur la bonne page. Pour émettre un avis sur un tournoi, veuillez vous rendre sur la page <a href="tournois.php">Tournois</a>.<br>';
						die("");
					}
					if(empty($_SESSION)){
						echo'Vous devez être connecté pour pouvoir bénéficier de cette fonctionnalité. Cliquez <a href="connexion.php">ici</a> pour vous connecter.<br>';
						die("");
					}
					if(empty($_POST["text"])){                       //On vérifie si le texte n'est pas vide
						die ("Saisir un texte est obligatoire afin de justifier le choix de note !");
					}
					
					//On vérifie le transfert de la photo 
					 if($_FILES['nom_du_fichier']['error']) {
						echo'Veuillez choisir une photo. ';
						die("Erreur lors du transfert de l'image !");
					}
					      	
					// Transfert de l'image dans le r�pertoire photos_avis/
					if (isset($_FILES['nom_du_fichier']['name']) && $_FILES['nom_du_fichier']['error'] == UPLOAD_ERR_OK) {
						$chemin_destination = 'photos_avis/';
						move_uploaded_file($_FILES['nom_du_fichier']['tmp_name'], $chemin_destination.$_FILES['nom_du_fichier']['name']);
					}
					
					$connexion=mysqli_connect("localhost", "root", "") ;
					mysqli_select_db($connexion,"tennis");
					//Requête pour voir si l'avis existe déjà
					$reqConf='SELECT * FROM avis WHERE IdTournoi='.$_POST["idTournoi"].' AND IdUser='.$_SESSION['Id'].';';
					$resConf=mysqli_query($connexion,$reqConf);
					$nb=mysqli_num_rows($resConf);

					if($_POST["modif"]=="FALSE"){               //S'il ne modifie pas son avis alors il en créé un
						if ($nb!=0){
							die("L'avis que vous essayer de poster est déjà en ligne !");
						}	
						$req='INSERT INTO avis (IdTournoi,IdUser,NoteAvis,Message,Photo)VALUES('.$_POST["idTournoi"].','.$_SESSION['Id'].','.$_POST["note"].',"'.$_POST["text"].'","'.$_FILES['nom_du_fichier']['name'].'");';
						$res=mysqli_query($connexion,$req);
						echo"Votre avis a bien été pris en compte. <br>";
						echo '<a href="index.php">Retour au menu</a>';
					}else{										//On modifie
						if($nb==0){
							die("Cet avis n'existe pas et donc ne peut pas être modifié.");
						}
						$req='UPDATE avis SET Message="'.$_POST["text"].'", NoteAvis='.$_POST["note"].', Photo="'.$_FILES['nom_du_fichier']['name'].'" WHERE IdUser='.$_SESSION['Id'].' AND IdTournoi='.$_POST["idTournoi"].';';
						$res=mysqli_query($connexion,$req);
						echo"Votre modification a bien été prise en compte. <br>";
						echo '<a href="index.php">Retour au menu</a>';
					}
					
					echo'Pour accéder aux autres fonctionnalités, vous pouvre retourner au menu en cliquant sur le menu ou directement <a href="index.php">ici</a>';
					mysqli_close($connexion);
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
