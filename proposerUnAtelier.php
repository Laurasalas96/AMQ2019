<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Proposer un atelier | Congrès AMQ 2019</title>
    <!--favicon-->
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <!--CSS importants-->
    <link rel="stylesheet" href="styles/Pages/ProposerUnAtelier.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="styles/main.css" />
    <!--Couleur du theme aux versions mobiles-->
    <meta name="theme-color" content="#EB5642" />
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="navbar-space" href="index.html"><img src="assets/mini-logo.png" width="70" height="30" alt=""> </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.html" class="white">ACCUEIL</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">INFORMATION GÉNÉRALE<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="nous_contacter.html">NOUS CONTACTER</a></li>
                            <li><a href="Comite.html">COMITÉ ORGANISATEUR</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="commanditaires.html">COMMANDITAIRES</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROGRAMME<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="conference_pleniere.html">CONFÉRENCE PLÉNIÈRE</a></li>
                            <li><a href="Artiste.html">ARTISTE INVITÉ</a></li>
                            <li><a href="horaire.html">HORAIRE GÉNÉRAL</a></li>
                            <li><a href="proposerUnAtelier.php">PROPOSER UN ATELIER</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SE RENDRE AU CONGRÈS<span class="caret"></span></a>
                        <ul class="dropdown-menu">
							<li><a href="transport.html">TRANSPORT</a></li>
							<li><a href="stationnement.html">STATIONNEMENT</a></li>
                        </ul>
                    </li>
				    
					<li class="dropdown">
					<a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ÉCORESPONSABILITÉ<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="caractere.html">CARACTÈRE ÉCORESPONSABLE ET OBJECTIFS</a></li>
                            <li><a href="commentSePreparer.html">COMMENT SE PRÉPARER</a></li>
                        </ul>
					</li>
					
					<li><a href="inscription.html" class="white">INSCRIPTION</a></li>
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

	 <?php
	//  variables
	
	$prenom = "";
	$erreurPrenom = "";
	$nom = "";
	$erreurNom = "";
	$courriel = "";
	$erreurCourriel = "";
	$Institution = "";
	$erreurInstitution = "";
	$departement = "";
	$erreurDepartement = "";
	$presentation = "";
	$erreurPrensentation = "";
	$titre = "";
	$erreurTitre = "";
	$resume = "";
	$besoins = "";
	
	$formulaireBienRempli = true;
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["prenom"])) 
			{$erreurPrenom = "Un prénom est nécessaire"; $formulaireBienRempli = false;}
		else 
			{$prenom = test_input($_POST["prenom"]);}

		if (empty($_POST["nom"])) 
			{$erreurNom = "Un nom est nécessaire"; $formulaireBienRempli = false;} 
		else 
			{$nom = test_input($_POST["nom"]);}
		 
		if (empty($_POST["courriel"])) 
			{$erreurCourriel = "Un courriel est nécessaire";} 
		elseif(!filter_var($_POST["courriel"], FILTER_VALIDATE_EMAIL)) 
			{$erreurCourriel = "format de courriel invalide"; $formulaireBienRempli = false;}
		else 
			{$courriel = test_input($_POST["courriel"]);}

		if (empty($_POST["presentation"])) 
			{$erreurPresentation = "Veuillez choisir un type de présentation"; $formulaireBienRempli = false;} 
		else 
			{$presentation = test_input($_POST["presentation"]);}
	 
		if (empty($_POST["titre"])) 
			{$erreurTitre = "Veuillez donner le titre de la présentation"; $formulaireBienRempli = false;} 
		else 
			{$titre = test_input($_POST["titre"]);}
	 		  
	}
	 
	if (($_SERVER["REQUEST_METHOD"] == "POST")&& $formulaireBienRempli ) { 
		/*  Tout est ok on envoie le courriel */
		
		$typePresentation = ""; // variable pour décrire le type de présentation de façon détaillée
		
		if($presentation == 'court') {$typePresentation = "Atelier court (15 minutes)";}
		elseif($presentation == 'moyen') {$typePresentation = "Atelier (30 minutes)";}
		else{$typePresentation = "Présentation (1 heure)";}
		
		
		// Courriel envoyé à amq2019
		$contenuDuFormulaire =
		"Conférencier : $prenom $nom \n \n 
		Institution : $institution \n \n
		Département : $departement \n \n
		Courriel : $courriel \n \n
		Titre : $titre \n \n
		Type de présentation : $presentation \n \n				
		Résumé : $resume \n \n 
		Besoins : $besoins \n \n";
				
		$destinataire = "dangagnon@gmail.com";
		$sujet = "Proposition d'atelier";
		$entete = "From: $courriel \r\n";
				
		mail($destinataire, $sujet, $contenuDuFormulaire, $entete) or die("Error!");
				
				
		// Courriel envoyé au conférencier
		$contenuDuFormulaire =
		"Bonjour $prenom $nom ,\n
		
		Ceci est un message de confirmation de la part du comité organisateur du congrès de l'AMQ 2019. Nous avons bien reçu votre proposition d'atelier.
		\n Veuillez vérifier que toutes les informations suivantes sont exactes.
		\n \n
		Nom : $prenom $nom \n
		Institution : $institution \n
		Département : $departement \n
		Titre : $titre \n
		Type de présentation : $typePresentation \n \n
		Merci et à bientôt!\n \n";
				
		$destinataire = $courriel;
		$sujet = "Proposition d'atelier";
		$entete = "From: info@amq2019.com"  . "\r\n" .
					"Reply-To: info@amq2019.com" . "\r\n" .
					"X-Mailer: PHP/" . phpversion();
		
		mail($destinataire, $sujet, $contenuDuFormulaire, $entete) or die("Error!");	
				
	
		?>
		
		<div class="page-standard" id="page-proposer">
		<div class="col-md-12 col-s-12" >
            <h3>Proposition bien reçue!</h3>
			
			<p id="txtProposer">
			
			<br/>
			<br/>
			Merci pour votre proposition d'atelier.<br/>
			Vous recevrez un courriel d'ici quelques minutes pour confirmer votre proposition. 
			
			<br/>
			
			</p>
		</div>

		</div>
		
		 
		<?php
	}
	else { ?>   <!-- On va au formulaire -->
		
	<div class="page-standard" id="page-proposer">
        <h1>Proposer un atelier</h1>
		<div class="col-md-12 col-s-12" >
            <p id="txtProposer">
			<br/>
			<br/>
			Vous pouvez proposer un atelier jusqu'au <font color=blue>15 août</font> en complétant le formulaire suivant.
			
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<table>
			<tr>
				<th width="150px"></th>
				<th width="500px"></th>
			</tr>
			<tr>
				<td><label for="prenom">Prénom : </label></td>
				<td><input type="text" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $prenom;?>" >
					<span class="error"><?php echo $erreurPrenom;?></span>
				</td>
			</tr>
			<tr>
				<td><label for="nom">Nom : </label></td>
				<td><input type="text" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
					<span class="error"> <?php echo $erreurNom;?></span>
				</td>
				
			</tr>
			<tr>
				<td><label for="courriel">Courriel : </label></td>
				<td><input type="text" id="courriel" name="courriel" placeholder="Courriel" value="<?php echo $courriel;?>">
					<span class="error"> <?php echo $erreurCourriel;?></span>
				</td>
			</tr>
			
			<tr>
				<td><label for="institution">Institution : </label></td>
				<td><input type="text" id="institution" name="institution" placeholder="Institution" value="<?php echo $institution;?>">
				</td>
			</tr>
			<tr>
				<td><label for="departement">Département : </label></td>
				<td><input type="text" id="departement" name="departement" placeholder="Département" value="<?php echo $departement;?>">
				</td>
			</tr>
			
			<tr>
				<td><label for="presentation">Type de présentation : </label></td>
				<td><select id="presentation" name="presentation" value="<?php echo $presentation;?>">
					<option value=""></option>
					<option value="long">Présentation (1h)</option>
					<option value="moyen">Atelier (30 min.)</option>
					<option value="court">Atelier court (15 min.)</option>
					</select>
					<span class="error"> <?php echo $erreurPresentation;?></span>
				</td>
			</tr>
			<tr>
				<td><label for="titre">Titre : </label></td>
				<td><input type="text" id="titre" name="titre" placeholder="Titre" value="<?php echo $titre;?>">
				<span class="error"> <?php echo $erreurTitre;?></span></td>
			</tr>
			<tr>
				<td><label for="resume">Résumé: </label></td>
				<td><textarea name="resume" rows="6" cols="45" placeholder="Résumé" value="<?php echo $resume;?>"></textarea></td>
			</tr>
			<tr>
				<td><label for="besoins">Besoins particuliers: (autre que projecteur ou tableau) </label></td>
				<td><textarea name="besoins" rows="6" cols="45" placeholder="Besoins" value="<?php echo $besoins;?>"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><br/><input type="submit" value="Envoyer"></textarea></td>
			</tr>
			</table>	
			<br/>
			
			</form>
			
			</p>
		</div>

	</div>	
	
	
	<?php	
	}
	 
	
	?>




    <div class="footer">
        <!-- Footer -->
        <footer class="page-footer font-small blue pt-4">
            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">
                        <!-- Content -->
                        <h1 class="footer-congress" id="ftc-top">CONGRÈS</h1>
                        <h1 class="footer-congress">AMQ 2019</h1>
                    </div>
                    <!-- Grid column -->
                    <div id="footer-list">
                        <!-- Grid column -->
                        <div class="col-md-3 mb-md-0 mb-3">
                            <!-- Links -->
                            <h5 class="text-uppercase">Links</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#!">Link 1</a>
                                </li>
                                <li>
                                    <a href="#!">Link 2</a>
                                </li>
                                <li>
                                    <a href="#!">Link 3</a>
                                </li>
                                <li>
                                    <a href="#!">Link 4</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-3 mb-md-0 mb-3">
                            <!-- Links -->
                            <h5 class="text-uppercase">Links</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#!">Link 1</a>
                                </li>
                                <li>
                                    <a href="#!">Link 2</a>
                                </li>
                                <li>
                                    <a href="#!">Link 3</a>
                                </li>
                                <li>
                                    <a href="#!">Link 4</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Grid column -->
                    </div>
                </div>
                <!-- Grid row -->
            </div>
        </footer>
        <!-- Footer -->

    </div>


   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>
