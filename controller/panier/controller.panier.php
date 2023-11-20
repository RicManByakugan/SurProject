<?php 

	if (isset($_POST['PanierUser'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {
			include '../../modele/panier/modele.panier.php';
			include '../../config/connexion.php';
			$modelePanier = new Panier();

			$idPub = $_POST['idPubPanier'];
			$Qt = $_POST['Qt'];
			$idUser = $_SESSION['idUser'];

			$panierEnvoie = $modelePanier->AddPanier($idUser,$idPub,$Qt);	
			if ($panierEnvoie == "ko") {
				echo "Commande déjà dans le panier ou déjà envoyé";
			}else{
				echo "ok";
			}
		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['RecupPanierP'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {
			include '../../modele/panier/modele.panier.php';
			include '../../config/connexion.php';
			$modelePanier = new Panier();

			$idUserr = $_SESSION['idUser'];

			$donne = $modelePanier->RecupPanier($idUserr);

			if ($donne) {
				$sommeTotal = 0;

				foreach ($donne as $key => $value2) {
					$dateNowA = date("Y-m-d");
					if ($value2['prix_prom'] == NULL && $value2['date_com'] == NULL || $value2['date_com'] < $dateNowA) {
						$somme2 = $value2['prix_pub']*$value2['QtPanier'];
					}else{
						$somme2  = ($value2['prix_pub'] - (($value2['prix_pub'] * $value2['prix_prom']) / 100))*$value2['QtPanier'];
					}
					$sommeTotal = $sommeTotal+$somme2;
				}
				echo "
					<div class='row'>
	                    <div class='col-sm-6'>
	                    	<h4 align='left' class='text-muted'>Total : ".number_format($sommeTotal)." Ar</h4>
	                    </div>
	                    <div class='col-sm-6'>
	                        <div class='d-flex'>
			                   	<button style='width:50%'; class='btn btn-primary' data-dismiss='modal'>Visitez d'autre</button>
			                   	<button style='width:50%'; class='btn btn-primary' onclick=\"ViderPanier();\">Vider</button>
	                       	</div>
	                    </div>
	                </div>
	                <hr>
					<div class='row'>
						<button class='col-sm-12 btn btn-block btn-primary' onclick='AcceptePanier(this,".$value2['id_pub'].");'>Valider</button>
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
							$promAfficheClient = "<span class='p-2 badge text-white badge-warning'> -".$value['prix_prom']."% </span>";
						}

						$somme = $prixreel*$value['QtPanier'];
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
					                            	<input type='number' onchange=\"ChangeQtPub(".$value['idPanier'].",this.value)\" class='form-control form-control-sm border-0 shadow-0 p-0' value='".$value['QtPanier']."' style='text-align:center;' min='1'>
					                          	</div>
					                        </div>
					                    </td>
					                    <td class='align-middle border-0'>".number_format($somme)."</td>
					                    <td class='align-middle border-0'><a class='reset-anchor' style='cursor:pointer;' onclick='SupPanier(".$value['idPanier'].")'><i class='fas fa-trash-alt text-muted'></i></a></td>
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
			echo "Erreur";
		}

	}

	if (isset($_POST['accpPan'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
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
				<div class='col'>
					<div class='form-group'>
						<label>Adresse de livraison</label>
						<input type='text' name='AdresseodePaie' id='AdresseodePaie' class='form-control' placeholder=\"Entrer l'adresse...\">
					</div>
				</div>
				<div class='col'>
					<div class='form-group'>
						<label>Province</label>
						<select name='modePaiePro' id='modePaiePro' class='form-control'>
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
				<div class='col'>
					<div class='form-group'>
						<label>Par mobile (Avance requis seulement)</label>
						<select name='modePaie' id='modePaie' class='form-control'>
							<option></option>
							<option value='MVOLA'>MVola</option>
							<option value='AMONEY'>Airtel Money</option>
							<option value='OMONEY'>Orange Money</option>
						</select>
					</div>
				</div>
				<div class='col'>
					<div class='form-group'>
						<label>Confirmer le numéro téléphone</label>
						<input type='tel' name='NummodePaie' id='NummodePaie' class='form-control' placeholder='03(2/3/4)*******'>
					</div>
				</div>
				<div class='col'>
					<label class='badge badge-warning'>SUR vous contactera après votre commande</label>
				</div>
				<div class='col'>
					<button class='btn btn-primary' style='width:100%;' onclick='AcceptePanierSur();'>Confirmer</button>
				</div>
		";
	}

	if (isset($_POST['idPanierChange'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {
			include '../../modele/panier/modele.panier.php';
			include '../../config/connexion.php';
			$modelePanier = new Panier();

			$idPan = $_POST['idPanierChange'];
			$QtPan = $_POST['QtPan'];

			if($QtPan <= 0){
				echo "Erreur de l'action";
			}else{
				$modelePanier->UpdateQtePub($idPan,$QtPan);	
				echo "ok";
			}
		}else{
			echo "Erreur";
		}

	}

	if (isset($_POST['Suppanier'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {

			include '../../modele/panier/modele.panier.php';
			include '../../config/connexion.php';
			$modelePanier = new Panier();

			$idPan = $_POST['Suppanier'];

			$modelePanier->SupPanier($idPan);	

			echo "ok";

		}else{
			echo "Erreur";
		}
	}

	if (isset($_POST['Videanier'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {
			
			include '../../modele/panier/modele.panier.php';
			include '../../config/connexion.php';
			$modelePanier = new Panier();

			$idUserVp = $_SESSION['idUser'];

			$modelePanier->VidePanier($idUserVp);	

			echo "ok";

		}else{
			echo "Erreur";
		}
	}








 ?>