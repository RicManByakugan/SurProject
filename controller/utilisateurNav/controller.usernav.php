<?php 
	if (isset($_POST['RecupPanier'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();
		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];

		$donneUser = $modele->GetUserNav($useragent,$platform,$product);
		if ($donneUser) {		
			$donne = $modele->RecupPanierUserNav($donneUser['idusernav']);
			if ($donne) {
				$sommeTotal = 0;
				foreach ($donne as $key => $value2) {
					$dateNowA = date("Y-m-d");
					if ($value2['prix_prom'] == NULL && $value2['date_com'] == NULL || $value2['date_com'] < $dateNowA) {
						$somme2 = $value2['prix_pub']*$value2['QtPanierNPa'];
					}else{
						$somme2  = ($value2['prix_pub'] - (($value2['prix_pub'] * $value2['prix_prom']) / 100)) * ($value2['QtPanierNPa']) ;
					}
					$sommeTotal = $sommeTotal + $somme2;
				}

				echo "
					<div class='row'>
	                    <div class='col-sm-6'>
	                    	<h4 align='left' class='text-muted'>Total : ".number_format($sommeTotal)." Ar</h4>
	                    </div>
	                    <div class='col-sm-6'>
	                        <div class='d-flex'>
			                   	<button style='width:50%'; class='btn btn-primary' data-dismiss='modal'>Visitez d'autre</button>
			                   	<button style='width:50%'; class='btn btn-primary' onclick=\"ViderPanierUserNav();\">Vider</button>
	                       	</div>
	                    </div>
	                </div>
	                <hr>
					<div class='container'>
						<button class='btn btn-block btn-primary' onclick='AcceptePanierUserNav(this,".$value2['id_pub'].");'>Valider</button>
	                </div>

	                <div id='confirmTelCoNav'></div>
	                <hr>

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

						$dateNowA = date("Y-m-d");
						if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
								$prixreel = $value['prix_pub'];
								$promAfficheClient = "";
						}else{
							$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
							$promAfficheClient = "<span class='p-2 badge text-warning'> -".$value['prix_prom']."% </span>";
						}

						$somme = $prixreel*$value['QtPanierNPa'];
						echo "
								<tr>
				                    <th class='pl-0 border-0' scope='row'>
				                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
				                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$value['titre_pub']." (".$value['categorie_pub']." | ".$promAfficheClient.")</a></strong></div>
				                        </div>
				                    </th>
				                    <td class='align-middle border-0'>
				                        <p class='mb-0'>".number_format($prixreel)."</p>
				                    </td>
				                    <td class='align-middle border-0'>
				                        <div class='d-flex align-items-center justify-content-between px-3'>
				                        	<div class='quantity'>
				                            	<input type='number' onchange=\"ChangeQtPubUserNav(".$value['idunPanier'].",this.value)\" class='form-control form-control-sm border-0 shadow-0 p-0' value='".$value['QtPanierNPa']."' style='text-align:center;' min='1'>
				                          	</div>
				                        </div>
				                    </td>
				                    <td class='align-middle border-0'>".number_format($somme)."</td>
				                    <td class='align-middle border-0'><a class='reset-anchor' style='cursor:pointer;' onclick='SupPanierUserNav(".$value['idunPanier'].")'><i class='fas fa-trash-alt text-muted'></i></a></td>
				                </tr>
						";
				}
				echo "
				                 </tbody>							
						</table>
						</div>
				";

			}else{
				echo "
					<div class='row'>
                    	<div class='col'>
                    		<h4 align='left' class='text-muted'>Total : 0Ar</h4>
                    	</div>
                    	<div class='col'>
                    		<div style='float: right;'>
	                        	<button class='btn btn-primary' data-dismiss='modal' disabled>Vider</button>
	                        	<button class='btn btn-primary' disabled>Valider</button>
                    		</div>
                    	</div>
	                </div><hr>
					<div class='row'>
						<div class='col'>
							<h6 class='align-middle border-0'>Panier Vide</h6>
						</div>
						<div class='col'>
							<button style='float: right;' class='btn btn-sm btn-primary' data-dismiss='modal' data-toggle='modal' onclick=\"ScrollToTo('secondary-bar')\">Effectuer des commandes</button>
						</div>
					</div>
				";
			}
		}else{
			$res = $modele->AddUserNav($useragent,$platform,$product);
			if ($res == "ok") {
				$donne = $modele->GetUserNav($useragent,$platform,$product);
				if ($donne) {
					$sommeTotal = 0;
					foreach ($donne as $key => $value2) {
						$dateNowA = date("Y-m-d");
						if ($value2['prix_prom'] == NULL && $value2['date_com'] == NULL || $value2['date_com'] < $dateNowA) {
							$somme2 = $value2['prix_pub']*$value2['QtPanierNPa'];
						}else{
							$somme2  = ($value2['prix_pub'] - (($value2['prix_pub'] * $value2['prix_prom']) / 100)) * ($value2['QtPanierNPa']) ;
						}
						$sommeTotal = $sommeTotal + $somme2;
					}


					echo "
						<div class='row'>
		                    <div class='col-sm-6'>
		                    	<h4 align='left' class='text-muted'>Total : ".number_format($sommeTotal)." Ar</h4>
		                    </div>
		                    <div class='col-sm-6'>
		                        <div class='d-flex'>
				                   	<button style='width:50%'; class='btn btn-primary' data-dismiss='modal'>Visitez d'autre</button>
				                   	<button style='width:50%'; class='btn btn-primary' onclick=\"ViderPanierUserNav();\">Vider</button>
		                       	</div>
		                    </div>
		                </div>
		                <hr>
						<div class='row'>
							<button class='col-sm-12 btn btn-block btn-primary' onclick='AcceptePanierUserNav(this,".$value2['id_pub'].");'>Valider</button>
		                </div>

		                <div id='confirmTelCo'></div>
		                <hr>

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


							$dateNowA = date("Y-m-d");
							if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
									$prixreel = $value['prix_pub'];
									$promAfficheClient = "";
							}else{
								$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
								$promAfficheClient = "<span class='p-2 badge text-warning'> -".$value['prix_prom']."% </span>";
							}

							$somme = $prixreel*$value['QtPanierNPa'];
							echo "
									<tr>
					                    <th class='pl-0 border-0' scope='row'>
					                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
					                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$value['titre_pub']." (".$value['categorie_pub']." | ".$promAfficheClient.")</a></strong></div>
					                        </div>
					                    </th>
					                    <td class='align-middle border-0'>
					                        <p class='mb-0'>".number_format($prixreel)."</p>
					                    </td>
					                    <td class='align-middle border-0'>
					                        <div class='d-flex align-items-center justify-content-between px-3'>
					                        	<div class='quantity'>
					                            	<input type='number' onchange=\"ChangeQtPubUserNav(".$value['idunPanier'].",this.value)\" class='form-control form-control-sm border-0 shadow-0 p-0' value='".$value['QtPanierNPa']."' style='text-align:center;' min='1'>
					                          	</div>
					                        </div>
					                    </td>
					                    <td class='align-middle border-0'>".number_format($somme)."</td>
					                    <td class='align-middle border-0'><a class='reset-anchor' style='cursor:pointer;' onclick='SupPanierUserNav(".$value['idunPanier'].")'><i class='fas fa-trash-alt text-muted'></i></a></td>
					                </tr>
							";
					}
					echo "
					                 </tbody>							
							</table>
							</div>
					";

				}else{
					echo "
						<div class='row'>
		                        	<div class='col'>
		                        		<h4 align='left' class='text-muted'>Total : 0Ar</h4>
		                        	</div>
		                        	<div class='col'>
		                        		<div style='float: right;'>
				                        	<button class='btn btn-primary' data-dismiss='modal' disabled>Vider</button>
				                        	<button class='btn btn-primary' disabled>Valider</button>
		                        		</div>
		                        	</div>
		                </div><hr>
						<div class='row'>
							<div class='col'>
								<h6 class='align-middle border-0'>Panier Vide</h6>
							</div>
							<div class='col'>
								<button style='float: right;' class='btn btn-sm btn-primary' data-dismiss='modal' data-toggle='modal' onclick=\"ScrollToTo('secondary-bar')\">Effectuer des commandes</button>
							</div>
						</div>
					";
				}
			}else{
				echo "attente";
			}
		}
	}

	if (isset($_POST['PanierUser'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();
		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];
		$donneUser = $modele->GetUserNav($useragent,$platform,$product);
		if ($donneUser) {
			$idPub = $_POST['idPubPanier'];
			$Qt = $_POST['Qt'];
			$idUser = $donneUser['idusernav'];

			$panierEnvoie = $modele->AddPanierNav($idUser,$idPub,$Qt);	
			if ($panierEnvoie == "ko") {
				echo "Commande déjà dans le panier ou déjà envoyé";
			}else{
				echo "ok";
			}
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['Videanier'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();
		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];
		$donneUser = $modele->GetUserNav($useragent,$platform,$product);
		if ($donneUser) {
			$idUserVp = $donneUser['idusernav'];
			$modele->VidePanierUserNav($idUserVp);	
			echo "ok";
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['idPanierChange'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();

		$idPan = $_POST['idPanierChange'];
		$QtPan = $_POST['QtPan'];

		if($QtPan <= 0){
			echo "Erreur de l'action";
		}else{
			$modele->UpdateQtePubNav($idPan,$QtPan);	
			echo "ok";
		}
	}

	if (isset($_POST['Suppanier'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modelePanier = new ModeleUserNav();

		$idPan = $_POST['Suppanier'];

		$modelePanier->SupPanierPan($idPan);	

		echo "ok";
	}

	if (isset($_POST['accpPan'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modeleNavUser = new ModeleUserNav();
		$modelePub = new ModelePub();

		$idPUbAcp = $_POST['idPUbAcp'];

		$donneDispo = $modelePub->GetDispo($idPUbAcp);

		$donneDispo['Antananarivo'] == "OK" ? $disp1 = "<option value='Antananarivo'>Antananarivo</option>" : $disp1 = "";
		$donneDispo['Antsiranana'] == "OK" ? $disp2 = "<option value='Antsiranana'>Antsiranana</option>" : $disp2 = "";
		$donneDispo['Fianarantsoa'] == "OK" ? $disp3 = "<option value='Fianarantsoa'>Fianarantsoa</option>" : $disp3 = "";
		$donneDispo['Mahajanga'] == "OK" ? $disp4 = "<option value='Mahajanga'>Mahajanga</option>" : $disp4 = "";
		$donneDispo['Toamasina'] == "OK" ? $disp5 = "<option value='Toamasina'>Toamasina</option>" : $disp5 = "";
		$donneDispo['Toliara'] == "OK" ? $disp6 = "<option value='Toliara'>Toliara</option>" : $disp6 = "";

		echo "
				<hr>
				<form>
					<div class='row'>
						<div class='col-sm-6'>
							<div class='form-group'>
								<label>Nom</label>
								<input type='text' name='nomuserpaie' id='nomuserpaie' class='form-control' placeholder=\"Entrer votre nom...\" required>
							</div>
						</div>
						<div class='col-sm-6'>
							<div class='form-group'>
								<label>Prénom</label>
								<input type='text' name='prenomuserpaie' id='prenomuserpaie' class='form-control' placeholder=\"Entrer votre prénom...\" required>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col form-group'>
							<label>Adresse de livraison</label>
							<input type='text' name='AdresseodePaie' id='AdresseodePaie' class='form-control' placeholder=\"Entrer l'adresse...\" required>
						</div>
					</div>
					<div class='row'>
						<div class='col form-group'>
							<label>Province</label>
							<select name='modePaiePro' id='modePaiePro' class='form-control' required>
								<option></option>
								".$disp1."
								".$disp2."
								".$disp3."
								".$disp4."
								".$disp5."
								".$disp6."
							</select>
						</div>
					</div>
					<div class='row'>
						<div class='col form-group'>
							<label>Type de paiement (Avance requis seulement via mobile si possible)</label>
							<select name='modePaie' id='modePaie' class='form-control' required>
								<option></option>
								<option value='ESPECE'>Espèce</option>
								<option value='MVOLA'>MVola</option>
								<option value='AMONEY'>Airtel Money</option>
								<option value='OMONEY'>Orange Money</option>
							</select>
						</div>
					</div>
					<div class='row'>
						<div class='col form-group'>
							<label>Confirmer le numéro téléphone</label>
							<input type='tel' name='NummodePaie' id='NummodePaie' class='form-control' placeholder='03(2/3/4)*******' required />
						</div>
					</div>
					<div class='row'>
						<div class='col form-group'>
		                  	<input type='checkbox' id='accepteConCommande' name='accepteConCommande' required />
		                  	<label for='accepteConCommande'> Acceptez et suivre <a class='text-muted' data-toggle='modal' data-target='#UserGuide' style='cursor:pointer;'>les conditions d'utilisation</a> du site ?</label>
		                </div>
	                </div>
					<div class='container'>
						<label class='badge badge-warning'>SUR vous contactera après votre commande</label>
					</div>
					<div class='container'>
						<button class='btn btn-primary' style='width:100%;' onclick='AcceptePanierSurNav(this);'>Confirmer</button>
					</div>
				</form>
		";
	}

	if (isset($_POST['CommandeOK'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../modele/utilisateurNav/modele.notificationUser.php';
		include '../../config/connexion.php';
		$modelePan = new ModeleUserNav();
		$modelePanUser = new ModeleNotificationUserNav();

		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];
		$donneUser = $modelePan->GetUserNav($useragent,$platform,$product);
		if ($donneUser) {
			include '../../modele/publication/modele.publication.php';
			include '../../modele/notificationUser/modele.notificationUser.php';
			$modelePub = new ModelePub();
			$modeleUserN = new ModeleNotificationUser();

			$idUser = $donneUser['idusernav'];
			$nom = $_POST['nomMo'];
			$prenom = $_POST['prenomMo'];
			$operateur = $_POST['TypeMo'];
			$Numero = $_POST['NumMo'];
			$Adresse = $_POST['AdresMo'];
			$Province = $_POST['ProMo'];

			if ($Numero!=NULL && preg_match("#^03[2-4]{1}[0-9]{7}$#", $Numero) || preg_match("#^038[0-9]{7}$#", $Numero)) {

				if (preg_match("#^032[0-9]{7}$#", $Numero) && $operateur=="OMONEY" || $operateur=="ESPECE") {
					$test = "ok";
				}elseif (preg_match("#^034[0-9]{7}$#", $Numero) && $operateur=="MVOLA" || $operateur=="ESPECE") {
					$test = "ok";
				}elseif (preg_match("#^038[0-9]{7}$#", $Numero) && $operateur=="MVOLA" || $operateur=="ESPECE") {
					$test = "ok";
				}elseif (preg_match("#^033[0-9]{7}$#", $Numero) && $operateur=="AMONEY" || $operateur=="ESPECE") {
					$test = "ok";
				}else {
					$test = "ko";
				}

				if ($test == "ok") {
					
					$donnePanier = $modelePan->RecupPanierUserNav($idUser);

					$idComCoUser = $idUser.rand(0,100000);
					$testTest = $modelePan->TestIC($idComCoUser);
		 			$motif = "SUR, Vous propose l'article suivante";
					$idPUBe = 0;

					if ($testTest=="ko") {
						$idComCoUserI = $idUser.rand(0,100000).rand(0,100000);
						foreach ($donnePanier as $key => $value2) {
							$modelePan->AddCommande($idComCoUserI,$idUser,$nom,$prenom,$value2['idPubNPa'],$value2['QtPanierNPa'],$operateur,$Numero,$Adresse,$Province);
							$donnePub = $modelePub->GetAnotherPost($value2['idPubNPa'],$value2['type_pub'],$value2['categorie_pub']);
							foreach ($donnePub as $key => $valuep) {
								$idPUBe = $valuep['id_pub'];
							}
						}

		 				$modelePan->AddNotifCommande($idComCoUserI,$idUser,"NOUVELLE COMMANDE");
						$modelePanUser->AddNotifPub($idUser,$idPUBe,$motif);
					}else{
						foreach ($donnePanier as $key => $value2) {
							$modelePan->AddCommande($idComCoUser,$idUser,$nom,$prenom,$value2['idPubNPa'],$value2['QtPanierNPa'],$operateur,$Numero,$Adresse,$Province);
							$donnePub = $modelePub->GetAnotherPost($value2['idPubNPa'],$value2['type_pub'],$value2['categorie_pub']);
							foreach ($donnePub as $key => $valuep) {
								$idPUBe = $valuep['id_pub'];
							}
						}
		 				$modelePan->AddNotifCommande($idComCoUser,$idUser,"NOUVELLE COMMANDE");
						$modelePanUser->AddNotifPub($idUser,$idPUBe,$motif);
					}


					$modelePan->AccepteCoAttente($idUser);	

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


	if (isset($_POST['RecupCommandePNav'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();

		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];
		$donneUser = $modele->GetUserNav($useragent,$platform,$product);

		if ($donneUser) {
			$idUserr =$donneUser['idusernav'];
			$donne = $modele->RecupCommandeId($idUserr);

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
								if ($value['statusNCa']=="ENVOIE") {
									$st = "<span class='badge-primary px-3'>EN ATTENTE</span>";
								}elseif ($value['statusNCa']=="VALIDER") {
									$st = "<span class='badge-success px-3'>CONCLUS</span>";
								}elseif ($value['statusNCa']=="LIVRAISON") {
									$st = "<span class='badge-warning px-3'>SUR LA ROUTE</span>";
								}elseif ($value['statusNCa']=="DECLINER") {
									$st = "<span class='badge-danger px-3'>DECLINER</span>";
								}else{
									$st = "";
								}
								echo "
									<tr>
				                      <th class='border-0' scope='col'>".$value['idCoNamerNCa']."</th>
				                      <th class='border-0' scope='col'>".$st."</th>
				                      <th class='border-0' scope='col'>".$value['DateNCa']."</th>
				                      <th class='border-0' scope='col'>".$value['HeureNCa']."</th>
				                      <th class='border-0' onclick=\"AfficheDetailleCommandeNav(".$value['idCoNamerNCa'].");\" scope='col' style='cursor:pointer;' data-dismiss='modal' data-toggle='modal' data-target='#ComDetailleNav'><button class='btn btn-primary btn-sm'>VOIR</button></th>
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
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../modele/sur/modele.sur.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();
		$modeleSur = new SurModele();

		$idUseidComCom = $_POST['idUseidComComNav'];
		$sur = $modeleSur->GetSur();

		$donne = $modele->RecupCommandeCoUser($idUseidComCom);

		if ($donne) {
			$sommeTotal = 0;
			$resStat = "";
			$supCo = "";
			$annuler = "";
			foreach ($donne as $key => $value2) {

					$dateNowA = date("Y-m-d");
					if ($value2['prix_prom'] == NULL && $value2['date_com'] == NULL || $value2['date_com'] < $dateNowA) {
						$somme2 = $value2['prix_pub']*$value2['QtCNCa'];
					}else{
						$somme2  = ($value2['prix_pub'] - (($value2['prix_pub'] * $value2['prix_prom']) / 100))*$value2['QtCNCa'];
					}
					$sommeTotal = $sommeTotal+$somme2;


					if ($value2['statusNCa'] == "ENVOIE") {
						$resStat = "<h6 align='center' class='text-small badge-primary'>Status : En attente (Ananlyse en cours, SUR vous contactera)</h6>";
						$annuler = "<button class='btn btn-primary btn-sm' onclick='AnnulerCommandeNav(".$idUseidComCom.")' data-dismiss='modal'>ANNULER <i class='fa fa-times'></i></button>";
					}elseif ($value2['statusNCa'] == "LIVRAISON") {
						$resStat = "<h6 align='center' class='text-white badge-warning'>Status : Sur la route (Livraison en cours)</h6>";
					}elseif ($value2['statusNCa'] == "VALIDER") {
						$resStat = "<h6 align='center' class='text-white badge-success'>Status : Merci pour votre achat</h6>";
					}elseif ($value2['statusNCa'] == "DECLINER") {
						$resStat = "<h6 align='center' class='text-white badge-danger'>Status : Offre décliné</h6>";
						$supCo = "<button class='btn btn-danger btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#UserCommandeNav' onclick='SupCommandeUserNav(".$idUseidComCom.");'>SUPPRIMER <i class='fa fa-trash'></i></button>";
					}else{
						$resStat = "";
					}

					if ($value2['opNCa'] == "MVOLA") {
						$operateurop = "MVOLA";
						$mobile = $value2['numNCa'];
						$urlImgOp = "content/data/image/m.png";
					}elseif ($value2['opNCa'] == "AMONEY") {
						$operateurop = "AIRTEL MONEY";
						$mobile = $value2['numNCa'];
						$urlImgOp = "content/data/image/a.png";
					}elseif ($value2['opNCa'] == "OMONEY") {
						$operateurop = "ORANGE MONEY";
						$mobile = $value2['numNCa'];
						$urlImgOp = "content/data/image/o.png";
					}elseif ($value2['opNCa'] == "ESPECE") {
						$operateurop = "ESPECE";
						$mobile = $value2['numNCa'];
						$urlImgOp = "content/data/image/money.jpg";
					}else{
						$operateurop = "BO";
						$mobile = $value2['numNCa'];
						$urlImgOp = "content/data/image/logo.jpg";
					}

					if ($value2['causeDNCa'] == NULL || $value2['causeDNCa']=="") {				
						$causeDec = "";
					}else{
						$causeDec = "
									<hr>
									<div class='row'>
										<div class='col'>
											<b><label class='text-small badge-danger px-3'>Cause</label></b>
											<span class='text-white badge-danger p-1'>".$value2['causeDNCa']."</span>
										</div>
									</div>"
						;
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
			                   	".$annuler."
			                   	".$supCo."
			                   	<button class='btn btn-primary btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#UserCommandeNav'>COMMANDE <i class='fa fa-arrow-right'></i></button>
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

					$dateNowA = date("Y-m-d");
					if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
					}else{
						$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
						$promAfficheClient = "<span class='p-2 badge text-white badge-warning'> -".$value['prix_prom']."% </span>";
					}

					$somme = $prixreel*$value['QtCNCa'];

					echo "
						<tr>
		                    <th class='pl-0 border-0' scope='row'>
		                        <div class='media align-items-center'><a class='reset-anchor d-block animsition-link'><img src='".$url."' width='70'></a>
		                          <div class='media-body ml-3'><strong class='h6'><a class='reset-anchor animsition-link'>".$value['titre_pub']." (".$value['categorie_pub'].")</a></strong></div>
		                        </div>
		                    </th>
		                    <td class='align-middle border-0'>
		                        <p class='mb-0'>".number_format($prixreel)."</p>
		                    </td>
		                    <td class='align-middle border-0'>
		                        <div class='d-flex align-items-center justify-content-between px-3'>
		                        	<div class='quantity'>
		                            	<input type='number' class='form-control form-control-sm border-0 shadow-0 p-0' value='".$value['QtCNCa']."' style='text-align:center;' min='1' readonly>
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
		}else{
			echo "
				<div class='col' style='text-align: center;'>
					<img src='content/data/image/logo/logo.png' width='90' height='90'>
				</div>
				<hr>
				<h5 class='mt-3 mb-3 text-center'>Ce commande n'est plus disponible<h5>
				<div class='row'>
					<div class='col-sm-6'>
						<button class='btn btn-block btn-primary btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#UserCommandeNav'>COMMANDE <i class='fa fa-suitcase'></i></button>
					</div>
					<div class='col-sm-6'>
						<button class='btn btn-block btn-primary btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#UserPanierNav'>PANIER <i class='fa fa-suitcase'></i></button>
					</div>
				</div>
			";
		}
	}

	if (isset($_POST['AnclCNav'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();

		$idCo = $_POST['idCoAnC'];

		$modele->AnnuleCommande($idCo);

		echo "ok";
	}

	if (isset($_POST['SUiclUserNav'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		
		$modele = new ModeleUserNav();

		$idCo = $_POST['idCoCSuU'];

		$modele->SupIDCommande($idCo);

		echo "ok";
	}

	if (isset($_POST['getAllNC']) && $_POST['getAllNC'] == 58) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();

		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];
		$donneUser = $modele->GetUserNav($useragent,$platform,$product);

		if ($donneUser) {
			
			$idUser = $donneUser['idusernav'];

			$donneCo = $modele->GetAllNotifUserCountNav($idUser);

			if ($donneCo && $donneCo['nombre']!=NULL && $donneCo['nombre']!=0) {
				echo "
					<audio src='content/data/music/rington.mp3' autoplay loop></audio>
					<div class='settings-trigger-four2' data-toggle='modal' data-target='#UserNotifSNav' onclick='RecupNotifUserNav();NotifUserSeeingNav(".$idUser.");'>
	            		<i class='fa fa-bell'></i>
	        		</div>
				";
			}else{
				echo "
					<div class='settings-trigger-four' data-toggle='modal' data-target='#UserNotifSNav' onclick='RecupNotifUserNav()'>
	            		<i class='fa fa-bell'></i>
	        		</div>
				";
			}
		}else{
			echo "Erreur";
		}

	}

	if (isset($_POST['seeNotif'])) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../config/connexion.php';
		$modeleUserN = new ModeleUserNav();
		
		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];
		$donneUser = $modeleUserN->GetUserNav($useragent,$platform,$product);

		if ($donneUser) {

			$modeleUserN->UserSeeNotif($donneUser['idusernav']);
			echo "ok";

		}else{
			echo "Erreur";
		}

	}

	if (isset($_POST['getAllNav']) && $_POST['getAllNav'] == 0) {
		include '../../modele/utilisateurNav/modele.usernav.php';
		include '../../modele/sur/modele.sur.php';
		include '../../config/connexion.php';
		$modele = new ModeleUserNav();
		$modeleSur = new SurModele();
		
		$useragent = $_POST['useragent'];
		$platform = $_POST['platform'];
		$product = $_POST['product'];
		$donneUser = $modele->GetUserNav($useragent,$platform,$product);
		if ($donneUser) {
			
			$idUser = $donneUser['idusernav'];

			$donneCo = $modele->GetAllNotifUserCo($idUser);
			$donnePub = $modele->GetAllNotifUserPub($idUser);
			$donneNothing = $modele->GetAllNotifUserNothing($idUser);
			$surIab = $modeleSur->GetSur();

			if ($donneNothing) {
				foreach ($donneNothing as $key => $value) {
					$img1 = "<h1 class='h1'><i class='fa fa-bell h1'></i></h1>";
					
					if ($value['statusNUNC']=="ENVOIE") {
						$new = "<p class='small text-muted text-center btn-block'><span class='badge badge-warning px-3'>Nouveau</span></p>";
					}else{
						$new = "";
					}

					echo "
	                        <div class='row'>
	                        	<div class='col-sm-3 text-center'>
	                        		".$img1."
	                        	</div>
	                        	<div class='col-sm-7'>
	                        		<h4 align='center' class='text-muted'>Information venant de SUR</h4>
	                        		<hr>
	                        		<p class='text-muted text-center' style='word-wrap: break-word;'>".$value['descNotifUNC']."</p>
	                        		".$new."
	                        		<p align='center' class='small'>".$value['dateNUNC']." | ".$value['heureNUNC']."</p>
	                        	</div>
	                        	<div class='col-sm-2'>
	                        		<a href='tel:".$surIab['tel_sur']."' target='blank' class='btn btn-sm btn-primary'>Contacter</a>
	                        	</div>
	                        </div><hr>

					";
				}
			}

			if ($donneCo) {
				foreach ($donneCo as $key => $value) {
					$donnecP = $modele->GetCommandeNumCo($value['idCoNotifLNC']);
					$dateA = date("Y-m-d");
					if ($value['dateNUNC']==$dateA) {
						$new = "<p class='small text-center badge badge-danger btn-block'>Aujourd'hui</p>";
					}else{
						$new = "";
					}

					echo "	
							<div class='row'>
	                        	<div class='col-sm-3 text-center'>
		                        	<h1 class='h1'><i class='fa fa-bell h1'></i></h1>
	                        	</div>
	                        	<div class='col-sm-7'>
	                        		<h4 align='center'>A propos du commande ".$value['idCoNotifLNC']."</h4>
	                        		<p class='small text-muted text-center'>".nl2br($value['descNotifUNC'])."</p>
	                        		".$new."
	                        	</div>
	                        	<div class='col'>
	                        		<button class='btn btn-block btn-sm btn-primary' onclick=\"AfficheDetailleCommandeNav(".$value['idCoNotifLNC'].");\" data-dismiss='modal' data-toggle='modal' data-target='#ComDetailleNav'>Voir</button>
	                        	</div>
	                        </div><hr>
					";
				}
			}else{
				echo "
				";
			}

			if ($donnePub) {
				foreach ($donnePub as $key => $value) {
						$donnePubP = $modele->GetPostById($value['idPubNotifLNC']);
						if ($donnePubP['img1_pub']!=NULL && $donnePubP['img1_pub']!="") {
							$img1 = "<img id='imgOneAC' src='content/data/image/publication/".$donnePubP['img1_pub']."' width='100' height='100' />";
						}else{
							$img1 = "<img src='content/data/image/logo.png' width='100' height='100'/>";
						}

						if ($value['statusNUNC']=="ENVOIE") {
							$new = "<p class='small text-muted text-center btn-block'><span class='badge badge-warning px-3'>Nouveau</span></p>";
						}else{
							$new = "";
						}


						echo "
		                        <div class='row'>
		                        	<div class='col-sm-3 text-center'>
		                        		".$img1."
		                        	</div>
		                        	<div class='col-sm-7'>
		                        		<h4 align='center' class='text-muted'>SUR VOUS PROPOSE</h4>
		                        		<h6 align='center'>".$donnePubP['titre_pub']."</h6>
		                        		<p class='small text-muted text-center' style='word-wrap: break-word;'>".substr($donnePubP['desc_pub'], 0, 90).' ...'."</p>
		                        		".$new."
		                        	</div>
		                        	<div class='col text-center'>
		                        		<button class='btn btn-block btn-sm btn-primary' data-dismiss='modal' onclick=\"AffichePub(".$donnePubP['id_pub'].",'".$donnePubP['type_pub']."');ScrollToTo('donnePublication');\">Voir</button>
		                        	</div>
		                        </div><hr>

						";
				}
			}else{
				echo "
					
				";
			}
			
		}else{
			echo "Erreur";
		}
	}

 ?>