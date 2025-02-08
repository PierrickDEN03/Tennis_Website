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

<title>ATopP | Noter un joueur</title>
	
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
			<li id="current"><a href="joueurs.php">Joueurs</a></li>
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
				<li><a href="joueurs.php">Retour à la liste des joueurs</a></li>
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
			
			<h2>Noter un joueur</h2>		
			
			<?php
				if(empty($_SESSION)){
					echo'<p class="post-by"><strong><a href="connexion.php">Se connecter</a> - <a href="inscription.php">Créer un compte</a></strong></p>';
				}else{
					echo'<p class="post-by"><strong>Connecté en tant que '.$_SESSION['Pseudo'].' (en tant que "'.$_SESSION['Statut'].'") - <a href="utilisateur.php?id='.$_SESSION['Id'].'">Modifier mon profil</a></strong></p>';
				}
			?>
				
            <p>
				<?php
					if(empty($_SESSION)){
						echo'Vous devz être connectés pour utiliser cette fonctionnalité.';
						echo'Cliquez <a href="connexion.php">ici </a>pour vous connecter.';
						die("");
					}
					if(empty($_GET["id"]) or empty($_GET["modif"])){
						echo'Vous vous êtes surement trompés de page. Allez sur la page <a href="joueurs.php">Joueurs</a> et cliquez sur un nom de joueur pour renseigner une note. ';
						die ("L'action demandée ne peut être faite qu'avec un nom de joueurs demandée au préalable.");
					}
					echo"Ci-dessous se trouve un bref récapitulatif du joueurs choisi : ";
					$connexion=mysqli_connect("localhost","root","");  //On affiche les caractéristiques du joueur ainsi que les tournois où il a gagné
					mysqli_select_db($connexion,"tennis");
					$req='SELECT*FROM joueur WHERE IdJoueur='.$_GET["id"].';';			//Caractéristique du joueur
					$res=mysqli_query($connexion,$req);
					$req2='SELECT IdTournoi,NomTournoi FROM tournoi WHERE tournoi.Idjoueur='.$_GET["id"].';'; 	//On récupère les tournois où le joueur a gagné
					$res2=mysqli_query($connexion,$req2);
					$enregistrement=mysqli_fetch_array($res);
					echo "<ul>";
					echo "<li>Nom du joueur : ".$enregistrement['NomJoueur']." ".$enregistrement['PrenomJoueur']."<br></li>";
					echo "<li>Nombre de points: ".$enregistrement['Points']."<br></li>";
					echo '<li>A remporté les tournois : ';
					echo '<ul>';
					if($nb=mysqli_num_rows($res2)==0){
						echo '<li>Aucun</li>';
					}else{
						while($enregistrement2=mysqli_fetch_array($res2)){
							echo'<li><a href="voir_avis.php?id='.$enregistrement2['IdTournoi'].'">'.$enregistrement2['NomTournoi'].'</a></li>';
						}
					}
					echo "</ul>";		//Affiche le fait de créer ou de modifier
					echo "</ul>";
					mysqli_close($connexion);
					echo"<p>Saisir une note : ";
					if ($_GET["modif"]=="FALSE"){
						echo"(créer)<br>";
					}else{
						echo"(modification)<br>";
					}
					echo"</p>";
				?>

				<form action="notation_joueur2.php" method="POST">			<!-- Création du formulaire -->
					<p>Veuillez indiquer une note (valeurs entières entre 0 et 100 autorisées)</p>
					<?php
					if($_GET["modif"]=="TRUE"){
						$connexion=mysqli_connect("localhost","root","");
						mysqli_select_db($connexion,"tennis");
						$req='SELECT Note FROM notation WHERE IdJoueur='.$_GET["id"].' AND IdUser='.$_SESSION['Id'].';';
						$res=mysqli_query($connexion,$req);
						$enregistrement=mysqli_fetch_array($res);
						echo '<input type="number" name="note" min="0" max="100" value="'.$enregistrement['Note'].'"/><br><br>';
					}else{
						echo'<input type="number" name="note" min="0" max="100"/><br><br>';
					}
					echo'<input type="hidden" name="IdJoueur" value="'.$_GET["id"].'"/>';
						echo'<input type="hidden" name="modif" value="'.$_GET["modif"].'"/>';
					?>
					<input type="submit" class="button" value="Envoyer"/>
					<input type="reset" class="button" value="Reinitialiser"/>	
				</form>
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
