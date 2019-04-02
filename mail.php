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
                            <li><a href="Apropos_AMQ.html">À PROPOS DE L'AMQ </a></li>
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
                            <li><a href="proposerUnAtelier.html">PROPOSER UN ATELIER</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SE RENDRE AU CONGRÈS<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="itineraire.html">ITINÉRAIRE</a></li>
							<li><a href="covoiturage.html">COVOITURAGE</a></li>
							<li><a href="stationnement.html">STATIONNEMENT</a></li>
							<li><a href="hebergement.html">HÉBERGEMENT</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="proche_cegep.html">LIEUX PROCHES DU CÉGEP</a></li>
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


   <div class="page-standard" id="page-proposer">
        <h1>Proposer un atelier</h1>
		<div class="col-md-12 col-s-12" >
            <p id="txtProposer">
			<br/>
			<br/>
			<?php 
				$prenom = $_POST['prenom'];
				$nom = $_POST['nom'];
				$courriel = $_POST['courriel'];
				$institution = $_POST['institution'];
				$departement = $_POST['departement'];
				$resume = $_POST['resume'];
				$presentation = $_POST['presentation'];
				$besoins = $_POST['besoins'];
				
				$formcontent=
				"Conférencier : $prenom $nom \n \n 
				Institution : $institution \n \n
				Département : $departement \n \n
				Type de présentation : $presentation \n \n				
				Résumé : $resume \n \n 
				Besoins : $besoins \n \n";
				
				$recipient = "dangagnon@gmail.com";
				$subject = "Proposition d'atelier";
				$mailheader = "De: $courriel \r\n";
				
				mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
				
				echo "Merci pour votre proposition d'atelier!";
?> 
			
			</p>
		</div>

		</div>





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



