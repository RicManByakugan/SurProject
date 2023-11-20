<?php 

	if (isset($_POST['GetDeSurCo'])) {
		include '../../modele/utilisateurNav/modele.ausernav.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new CommandeR();

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
					$dateNowA = date("Y-m-d");
					if ($valueP['prix_prom'] == NULL && $valueP['date_com'] == NULL || $valueP['date_com'] < $dateNowA) {
						$somme2 = $valueP['prix_pub']*$valueP['QtCNCa'];
					}else{
						$somme2  = ($valueP['prix_pub'] - (($valueP['prix_pub'] * $valueP['prix_prom']) / 100)) * ($valueP['QtCNCa']) ;
					}
					$sommeTotal = $sommeTotal + $somme2;	
				}
				$motif = "";				
				foreach ($donne as $key => $value) {
					if ($value['statusNCa'] == "ENVOIE") {
						$state = "<h4 class='badge badge-primary float-right'>Status : EN ATTENTE DE REPONSE</h4>";
						$btn = "<button class='btn btn-primary btn-sm btn-sm' onclick='LivreCommandeRR(".$idCo.");LoadFactureRR(".$idCo.");'>EFFECTUER LIVRAISON <i class='fa fa-bicycle'></i></button>
						<button class='btn btn-danger btn-sm' data-toggle='collapse' data-target='#motif".$idCo."'>DECLINER <i class='fa fa-times'></i></button>";
						$motif = "
								<span class='collapse' id='motif".$idCo."'>
									<div class='form-group'>
										<label>Motif </label>
										<textarea class='form-control' id='textMotifmotifR".$idCo."' placeholder='Ecrivez pour le client ...'></textarea>
									</div>
									<button style='width:100%;' class='btn btn-primary btn-sm' onclick=\"DeclineCommandeR(".$idCo.",'textMotifmotifR".$idCo."')\">DECLINER</button>
								</span>
						";
					}
					elseif ($value['statusNCa'] == "LIVRAISON") {
						$state = "<h4 class='badge badge-warning float-right'>STATUS : MODE LIVRAISON</h4>";
						$btn = "<button class='btn btn-warning btn-sm' onclick='ConclureCommandeR(".$idCo.")'>CONCLURE <i class='fa fa-check'></i></button>";
					}
					elseif ($value['statusNCa'] == "VALIDER") {
						$state = "<h4 class='badge badge-success  float-right'>STATUS : CONCLUS</h4>";
						$btn = "<button class='btn btn-success btn-sm' disabled>CONCLUS <i class='fa fa-check'></i></button>";
					}
					elseif ($value['statusNCa'] == "DECLINER") {
						$state = "<h4 class='badge badge-danger  float-right'>STATUS : DECLINER</h4>";
						$btn = "<button class='btn btn-danger btn-sm' disabled>DECLINER <i class='fa fa-check'></i></button>";
					}
					elseif ($value['statusNCa'] == "ANNULER") {
						$state = "<h4 class='badge badge-danger  float-right'>STATUS : ANNULER PAR L'UTILISATEUR</h4>";
						$btn = "<button class='btn btn-danger btn-sm' onclick='SupCommandeR(".$idCo.")'>SUPPRIMER <i class='fa fa-trash'></i></button>";
					}else{
						$state = "";
						$btn = "";
					}


					$urlImg = "content/data/image/utilisateur/profile.png";

					$nom = $value['nomNCa'];
					$prenom = $value['prenomNCa'];
					$tel = $value['numNCa'];
					$lieuAd = $value['adreNCa'];
					$province = $value['proNCa'];

					if ($value['opNCa'] == "MVOLA") {
						$op = "MVOLA";	
					}elseif ($value['opNCa'] == "AMONEY") {
						$op = "AIRTEL MONEY";	
					}elseif ($value['opNCa'] == "OMONEY") {
						$op = "ORANGE MONEY";					
					}elseif ($value['opNCa'] == "ESPECE") {
						$op = "ESPECE";							
						$urlImgOp = "content/data/image/money.jpg";
					}else{
						$op = "ERREUR";							
						$urlImgOp = "content/data/image/logo.png";
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

													$dateNowA = date("Y-m-d");
													if ($valuePub['prix_prom'] == NULL && $valuePub['date_com'] == NULL || $valuePub['date_com'] < $dateNowA) {
															$prixreel = $valuePub['prix_pub'];
															$promAfficheClient = "";
													}else{
														$prixreel = $valuePub['prix_pub'] - (($valuePub['prix_pub'] * $valuePub['prix_prom']) / 100);
														$promAfficheClient = "<span class='p-2 badge text-warning'> -".$valuePub['prix_prom']."% </span>";
													}
													$somme = $prixreel*$valuePub['QtCNCa'];


													echo "
																<tr>
												                    <th class='pl-0 border-0' scope='row'>
												                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
												                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$valuePub['titre_pub']." (".$valuePub['categorie_pub'].")</a></strong></div>
												                        </div>
												                    </th>
												                    <td class='align-middle border-0'>
												                        <p class='mb-0'>".number_format($prixreel)."</p>
												                    </td>
												                    <td class='align-middle border-0'>
												                        <div class='d-flex align-items-center justify-content-between px-3'>
												                        	<div class='quantity'>
												                            	<input type='number' class='form-control form-control-sm border-0 shadow-0 p-0' value='".$valuePub['QtCNCa']."' style='text-align:center;' min='1' readonly>
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
		include '../../modele/utilisateurNav/modele.ausernav.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new CommandeR();

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
					$dateNowA = date("Y-m-d");
					if ($valueP['prix_prom'] == NULL && $valueP['date_com'] == NULL || $valueP['date_com'] < $dateNowA) {
						$somme2 = $valueP['prix_pub']*$valueP['QtCNCa'];
					}else{
						$somme2  = ($valueP['prix_pub'] - (($valueP['prix_pub'] * $valueP['prix_prom']) / 100)) * ($valueP['QtCNCa']) ;
					}
					$sommeTotal = $sommeTotal + $somme2;	
				}
				$motif = "";				
				foreach ($donne as $key => $value) {

					$urlImg = "content/data/image/logo.png";

					$nom = $value['nomNCa'];
					$prenom = $value['prenomNCa'];
					$tel = $value['numNCa'];
					$lieuAd = $value['adreNCa'];
					$province = $value['proNCa'];

					if ($value['opNCa'] == "MVOLA") {
						$op = "MVOLA";	
						$urlImgOp = "content/data/image/m.png";
					}elseif ($value['opNCa'] == "AMONEY") {
						$op = "AIRTEL MONEY";	
						$urlImgOp = "content/data/image/a.png";
					}elseif ($value['opNCa'] == "OMONEY") {
						$op = "ORANGE MONEY";							
						$urlImgOp = "content/data/image/o.png";
					}elseif ($value['opNCa'] == "ESPECE") {
						$op = "ESPECE";							
						$urlImgOp = "content/data/image/money.jpg";
					}else{
						$op = "ERREUR";							
						$urlImgOp = "content/data/image/logo.png";
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

													$dateNowA = date("Y-m-d");
													if ($valuePub['prix_prom'] == NULL && $valuePub['date_com'] == NULL || $valuePub['date_com'] < $dateNowA) {
															$prixreel = $valuePub['prix_pub'];
															$promAfficheClient = "";
													}else{
														$prixreel = $valuePub['prix_pub'] - (($valuePub['prix_pub'] * $valuePub['prix_prom']) / 100);
														$promAfficheClient = "<span class='p-2 badge text-warning'> -".$valuePub['prix_prom']."% </span>";
													}
													$somme = $prixreel*$valuePub['QtCNCa'];


													echo "
																<tr>
												                    <th class='pl-0 border-0' scope='row'>
												                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
												                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$valuePub['titre_pub']." (".$valuePub['categorie_pub'].")</a></strong></div>
												                        </div>
												                    </th>
												                    <th class='align-middle border-0'>
												                        <p class='mb-0'>".number_format($prixreel)."</p>
												                    </th>
												                    <td class='align-middle border-0'>
												                        <div class='d-flex align-items-center justify-content-between px-3'>
												                        	<div class='quantity'>
												                            	<input type='number' class='form-control form-control-sm border-0 shadow-0 p-0' value='".$valuePub['QtCNCa']."' style='text-align:center;' min='1' readonly>
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
									                    	<h6 align='right'>Livraison</h6>
									                    </div>
												</div> 
												<hr>   
												<div class='row container'>
									                    <div class='col'> 
									                    	<br>
									                    	<h6 align='left'>Total : <b>".number_format($sommeTotal)." Ar</b></h6>
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

	if (isset($_POST['Licl'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../config/connexion.php';
			include '../../modele/utilisateurNav/modele.notificationUser.php';
			include '../../modele/utilisateurNav/modele.ausernav.php';
			include '../../modele/activite/modele.activite.php';
			
		
			$modeleCommande = new CommandeR();
			$modeleActivite = new ActivityAdmin();
			$modeleUser = new ModeleNotificationUserNav();

			$idCo = $_POST['idCoLi'];
			$idAdmin = $_SESSION['id_admin'];

			$modeleCommande->LivreCommande($idCo);

			$idUser = 0;
			$userCo = $modeleCommande->RecupUserCommande($idCo);
			foreach ($userCo as $key => $value) {
				$idUser = $value['idusernav'];
			}

			$descAct = "LIVRAISON";
			$typePub = "COMMANDE RAPIDE";
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
			include '../../config/connexion.php';
			include '../../modele/utilisateurNav/modele.notificationUser.php';
			include '../../modele/utilisateurNav/modele.ausernav.php';
			include '../../modele/activite/modele.activite.php';
			
			$modeleActivite = new ActivityAdmin();
			$modeleUser = new ModeleNotificationUserNav();
			$modeleCommande = new CommandeR();

			$idCo = $_POST['idCoCi'];
			$idAdmin = $_SESSION['id_admin'];

			$modeleCommande->ConclureCommande($idCo);

			$idUser = 0;
			$userCo = $modeleCommande->RecupUserCommande($idCo);
			foreach ($userCo as $key => $value) {
				$idUser = $value['idusernav'];
			}


			$descAct = "CONCLURE";
			$typePub = "COMMANDE RAPIDE";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

		 	$motif = "Merci pour votre achat, Merci de nous avoir choisi";
			$modeleUser->AddNotifCo($idUser,$idCo,$motif);
			echo "ok";
		}else{
			echo "Erreur";
		}
	}
	if (isset($_POST['Decl'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../config/connexion.php';
			include '../../modele/utilisateurNav/modele.notificationUser.php';
			include '../../modele/utilisateurNav/modele.ausernav.php';
			include '../../modele/activite/modele.activite.php';
			
			$modeleActivite = new ActivityAdmin();
			$modeleUser = new ModeleNotificationUserNav();
			$modeleCommande = new CommandeR();
		
			$idAdmin = $_SESSION['id_admin'];
			$idCo = $_POST['idCoD'];
			$motif = $_POST['motifD'];
			$idUser = 0;

			$modeleCommande->DeclineCommande($idCo,$motif);
			$userCo = $modeleCommande->RecupUserCommande($idCo);
			foreach ($userCo as $key => $value) {
				$idUser = $value['idusernav'];
			}

			$descAct = "DECLINER";
			$typePub = "COMMANDE RAPIDE";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

			$modeleUser->AddNotifCo($idUser,$idCo,$motif);
			echo "ok";
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['SUicl'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../config/connexion.php';
			include '../../modele/utilisateurNav/modele.ausernav.php';
			include '../../modele/activite/modele.activite.php';
			
			$modeleActivite = new ActivityAdmin();
			$modeleCommande = new CommandeR();

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

	// LISTE col-6
	if (isset($_POST['GetAllC'])) {
		include '../../modele/utilisateurNav/modele.ausernav.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new CommandeR();

		$donne = $modeleCommande->RecupAllCommande();

		if ($donne) {
		
			foreach ($donne as $key => $value) {
					$urlImg = "content/data/image/utilisateur/profile.png";

					if ($value['statusNCa'] == "ENVOIE") {
						$pozy = "<small class='badge badge-primary'>Nouveau</small>";
					}elseif ($value['statusNCa'] == "LIVRAISON") {
						$pozy = "<small class='badge badge-warning'>Livraison</small>";
					}elseif ($value['statusNCa'] == "VALIDER") {
						$pozy = "<small class='badge badge-success'>Conclus</small>";
					}elseif ($value['statusNCa'] == "DECLINER") {
						$pozy = "<small class='badge badge-danger'>Décliner</small>";
					}elseif ($value['statusNCa'] == "ANNULER") {
						$pozy = "<small class='badge badge-danger'>Annuler</small>";
					}else{
						$pozy = "";
					}

				echo "
					<li class='item' style='cursor: pointer;' onclick='DetailleOneCommandeRR(".$value['idCoNamerNCa'].")'>
	                    <div class='product-img'>
	                      <img src='".$urlImg."' alt='".$value['Product']."' class='img-size-50'>
	                    </div>
	                    <div class='product-info'>
	                      <span class='product-'>".$value['Platform']." ".$value['Product']."</span>
	                        <span class='float-right'>".$value['idCoNamerNCa']."</span>
	                      <span class='product-description'>
	                        ".$value['DateNCa']." | ".$value['HeureNCa']." ".$pozy."
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
		include '../../modele/utilisateurNav/modele.ausernav.php';
		include '../../config/connexion.php';
		
		$modeleCommande = new CommandeR();

		$st = $_POST['GetAllCC'];

		$donne = $modeleCommande->RecupAllCommandeStatusS($st);

		if ($donne) {
		
			foreach ($donne as $key => $value) {
					$urlImg = "content/data/image/utilisateur/profile.png";
					
					if ($value['statusNCa'] == "ENVOIE") {
						$pozy = "<small class='badge badge-primary'>Nouveau</small>";
					}elseif ($value['statusNCa'] == "LIVRAISON") {
						$pozy = "<small class='badge badge-warning'>Livraison</small>";
					}elseif ($value['statusNCa'] == "VALIDER") {
						$pozy = "<small class='badge badge-success'>Conclus</small>";
					}elseif ($value['statusNCa'] == "DECLINER") {
						$pozy = "<small class='badge badge-danger'>Décliner</small>";
					}elseif ($value['statusNCa'] == "ANNULER") {
						$pozy = "<small class='badge badge-danger'>Annuler</small>";
					}else{
						$pozy = "";
					}

				echo "
					<li class='item' style='cursor: pointer;' onclick='DetailleOneCommandeRR(".$value['idCoNamerNCa'].")'>
	                    <div class='product-img'>
	                      <img src='".$urlImg."' alt='".$value['Platform']."' class='img-size-50'>
	                    </div>
	                    <div class='product-info'>
	                      <span class='product-'>".$value['Platform']." ".$value['Product']."</span>
	                        <span class='float-right'>".$value['idCoNamerNCa']."</span>
	                      <span class='product-description'>
	                        ".$value['DateNCa']." | ".$value['HeureNCa']." ".$pozy."
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
 ?>