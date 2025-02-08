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

<title>ATopP | Tournois</title>
	
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
		
			<h3>Critères de tri</h3>	
			<form action="tournois.php" method="POST">
				<h4>Rechercher par mots clés</h4>
				<p>
					Recherche par nom de tournoi ou de vainqueur :<br><br>
					<input name="search" class="textbox" type="search" size="14"/>
				</p>			
				
				<h4>Options de tri par tournoi</h4>
				<p>
					Veuillez indiquez la manière de trier les tournois :
				</p>	<!-- ****************************** Liste déroulante pour trier les joueurs ************************** -->
				<p>
					<select name="choix">
						<option selected=TRUE value="1"> </option>
						<option value="2">Nom de tournoi</option>
						<option value="3">Date du tournoi</option>
						<option value="4">Avis global</option>
						<option value="5">Nombre d'avis</option>
					</select> 
				</p>
				<p>
					Critère(s) de recherche :
				</p>
				<p>
					Par catégorie :
					<select name="categorie">
						<option selected=TRUE value=""> </option>
						<?php			//Affiche toute les catégories présentes dans la base
							$connexion=mysqli_connect("localhost","root","");
							mysqli_select_db($connexion,"tennis");
							$req='SELECT NomCategorie FROM categorie ORDER BY NomCategorie ASC;';
							$res=mysqli_query($connexion,$req);
							while($enregistrement=mysqli_fetch_array($res)){
								echo '<option value="'.$enregistrement['NomCategorie'].'">'.$enregistrement['NomCategorie'].'</option>';
							}
							mysqli_close($connexion);
						?>
					</select>
				</p>
				<br>
				<input class="button" value="Rechercher" type="submit" />
				<input class="button" type="reset" value="Effacer"/>
			</form>		
				
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
			
			<h2>Liste des tournois</h2>		
			
			<?php
				if(empty($_SESSION)){
					echo'<p class="post-by"><strong><a href="connexion.php">Se connecter</a> - <a href="inscription.php">Créer un compte</a></strong></p>';
				}else{
					echo'<p class="post-by"><strong>Connecté en tant que '.$_SESSION['Pseudo'].' (en tant que "'.$_SESSION['Statut'].'") - <a href="utilisateur.php?id='.$_SESSION['Id'].'">Modifier mon profil</a></strong></p>';
				}
			?>
				
            <p>
				Ci-dessous se trouve la liste des tournois disponibles. Si vous êtes connectés, le premier tableau indique l'ensemble des tournois auxquels vous avez soumis un avis. De plus, toujours en étant
				connecté, le deuxième tableau affiche l'ensemble des tournois auxquels vous n'avez pas encore soumis d'avis. Les avis sont consultables pour tous, connectés ou non, en cliquant directement sur le nom
				du tournoi. Pour triez les tournois, des critères de recherche sont à votre disposition sur le côté droit de la page. Bonne navigation.<br>
				<?php
					$connexion=mysqli_connect("localhost","root","");
					mysqli_select_db($connexion,"tennis");
					if(empty($_SESSION)){		//Le message change en fonction de si l'utilisateur est connecté ou non
						echo 'Voici la liste des tournois ainsi que leurs caractéristiques. ';
						echo 'Pour partager votre avis, connectez-vous directement en passant par le menu ou en cliquant <a href="connexion.php">ici</a>.';
					}else{
						echo 'Voici la liste des tournois auquels vous avez déjà soumis un avis.';
					}
					//********************************************Requete en fonction des critères de recherche*************************** */
					if (empty($_POST)){ 
						$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie;';
					}else{
						if($_POST["choix"]==1){			//Sans tri
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%";';	
						}
						if($_POST["choix"]==2){           //Par Nom
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" ORDER BY NomTournoi ASC;';
						}
						if($_POST["choix"]==3){			//Par Date	
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" ORDER BY DateTournoi DESC;';
						}
						if($_POST["choix"]==4){			//Par l'avis global
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface,avis WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND tournoi.IdTournoi=avis.IdTournoi AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" GROUP BY tournoi.IdTournoi ORDER BY AVG(NoteAvis) DESC;';
						}
						if($_POST["choix"]==5){			//Par le nombre d'avis
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface,avis WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND tournoi.IdTournoi=avis.IdTournoi AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" GROUP BY tournoi.IdTournoi ORDER BY COUNT(NoteAvis) DESC;';
						}
					}
					//********************************************Fin des requetes en fonction des critères de recherche*************************** */


					$res=mysqli_query($connexion,$req);
					echo'<table>';
					echo"<tr><th>Nom du tournoi</th><th>Catégorie</th><th>Date du tournoi</th><th>Surface</th><th>Vainqueur</th><th>Nb Avis</th><th>Avis global</th></tr>";
					while ($enregistrement=mysqli_fetch_array($res)){
						$id=$enregistrement['IdTournoi'];
						$req2='SELECT AVG(NoteAvis) AS Moyenne, COUNT(NoteAvis) AS NbAvis FROM avis WHERE IdTournoi='.$id.' GROUP BY IdTournoi;';
						$res2=mysqli_query($connexion,$req2);
						$enregistrement2=mysqli_fetch_array($res2);
						if(empty($_SESSION)){	//On affiche alors tous les joueurs en un seul tableau s'il n'est pas connecté
							echo '<tr><td><a href="voir_avis.php?id='.$id.'&modif=FALSE">'.$enregistrement['NomTournoi'].'</a></td>';
							echo "<td>".$enregistrement['NomCategorie']."</td>";
							echo "<td>".$enregistrement['DateTournoi']."</td>";
							echo "<td>".$enregistrement['TypeSurface']."</td>";
							echo '<td>'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</td>';
							if (empty($enregistrement2['NbAvis'])){
								echo'<td>_</td>';
								echo'<td>_</td>';
							}else{
								echo '<td>'.$enregistrement2['NbAvis'].'</td>';
								echo '<td>'.$enregistrement2['Moyenne'].'</td>';
							}
							echo'</tr>';
						}else{			//S'il est connecté, affiche les joueurs où il a mis un avis
							$req3='SELECT * FROM avis WHERE IdTournoi='.$id.' AND IdUser ='.$_SESSION['Id'].';';
							$res3=mysqli_query($connexion,$req3);
							if($nb=mysqli_num_rows($res3)!=0){
								echo '<tr><td><a href="voir_avis.php?id='.$id.'&modif=TRUE">'.$enregistrement['NomTournoi'].'</a></td>';
								echo "<td>".$enregistrement['NomCategorie']."</td>";
								echo "<td>".$enregistrement['DateTournoi']."</td>";
								echo "<td>".$enregistrement['TypeSurface']."</td>";
								echo '<td>'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</td>';
								echo '<td>'.$enregistrement2['NbAvis'].'</td>';
								echo '<td>'.$enregistrement2['Moyenne'].'</td>';
							}
							echo '</tr>';
						}
					}
					if(!empty($_POST) && empty($_SESSION)){       //On affiche tous les tournois sans note à la fin pour les recherches sur les nombres d'avis et l'avis global
						if($_POST["choix"]==4 or $_POST["choix"]==5){             //Dans le tableau unique si la session est vide
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie;';
							$res=mysqli_query($connexion,$req);
							while ($enregistrement=mysqli_fetch_array($res)){
								$id=$enregistrement['IdTournoi'];
								$req2='SELECT IdTournoi, AVG(NoteAvis) AS Moyenne, COUNT(NoteAvis) AS NbAvis FROM avis WHERE IdTournoi='.$id.' GROUP BY IdTournoi;';
								$res2=mysqli_query($connexion,$req2);
								$enregistrement2=mysqli_fetch_array($res2);
								if ($nb=mysqli_num_rows($res2)==0){
									echo '<tr><td><a href="voir_avis.php?id='.$id.'&modif=FALSE">'.$enregistrement['NomTournoi'].'</a></td>';
									echo "<td>".$enregistrement['NomCategorie']."</td>";
									echo "<td>".$enregistrement['DateTournoi']."</td>";
									echo "<td>".$enregistrement['TypeSurface']."</td>";
									echo '<td>'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</td>';
									echo'<td>_</td>';
									echo'<td>_</td>';
								}
							}
						}
					}
					echo "</table>";
					mysqli_close($connexion);
				?>
            </p>

						
			<a name="SampleTags"></a>
			<h2>Mettre un avis</h2>
			<?php
				echo'<p>';
				if (empty($_SESSION)){			//Peut noter que s'il est connecté donc le tableau ne s'affiche pas
					echo 'Vous devez être connectés pour pouvoir accéder à cette fonctionnalité. <br>';
					echo 'Pour vous connectez, cliquez <a href="connexion.php">ici</a>.';
					echo'</p>';
				}else{							//S'il est connecté, affiche la liste de tous les tournois où il n'a pas mis d'avis
					$connexion=mysqli_connect("localhost","root","");
					mysqli_select_db($connexion,"tennis");
					echo "Le tableau ci-dessous contient la liste des tournois auquels vous n'avez pas soumis d'avis. Pour rajouter un avis, veuillez cliquez sur le nom du tournoi choisi. Chaque note s'accompagne d'un message, ainsi que d'une photo en lien avec la note soumise. Tout avis sans message ou photo ne sera pas pris en compte. Cela n'empêche pas la créativité. Libre à vous ! Toutefois, tout message comportant des insultes ou des propos déplacés seront supprimés par les administrateurs du site. <br><br> ";
					echo'</p>';
					//********************************************Requete en fonction des critères de recherche*************************** */
					if (empty($_POST)){ 
						$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie;';
					}else{
						if($_POST["choix"]==1){			//Sans tri
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%";';	
						}
						if($_POST["choix"]==2){           //Par Nom
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" ORDER BY NomTournoi ASC;';
						}
						if($_POST["choix"]==3){			//Par Date	
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" ORDER BY DateTournoi DESC;';
						}
						if($_POST["choix"]==4){			//Par l'avis global
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface,avis WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND tournoi.IdTournoi=avis.IdTournoi AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" GROUP BY tournoi.IdTournoi ORDER BY AVG(NoteAvis) DESC;';
						}
						if($_POST["choix"]==5){			//Par le nombre d'avis
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface,avis WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie AND tournoi.IdTournoi=avis.IdTournoi AND (NomTournoi LIKE "%'.$_POST["search"].'%" OR NomJoueur LIKE "%'.$_POST["search"].'%" OR PrenomJoueur LIKE "%'.$_POST["search"].'%") AND NomCategorie LIKE "%'.$_POST["categorie"].'%" GROUP BY tournoi.IdTournoi ORDER BY COUNT(NoteAvis) DESC;';
						}
					}
					//********************************************Fin des requetes en fonction des critères de recherche*************************** */

					echo '<table>';
					echo"<tr><th>Nom du tournoi</th><th>Catégorie</th><th>Date du tournoi</th><th>Surface</th><th>Vainqueur</th><th>Nb Avis</th><th>Avis global</th></tr>";
					$res=mysqli_query($connexion,$req);
					while($enregistrement=mysqli_fetch_array($res)){
						$id=$enregistrement['IdTournoi'];
						$req2='SELECT tournoi.IdTournoi, AVG(NoteAvis) AS Moyenne, COUNT(NoteAvis) AS NbAvis FROM avis,tournoi WHERE tournoi.IdTournoi=avis.IdTournoi AND tournoi.IdTournoi='.$id.' GROUP BY tournoi.IdTournoi;';
						$res2=mysqli_query($connexion,$req2);
						$enregistrement2=mysqli_fetch_array($res2);	
						$req3='SELECT * FROM avis WHERE IdTournoi='.$id.' AND IdUser ='.$_SESSION['Id'].';';
						$res3=mysqli_query($connexion,$req3);
						$enregistrement3=mysqli_fetch_array($res3);
						if($nb=mysqli_num_rows($res3)==0){     //S'il n'a pas donné d'avis pour le tournoi en question
							echo '<tr><td><a href="voir_avis.php?id='.$id.'&modif=FALSE">'.$enregistrement['NomTournoi'].'</a></td>';
							echo "<td>".$enregistrement['NomCategorie']."</td>";
							echo "<td>".$enregistrement['DateTournoi']."</td>";
							echo "<td>".$enregistrement['TypeSurface']."</td>";
							echo '<td>'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</td>';
							if (empty($enregistrement2['NbAvis'])){
								echo'<td>_</td>';
								echo'<td>_</td>';
							}else{
								echo '<td>'.$enregistrement2['NbAvis'].'</td>';
								echo '<td>'.$enregistrement2['Moyenne'].'</td>';
							}
							echo'</tr>';
						}
					}
					if(!empty($_POST)){       //On affiche tous les tournois sans note à la fin pour les recherches sur les nombres d'avis et l'avis global
						if($_POST["choix"]==4 or $_POST["choix"]==5){
							$req='SELECT tournoi.IdTournoi,NomTournoi,DateTournoi,NomCategorie,TypeSurface,NomJoueur,PrenomJoueur FROM tournoi,joueur,categorie,surface WHERE joueur.IdJoueur=tournoi.IdJoueur AND surface.IdSurface=tournoi.IdSurface AND categorie.IdCategorie=tournoi.IdCategorie;';
							$res=mysqli_query($connexion,$req);
							while ($enregistrement=mysqli_fetch_array($res)){
								$id=$enregistrement['IdTournoi'];
								$req2='SELECT IdTournoi, AVG(NoteAvis) AS Moyenne, COUNT(NoteAvis) AS NbAvis FROM avis WHERE IdTournoi='.$id.' GROUP BY IdTournoi;';
								$res2=mysqli_query($connexion,$req2);
								$enregistrement2=mysqli_fetch_array($res2);
								if ($nb=mysqli_num_rows($res2)==0){
									echo '<tr><td><a href="voir_avis.php?id='.$id.'&modif=FALSE">'.$enregistrement['NomTournoi'].'</a></td>';
									echo "<td>".$enregistrement['NomCategorie']."</td>";
									echo "<td>".$enregistrement['DateTournoi']."</td>";
									echo "<td>".$enregistrement['TypeSurface']."</td>";
									echo '<td>'.$enregistrement['NomJoueur'].' '.$enregistrement['PrenomJoueur'].'</td>';
									echo'<td>_</td>';
									echo'<td>_</td>';
								}
							}
						}
					}
					echo'</table>';
					mysqli_close($connexion);
				}
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
