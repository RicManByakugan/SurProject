<!DOCTYPE html>
<html>
<head>
	<title>SUR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="content/data/image/logo/logo.png">
    <link href="content/assets/template/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="content/assets/template/font/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="content/assets/template/font/typicons.font/typicons.css" rel="stylesheet">
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
	<div id="preloader">
        <div style='text-align:center;' id="status">
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="modal fade" id="AppelSur">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
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
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
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
                                    <ul class="list-group">
                                        <li class="list-group-item" style="text-align: justify;">Mise à jours du politique et règle toujours renouvelable</li>
                                    </ul>
                                </div><br>
                                <div class="container">
                                    <small class='small'>Article de l'utilisateur </small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item" style="text-align: justify;">Chaque commande effectuer sera évalué par l'administration avant de répondre à celle ci. Remplissez les données à la lettre pour valider une commande.</li>
                                    </ul>
                                </div><br>
                                <div class="container">
                                    <small class='small'>Article des produits, services et formations</small>
                                    <br><br>
                                    <ul class="list-group">
                                        <li class="list-group-item" style="text-align: justify;">Chaque données du site qui sont les produits, services et formations sont toujours analysé par les administrations avant la mise en ligne.</li>
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
                                        <li class="list-group-item">Bulle de notification</li>
                                        <li class="list-group-item">Bulle de panier</li>
                                        <li class="list-group-item">Bulle de commande</li>
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
<?php if (!isset($idUser)) { ?>
    <div class="container">
            <div class="modal fade" id="UserNotifSNav">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="text-warning close" data-dismiss="modal">&times;</button>
                    <div class="col" style="text-align: center;">
                      <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                      <small class="text-uppercase">Solution Unique et Rapide</small>
                    </div><hr>
                    <span id="listeNotifUserNav"></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <div class="container">
        <div class="modal fade" id="UserPanierNav">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="text-warning close" data-dismiss="modal">&times;</button>
                <div class="col" style="text-align: center;">
                  <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                  <small class="text-uppercase">Votre panier SUR<i class="fa fa-shopping-cart"></i></small>
                </div><hr>
                <span id="tableListeCommandeNav"></span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container">
        <div class="modal fade" id="UserCommandeNav">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="text-warning close" data-dismiss="modal">&times;</button>
                    <div class="col" style="text-align: center;">
                      <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                      <small class="text-uppercase">Listes des commandes effectuer <i class="fa fa-suitcase"></i></small>
                    </div><hr>
                    <span id="tableListeCommandeEffectruerNav"></span>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class='container'>
        <div class='modal fade' id='ComDetailleNav'>
            <div class='modal-dialog modal-xl'>
                <div class='modal-content'>
                    <button type="button" class="text-warning close" data-dismiss="modal">&times;</button>
                    <div class='modal-body'>
                        <span id='affciheDetailleComNav'></span>
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
                <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
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
                <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
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
        <?php 
            if ($valueOffre) {
                    if ($valueOffre['img1_pub']!=NULL && $valueOffre['img1_pub']!="") {
                        $img1 = "<img class='w-100' src='content/data/image/publication/".$valueOffre['img1_pub']."'>";
                    }else{
                        $img1 = "<img class='w-100' src='content/data/image/logo.png'>";
                    }
                    list($yo,$mo,$do) = explode("-", $valueOffre['date_com']);
        ?>
              <div class='slider-item' style='background-image:url(content/data/image/lolo.png);'>
                <div class='overlay'></div>
                <div class='container'>
                    <div class='row'>
                        <div class='col-sm-8'>
                            <div class='row slider-text align-items-center justify-content-center'>
                              <div class='col-md-12'>
                                <div class='container text w-100'>
                                    <div class='row'>
                                        <div class='col-sm-12 d-flex'>
                                            <div style='width: 40%;'>
                                                <?=$img1?>
                                            </div> 
                                            <div class='ml-5'>
                                                <h3><?=$valueOffre['titre_pub']?></h3>
                                                <hr>
                                                <small><?=substr($valueOffre['desc_pub'], 0, 100)?> ...</small>
                                                <hr>
                                                <h4>Prix : <strike><?=$valueOffre['prix_pub']?>Ar ou <?=($valueOffre['prix_pub']*5)?>Fmg</strike></h4>
                                            </div>
                                        </div>
                                    </div>
                                     <button class='mt-3 btn btn-block btn-primary btn-lg' onclick="AffichePub(<?=$valueOffre['id_pub']?>,'<?=$valueOffre['type_pub']?>');ScrollToTo('secondary-bar')">Voir</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            <div class='row no-gutters slider-text align-items-center justify-content-center'>
                              <div class='col-md-12 ftco-animate'>
                                <div class='text text-center'>
                                    <h1 class='mb-3'>-<?=$valueOffre['prix_prom']?>%</h1>
                                    <h4 class='mb-3'>FIN DE L'OFFRE : <?= $do ?>-<?=$mo?>-<?=$yo?></h4>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    </div>
              </div>
      <?php } ?>
      <!-- <div class="slider-item" style="background-image:url(content/data/image/lolo.png);width: 100%;">
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
      </div> -->
    </div>

<?php } ?>

    <?php if (isset($idUser)) {?>
        <div class='home-slider owl-carousel' id="userSugg"></div>
        <div class="container">
            <div class="modal fade" id="UserNotifS">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                    <div class="col" style="text-align: center;">
                      <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                      <small class="text-uppercase">Solution Unique et Rapide</small>
                    </div><hr>
                    <span id="listeNotifUser"></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container">
            <div class="modal fade" id="UserPanier">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                    <div class="col" style="text-align: center;">
                      <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                      <small class="text-uppercase">Panier SUR : <?php echo $User['nomUser']; ?> <i class="fa fa-shopping-cart"></i></small>
                    </div><hr>
                    <span id="tableListeCommande"></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class='container'>
            <div class='modal fade' id='ComDetaille'>
                <div class='modal-dialog modal-xl'>
                    <div class='modal-content'>
                        <div class='modal-body'>
                            <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                            <span id='affciheDetailleCom'></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="modal fade" id="UserPro">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                     <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                    <div class="col" style="text-align: center;">
                      <img src="<?php 
                        if($User['imageUser']=='' || $User['imageUser']==NULL)
                            echo $imgUser="content/data/image/utilisateur/profile.png";
                        else
                            echo $imgUser="content/data/image/utilisateur/".$User['imageUser'];
                      ?>" width="90" height="90" style="border-radius: 100%;"><br><br>
                      <small class="text-uppercase">Compte : <?php echo $User['nomUser']; ?> <i class="fa fa-cog"></i></small>
                    </div>
                    <br><hr>
                    <label><b>Avatar</b></label><hr>
                    <div class="row">
                        <div class="col">
                            <label>Image</label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModifAvatar">Modifier</button>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label>Image</label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="SupImageUClient();">Supprimer</button>
                        </div>
                    </div><br><hr>
                    <label><b>Biographie</b></label><hr>
                    <div class="row">
                        <div class="col">
                            <label>Nom</label>
                        </div>
                        <div class="col">
                            <label><?php echo $User['nomUser']; ?></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModifNom" onclick="CountActUpUser('NOM','resresresresNom');">Modifier</button>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label>Prénom</label>
                        </div>
                        <div class="col">
                            <label><?php echo $User['prenomUser']; ?></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModifPreNom" onclick="CountActUpUser('PRENOM','resresresresPreNom');">Modifier</button>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label>Sexe</label>
                        </div>
                        <div class="col">
                            <label><?php echo $User['sexeUser']; ?></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModifSexe" onclick="CountActUpUser('SEXE','resresresresSexe');">Modifier</button>
                        </div>
                    </div>
                    <hr><label><b>Coordonnées</b></label><hr>
                    <div class="row">
                        <div class="col">
                            <label>Province</label>
                        </div>
                        <div class="col">
                            <label><?php echo $User['provinceUser']; ?></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModifProvince" onclick="CountActUpUser('PROVINCE','resresresresProvince');">Modifier</button>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label>Téléphone</label>
                        </div>
                        <div class="col">
                            <label><?php echo $User['contactUser']; ?></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModifTel" onclick="CountActUpUser('CONTACT','resresresresContact');">Modifier</button>
                        </div>
                    </div><hr>
                    <label><b>Sécurité</b></label><hr>
                    <div class="row">
                        <div class="col">
                            <label>Mot de passe</label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <label></label>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModifMdpMdp">Modifier</button>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-sm btn-primary" data-dismiss="modal">Annuler</button> 
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container">
            <div class="modal fade" id="UserCommande">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-body">
                        <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                        <div class="col" style="text-align: center;">
                          <img src="content/data/image/logo/logo.png" width="90" height="90"><br>
                          <small class="text-uppercase">Listes des commandes effectuer : <?php echo $User['nomUser']; ?> <i class="fa fa-suitcase"></i></small>
                        </div><hr>
                        <span id="tableListeCommandeEffectruer"></span>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <form method="POST" target="UpdateProfil" enctype="multipart/form-data" action="controller/utilisateur/controller.utilisateur.php">
              <div class="modal fade" id="ModifAvatar">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Paramètre <i class="fa fa-cog"></i></h4>
                      <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="imageAvatar">Modification Image</label>
                            <input type="file" name="imgUPdateAvatar" id="imgUPdateAvatar" accept=".jpg,.png,.jpeg" class="form-control" onchange="CheckImage(this,'new_namebtnmodif','outPutAvatar');">
                            <input type="text" name="idUserAva" value="<?php if (isset($idUser)) {echo $idUser;}else{echo 0;}; ?>" hidden>
                        </div>
                        <img src="content/data/image/logo/logo.png" width="100" height="100" id="outPutAvatar" style="display: none;text-align: center;">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="new_namebtnmodif" name="modifAvatar">Modifier</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div> 
        <div class="container mt-3">
            <div class="modal fade" id="ModifNom">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Paramètre <i class="fa fa-cog"></i></h4>
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                  </div>
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="new_namemodif">Modification Nom (<span id="resresresresNom"></span>)</label>
                          <input type="text" name="new_namemodif" placeholder="Nom...." class="form-control" id="new_namemodif">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" id="new_namebtnmodif" onclick="ModificationUser('nomUser','new_namemodif');">Modifier</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="modal fade" id="ModifPreNom">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Paramètre <i class="fa fa-cog"></i></h4>
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                  </div>
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="new_prenamemodif">Modification Prénom (<span id="resresresresPreNom"></span>)</label>
                          <input type="text" name="new_prenamemodif" placeholder="Prénom...." class="form-control" id="new_prenamemodif">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" onclick="ModificationUser('prenomUser','new_prenamemodif');">Modifier</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="modal fade" id="ModifSexe">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Paramètre <i class="fa fa-cog"></i></h4>
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="new_sexemodif">Sexe (<span id="resresresresSexe"></span>)</label>
                          <select class="form-control" id="new_sexemodif">
                              <option></option>
                              <option value="Homme">Homme</option>
                              <option value="Femme">Femme</option>
                          </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" onclick="ModificationUser('sexeUser','new_sexemodif');">Modifier</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="modal fade" id="ModifTel">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Paramètre <i class="fa fa-cog"></i></h4>
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="new_telmodif">Modification Téléphone (<span id="resresresresContact"></span>)</label>
                          <input type="text" name="new_telmodif" placeholder="Téléphone...." class="form-control" id="new_telmodif">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" onclick="ModificationUser('contactUser','new_telmodif');">Modifier</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="modal fade" id="ModifProvince">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Paramètre <i class="fa fa-cog"></i></h4>
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="new_promodif">Modification Province (<span id="resresresresProvince"></span>)</label>
                          <select class="form-control" id="new_promodif">
                              <option></option>
                              <option value="Antananarivo">ANTANANARIVO</option>
                              <option value="Antsiranana">ANTSIRANANA</option>
                              <option value="Fianarantsoa">FIANARANTSOA</option>
                              <option value="Mahajanga">MAHAJANGA</option>
                              <option value="Toamasina">TOAMASINA</option>
                              <option value="Toliara">TOLIARA</option>
                          </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" onclick="ModificationUser('provinceUser','new_promodif');">Modifier</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="modal fade" id="ModifMdpMdp">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Paramètre <i class="fa fa-cog"></i></h4>
                    <button type="button" class="text-dark close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="new_name">Modification  mot de passe</label><hr>
                          <label for="new_name">Entrer l'ancien mot de passe</label>
                          <input type="password" id="old_mdp" placeholder="Ancien mot de passe...." class="form-control"><br>
                          <label for="new_name">Entrer le nouveau mot de passe</label>
                          <input type="password" id="new_mdp1" placeholder="Nouveau mot de passe...." class="form-control"><br>
                          <label for="new_name">Entrer le nouveau mot de passe</label>
                          <input type="password" id="new_mdp2" placeholder="Confimer Mot de passe...." class="form-control">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button id="new_mdpbtnmodif" class="btn btn-primary" onclick="ModificationUserPassword('old_mdp','new_mdp1','new_mdp2');">Modifier</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <iframe id="UpdateProfil" name="UpdateProfil" style="visibility: hidden;display: none;"></iframe>
    <?php } ?>

    <section class="">
		<div id="bodySurNav">
			<?php if (isset($idUser)) {?>
                <div class="container">
    	          	<div class="row">
		              <div class="col az-dashboard-one-title">
		                  <h2 class="az-dashboard-title">Bienvenue <?php 
		                  if ($User['prenomUser']=="") {echo $User['nomUser'];}else{echo $User['prenomUser'];}
		                   ?><br> <p class="az-dashboard-text" style="font-weight: normal;margin: 5px;">Votre site de vente en ligne assuré à Madagascar</p></h2>
		              </div>
		              <div class="col-lg-4 panier">
		              	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#UserCommande"><i class="fa fa-suitcase"></i></button>
		              	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#UserPanier" id="panierPanier"><i class="fa fa-shopping-cart"></i></button>
		              	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#UserPro"><i class="fa fa-user"></i></button>
		              	<button class="btn btn-primary btn-lg" onclick="LogOutUser();"><i class="fa fa-times-circle"></i></button>
		              </div>
                    </div>
	            </div>
         	<?php } ?>
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
							<a class="cliclHere" data-dismiss='modal' data-toggle="modal" data-target="#UserGuide">Politique & Règlement</a>
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
                    Un service rapide et fiable, des réponses uniques satisfaisant vos exigences, tout cela en ménageant votre portefeuille.
                </blockquote>
        </div>
        <section class='py-2 px-4 text-white mb-3' style='background:#344198;'>
            <h5 class='h5 text-uppercase'>Action à faire</h5>
        </section>
        <div class="descSurSur">
            <div class="row">
                <div class="Sur9 col-sm-4 text-center">
                    <h1 class="compteR"><i class="fa fa-shopping-cart"></i></h1>
                    <small>Remplissez votre panier en visitant les produitsn, services et formations disponible sur le site</small>
                </div>
                <div class="Sur9 col-sm-4 text-center">
                    <h1 class="compteR"><i class="fa fa-suitcase"></i></h1>
                    <small>Validez votre commande en remplissant le formulaire et en acceptant le politique et règle d'utilisation</small>
                </div>
                <div class="Sur9 col-sm-4 text-center">
                    <h1 class="compteR"><i class="fa fa-phone"></i></h1>
                    <small>SUR analysera votre commande et vous contactera par la suite</small>
                </div>
            </div>
            <section class='py-2 px-4 mb-2' style='background:#344198;'></section>
            <h4 align="center">
                La sécurité du site et nos services vous accompagne
            </h4>
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
<?php if (isset($idUser)) { ?>
    <span id="bellEffC"></span>
    <div class="settings-trigger-two" data-toggle="modal" data-target="#UserCommande">
        <i class="fa fa-suitcase"></i>
    </div>
    <div class="settings-trigger-one" data-toggle="modal" data-target="#UserPanier">
        <i class="fa fa-shopping-cart"></i>
    </div>
<?php }else{ ?>
    <span id="bellUNav"></span>
    <div class="settings-trigger-three2" data-dismiss="modal" data-toggle="modal" data-target="#UserCommandeNav" onclick="RecupCommandeNav()">
        <i class="fa fa-suitcase"></i>
    </div>
    <div class="settings-trigger-two" data-dismiss="modal" data-toggle="modal" data-target="#UserPanierNav" onclick="RecupPanierUserNav()">
        <i class="fa fa-shopping-cart"></i>
    </div>
    <div class="settings-trigger-one" data-toggle="modal" data-target="#UserGuide">
        <i class="fa fa-gavel"></i>
    </div>
<?php } ?>


    <?php if (isset($idUser)) {?>
    <script src="content/assets/template/jquery/jquery.min.js"></script>
    <script src="content/assets/template/js/azarat.js"></script>
	<?php } ?>
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