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

<title>ATopP | Voir les avis</title>
	
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
			
			<h2>Récapitulatif</h2>		
			
			<?php
				if(empty($_SESSION)){
					echo'<p class="post-by"><strong><a href="connexion.php">Se connecter</a> - <a href="inscription.php">Créer un compte</a></strong></p>';
				}else{
					echo'<p class="post-by"><strong>Connecté en tant que '.$_SESSION['Pseudo'].' (en tant que "'.$_SESSION['Statut'].'") - <a href="utilisateur.php?id='.$_SESSION['Id'].'">Modifier mon profil</a></strong></p>';
				}
			?>
				
            <p>
				<?php
					if(empty($_GET["id"]) && empty($_GET["modif"])){    //On vérifie su l'id du tournoi a été envoyé
						echo "On dirait que vous vous êtes trompés de page. Cette page permet de voir les avis pour un tournoi en particulier. Or vous n'avez pas choisi de tournoi.";
						echo 'Cliquez sur le lien pour voir la liste des tournois disponible : <a href="tournois.php">voir la liste des tournois</a>';
						die("");
					}
					if(!empty($_GET["id"]) && empty($_GET["modif"])){	//cela veut dire qu'il vient de la page notation_joueur
						$connexion=mysqli_connect("localhost","root","");	//on doit vérifier s'il a déjà un avis
						mysqli_select_db($connexion,"tennis");
						if(!empty($_SESSION)){
							$req='SELECT * FROM avis WHERE IdUser='.$_SESSION['Id'].' AND IdTournoi='.$_GET["id"].';';
							$res=mysqli_query($connexion,$req);
							if($nb=mysqli_num_rows($res)==0){
								$modif="FALSE";
							}else{
								$modif="TRUE";
							}
						}else{
							$modif="FALSE";
						}
						mysqli_close($connexion);
					}else{		//le champ modif a déjà été renseigné
						$modif=$_GET["modif"];
					}
					$connexion=mysqli_connect("localhost","root","");  //On affiche les caractéristiques du tournoi
					mysqli_select_db($connexion,"tennis");
					$req='SELECT  NomTournoi,DateTournoi,TypeSurface,NomCategorie,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND tournoi.IdTournoi='.$_GET["id"].';';
					$res=mysqli_query($connexion,$req);
					$enregistrement=mysqli_fetch_array($res);
					echo "Ci-dessous se trouve un bref récapitulatif concernant les informations du tournoi choisi : <br>";
					echo "<ul>";
					echo "<li>Nom du tournoi : ".$enregistrement['NomTournoi']."<br></li>";
					echo "<li>Date du tournoi : ".$enregistrement['DateTournoi']."<br></li>";
					echo "<li>Catégorie du tournoi : ".$enregistrement['NomCategorie']."<br></li>";
					echo "<li>Type de surface : ".$enregistrement['TypeSurface']."<br></li>";
					echo '<li>Vainqueur : <a href="joueur.php">'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</a><br></li>';
					echo "</ul>";
					mysqli_close($connexion);
					echo "Ci-dessous se trouve l'ensemble des avis portant sur ce tournoi."
				?>
            </p>

						
			<a name="SampleTags"></a>
			<h2>Voir les avis</h2>
				<?php			//Pas besoin de refaire les vérifications pour $_GET
					echo "<p>";
					$idTournoi=$_GET["id"];   //Id du tournoi     $_GET["modif"] renvoie l'information comme quoi l'utilisateur a déjà envoyé un avis ou non sur le tournoi
					$connexion=mysqli_connect("localhost","root","");  //On affiche les caractéristiques du tournoi
					mysqli_select_db($connexion,"tennis");
					//On créé cette requête pour connaitre le nombre d'avis et la moyenne globale
					$req='SELECT *,COUNT(Message)AS NbAvis, AVG(NoteAvis) AS Moyenne FROM avis WHERE IdTournoi='.$idTournoi.' GROUP BY IdTournoi;';
					$res=mysqli_query($connexion,$req);
					$enregistrement=mysqli_fetch_array($res);
					if(empty($enregistrement['NbAvis'])){                      //Voir le nombre d'avis
						echo"Ce tournoi ne comporte pas encore d'avis. Soyez le premier à poster !<br>";
						echo'Pour poster un avis, cliquer sur le lien : <a href="mettre_avis.php?id='.$idTournoi.'&modif=FALSE">Poster un avis</a>';
					}else{													//Si le nombre d'avis !=0
						echo"Ce tournoi comporte ".$enregistrement['NbAvis']." avis et la moyenne générale est de ".$enregistrement['Moyenne']."/5.<br><br>";
						if(!empty($_SESSION) && $modif=="FALSE"){			//On lui met le lien pour créer un avis
							echo'Cliquer sur le lien pour poster un avis : <a href="mettre_avis.php?id='.$idTournoi.'&modif=FALSE">Poster un avis</a>.<br><br>';
						}	
					}

					if(!empty($_SESSION) && $modif=="TRUE"){                       //S'il a déjà mis un avis, on affiche le sien en premier
						$req2='SELECT *,COUNT(NoteAvis)AS NbAvis, AVG(NoteAvis) AS Moyenne FROM utilisateur,avis WHERE utilisateur.IdUser=avis.IdUser AND IdTournoi='.$idTournoi.' AND avis.IdUser='.$_SESSION['Id'].' GROUP BY IdTournoi;';
						$res2=mysqli_query($connexion,$req2);
						$enregistrement2=mysqli_fetch_array($res2);
						echo'<img src="photos_avis/'.$enregistrement2['Photo'].'" width="100" height="121" alt="firefox-gray"  class="float-left" />';
						echo'<a href="utilisateur.php?id='.$_SESSION['Id'].'">'.$enregistrement2['Pseudo'].' (Vous)</a> - '.$enregistrement2['NoteAvis'].'/5<br>';
						echo $enregistrement2['Message'].'<br>';
						echo '<a href="mettre_avis.php?id='.$idTournoi.'&message='.$enregistrement2['Message'].'&modif=TRUE">Modifier votre avis</a> - <a href="supprimer_avis.php?modif=TRUE&idT='.$idTournoi.'&idU='.$_SESSION['Id'].'">Supprimer</a><br><br><br><br><br>';
					}

									//On ne raffiche pas son avis car il est déjà affiché en premier
																					//Autrement dit, s'il a déjà posté, on affiche tous les autres avis sauf le sien
					$req3='SELECT utilisateur.IdUser,Pseudo,NoteAvis,Message,Photo FROM utilisateur,avis WHERE utilisateur.IdUser=avis.IdUser AND IdTournoi='.$idTournoi.';';
					$res3=mysqli_query($connexion,$req3);
					while($enregistrement3=mysqli_fetch_array($res3)){
						$idUser=$enregistrement3['IdUser'];
						if(!empty($_SESSION) && $modif=="TRUE"){
							if($idUser!=$_SESSION['Id']){					//On n'affiche pas le message posté par l'utilisateur, car il est affiché au tout début
								echo'<img src="photos_avis/'.$enregistrement3['Photo'].'" width="100" height="121" alt="firefox-gray"  class="float-left" />';
								echo'<a href="utilisateur.php?id='.$idUser.'">'.$enregistrement3['Pseudo'].'</a> - '.$enregistrement3['NoteAvis'].'/5<br>';
								echo $enregistrement3['Message'].'<br>';
								if (!empty($_SESSION) && $_SESSION['Statut']=="Admin"){				//L'admin peut supprimer un message
									echo '<a href="supprimer_avis.php?modif=TRUE&id='.$idTournoi.'">Supprimer</a>';
								}
								echo '<br><br><br><br><br>';	
							}
						}else{												//On affiche tous les messages
							echo'<img src="photos_avis/'.$enregistrement3['Photo'].'" width="100" height="121" alt="firefox-gray"  class="float-left" />';
							echo'<a href="utilisateur.php?id='.$idUser.'">'.$enregistrement3['Pseudo'].'</a> - '.$enregistrement3['NoteAvis'].'/5<br>';
							echo $enregistrement3['Message'].'<br>';
							if (!empty($_SESSION) && $_SESSION['Statut']=="Admin"){				//L'admin peut supprimer un message
								echo '<a href="supprimer_avis.php?modif=TRUE&idT='.$idTournoi.'&idU='.$_SESSION['Id'].'">Supprimer</a>';
							}
							echo '<br><br><br><br><br>';	
						}	
					}
					mysqli_close($connexion);
					echo "</p>";
				?>						
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
