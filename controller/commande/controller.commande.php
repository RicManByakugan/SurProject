<?php 

	if (isset($_POST['CommandeOK'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {
			include '../../modele/commande/modele.commande.php';
			include '../../modele/panier/modele.panier.php';
			include '../../modele/notification/modele.notification.php';
			include '../../modele/publication/modele.publication.php';
			include '../../modele/notificationUser/modele.notificationUser.php';
			include '../../config/connexion.php';
			
			$modeleCommande = new Commande();
			$modeleNotif = new ModeleNotification();
			$modelePanier = new Panier();
			$modelePub = new ModelePub();
			$modeleUserN = new ModeleNotificationUser();

			$idUser = $_SESSION['idUser'];
			$operateur = $_POST['TypeMo'];
			$Numero = $_POST['NumMo'];
			$Adresse = $_POST['AdresMo'];
			$Province = $_POST['ProMo'];

			if ($Numero!=NULL && preg_match("#^03[2-4]{1}[0-9]{7}$#", $Numero)) {

				if (preg_match("#^032[0-9]{7}$#", $Numero) && $operateur=="OMONEY") {
					$test = "ok";
				}
				elseif (preg_match("#^034[0-9]{7}$#", $Numero) && $operateur=="MVOLA") {
					$test = "ok";
				}
				elseif (preg_match("#^033[0-9]{7}$#", $Numero) && $operateur=="AMONEY") {
					$test = "ok";
				}else {
					$test = "ko";
				}

				if ($test == "ok") {
					
					$donnePanier = $modelePanier->RecupPanier($idUser);

					$idComCoUser = $idUser.rand(0,100000);
					$testTest = $modeleCommande->TestIC($idComCoUser);
		 			$motif = "SUR, Vous propose l'article suivante";
					$idPUBe = 0;

					if ($testTest=="ko") {
						$idComCoUserI = $idUser.rand(0,100000).rand(0,100000);
						foreach ($donnePanier as $key => $value2) {
							$modeleCommande->AddCommande($idComCoUserI,$idUser,$value2['idPubPanier'],$value2['QtPanier'],$operateur,$Numero,$Adresse,$Province);
							$donnePub = $modelePub->GetAnotherPost($value2['idPubPanier'],$value2['type_pub'],$value2['categorie_pub']);
							foreach ($donnePub as $key => $valuep) {
								$idPUBe = $valuep['id_pub'];
							}
						}

		 				$modeleNotif->AddNotifCommande($idComCoUserI,$idUser,"NOUVELLE COMMANDE");
						$modeleUserN->AddNotifPub($idUser,$idPUBe,$motif);
					}else{
						foreach ($donnePanier as $key => $value2) {
							$modeleCommande->AddCommande($idComCoUser,$idUser,$value2['idPubPanier'],$value2['QtPanier'],$operateur,$Numero,$Adresse,$Province);
							$donnePub = $modelePub->GetAnotherPost($value2['idPubPanier'],$value2['type_pub'],$value2['categorie_pub']);
							foreach ($donnePub as $key => $valuep) {
								$idPUBe = $valuep['id_pub'];
							}
						}
		 				$modeleNotif->AddNotifCommande($idComCoUser,$idUser,"NOUVELLE COMMANDE");
						$modeleUserN->AddNotifPub($idUser,$idPUBe,$motif);
					}


					$modelePanier->AccepteCoAttente($idUser);	

					echo "ok";

				}else{
					echo "Numéro et mobile incorrecte";
				}

			}else{
				echo "Format téléphone incorrecte";
			}

		}else{
			echo "Erreur";
		}

	}

	if (isset($_POST['RecupCommandeP'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {
			include '../../modele/commande/modele.commande.php';
			include '../../config/connexion.php';
			$modeleCommande = new Commande();

			$idUserr = $_SESSION['idUser'];

			$donne = $modeleCommande->RecupCommandeId($idUserr);

			if ($donne) {

					echo "
						<div class='table-responsive mb-4'>
						<table class='table'>
								<thead class='bg-light'>
				                    <tr>
				                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase align-items-center'>Numéro De Commande</strong></th>
				                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Status</strong></th>
				                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Date</strong></th>
				                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Heure</strong></th>
				                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'></strong></th>
				                    </tr>
				                 </thead>
				                 <tbody>
					";
						foreach ($donne as $key => $value) {
								if ($value['statusCom']=="ENVOIE") {
									$st = "<span class='badge-primary px-3'>EN ATTENTE</span>";
								}elseif ($value['statusCom']=="VALIDER") {
									$st = "<span class='badge-success px-3'>CONCLUS</span>";
								}elseif ($value['statusCom']=="LIVRAISON") {
									$st = "<span class='badge-warning px-3'>SUR LA ROUTE</span>";
								}elseif ($value['statusCom']=="DECLINER") {
									$st = "<span class='badge-danger px-3'>DECLINER</span>";
								}else{
									$st = "";
								}
								echo "
									<tr>
				                      <th class='border-0' scope='col'>".$value['idComCoUser']."</th>
				                      <th class='border-0' scope='col'>".$st."</th>
				                      <th class='border-0' scope='col'>".$value['dateCom']."</th>
				                      <th class='border-0' scope='col'>".$value['heureCom']."</th>
				                      <th class='border-0' onclick=\"AfficheDetailleCommande(".$value['idComCoUser'].");\" scope='col' style='cursor:pointer;' data-dismiss='modal' data-toggle='modal' data-target='#ComDetaille'><button class='btn btn-primary btn-sm'>VOIR</button></th>
				                    </tr>
								";
						}
					echo "
				                 </tbody>							
						</table>
						</div>
					";
			}else {
					echo "
						<div class='row'>
							<div class='col'>
								<h6 class='align-middle border-0'>Aucune commande faite</h6>
							</div>
							<div class='col'>
								<button style='float: right;' class='btn btn-sm btn-primary btn-sm' data-dismiss='modal' data-toggle='modal' onclick=\"ScrollToTo('secondary-bar')\">Effectuer des commandes</button>
							</div>
						</div>
					";
			}
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['RecupDetailmm'])) {
		include '../../modele/commande/modele.commande.php';
		include '../../modele/sur/modele.sur.php';
		include '../../config/connexion.php';
		
		$modeleSur = new SurModele();
		$modeleCommande = new Commande();

		$idUseidComCom = $_POST['idUseidComCom'];
		$sur = $modeleSur->GetSur();

		$donne = $modeleCommande->RecupCommandeCoUser($idUseidComCom);

		$sommeTotal = 0;
		$resStat = "";
		$supCo = "";
		$annuler = "";
		foreach ($donne as $key => $value2) {
				$somme2 = $value2['prix_pub']*$value2['QtCom'];
				$sommeTotal = $sommeTotal+$somme2;
				if ($value2['statusCom'] == "ENVOIE") {
					$resStat = "<h6 align='center' class='text-small badge-primary'>Status : En attente (Ananlyse en cours, SUR vous contactera)</h6>";
					$annuler = "<button class='btn btn-primary btn-sm' onclick='AnnulerCommande(".$idUseidComCom.")' data-dismiss='modal'>ANNULER <i class='fa fa-times'></i></button>";
				}elseif ($value2['statusCom'] == "LIVRAISON") {
					$resStat = "<h6 align='center' class='text-small badge-warning'>Status : Sur la route (Livraison en cours)</h6>";
				}elseif ($value2['statusCom'] == "VALIDER") {
					$resStat = "<h6 align='center' class='text-small badge-success'>Status : Merci pour votre achat</h6>";
				}elseif ($value2['statusCom'] == "DECLINER") {
					$resStat = "<h6 align='center' class='text-small badge-danger'>Status : Offre décliné</h6>";
					$supCo = "<button class='btn btn-danger btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#UserCommande' onclick='SupCommandeUser(".$idUseidComCom.");'>SUPPRIMER <i class='fa fa-trash'></i></button>";
				}else{
					$resStat = "";
				}

				if ($value2['opCom'] == "MVOLA") {
					$operateurop = "MVOLA";
					$mobile = $value2['numCom'];
					$urlImgOp = "content/data/image/m.png";
				}
				elseif ($value2['opCom'] == "AMONEY") {
					$operateurop = "AIRTEL MONEY";
					$mobile = $value2['numCom'];
					$urlImgOp = "content/data/image/a.png";
				}
				elseif ($value2['opCom'] == "OMONEY") {
					$operateurop = "ORANGE MONEY";
					$mobile = $value2['numCom'];
					$urlImgOp = "content/data/image/o.png";
				}
				else{
					$operateurop = "BO";
					$mobile = $value2['numCom'];
					$urlImgOp = "";
				}

				if ($value2['causeDec'] == NULL || $value2['causeDec']=="") {				
					$causeDec = "";
				}else{
					$causeDec = "<div class='row'><div class='col'><b><label class='text-small badge-danger px-3'>Cause</label><br><span class='text-small badge-danger px-3'>".$value2['causeDec']."</span></b></div></div>";
				}

		}

		echo "
			<div class='col' style='text-align: center;'>
				<img src='content/data/image/logo/logo.png' width='90' height='90'><br>
			    <small>Détaille du commande ".$idUseidComCom." <i class='fa fa-shopping-cart'></i></small>
			</div><hr>
			<div class='row'>
                    <div class='col'>
                    	".$resStat."
                    </div>
			</div>
			".$causeDec."<hr>
			<div class='row'>
                    <div class='col'>
                    	<h6 align='left' class='text-small text-muted'>Paiment Mobile : ".$operateurop."</h6>
                    </div>
                    <div class='col'>
                    	<h6 align='right' class='text-small text-muted'>Mobile : ".$mobile."</h6>
                    </div>
			</div><hr>
			<div class='row'>
                    <div class='col-sm-4'>
                    	<h4 align='left' class='text-muted'><img src='".$urlImgOp."'  width='30' height='25'/> ".number_format($sommeTotal)." Ar</h4>
                    </div>
                    <div class='col'>
                        <div style='float: right;'>
                        	<button class='btn btn-primary btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#AppelSur'>CONTACTER <i class='fa fa-phone'></i></button>
		                   	<!-- <button class='btn btn-primary btn-sm'>PDF <i class='fa fa-file-pdf-o'></i></button>-->
		                   	".$annuler."
		                   	".$supCo."
		                   	<button class='btn btn-primary btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#UserCommande'>COMMANDE <i class='fa fa-arrow-right'></i></button>
                       	</div>
                    </div>
			</div><hr>
			<div class='table-responsive mb-4'>
					<table class='table'>
							<thead class='bg-light'>
			                    <tr>
			                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase align-items-center'>Commande</strong></th>
			                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Prix (Ar)</strong></th>
			                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Quantité</strong></th>
			                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Total (Ar)</strong></th>
			                    </tr>
			                 </thead>
			                 <tbody>
		";
			foreach ($donne as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$url = "content/data/image/publication/".$value['img1_pub'];
					}else{
						$url = "content/data/image/logo.png";
					}

					$somme = $value['prix_pub']*$value['QtCom'];

					echo "
								<tr>
				                    <th class='pl-0 border-0' scope='row'>
				                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
				                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$value['titre_pub']." (".$value['categorie_pub'].")</a></strong></div>
				                        </div>
				                    </th>
				                    <td class='align-middle border-0'>
				                        <p class='mb-0'>".number_format($value['prix_pub'])."</p>
				                    </td>
				                    <td class='align-middle border-0'>
				                        <div class='d-flex align-items-center justify-content-between px-3'>
				                        	<div class='quantity'>
				                            	<input type='number' class='form-control form-control-sm border-0 shadow-0 p-0' value='".$value['QtCom']."' style='text-align:center;' min='1' readonly>
				                          	</div>
				                        </div>
				                    </td>
				                    <td class='align-middle border-0'>".number_format($somme)."</td>
				                    <td class='align-middle border-0'></td>
				                </tr>
					";
			}


		echo "
			                 </tbody>							
					</table>
			</div>
			";
	}





// -------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------


	if (isset($_POST['GetAllC'])) {
		include '../../modele/commande/modele.commande.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new Commande();

		$donne = $modeleCommande->RecupAllCommande();

		if ($donne) {
		
			foreach ($donne as $key => $value) {
					if ($value['imageUser']=="" || $value['imageUser']==NULL) {
						$urlImg = "content/data/image/utilisateur/profile.png";
					}else{
						$urlImg = "content/data/image/utilisateur/".$value['imageUser'];
					}

					if ($value['statusCom'] == "ENVOIE") {
						$pozy = "<small class='badge badge-primary'>Nouveau</small>";
					}elseif ($value['statusCom'] == "LIVRAISON") {
						$pozy = "<small class='badge badge-warning'>Livraison</small>";
					}elseif ($value['statusCom'] == "VALIDER") {
						$pozy = "<small class='badge badge-success'>Conclus</small>";
					}elseif ($value['statusCom'] == "DECLINER") {
						$pozy = "<small class='badge badge-danger'>Décliner</small>";
					}elseif ($value['statusCom'] == "ANNULER") {
						$pozy = "<small class='badge badge-danger'>Annuler</small>";
					}else{
						$pozy = "";
					}

				echo "
										<li class='item' style='cursor: pointer;' onclick='DetailleOneCommande(".$value['idComCoUser'].")'>
						                    <div class='product-img'>
						                      <img src='".$urlImg."' alt='".$value['imageUser']."' class='img-size-50'>
						                    </div>
						                    <div class='product-info'>
						                      <span class='product-'>".$value['nomUser']." ".$value['prenomUser']."</span>
						                        <span class='float-right'>".$value['idComCoUser']."</span>
						                      <span class='product-description'>
						                        ".$value['dateCom']." | ".$value['heureCom']." ".$pozy."
						                      </span>
						                    </div>
						                  </li>
				";

			}
		}else{
				echo "
										<li class='item'>
						                    Aucune commande pour l'instant ...
						                  </li>
				";
		}
	}
	if (isset($_POST['GetAllCC'])) {
		include '../../modele/commande/modele.commande.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new Commande();

		$st = $_POST['GetAllCC'];

		$donne = $modeleCommande->RecupAllCommandeStatusS($st);

		if ($donne) {
		
			foreach ($donne as $key => $value) {
					if ($value['imageUser']=="" || $value['imageUser']==NULL) {
						$urlImg = "content/data/image/utilisateur/profile.png";
					}else{
						$urlImg = "content/data/image/utilisateur/".$value['imageUser'];
					}

					if ($value['statusCom'] == "ENVOIE") {
						$pozy = "<small class='badge badge-primary'>Nouveau</small>";
					}elseif ($value['statusCom'] == "LIVRAISON") {
						$pozy = "<small class='badge badge-warning'>Livraison</small>";
					}elseif ($value['statusCom'] == "VALIDER") {
						$pozy = "<small class='badge badge-success'>Conclus</small>";
					}elseif ($value['statusCom'] == "DECLINER") {
						$pozy = "<small class='badge badge-danger'>Décliner</small>";
					}elseif ($value['statusCom'] == "ANNULER") {
						$pozy = "<small class='badge badge-danger'>Annuler</small>";
					}else{
						$pozy = "";
					}

				echo "
										<li class='item' style='cursor: pointer;' onclick='DetailleOneCommande(".$value['idComCoUser'].")'>
						                    <div class='product-img'>
						                      <img src='".$urlImg."' alt='Product Image' class='img-size-50'>
						                    </div>
						                    <div class='product-info'>
						                      <span class='product-'>".$value['nomUser']." ".$value['prenomUser']."</span>
						                        <span class='float-right'>".$value['idComCoUser']."</span>
						                      <span class='product-description'>
						                        ".$value['dateCom']." | ".$value['heureCom']." ".$pozy."
						                      </span>
						                    </div>
						                  </li>
				";

			}
		}else{
				echo "
										<li class='item'>
						                    Aucune donnée pour l'instant ...
						                  </li>
				";
		}
	}

	if (isset($_POST['SUicl'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/commande/modele.commande.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			
			$modeleActivite = new ActivityAdmin();
			$modeleCommande = new Commande();

			$idCo = $_POST['idCoCSu'];
			$idAdmin = $_SESSION['id_admin'];

			$modeleCommande->SupIDCommande($idCo);

			$descAct = "SUPPRESSION";
			$typePub = "COMMANDE";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

			echo "ok";
		}else{
			echo "Erreur";
		}
	}
	
	if (isset($_POST['SUiclUser'])) {
		include '../../modele/commande/modele.commande.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new Commande();

		$idCo = $_POST['idCoCSuU'];

		$modeleCommande->SupIDCommande($idCo);

		echo "ok";
	}

	if (isset($_POST['Decl'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/commande/modele.commande.php';
			include '../../modele/notificationUser/modele.notificationUser.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			
			$modeleCommande = new Commande();
			$modeleActivite = new ActivityAdmin();
			$modeleUser = new ModeleNotificationUser();
		
			$idAdmin = $_SESSION['id_admin'];
			$idCo = $_POST['idCoD'];
			$motif = $_POST['motifD'];
			$idUser = 0;

			$modeleCommande->DeclineCommande($idCo,$motif);
			$userCo = $modeleCommande->RecupUserCommande($idCo);
			foreach ($userCo as $key => $value) {
				$idUser = $value['idUser'];
			}

			$descAct = "DECLINER";
			$typePub = "COMMANDE";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

			$modeleUser->AddNotifCo($idUser,$idCo,$motif);
			echo "ok";
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['AnclC'])) {
		include '../../modele/commande/modele.commande.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new Commande();

		$idCo = $_POST['idCoAnC'];

		$modeleCommande->AnnuleCommande($idCo);

		echo "ok";
	}

	if (isset($_POST['Licl'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/commande/modele.commande.php';
			include '../../config/connexion.php';
			include '../../modele/notificationUser/modele.notificationUser.php';
			include '../../modele/activite/modele.activite.php';
			
			$modeleCommande = new Commande();
			$modeleActivite = new ActivityAdmin();
			$modeleUser = new ModeleNotificationUser();

			$idCo = $_POST['idCoLi'];
			$idAdmin = $_SESSION['id_admin'];

			$modeleCommande->LivreCommande($idCo);

			$idUser = 0;
			$userCo = $modeleCommande->RecupUserCommande($idCo);
			foreach ($userCo as $key => $value) {
				$idUser = $value['idUser'];
			}

			$descAct = "LIVRAISON";
			$typePub = "COMMANDE";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

		 	$motif = "Votre commande est sur la route";
			$modeleUser->AddNotifCo($idUser,$idCo,$motif);
			echo "ok";
		}else{
			echo "Erreur";
		}
	}
	if (isset($_POST['Cicl'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/commande/modele.commande.php';
			include '../../config/connexion.php';
			include '../../modele/notificationUser/modele.notificationUser.php';
			include '../../modele/activite/modele.activite.php';
			
			$modeleActivite = new ActivityAdmin();
			$modeleUser = new ModeleNotificationUser();
			$modeleCommande = new Commande();

			$idCo = $_POST['idCoCi'];
			$idAdmin = $_SESSION['id_admin'];

			$modeleCommande->ConclureCommande($idCo);

			$idUser = 0;
			$userCo = $modeleCommande->RecupUserCommande($idCo);
			foreach ($userCo as $key => $value) {
				$idUser = $value['idUser'];
			}


			$descAct = "CONCLURE";
			$typePub = "COMMANDE";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

		 	$motif = "Merci pour votre achat, Merci de nous avoir choisi";
			$modeleUser->AddNotifCo($idUser,$idCo,$motif);
			echo "ok";
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['GetDeSurCo'])) {
		include '../../modele/commande/modele.commande.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new Commande();

		$idCo = $_POST['idCo'];

		$donne = $modeleCommande->RecupAllCommandeIdCo($idCo);
		

		if ($donne) {

				$state = "";
				$urlImg = "";
				$nom = "";
				$prenom = "";
				$tel = "";
				$btn = "";

				$donnePub = $modeleCommande->RecupCommandeCo($idCo);
				$sommeTotal = 0;
				$somme2 = 0;
				foreach ($donnePub as $key => $valueP) {
					$somme2 = $valueP['prix_pub']*$valueP['QtCom'];
					$sommeTotal = $sommeTotal+$somme2;	
				}
				$motif = "";				
				foreach ($donne as $key => $value) {
					if ($value['statusCom'] == "ENVOIE") {
						$state = "<h4 class='badge badge-primary float-right'>Status : EN ATTENTE DE REPONSE</h4>";
						$btn = "<button class='btn btn-primary btn-sm btn-sm' onclick='LivreCommande(".$idCo.");LoadFacture(".$idCo.");'>EFFECTUER LIVRAISON <i class='fa fa-bicycle'></i></button>
						<button class='btn btn-danger btn-sm' data-toggle='collapse' data-target='#motif".$idCo."'>DECLINER <i class='fa fa-times'></i></button>";
						$motif = "
								<span class='collapse' id='motif".$idCo."'>
									<div class='form-group'>
										<label>Motif </label>
										<textarea class='form-control' id='textMotifmotif".$idCo."' placeholder='Ecrivez pour le client ...'></textarea>
									</div>
									<button style='width:100%;' class='btn btn-primary btn-sm' onclick=\"DeclineCommande(".$idCo.",'textMotifmotif".$idCo."')\">DECLINER</button>
								</span>
						";
					}
					elseif ($value['statusCom'] == "LIVRAISON") {
						$state = "<h4 class='badge badge-warning float-right'>STATUS : MODE LIVRAISON</h4>";
						$btn = "<button class='btn btn-warning btn-sm' onclick='ConclureCommande(".$idCo.")'>CONCLURE <i class='fa fa-check'></i></button>";
					}
					elseif ($value['statusCom'] == "VALIDER") {
						$state = "<h4 class='badge badge-success  float-right'>STATUS : CONCLUS</h4>";
						$btn = "<button class='btn btn-success btn-sm' disabled>CONCLUS <i class='fa fa-check'></i></button>";
					}
					elseif ($value['statusCom'] == "DECLINER") {
						$state = "<h4 class='badge badge-danger  float-right'>STATUS : DECLINER</h4>";
						$btn = "<button class='btn btn-danger btn-sm' disabled>DECLINER <i class='fa fa-check'></i></button>";
					}
					elseif ($value['statusCom'] == "ANNULER") {
						$state = "<h4 class='badge badge-danger  float-right'>STATUS : ANNULER PAR L'UTILISATEUR</h4>";
						$btn = "<button class='btn btn-danger btn-sm' onclick='SupCommande(".$idCo.")'>SUPPRIMER <i class='fa fa-trash'></i></button>";
					}else{
						$state = "";
						$btn = "";
					}


					if ($value['imageUser']=="" || $value['imageUser']==NULL) {
						$urlImg = "content/data/image/utilisateur/profile.png";
					}else{
						$urlImg = "content/data/image/utilisateur/".$value['imageUser'];
					}

					$nom = $value['nomUser'];
					$prenom = $value['prenomUser'];
					$tel = $value['numCom'];
					$lieuAd = $value['adreCom'];
					$province = $value['proCom'];

					if ($value['opCom'] == "MVOLA") {
						$op = "MVOLA";	
					}elseif ($value['opCom'] == "AMONEY") {
						$op = "AIRTEL MONEY";	
					}elseif ($value['opCom'] == "OMONEY") {
						$op = "ORANGE MONEY";					
					}

				}


				echo "
								<div class='row'>
						              			<div class='col'>
						              				".$state."
						              			</div>
						              		</div>
						              		<div class='tete' style='text-align: center;'>
						                        <img src='".$urlImg."' width='15%'>
						              			<h4>".$nom." ".$prenom."</h4>
						              		</div><hr>
						              		<div class='row'>
								                    <div class='col'>
								                        <div style='float: right;'>
								                        	<a href='tel:".$tel."'><button class='btn btn-primary btn-sm btn-sm'>CONTACTER <i class='fa fa-phone'></i></button></a>
								                        	".$btn."
								                       	</div>
								                    </div>
											</div>
						              		<div class='col'>
						              			".$motif."
											</div>
											<!-- <hr><div class='row'>
													<div class='col'>
															<small>Entrer le lieu de livraison</small>
								                       		<input type='text' name='nomPub' class='form-control' placeholder='Lieu de livraison'>
								                        	<button class='btn btn-primary btn-sm btn-sm' style='width: 100%;'>Entrer</button>
								                    </div>
											</div> -->
											<hr>
											<div class='row container'>
								                    <div class='col'>
								                    	<h6 align='left' class='text-muted'><b>Paiment : ".$op."</b></h6>
								                    </div>
								                    <div class='col'>
								                    	<h6 align='center' class='text-muted'><b>Numéro : ".$tel."</b></h6>
								                    </div>
								                    <div class='col'>
								                    	<h6 align='right' class='text-muted'><b>Total : ".number_format($sommeTotal)." Ar</b></h6>
								                    </div>
											</div><hr>
											<div class='row container'>
								                    <div class='col'>
								                    	<h6 align='left' class='text-muted'><b>".$lieuAd."</b></h6>
								                    </div>
								                    <div class='col'>
								                    	<h6 align='center' class='text-muted text-uppercase'><b></b></h6>
								                    </div>
								                    <div class='col'>
								                    	<h6 align='right' class='text-muted'><b>".$province."</b></h6>
								                    </div>
											</div>
											<hr>
											<div class='table-responsive mb-4'>
												<table class='table'>
														<thead class='bg-light'>
										                    <tr>
										                      <th class='border-0' scope='col'> <small><strong class='text-uppercase align-items-center'>Commande</strong></small></th>
										                      <th class='border-0' scope='col'><small><strong class='text-uppercase'>Prix (Ar)</strong></small></th>
										                      <th class='border-0' scope='col'><small><strong class='text-uppercase'>Quantité</strong></small></th>
										                      <th class='border-0' scope='col'><small><strong class='text-uppercase'>Total (Ar)</strong></small></th>
										                    </tr>
										                 </thead>
										                 <tbody>
				";

											foreach ($donnePub as $key => $valuePub) {

													if ($valuePub['img1_pub']!=NULL || $valuePub['img1_pub']!="") {
														$url = "content/data/image/publication/".$valuePub['img1_pub'];
													}else{
														$url = "content/data/image/logo.png";
													}

													$somme = $valuePub['prix_pub']*$valuePub['QtCom'];


													echo "
																<tr>
												                    <th class='pl-0 border-0' scope='row'>
												                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
												                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$valuePub['titre_pub']." (".$valuePub['categorie_pub'].")</a></strong></div>
												                        </div>
												                    </th>
												                    <td class='align-middle border-0'>
												                        <p class='mb-0'>".number_format($valuePub['prix_pub'])."</p>
												                    </td>
												                    <td class='align-middle border-0'>
												                        <div class='d-flex align-items-center justify-content-between px-3'>
												                        	<div class='quantity'>
												                            	<input type='number' class='form-control form-control-sm border-0 shadow-0 p-0' value='".$valuePub['QtCom']."' style='text-align:center;' min='1' readonly>
												                          	</div>
												                        </div>
												                    </td>
												                    <td class='align-middle border-0'>".number_format($somme)."</td>
												                    <td class='align-middle border-0'></td>
												                </tr>	

														";
											}



				echo"
															</tbody>
										        </table>     
										    </div>    
				";



		}else{
			echo "Erreur de l'affichage, Selectionnez une commande";
		}
	}
	// -----------FACTURE--------------------------------------------------
	if (isset($_POST['GetDeSurCoFacture'])) {
		include '../../modele/commande/modele.commande.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new Commande();

		$idCo = $_POST['idCoFacture'];

		$donne = $modeleCommande->RecupAllCommandeIdCo($idCo);
		

		if ($donne) {

				$state = "";
				$urlImg = "";
				$nom = "";
				$prenom = "";
				$tel = "";
				$btn = "";

				$donnePub = $modeleCommande->RecupCommandeCo($idCo);
				$sommeTotal = 0;
				$somme2 = 0;
				foreach ($donnePub as $key => $valueP) {
					$somme2 = $valueP['prix_pub']*$valueP['QtCom'];
					$sommeTotal = $sommeTotal+$somme2;	
				}
				$motif = "";				
				foreach ($donne as $key => $value) {

					if ($value['imageUser']=="" || $value['imageUser']==NULL) {
						$urlImg = "content/data/image/logo.png";
					}else{
						$urlImg = "content/data/image/logo.png";
					}

					$nom = $value['nomUser'];
					$prenom = $value['prenomUser'];
					$tel = $value['numCom'];
					$lieuAd = $value['adreCom'];
					$province = $value['proCom'];

					if ($value['opCom'] == "MVOLA") {
						$op = "MVOLA";	
						$urlImgOp = "content/data/image/m.png";
					}elseif ($value['opCom'] == "AMONEY") {
						$op = "AIRTEL MONEY";	
						$urlImgOp = "content/data/image/a.png";
					}elseif ($value['opCom'] == "OMONEY") {
						$op = "ORANGE MONEY";							
						$urlImgOp = "content/data/image/o.png";
					}

				}


				echo "
								<div class='row'>
						              		<div class='col'>
						              				<h4 class='badge badge-warning float-right'>Commande ".$idCo."</h4>
						              				<span class='float-left'>
							              				<small class='text-muted'>NIF : 4005544710</small><br>
							              				<small class='text-muted'>STAT : 47912112021004025</small>
						              				</span>
						              		</div>
						              		</div>
						              		<div class='tete' style='text-align: center;'>
						                        <img src='".$urlImg."' width='15%'><br>
						              			<h5>SOLUTION UNIQUE ET RAPIDE</h5>
						              		</div><hr>
						              		<div class='row'>
								                    <div class='col'>
								                        <div style='float: left;'>
								                        	<button class='btn btn-warning btn-sm btn-sm'>".date("d-m-Y")."</button>
								                       	</div>
								                    </div>
								                    <div class='col'>
								                        <h3 align='right'>
								                        	<button class='btn btn-warning btn-sm'>FACTURE DE COMMANDE</button>
								                       	</h3>
								                    </div>
											</div><hr>
											<div class='row container'>
								                    <div class='col'>
								                    	<h6 align='left' class='text-muted'><b>Au nom de ".$nom." ".$prenom."</b></h6>
								                    </div>
								                    <div class='col'>
								                    	<h6 align='right' class='text-muted'><b>".$lieuAd." | ".$province."<b></h6>
								                    </div>
											</div><hr>
											<div class='row container'>
								                    <div class='col'>
								                    	<h6 align='left'>Paiment : ".$op."</h6><br>
								                    	<h6 align='left'>Mobile : ".$tel."</h6><br>
								                    </div>
								                    <div class='col'>
								                    	<img src='".$urlImgOp."' class='float-right' width='70' height='70'/>
								                    </div>
											</div><hr>
											<div class='table-responsive mb-4'>
												<table class='table'>
														<thead class='bg-light'>
										                    <tr>
										                      <th class='border-0' scope='col'> <small><strong class='text-uppercase align-items-center'>Commande</strong></small></th>
										                      <th class='border-0' scope='col'><small><strong class='text-uppercase'>Prix (Ar)</strong></small></th>
										                      <th class='border-0' scope='col'><small><strong class='text-uppercase'>Nombre</strong></small></th>
										                      <th class='border-0' scope='col'><small><strong class='text-uppercase'>Total (Ar)</strong></small></th>
										                    </tr>
										                 </thead>
										                 <tbody>
				";

											foreach ($donnePub as $key => $valuePub) {

													if ($valuePub['img1_pub']!=NULL || $valuePub['img1_pub']!="") {
														$url = "content/data/image/publication/".$valuePub['img1_pub'];
													}else{
														$url = "content/data/image/logo.png";
													}

													$somme = $valuePub['prix_pub']*$valuePub['QtCom'];


													echo "
																<tr>
												                    <th class='pl-0 border-0' scope='row'>
												                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
												                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$valuePub['titre_pub']." (".$valuePub['categorie_pub'].")</a></strong></div>
												                        </div>
												                    </th>
												                    <th class='align-middle border-0'>
												                        <p class='mb-0'>".number_format($valuePub['prix_pub'])."</p>
												                    </th>
												                    <td class='align-middle border-0'>
												                        <div class='d-flex align-items-center justify-content-between px-3'>
												                        	<div class='quantity'>
												                            	<input type='number' class='form-control form-control-sm border-0 shadow-0 p-0' value='".$valuePub['QtCom']."' style='text-align:center;' min='1' readonly>
												                          	</div>
												                        </div>
												                    </td>
												                    <th class='align-middle border-0'>".number_format($somme)."</th>
												                    <th class='align-middle border-0'></th>
												                </tr>	

														";
											}



				echo"
															</tbody>
										        </table>
										        <hr>
												<div class='row container'>
									                    <div class='col'>
									                    	<h6 align='left'>Commande : <b>".number_format($sommeTotal)." Ar</b></h6>
									                    </div>
									                    <div class='col'>
									                    	<h6 align='right'>Livraison : <b>".number_format(5000)." Ar</b></h6>
									                    </div>
												</div> 
												<hr>   
												<div class='row container'>
									                    <div class='col'> 
									                    	<br>
									                    	<h6 align='left'>Total : <b>".number_format($sommeTotal+5000)." Ar</b></h6>
									                    	<br>
									                    	<br>
									                    </div>
									                    <div class='col'> 
									                    	<br>
									                    	<h6 align='right'>Signature</h6>
									                    	<br>
									                    	<br>
									                    </div>
												</div> 
										    </div>    
				";



		}else{
			echo "Erreur de l'affichage, Selectionnez une commande";
		}
	}
	// -----------FACTURE--------------------------------------------------








 ?>