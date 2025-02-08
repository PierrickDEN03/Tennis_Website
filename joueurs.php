<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php         //Ce qui marche plus : mots clés et choix=4 avec session vide
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

<title>ATopP | Joueurs</title>
	
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
			<h3>Recherche par critères</h3>
			<p>Veuillez saisir un critère de tri à la fois.</p>
				<!-- *****************************Formulaire pour rechercher par mots clés ***************************** -->	
			<form action="joueurs.php" method="POST">
				<h4>Rechercher par mots clés</h4>
				<p>
					<input name="search" class="textbox" type="search" size="14"/>
					<input class="button" value="Rechercher" type="submit" />
				</p>			
			<!-- </form> -->
				
				<h4>Options de tri par joueurs</h4>
				<p>
					Veuillez indiquez la manière de trier les joueurs :
				</p>	<!-- ****************************** Liste déroulante pour trier les joueurs ************************** -->
				<!-- <form action="joueurs.php" method="POST">        -->
					<select name="choix">
						<option selected=TRUE value="1"> </option>
						<option value="2">Nom de joueurs</option>
						<option value="3">Total de points</option>
						<option value="4">Note moyenne</option>
						<option value="5">Nombre d'avis</option>
					</select> 
					<input class="button" value="Rechercher" type="submit" /><br>
					<p>
						Par défaut, la recherche se fera par mots clés si plusieurs critères sont renseignés.
					</p>
			</form>		
			<!-- <ul class="sidemenu">
				<li><a href="index.html">Home</a></li>
				<li><a href="#TemplateInfo">TemplateInfo</a></li>
				<li><a href="#SampleTags">Sample Tags</a></li>
				<li><a href="http://www.styleshout.com/">More Templates</a> </li>   
			</ul>	 -->
				
				
			<h3>Critères en fonction du type de surface</h3>
			<ul class="sidemenu">
				<p>
					Le niveau d'un joueur de tennis dépend aussi de la surface pratiquée. En effet, leur pourcenatge de victoire varie d'une surface à une autre.
					Cliquez sur les liens ci-dessous pour trier les joueurs en fonction du pourcentage de victoire selon la surface choisie. 
				</p>
				<li><a href="joueurs.php?id=1">Gazon</a></li>
				<li><a href="joueurs.php?id=2">Terre battue</a></li>
				<li><a href="joueurs.php?id=3">Dur</a></li>
				<li><a href="joueurs.php?id=4">Indoor</a></li>
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
			
			<h2>Liste des joueurs</h2>		
			
			<?php
				if(empty($_SESSION)){
					echo'<p class="post-by"><strong><a href="connexion.php">Se connecter</a> - <a href="inscription.php">Créer un compte</a></strong></p>';
				}else{
					echo'<p class="post-by"><strong>Connecté en tant que '.$_SESSION['Pseudo'].' (en tant que "'.$_SESSION['Statut'].'") - <a href="utilisateur.php?id='.$_SESSION['Id'].'">Modifier mon profil</a></strong></p>';
				}
			?>
				
            <p>
				Vous vous trouvez actuellement sur la page ressouçant l'ensemble des joueurs masculins issus du Top 100 mondial. Comme expliqué dans la page d'accueil, chaque utilisateur
				est en mesure de noter les joueurs avec une note sur 100. <strong>Cependant, il y a deux conditions à respecter.</strong> La première est d'être connecté pour pouvoir noter un joueur. La
				deuxième est qu'il est impossible de supprimer une note, une fois celle-ci crééer : elle est modifiable mais non supprimable ! Une note se compose d'un nombre compris entre 1 et 100 et se base 
				sur la popularité que vous portez sur les joueurs. Pour faire une recherche ou trier les joueurs présents, veuillez utiliser la rubrique sur le côté droit de la page. <strong>Attention</strong>, veuillez-vous référer aux instructions !<br><br>
				<!-- *****************************  Premier tableau de joueur ************************************* -->
				<?php
					$connexion=mysqli_connect("localhost","root","");
					mysqli_select_db($connexion,"tennis");
					if (empty($_POST["choix"]) or $_POST["choix"]==1){      //On aurait bien voulu faire un switch mais ca ne marche pas
						$req='SELECT *FROM joueur;';						//Sans tri
					}else{
						//********************************************Requete en fonction des critères de recherche*************************** */
				    	if ($_POST["choix"]==2 && empty($_POST["search"])){								//En fonction des noms
							$req='SELECT *FROM joueur ORDER BY NomJoueur,PrenomJoueur ASC;';
							echo'Trier par : noms de joueurs';
						}
						if ($_POST["choix"]==3 && empty($_POST["search"])){								//En fonction des points
							$req='SELECT *FROM joueur ORDER BY Points DESC;';	
							echo'Trier par : nombre de points';							
						}
						if ($_POST["choix"]==4 && empty($_POST["search"])){								//En fonction de la note moyenne
							$req='SELECT *FROM joueur,notation WHERE joueur.IdJoueur=notation.IdJoueur GROUP BY joueur.IdJoueur ORDER BY Avg(Note) DESC;';
							echo'Trier par : Avis général (décroissant)';
						}
						if ($_POST["choix"]==5 && empty($_POST["search"])){								//En fonction du nombre d'avis 
							$req='SELECT *FROM joueur,notation WHERE joueur.IdJoueur=notation.IdJoueur GROUP BY joueur.IdJoueur ORDER BY COUNT(Note) DESC;';
							echo"Trier par : nombre d'avis (décroissant)";
						}
					}                              
					if (!empty($_POST["search"])){                  //Recherche par mots clés
						$req='SELECT *FROM joueur WHERE NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%";';
						echo 'Recherche par mot(s) clé(s) : "'.$_POST["search"].'"';
					}
					if (!empty($_GET)){                              //En fonction du type de surface
						$req='SELECT joueur.IdJoueur,NomJoueur,PrenomJoueur,Points,PourcentageVictoire,TypeSurface FROM joueur,pratique,surface WHERE joueur.idJoueur=pratique.IdJoueur AND pratique.IdSurface=surface.IdSurface AND surface.IdSurface='.$_GET["id"].';';
						if($_GET["id"]==1){
							echo 'Critères en fonction de la surface : Gazon';	
						}
						if($_GET["id"]==2){
							echo 'Critères en fonction de la surface : Terre battue';	
						}
						if($_GET["id"]==3){
							echo 'Critères en fonction de la surface : Dur';	
						}
						if($_GET["id"]==4){
							echo 'Critères en fonction de la surface : Indoor';	
						}
					}
					//********************************************Fin des requetes en fonction des critères de recherche*************************** */



					if (!empty($_SESSION)){
						// ********************************************* Affiche les joueurs déjà noté si la session n'est pas vide ou affiche tous les joueurs *******************************
						echo "<p>Ci-dessous se trouve la liste des joueurs auquel vous avez déjà soumis une note. Cliquez sur un nom de joueur pour modifier votre note.</p>";                                        //Si l'utilisateur est connecté, les liens pour modifier ou créer une note s'affichent
					}else{
						echo "<p>Ci-dessous se trouve l'intégralité des joueurs de la base ainsi que leurs caractéristiques :</p>";
					}
					$res=mysqli_query($connexion,$req);
					echo '<table>';
					if(empty($_GET)){                          //Si $_Get est vide, alors on n'a pas besoin d'afficher le pourcentage de victoire
						echo" <tr><th>Joueurs</th><th>Nombre de points</th><th>Nombre d'avis</th><th>Note moyenne</th></tr>";
					}else{
						echo" <tr><th>Joueurs</th><th>Nombre de points</th><th>Nombre d'avis</th><th>Note moyenne</th><th>Pourcentage de Victoire</th></tr>";
					}
					while($enregistrement=mysqli_fetch_array($res)){
					$id=$enregistrement['IdJoueur'];
					$req2='SELECT IdJoueur, AVG(Note) AS Moyenne, COUNT(Note) AS NbNotes FROM notation WHERE IdJoueur='.$enregistrement['IdJoueur'].' GROUP BY IdJoueur;';
					$res2=mysqli_query($connexion,$req2);
					$enregistrement2=mysqli_fetch_array($res2);
					if(!empty($_SESSION)){ 						//Si la session n'est pas vide -> affiche les joueurs notés par l'utilisateur  
						$req3='SELECT * FROM notation WHERE IdJoueur='.$id.' AND IdUser ='.$_SESSION['Id'].';';
						$res3=mysqli_query($connexion,$req3);
						$enregistrement3=mysqli_fetch_array($res3);
						if($nb=mysqli_num_rows($res3)!=0){
							echo '<tr><td><a href="notation_joueur.php?id='.$id.'&modif=TRUE">'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</a>';
							echo '<td>'.$enregistrement['Points'].'</td>';
							if (empty($enregistrement2['NbNotes'])){     //Sinon les liens ne s'affichent pas
								echo'<td>_</td>';						//Par défaut si un joueur ne possède aucun avis, alors on affichera 0
								echo'<td>_</td>';
							}else{
								echo '<td>'.$enregistrement2['NbNotes'].'</td>';
								echo '<td>'.$enregistrement2['Moyenne'].'</td>';
							}
							if(!empty($_GET)){                              //On affiche le pourcentage de victoire
								echo '<td>'.$enregistrement['PourcentageVictoire'].'%</td>';
							}
						}
						echo '</td>';
					}else{                     //Si la session est vide
						echo '<tr><td>'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'<br><br></td>';
						echo '<td>'.$enregistrement['Points'].'</td>';
						if (empty($enregistrement2['NbNotes'])){
							echo'<td>_</td>';
							echo'<td>_</td>';
						}else{
							echo '<td>'.$enregistrement2['NbNotes'].'</td>';
							echo '<td>'.$enregistrement2['Moyenne'].'</td>';
						}
						if(!empty($_GET)){								//On affiche le pourcentage de victoire
							echo '<td>'.$enregistrement['PourcentageVictoire'].'%</td>';
						}
					}                                    
					echo'</td></tr>';
				}
				if(!empty($_POST) && empty($_POST["search"]) && empty($_SESSION)){                //Afficher tous les joueurs sans note à la fin pour les recherches par nombre d'avis et par la moyenne
					if($_POST["choix"]==4 or $_POST["choix"]==5){
						$req='SELECT *FROM joueur;';
						$res=mysqli_query($connexion,$req);
						while($enregistrement=mysqli_fetch_array($res)){
							$id=$enregistrement['IdJoueur'];
							$req2='SELECT IdJoueur, AVG(Note) AS Moyenne, COUNT(Note) AS NbNotes FROM notation WHERE IdJoueur='.$enregistrement['IdJoueur'].' GROUP BY IdJoueur;';
							$res2=mysqli_query($connexion,$req2);
							$enregistrement2=mysqli_fetch_array($res2);
							if ($nb=mysqli_num_rows($res2)==0){
								echo '<tr><td>'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'<br><br></td>';
								echo '<td>'.$enregistrement['Points'].'</td>';
								echo'<td>_</td>';
								echo'<td>_</td>';
								if(!empty($_GET)){								//On affiche le pourcentage de victoire
									echo '<td>'.$enregistrement['PourcentageVictoire'].'%</td>';
								}
							}
						}
					}
				}
				mysqli_close($connexion);
				?>
				</table>
            </p>

			


			
			<a name="SampleTags"></a> 
			<!-- **********************************************Noter un joueur *************************************************          -->
			<h2>Noter un joueur</h2>
			<br>
			<?php
				if (empty($_SESSION)){
					echo 'Vous devez être connectés pour pouvoir accéder à cette fonctionnalité. <br>';
					echo 'Pour vous connectez, cliquez <a href="connexion.php">ici</a>.<br><br>';
				}else{
					echo "Le tableau ci-dessous contient la liste des joueurs auquels vous n'avez pas soumis de notes. Pour rajouter une note, veuillez cliquez sur le nom du joueur choisi. Attention, chaque utilisateur peut noter une seule fois un unique joueur. Il s'agit seulement d'indiquer une note, aucun message ne pourra être saisi pour expliciter votre choix. <br><br> ";
					echo '<table>';
					if(empty($_GET)){                          //Si $_Get est vide, alors on n'a pas besoin d'afficher le pourcentage de victoire
						echo" <tr><th>Joueurs</th><th>Nombre de points</th><th>Nombre d'avis</th><th>Note moyenne</th></tr>";
					}else{
						echo" <tr><th>Joueurs</th><th>Nombre de points</th><th>Nombre d'avis</th><th>Note moyenne</th><th>Pourcentage de Victoire</th></tr>";
					}
					$connexion=mysqli_connect("localhost","root","");
					mysqli_select_db($connexion,"tennis");

					//********************************************Requete en fonction des critères de recherche*************************** */
					if (empty($_POST["choix"]) or $_POST["choix"]==1){      //On aurait bien voulu faire un switch mais ca ne marche pas
						$req='SELECT *FROM joueur;';						//Sans tri
					}else{
				    	if ($_POST["choix"]==2 && empty($_POST["search"])){								//En fonction des noms
							$req='SELECT *FROM joueur ORDER BY NomJoueur,PrenomJoueur ASC;';
							echo'<p>Trier par : noms de joueurs</p>';
						}
						if ($_POST["choix"]==3 && empty($_POST["search"])){								//En fonction des points
							$req='SELECT *FROM joueur ORDER BY Points DESC;';	
							echo '<p>Trier par : nombre de points</p>';							
						}
						if ($_POST["choix"]==4 && empty($_POST["search"])){								//En fonction de la note moyenne
							$req='SELECT *FROM joueur,notation WHERE joueur.IdJoueur=notation.IdJoueur GROUP BY joueur.IdJoueur ORDER BY Avg(Note) DESC;';
							echo'<p>Trier par : Avis général (décroissant)</p>';
						}
						if ($_POST["choix"]==5 && empty($_POST["search"])){								//En fonction du nombre d'avis 
							$req='SELECT *FROM joueur,notation WHERE joueur.IdJoueur=notation.IdJoueur GROUP BY joueur.IdJoueur ORDER BY COUNT(Note) DESC;';
							echo"<p>Trier par : nombre d'avis (décroissant)</p>";
						}
					}                              
					if (!empty($_POST["search"])){                  //Recherche par mots clés
						$req='SELECT *FROM joueur WHERE NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%";';
						echo '<p>Recherche par mot(s) clé(s) : "'.$_POST["search"].'"</p>';
					}
					if (!empty($_GET)){
						$req='SELECT joueur.IdJoueur,NomJoueur,PrenomJoueur,Points,PourcentageVictoire,TypeSurface FROM joueur,pratique,surface WHERE joueur.idJoueur=pratique.IdJoueur AND pratique.IdSurface=surface.IdSurface AND surface.IdSurface='.$_GET["id"].';';
						if($_GET["id"]==1){
							echo 'Critères en fonction de la surface : Gazon';	
						}
						if($_GET["id"]==2){
							echo 'Critères en fonction de la surface : Terre battue';	
						}
						if($_GET["id"]==3){
							echo 'Critères en fonction de la surface : Dur';	
						}
						if($_GET["id"]==4){
							echo 'Critères en fonction de la surface : Indoor';	
						}
					}
					//********************************************Fin des requetes en fonction des critères de recherche*************************** */

					$res=mysqli_query($connexion,$req);
					while($enregistrement=mysqli_fetch_array($res)){
						$id=$enregistrement['IdJoueur'];
						$req2='SELECT IdJoueur, AVG(Note) AS Moyenne, COUNT(Note) AS NbNotes FROM notation WHERE IdJoueur='.$id.' GROUP BY IdJoueur;';
						$res2=mysqli_query($connexion,$req2);
						$enregistrement2=mysqli_fetch_array($res2);
						if(!empty($_SESSION)){                                           //Si l'utilisateur est connecté, les liens pour modifier ou créer une note s'affichent
							$req3='SELECT * FROM notation WHERE IdJoueur='.$id.' AND IdUser ='.$_SESSION['Id'].';';
							$res3=mysqli_query($connexion,$req3);
							$enregistrement3=mysqli_fetch_array($res3);
							if($nb=mysqli_num_rows($res3)==0){					//S'il n'a pas noté, alors on l'affiche
								echo '<tr><td><a href="notation_joueur.php?id='.$id.'&modif=FALSE">'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</a>';
								echo '<td>'.$enregistrement['Points'].'</td>';
								if (empty($enregistrement2['NbNotes'])){     //Sinon les liens ne s'affichent pas
									echo'<td>_</td>';
									echo'<td>_</td>';
								}else{
									echo '<td>'.$enregistrement2['NbNotes'].'</td>';
									echo '<td>'.$enregistrement2['Moyenne'].'</td>';
								}
								if(!empty($_GET)){                              //On affiche le pourcentage de victoire
									echo '<td>'.$enregistrement['PourcentageVictoire'].'%</td>';
								}
							}
							echo '</td>';
						}                            
						echo'</td></tr>';
						//?note='.$enregistrement3['Note'].'&id='.$id.'
					}
					if(!empty($_POST) && empty($_POST["search"])){                //Afficher tous les joueurs sans note
						if($_POST["choix"]==4 or $_POST["choix"]==5){
							$req='SELECT *FROM joueur;';
							$res=mysqli_query($connexion,$req);
							while($enregistrement=mysqli_fetch_array($res)){
								$id=$enregistrement['IdJoueur'];
								$req2='SELECT IdJoueur, AVG(Note) AS Moyenne, COUNT(Note) AS NbNotes FROM notation WHERE IdJoueur='.$enregistrement['IdJoueur'].' GROUP BY IdJoueur;';
								$res2=mysqli_query($connexion,$req2);
								$enregistrement2=mysqli_fetch_array($res2);
								if ($nb=mysqli_num_rows($res2)==0){
									echo '<tr><td><a href="notation_joueur.php?id='.$id.'&modif=FALSE">'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</a>';
									echo '<td>'.$enregistrement['Points'].'</td>';
									echo'<td>_</td>';
									echo'<td>_</td>';
									if(!empty($_GET)){								//On affiche le pourcentage de victoire
										echo '<td>'.$enregistrement['PourcentageVictoire'].'%</td>';
									}
								}
							}
						}
					}
					mysqli_close($connexion);
				}
				echo '</table>';
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

</body>
</html>
