<!DOCTYPE html>
<html>
<head>
	<title>SUR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="content/data/image/logo/logo.png">
    <link href="content/assets/template/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="content/assets/template/font/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="content/assets/template/css/azia.css" rel="stylesheet">
    <link href="content/assets/template/css/sur.css" rel="stylesheet" type="text/css">
	<link href="content/assets/template/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="content/assets/template/css/owl.carousel.min.css" rel="stylesheet">
    <link href="content/assets/template/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="content/assets/template/css/carousel.css" rel="stylesheet">
	<style type="text/css">
		#preloader{position:fixed;top:0; left:0; right:0; bottom:0; background-color:#fff; z-index:99999}
        #status{margin-top: 200px;}
	</style>
</head>
<body>
	<!-- <div id="preloader">
        <div style='text-align:center;' id="status">
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
        </div>
    </div> -->

    <div class="container">
        <div class="modal fade" id="AppelSur">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-body">
                <div class="col" style="text-align: center;">
                  <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                  <small>Contacter SUR</small>
                </div><hr>
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <?php if (isset($surIab['tel_sur']) && $surIab['tel_sur']!=NULL || $surIab['tel_sur']!="") { ?>
                        <a href="tel:<?php echo $surIab['tel_sur']; ?>" target="blank">
                            <div class="appel">
                                <img src="content/data/image/telma.ico" width="70" height="70">
                                <br><br>
                                <label class="btn btn-primary" style="width: 100%;">
                                    Contacter <i class="fa fa-phone"></i>
                                </label>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="col" style="text-align: center;">
                        <?php if (isset($surIab['tel_sur2']) && $surIab['tel_sur2']!=NULL || $surIab['tel_sur2']!="") { ?>
                        <a href="tel:<?php echo $surIab['tel_sur2']; ?>" target="blank">
                            <div class="appel">
                                <img src="content/data/image/orange.png" width="70" height="70">
                                <br><br>
                                <label class="btn btn-primary" style="width: 100%;">
                                    Contacter <i class="fa fa-phone"></i>
                                </label>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="col" style="text-align: center;">
                        <?php if (isset($surIab['tel_sur3']) && $surIab['tel_sur3']!=NULL || $surIab['tel_sur3']!="") { ?>
                        <a href="tel:<?php echo $surIab['tel_sur3']; ?>" target="blank">
                            <div class="appel"><img src="content/data/image/airtel.ico" width="70" height="70">
                                <br><br>
                                <label class="btn btn-primary" style="width: 100%;">
                                    Contacter <i class="fa fa-phone"></i>
                                </label>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="UserGuide">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="col" style="text-align: center;">
                      <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                      <small class="text-uppercase">Politique et règles d'utilisation du site <i class="fa fa-gavel"></i></small>
                    </div><hr>
                    <span>
                            <div class="col">
                                <h4 align='center' class='text-muted'>Articles d'utilisation</h4><hr>
                                <div class="container">
                                    <small class='small'>Article du Site</small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item" style="text-align: justify;">Tout les droits sont réservées.</li>
                                    </ul>
                                </div><br>
                                <div class="container">
                                    <small class='small'>Article de l'utilisateur </small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item" style="text-align: justify;">Des conditions ont été établis sur la mise à jour des données de chaque utilisateur, la sécurisation des données de l'utilisateur est la prioritaire de SUR. Donc, toute activité suspects qui se produise sur le site sera sanctionné par les administrateurs.</li>
                                        <li class="list-group-item" style="text-align: justify;">Chaque commande effectuer sera évalué par l'administration avant de répondre à celle ci. Remplissez les données à la lettre pour valider une commande.</li>
                                    </ul>
                                </div><br>
                                <div class="container">
                                    <small class='small'>Article des produits, services et formations</small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item" style="text-align: justify;">Chaque données du site (nos offres) qui sont les produits, services et formations sont toujours analysé par les administrations avant la mise en ligne.</li>
                                        <li class="list-group-item" style="text-align: justify;">Des services clients toujours disponible pour vous répondre</li>
                                    </ul>
                                </div><br>
                            </div>
                            <hr>
                            <div class='col'>
                                <h4 align='center' class='text-muted'>Structure et guide du site</h4><hr>
                                <div class="container">
                                    <small class='small'>En-tête <i class="fa fa-arrow-up"></i></small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item">Slogan et logo (Partie Gauche)</li>
                                        <li class="list-group-item">Barre de recherche (Partie Droite)</li>
                                    </ul>
                                </div><br>
                                <div class="container">
                                    <small class='small'>Section utilisateur <i class="fa fa-user"></i></small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item">Section de bienvenue</li>
                                        <li class="list-group-item">Section d'authentification</li>
                                        <li class="list-group-item">Section d'inscription</li>
                                    </ul>
                                </div><br>
                                <div class="container">
                                    <small class='small'>Barre de navigation <i class="fa fa-bars"></i></small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item">Tout : Liste des produits, services et formations</li>
                                        <li class="list-group-item">Produit : Liste des produits</li>
                                        <li class="list-group-item">Service : Liste des services</li>
                                        <li class="list-group-item">Formation : Liste des formations</li>
                                        <li class="list-group-item">Pourquoi SUR ? : Avantage de SUR</li>
                                    </ul>
                                </div><br>
                                <div class="container">
                                    <small class='small'>Lieu d'achat <i class="fa fa-shopping-cart"></i></small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item">Contact SUR disponible</li>
                                    </ul>
                                </div>
                                <br>
                                <div class="container">
                                    <small class='small'>Section en bas à droite <i class="fa fa-bookmark"></i></small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item">Raccourcis</li>
                                    </ul>
                                </div>
                                <br>
                                <div class="container">
                                    <small class='small'>Section en bas <i class="fa fa-phone"></i></small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item">Contact SUR</li>
                                        <li class="list-group-item">Réseaux sociaux</li>
                                    </ul>
                                </div>
                            </div>
                    </span>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="ConnexUserSurModal">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-body">
                <div class="col" style="text-align: center;">
                  <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                  <small>Se connecter sur le site</small>
                </div>
                <hr>
                  <div class="form-group">
                    <label>Adresse email</label>
                    <input type="mail" id="idConnex" class="form-control" placeholder="Remplissez...">
                  </div>
                  <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" id="mdpConnex" class="form-control" placeholder="Entrer le mot de passe...">
                    <span id="suiteRecUser"></span>
                  </div>
                  <button type="submit" class="btn btn-primary" style="width: 100%;" onclick="ConnexUser('idConnex','mdpConnex','errorCo',this);">Entrer</button>
                <small id="errorCo" style="color: red;text-align: center;"></small><br>
                <span class="psw"><a href="index.php?compte=mdp">Mot de passe oublié ?</a></span>
                <hr>
                <div class="col">
                  <span class="psw"><button class="btn btn-sm btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#SubscribeUserSurModal">S'inscrire</button></span>
                  <button class="btn btn-sm btn-primary" data-dismiss="modal" style="float: right;">Annuler</button>  
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="SubscribeUserSurModal">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-body">
                <div class="col" style="text-align: center;">
                  <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                  <small>S'inscrire sur le site</small>
                </div>
                <hr>
                <form method="POST" action="controller/utilisateur/controller.utilisateur.php" target="SubUserUser" id="subsubmitForm">
                    <div class="row">
                      <div class="col form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" placeholder="Nom..." name="newName" required>
                      </div>
                      <div class="col form-group">
                          <label>Prénom <small style="color: red;">*</small></label>
                          <input type="text" class="form-control" placeholder="Prénom..." name="newPrenom">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                            <label>Province <small style="color: red;">*</small></label>
                            <select class="form-control" name="newProvince" required>
                                <option value="Antananarivo">Antananarivo</option>
                                <option value="Antsiranana">Antsiranana</option>
                                <option value="Fianarantsoa">Fianarantsoa</option>
                                <option value="Mahajanga">Mahajanga</option>
                                <option value="Toamasina">Toamasina</option>
                                <option value="Toliara">Toliara</option>
                            </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                            <label>Sexe <small style="color: red;">*</small></label>
                            <select class="form-control" name="newSexe" required>
                              <option></option>
                              <option value="Homme">Homme</option>
                              <option value="Femme">Femme</option>
                            </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                        <label>Email <small style="color: red;">*</small></label>
                        <input type="mail" class="form-control" placeholder="Adresse émail..." name="newMail" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" placeholder="Numéro téléphone..." name="newTel">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                        <label>Mot de passe <small style="color: red;">*</small></label>
                        <input type="password" class="form-control" placeholder="Mot de passe..." name="newMdp1" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                        <label>Confirmer mot de passe <small style="color: red;">*</small></label>
                        <input type="password" class="form-control" placeholder="Mot de passe..." name="newMdp2" required>
                      </div>
                    </div>
                    <div class='col form-group'>
                      <input type='checkbox' id='accepteConS' name="accepteConS" required />
                      <label for="accepteConS"> Acceptez et suivre <a class="text-muted" data-dismiss='modal' data-toggle="modal" data-target="#UserGuide" style='cursor:pointer;'>les conditions d'utilisation</a> du site ?</label>
                    </div>
                    <button type="submit" name="SubUser" class="btn btn-primary" style="width: 100%;" onclick="ScrollToTo('errorSubs')">Créer le compte</button>
                    <small id="errorSubs" style="color: red;text-align: center;"></small>
                    <small id="successSub" style="display: none;color: green;text-align: center;"></small>
                </form>
                <hr>
                <div class="col">
                  <span class="psw"><button class="btn btn-sm btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#ConnexUserSurModal">Se connecter</button></span>
                  <button class="btn btn-sm btn-primary" data-dismiss="modal" style="float: right;">Annuler</button>  
                  <iframe id="SubUserUser" name="SubUserUser" style="visibility: hidden;display: none;"></iframe>
                </div>
              </div>
              <br><br>
            </div>
          </div>
        </div>
    </div>

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
              <a href="index.php" class="az-logo"><img src="content/data/image/logo.png" width="100" height="100"></a>
              <a href="index.php"  class="d-lg-none logo-min"><img src="content/data/image/logo.png" width="50" height="50"></a>
            </div>
            <div class="az-header-menu">
              <div class="az-header-menu-header">
                <a href="index.php" class="az-logo"><span></span></a>
              </div>
               <span class="az-sur" id="az-sur-sol">
                    <h1 data-toggle="modal" data-target="#AppelSur">Solution Unique et Rapide</h1>
               </span>
            </div>
            <div class="az-header-right">
              <div class="input-group">
                <select class="input-select form-control" id="RechercheCate">
                    <option value="Tout Categorie">Tout</option>
                    <option value="HIGHTECH">High-Tech</option>
                    <option value="VETEMENT">Vêtement et chaussures</option>
                    <option value="AGROALIMENTAIRE">Agro-alimentaires</option>
                    <option value="JOUER">Jouer</option>
                    <option value="ACCESSOIRE">Accessoire et autres</option>
                </select>
                <input type="search" id="rechercheSurP" placeholder="Recherche" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-primary" id="recherche" style="border-radius: 0;" onclick="RechercheSur();ScrollToTo('donnePublication');">
                    <i class="fas fa-search"></i>
                  </button>
                </span>                 
              </div>    
            </div>
        </div>
    </div>

    <?php if (isset($_GET['compte']) && $_GET['compte']=="mdp"){ ?>
	    <div class="mb-2 container shadowR bg-white"> 
			<div class="p-5 row">
				<div class="col-sm-6">
	              <h1 class="text-center">Mot de passe oublié</h1>
	              <small>Récupéré votre compte en accédant à votre adresse email, vous recevrez un code de confirmation dans votre boîte et entrer le pour mettre un nouveau mot de passe. <br> En cas de problème, vous pouvez toujours appeler le <a href="#service" data-toggle='modal' data-target='#AppelSur'>service client</a> du site</small>
	            </div>
				<div class="col-sm-6 form-group">
		            <label>Adresse email</label>
	            	<br>
		            <?php //if (!isset($_SESSION['userRecupMdp']) || !isset($_SESSION['userConfirmed'])): ?>
			            <input type="mail" id="mailUserR" class="form-control" placeholder="Remplissez...">
		            	<div class="row">
		            		<div class="col-sm-6">
		            			<button id="stepOne" type="submit" class="mt-2 btn btn-primary" style="width: 100%;" onclick="RecupMdpUser('mailUserR',this);">Entrer</button>
		            		</div>
		            		<div class="col-sm-6">
		            			<a href="index.php" style="width: 100%;" class="mt-2 btn btn-primary">Accueil</a>
		            		</div>
		            	</div>
			            <small id="errorRecu" style="color: red;text-align: center;"></small>
			            <small id="successRecu" style="color: green;text-align: center;"></small>
		            <?php //endif ?>
		            <hr>
		            <?php if (isset($_SESSION['userRecupMdp']) && !isset($_SESSION['userConfirmed'])): ?>
			            <span id="suiteRec">
			            	<div class='form-group'>
			            		<label>Entrer le code de confirmation dans votre email : <b><?= $_SESSION['userRecupMdpMail'] ?></b></label>
			            		<input type='number' id='codeUserRecap' class='form-control' placeholder='Remplissez...'>
			            	</div>
			            	<div class="row">
			            		<div class="col-sm-6">
			            			<button class='btn btn-primary btn-block' onclick="TestUserCodeVerification(<?= $_SESSION['userRecupMdp']; ?>,this);">Confirmer</button>
			            		</div>
			            		<div class="col-sm-6">
			            			<button class='btn btn-primary btn-block' onclick='Reenvoye(<?= $_SESSION['userRecupMdp']; ?>,this);'>Réenvoyer le code</button>
			            		</div>
			            	</div>
			            	<small id='errorCoRecapVerifSuite' style='color: red;text-align: center;'></small>
			            </span>
		            <?php endif ?>
		            <?php if (isset($_SESSION['userConfirmed'])): ?>
	            		<small class="text-success">Code confirmé, entrer votre nouveau mot de passe</small>
		            	<div class="row">
		            		<div class="col-sm-12">
		            			<div class="form-group">
		            				<label>Entrer nouveau mot de passe</label>
		            				<input type="password" id="newMdpRec" class="form-control" placeholder="Remplissez...">
		            			</div>
		            			<div class="form-group">
		            				<label>Entrer nouveau mot de passe</label>
		            				<input type="password" id="newMdpRec2" class="form-control" placeholder="Remplissez...">
		            			</div>
		            			<button class="btn btn-primary" style="width: 100%;" onclick="ConfirmUserMdp(<?= $_SESSION['userRecupMdp']; ?>,this);">Confirmer</button>
		            			<small id="errorCoVerifSuite" style="color: red;text-align: center;"></small>
		            		</div>
		            	</div>
		            <?php endif ?>
	            </div>	
            </div>
	    </div>
	    <hr>
    <?php }else if (isset($_GET['compte']) && $_GET['compte']=="co" && isset($_SESSION['confirmed'])) { ?>
    	<div class="mb-2 container shadowR bg-white"> 
				<div class="p-5 row">
					<div class="col-sm-6">
		              <h1 class="text-center">Confirmation de compte</h1>
		              <small>Vous recevrez un code de confirmation dans votre boîte et entrer le pour mettre un nouveau mot de passe. <br> En cas de problème, vous pouvez toujours appeler le <a href="#service" data-toggle='modal' data-target='#AppelSur'>service client</a></small>
		            </div>
					<div class="col-sm-6 form-group">
			            <label>Entrer le code</label>
		            	<br>
			            <input type="number" id="codeUserRecapCo" name="codeUserRecapCo" class="form-control" placeholder="Remplissez...">
		            	<span id="suiteRec"></span>
		            	<div class="mt-2 row">
		            		<div class="col-sm-6">
		            			<button class="btn btn-primary" style="width: 100%;" onclick="TestUserCodeVerificationCo(<?= $_SESSION['confirmed']; ?>,this);">Entrer</button>
		            		</div>
		            		<div class="col-sm-6">
		            			<button class="btn btn-primary" style="width: 100%;" onclick="ReenvoyeCo(<?= $_SESSION['confirmed']; ?>,this);">Réenvoyer le code</button>
		            		</div>
		            	</div>
			            <small id="errorCoRecapVerifSuiteCo" style="color: red;text-align: center;"></small>
			            <small style="color: green;text-align: center;"></small>
		            </div>	
	            </div>
	    </div>
	    <hr>
    <?php }else{ ?>
    	<div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url(content/data/image/lolo.png);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-12 ftco-animate">
		          	<div class="text w-100 text-center">
			            <h2>Solution Unique et Rapide</h2>
                        <h1 class="mb-3">BIENVENUE</h1>
                        <button class="btn btn-primary btn-lg" onclick="ScrollToTo('secondary-bar')">Visiter</button>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	      <div class="slider-item" style="background-image:url(content/data/image/lolo.png);width: 100%;">
                <div class="overlay"></div>
                <div class="container">
                  <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                      <div class="text w-100 text-center">
                        <h2>ESPACE UTILISATEUR</h2>
                        <h1 class="mb-3">SE CONNECTER</h1>
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ConnexUserSurModal">Commencer</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="slider-item" style="background-image:url(content/data/image/lolo.png);width: 100%;">
                <div class="overlay"></div>
                <div class="container">
                  <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                      <div class="text w-100 text-center">
                        <h2>CREER VOTRE COMPTE</h2>
                        <h1 class="mb-3">S'INSCRIRE</h1>
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#SubscribeUserSurModal">Commencer</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
	    </div>
    <?php } ?>

    <section class="">
		<div id="bodySurNav">
			<br class="mmda">
			<div id="secondary-bar" class="container">
				<nav id="secondary-nav" class="container inner clearfix">
					<ul id="secondary-menu" class="sf-menu">
						<li>
							<a class="cliclHere" onclick="RecupAllPost();">Tout</a>
						</li>
						<li>
							<a class="cliclHere">Produit</a>
							<ul>
								<li><a class="cliclHere" onclick="RecupAllPostProduit('HIGHTECH');">High-Tech</a></li>
								<li><a class="cliclHere" onclick="RecupAllPostProduit('VETEMENT');">Vêtements</a></li>
								<li><a class="cliclHere" onclick="RecupAllPostProduit('AGROALIMENTAIRE');">Agro-alimentaires</a></li>
								<li><a class="cliclHere" onclick="RecupAllPostProduit('JOUER');">Jouer</a></li>
								<li><a class="cliclHere" onclick="RecupAllPostProduit('ACCESSOIRE');">Accessoire</a></li>
							</ul>
						</li>
						<li>
							<a class="cliclHere">Service</a>
							<ul>
								<li><a class="cliclHere" onclick="RecupAllPostService('TRANSPORT');">Transport</a></li>
								<li><a class="cliclHere" onclick="RecupAllPostService('EVENTS');">Evenementiel</a></li>
							</ul>
						</li>
						<li>
							<a class="cliclHere">Formation</a>
							<ul >
								<li><a class="cliclHere" onclick="RecupAllPostFormation('LANGUE');">Cours de langue</a></li>
								<li><a class="cliclHere" onclick="RecupAllPostFormation('INFORMATIQUE');">Cours Informatique</a></li>
								<li><a class="cliclHere" onclick="RecupAllPostFormation('MECANIQUE');">Cours Mécanique Automobile</a></li>
							</ul>
						</li>
						<li>
							<a class="cliclHere" onclick="ScrollToTo('aboutSurAbout');">Pourquoi SUR ?</a>
						</li> 
					</ul>
				</nav>
			</div>
     	</div>
	</section>

    <div class="container">
        <div class="row" id="bodySur">
            <div class='col-lg-3 order-2 order-lg-1'>
                <span id="GenreView"></span>
				<span id="PartListe"></span>
				<span id="SponsListe"></span>
            </div>
            <div class='col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0' id='sur-contain'>
                <div class="four-columns">
					<div id="oneContent">
						<span  id="donnePublication"></span>
					</div>
				</div>
            </div>
        </div>
    </div>

    <section class="container" id="aboutSurAbout">
        <section class='py-2 px-4 text-white mb-3' style='background:#344198;'>
            <h5 class='h5 text-uppercase'>une solution sur-mesure adaptée à vos besoins</h5>
        </section>
        <div class="descSurSur">
                <blockquote style="text-align: justify;">
                    Un service rapide et fiable, des réponses uniques satisfaisant vos exigences, tout cela en ménageant votre portefeuille. Voilà ce que propose notre site web SUR.
                </blockquote>
        </div>
        <section class='py-2 px-4 text-white mb-3' style='background:#344198;'>
            <h5 class='h5 text-uppercase'>Pourquoi choisir les services,produits et formation SUR?</h5>
        </section>
        <div class="descSurSur">
                <blockquote style="text-align: justify;">
                    Principaux avantages de la plateforme SUR:
                </blockquote>
                <div class="row">
                    <div class="col-sm-6 Sur9">
                        <h4>Riche en information</h4><hr>
                        <p style="text-align: justify;">Le site est riche en informations mises à jour sur les produits et services proposés en vente sur la plateforme. En effet, nous disposons d'agents compétents pour la collecte de données sur le terrain. Ces agents qualifiés ont suivi la formation nécessaire pour pouvoir recueillir les informations sur les produits/services à vendre sur le site. Nous privilégions notamment les produits locaux "Vita malagasy".</p>
                    </div>
                    <div class="col-sm-6 Sur9">
                        <h4>Produits et services crédibles</h4><hr>
                        <p style="text-align: justify;">Les produits et services vendus sont authentiques et crédibles. Effectivement, avant leur mise en ligne, les agents de collecte vérifient les renseignements recueillis. Cela implique principalement la qualité des produits, afin d'éviter toute contrefaçon ou arnaque.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 Sur9">
                        <h4>Résultat unique et rapide</h4><hr>
                        <p style="text-align: justify;">Le résultat donné par le système est unique et spécifique, selon l'utilisateur qui effectue la recherche. Cette réponse est compatible aux paramètres exigés par chaque utilisateur (marque, série, couleur, prix,…). De plus, les recherches sont très rapides</p>
                    </div>
                    <div class="col-sm-6 Sur9">
                        <h4>Toujours avec vous</h4><hr>
                        <p style="text-align: justify;">Le site présente un bon rapport qualité prix, un service de livraison rapide et disponible pour les achats et commandes en ligne.</p>
                    </div>
                </div>
        </div>
        <section class='py-2 px-4 text-white mb-3' style='background:#344198;'>
            <h5 class='h5 text-uppercase'>Qui sommes-nous?</h5>
        </section>
        <div class="descSurSur">
                <blockquote style="text-align: justify;">
                    SUR, faisant référence à Solution Unique et rapide, ou Speed and Uniq Result en anglais, repose sur un concept innovant. Il s'agit d'un site e-commerce sous forme de plateforme web, qui gère la vente de produits/services dans divers domaines : offre d'emploi et de stage, éducation, service traiteur, service d'animation ...
                </blockquote>
        </div>
    </section>
    <footer class="footSur container" id="footer">
        <div class="row">
                <div class="col-md-3">
                    <div class="footer">
                        <h3 class="footer-title">SUR</h3>
                        <ul class="footer-links">
                            <li data-toggle='modal' data-target='#AppelSur'><a style="color: #e3e5ef !important;cursor: pointer;"><i class="fa fa-phone"></i>Opérateur</a></li>
                            <?php if (isset($surIab['autre_tel']) && $surIab['autre_tel']!=NULL || $surIab['autre_tel']!="") { ?>
                            <li><a target="blank" href="tel:<?php echo $surIab['autre_tel']; ?>" style="color: #e3e5ef !important;"><i class="fa fa-phone"></i><?php echo $surIab['autre_tel']; ?></a></li>
                            <?php } ?>
                            <?php if (isset($surIab['email_sur']) && $surIab['email_sur']!=NULL || $surIab['email_sur']!="") { ?>
                            <li><a style="color: #e3e5ef !important;cursor: pointer;"><i class="fa fa-envelope"></i> <?php echo $surIab['email_sur']; ?></a></li>
                            <?php } ?>
                        </ul>
                        <h6 class="small"><i class="fa drivers-license"></i> NIF : 4005544710</h6>
                        <h6 class="small"><i class="fa drivers-license"></i> STAT : 47912112021004025</h6>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer">
                        <h3 class="footer-title">Réseaux</h3>
                        <ul class="footer-links">
                            <?php if (isset($surIab['fbSur']) && $surIab['fbSur']!=NULL || $surIab['fbSur']!="") { ?>
                            <li><a href="<?php echo $surIab['fbSur']; ?>" target='blank' style="color: #e3e5ef !important;"><i class="typcn typcn-social-facebook"></i> Visitez</a></li>
                            <?php } ?>
                            <?php if (isset($surIab['youSur']) && $surIab['youSur']!=NULL || $surIab['youSur']!="") { ?>
                            <li><a href="<?php echo $surIab['youSur']; ?>" target='blank' style="color: #e3e5ef !important;"><i class="typcn typcn-social-youtube"></i> Visitez</a></li>
                            <?php } ?>
                            <?php if (isset($surIab['instaSur']) && $surIab['instaSur']!=NULL || $surIab['instaSur']!="") { ?>
                            <li><a href="<?php echo $surIab['instaSur']; ?>" target='blank' style="color: #e3e5ef !important;"><i class="typcn typcn-social-instagram"></i> Visitez</a></li>
                            <?php } ?>
                            <?php if (isset($surIab['twiSur']) && $surIab['twiSur']!=NULL || $surIab['twiSur']!="") { ?>
                            <li><a href="   <?php echo $surIab['twiSur']; ?>" target='blank' style="color: #e3e5ef !important;"><i class="typcn typcn-social-twitter"></i> Visitez</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer">
                        <h3 class="footer-title">Produits</h3>
                        <ul class="footer-links">
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostProduit('HIGHTECH');">High Tech</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostProduit('VETEMENT');">Vêtements et chaussures</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostProduit('AGROALIMENTAIRE');">Agro Alimentaires</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostProduit('JOUER');">Jouer</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostProduit('ACCESSOIRE');">Accessories et autres</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer">
                        <h3 class="footer-title">Service & Formation</h3>
                        <ul class="footer-links">
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostService('TRANSPORT');">Transport</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostService('EVENTS');">Evenementiel</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostFormation('LANGUE');">Cours de langue</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostFormation('INFORMATIQUE');">Cours informatique</a></li>
                            <li><a style="cursor: pointer;color: #e3e5ef !important;" onclick="ScrollToTo('donnePublication');RecupAllPostFormation('MECANIQUE');">Cours mécanique automobile</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 text-center">
                <small>SURMADA <?php echo date("Y"); ?> | Tout droit réservé</small>
            </div>
        </div>
    </footer>

    <div class="settings-trigger-three2" data-toggle="modal" data-target="#UserGuide">
        <i class="fa fa-gavel"></i>
    </div>
    <div class="settings-trigger-two" data-dismiss="modal" onclick="ScrollToTo('donnePublication');RecupAllPost();">
        <i class="fa fa-shopping-cart"></i>
    </div>
    <div class="settings-trigger-one" data-toggle="modal" data-target="#ConnexUserSurModal">
        <i class="fa fa-user"></i>
    </div>


	<script src="content/assets/template/jquery/jquery.min.js"></script>
    <script src="content/assets/template/js/activite.js"></script>
    <script src="content/assets/template/jquery/jquery.min.js"></script>
    <script src="content/assets/template/js/cjquery.min.js"></script>
    <script src="content/assets/template/js/bootstrap.min.js"></script>
    <script src="content/assets/template/js/owl.carousel.min.js"></script>
    <script src="content/assets/template/js/main.js"></script>
    <script src="content/assets/template/jquery/jquery.min.js"></script>
    <script src="content/assets/template/js/wow.min.js"></script> 
    <script src="content/assets/template/js/loading.js"></script>
	<script src="content/assets/template/js/jquery.js" type="text/javascript"></script>
	<script src="content/assets/template/js/superfish.min.js" type="text/javascript"></script>
	<script src="content/assets/template/js/jquery.slicknav.min.js" type="text/javascript"></script>
	<script src="content/assets/template/js/jquery.scrollUp.min.js" type="text/javascript"></script>
	<script src="content/assets/template/js/modernizr.js" type="text/javascript"></script>
	<script src="content/assets/template/js/jquery.custom.js" type="text/javascript"></script>
</body>
</html>