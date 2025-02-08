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

<title>ATopP | Profil</title>
	
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
			
			<h2>Profil de l'utilisateur</h2>		
			
			<?php
				if(empty($_SESSION)){
					echo'<p class="post-by"><strong><a href="connexion.php">Se connecter</a> - <a href="inscription.php">Créer un compte</a></strong></p>';
				}else{
					echo'<p class="post-by"><strong>Connecté en tant que '.$_SESSION['Pseudo'].' (en tant que "'.$_SESSION['Statut'].'") - <a href="utilisateur.php?id='.$_SESSION['Id'].'">Modifier mon profil</a></strong></p>';
				}
			?>
				
            <p>
				Caractéristiques de l'utilisateur :
				<?php					//Vérification des valeurs
					if(empty($_GET["id"])){
						die("Vous n'avez pas renseigné d'utilisateur.");
					}
					$connexion=mysqli_connect("localhost","root","");
					mysqli_select_db($connexion,"tennis");
					$req='SELECT * FROM utilisateur WHERE IdUser='.$_GET["id"].';';
					$res=mysqli_query($connexion,$req);
					$enregistrement=mysqli_fetch_array($res);
					echo'<ul>';			//Récapitulatif du profil
					echo'<li>Pseudo : '.$enregistrement['Pseudo'].'</li>';
					echo'<li>Adresse mail : '.$enregistrement['Mail'].'</li>';
					echo'<li>Statut : '.$enregistrement['Statut'].'</li>';
					echo'</ul>';
					echo'<br><br>';
					$req2='SELECT COUNT(NoteAvis)AS NbAvis FROM avis WHERE IdUser='.$_GET["id"].' GROUP BY IdUser;';
					$res2=mysqli_query($connexion,$req2);
					$enregistrement2=mysqli_fetch_array($res2);
					if(empty($enregistrement2)){
						$NbAvis=0;
					}else{
						$NbAvis=$enregistrement2['NbAvis'];
					}
					$req3='SELECT COUNT(Note)AS NbNote FROM notation WHERE IdUser='.$_GET["id"].' GROUP BY IdUser;';
					$res3=mysqli_query($connexion,$req3);
					$enregistrement3=mysqli_fetch_array($res3);			//Affichage des notes de l'utilisateur
					if(empty($enregistrement3)){
						$NbNote=0;
					}else{
						$NbNote=$enregistrement3['NbNote'];
					}
					echo $enregistrement['Pseudo'].' a noté '.$NbNote.' joueur(s) et a soumis un avis à '.$NbAvis.' tournoi(s).<br><br><br>';
					if(empty($_SESSION)){
						die("Vous n'êtes pas en mesure de modifier ces informations.");
					}
					if($_SESSION['Id']==$_GET["id"]){
					?>
						<form action="utilisateur2.php" method="POST">			<!-- Les champs sont dékà affichés s'il s'agit de notre propre profil -->
							Pseudo : <input type="text" name="pseudo" value="<?php echo$enregistrement['Pseudo'];?>"/><br><br>
							Mot de passe : <input type="password" name="password" value="<?php echo$enregistrement['Password'];?>"/><br><br>
							Adresse mail : <input type="email" name="mail" size="30" value="<?php echo$enregistrement['Mail'];?>"/><br><br>
						<?php
						if($_SESSION['Statut']=="Admin"){									//Si on est admin, on peut modifier le statut
							echo"Choix du statut de l'utilisateur :  ";
							echo'<select name="statut">';
								echo'<option selected=TRUE value="1">Administrateur</option>';
								echo'<option value="2">Utilisateur</option>';
							echo"</select><br><br>";
						}
						echo'<input type="submit" class="button" value="Modifier"/>';
						echo'<input type="reset" class="button" value="Effacer"/>';
					}else{
						if($_SESSION['Statut']=="Admin"){
							echo'<form action="utilisateur2.php" method="POST">';
							echo"Choix du statut de l'utilisateur :  ";
							echo'<select name="statut">';
								echo'<option selected=TRUE value="1">Administrateur</option>';
								echo'<option value="2">Utilisateur</option>';
							echo"</select><br><br>";
							echo'<input type="submit" class="button" value="Modifier"/>';
							echo'<input type="reset" class="button" value="Effacer"/>';
						}
					}
					echo'<input type="hidden" name="id" value='.$_GET["id"].' />';
					echo'</form>';

					echo"<br>";
					if(!empty($enregistrement2)){			//On affiche tous les messages de l'utilisateur
						echo "Ci-dessous se trouve l'ensemble des avis que cet utilisateur a posté.<br><br>";
						$req4='SELECT NomTournoi,NoteAvis,Message,Photo FROM tournoi,avis WHERE tournoi.IdTournoi=avis.IdTournoi AND IdUser='.$_GET["id"].';';
						$res4=mysqli_query($connexion,$req4);
						while($enregistrement4=mysqli_fetch_array($res4)){					//On n'affiche pas le message posté par l'utilisateur, car il est affiché au tout début
							echo'<img src="photos_avis/'.$enregistrement4['Photo'].'" width="100" height="121" alt="firefox-gray"  class="float-left" />';
							echo'Nom du tournoi : '.$enregistrement4['NomTournoi'].' - '.$enregistrement4['NoteAvis'].'/5<br>';
							echo $enregistrement4['Message'].'<br><br><br><br><br><br>';
						}	
					}

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
