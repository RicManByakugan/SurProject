<?php 
		
		if (isset($_POST['connexionAdmin'])) {
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();

			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			if (empty($telephone) && empty($mdp)) {
				echo "Données manquante";
			}
			else{
				$donne = $modele->GetUserAdminCo($pseudo);
				if ($donne) {
					if ($donne['mdp_admin']==md5($mdp)) {
						session_start();
						$modele->ChangeStatusConnexion($donne['id_admin'],"ok");
						$_SESSION['id_admin'] = $donne['id_admin'];
						echo "OK";
					}	
					else{
						echo "Mot de passe incorrect";
					}
				}else{
					echo "Pseudo introuvable";
				}
			}


		}

		if (isset($_POST['idAdminPDel']) && $_POST['idAdminPDel'] == 15) {
			session_start();
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();

			$idUser = $_SESSION['id_admin'];
			
			$modele->DelImageUser($idUser);

			echo "ok";
		}

		if (isset($_GET['deconnexion'])) {
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
			session_start();
			$id_admin = $_SESSION['id_admin'];
			$modele->ChangeStatusConnexion($id_admin,"ko");
			session_unset();
			session_destroy();
			header('location:../../index.php?admin=1');
			
		}

		if (isset($_POST['MajSub'])) {
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
		}


		if (isset($_POST['new_mdpbtn'])) {
	 		include '../../config/connexion.php';
			include '../../modele/admin/modele.admin.php';
			$modele = new ModeleAdmin();

	 		$id_admin = $_POST['id_admin'];
	 		$old_mdp = $_POST['old_mdp'];
	 		$new_mdp1 = $_POST['new_mdp1'];
	 		$new_mdp2 = $_POST['new_mdp2'];


	 		$val = $modele->GetUserId($id_admin);


	 		if ($new_mdp1==$new_mdp2) {
	 			if ($val['mdp_admin']==md5($old_mdp)) {
		 			$modele->UpdateaAdminMdp($id_admin,md5($new_mdp2));
		 			echo "OK";
		 		}else{
		 			echo "Ancien mot de passe incorrecte";
		 		}	
	 		}else{
	 			echo "Deux mot de passe ne correspond pas";
	 		}
			// header('location:../../page/UserAdmin/entrepriseControl/accueil.php');
	 	}

	 	if (isset($_POST['MajSub'])) {
	 		// include '../../config/connexion.php';
			// include '../../modele/admin/modele.admin.php';
			$modeleModif = new ModeleAdmin();

			$id_admin = $_POST['id_admin'];
	 		$newName = $_POST['newName'];
	 		$newLast = $_POST['newLast'];
	 		$newContact = $_POST['newContact'];
	 		$newEmail = $_POST['newEmail'];

	 		$image = $_FILES['newProfil']['name'];
	 		$imgName = "";

			if (!empty($image)) {
					$fileInfo = pathinfo($_FILES['newProfil']['name']);
					$ext = $fileInfo['extension'];
					$imgName = rand().time().'surimageAdmin.'.$ext;
					$target = "../../content/data/image/admin/".$imgName;
					
					 	if (file_exists($target) && !empty($logoSpons)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['newProfil']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['newProfil']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

	 		$modeleModif->MAJ($id_admin,$newName,$newLast,$newContact,$newEmail,$imgName);

			header("location:../../index.php?admin=1");

	 	}
	 	
	 	if (isset($_POST['RecupUserLis'])) {
	 		include '../../config/connexion.php';
			include '../../modele/admin/modele.admin.php';
			$modele = new ModeleAdmin();
	 		$donne = $modele->GetUserListe();
	 		if (isset($donne )) {
		 		foreach ($donne as $key => $value) {
		 				if($value['profil_admin']=='' || $value['profil_admin']==NULL)
							$urllogo="content/data/image/admin/profile.png";
						else
					    	$urllogo="content/data/image/admin/".$value['profil_admin'];

			 		// echo "
		    //             	<div class='row'>
			   //                <div class='col-sm-3' style='text-align: center;'>
			   //                  <img src='".$urllogo."' width='60' height='60'>
			   //                </div>
			   //                <div class='col-sm-9' style='text-align: center;'>
			   //                  <p>".$value['prenom_admin']." ".$value['nom_admin']."<br><small>(".$value['poste_admin'].")</small></p>
			   //                </div>
			   //              </div>
			   //            <hr>
			 		// ";

			 		echo "
			 			<li>
	                        <img src='".$urllogo."'>
	                        <a class='users-list-name'>".$value['prenom_admin']." ".$value['nom_admin']."</a>
	                        <span class='users-list-date'>".$value['poste_admin']."</span>
	                      </li>
			 		";
		 		}
	 		}
	 	}

	 	if (isset($_POST['RecupAdmin'])) {
	 		include '../../config/connexion.php';
			include '../../modele/admin/modele.admin.php';
			$modele = new ModeleAdmin();
	 		$donne = $modele->GetUserListe();

	 		if ($donne) {
		 		foreach ($donne as $key => $value) {
		 			if($value['profil_admin']=='' || $value['profil_admin']==NULL)
							$urllogo="content/data/image/admin/profile.png'";
						else
					    	$urllogo="content/data/image/admin/".$value['profil_admin'];

			 		echo "
			 			<div class='row'>
						    <div class='col-sm-3' style='text-align: center;'>
						    	<img src='".$urllogo."' width='80' height='80'>
						    </div>
						    <div class='col-sm-9' style='text-align: center;'>
							    <h5 align='center'>".$value['prenom_admin']." ".$value['nom_admin']."</h5>
						        <button class='btn btn-primary' onclick='DetailleAdmin(".$value['id_admin'].")'>Détaille</button>
						        <a href='tel:".$value['contact_admin']."' target='blank'><button class='btn btn-primary'>Contacter</button></a>
						    </div>
						</div>
						<hr>
			 		";
		 		}
	 		}else{
	 			echo "
	 				<h6 align='center'>Aucune personne sur la liste</h6>
	 			";
	 		}
	 	}
	 	if (isset($_POST['RecupAdminLicencie'])) {
	 		include '../../config/connexion.php';
			include '../../modele/admin/modele.admin.php';
			$modele = new ModeleAdmin();
	 		$donne = $modele->GetUserListeLicencie();

	 		if ($donne) {
		 		foreach ($donne as $key => $value) {
		 			if($value['profil_admin']=='' || $value['profil_admin']==NULL)
							$urllogo="content/data/image/admin/profile.png'";
						else
					    	$urllogo="content/data/image/admin/".$value['profil_admin'];

			 		echo "
			 			<div class='row'>
						    <div class='col-sm-3' style='text-align: center;'>
						    	<img src='".$urllogo."' width='80' height='80'>
						    </div>
						    <div class='col-sm-9' style='text-align: center;'>
							    <h5 align='center'>".$value['prenom_admin']." ".$value['nom_admin']."</h5>
						        <button class='btn btn-primary' onclick='DetailleAdmin(".$value['id_admin'].")'>Détaille</button>
						        <a href='tel:".$value['contact_admin']."' target='blank'><button class='btn btn-primary'>Contacter</button></a>
						        <button class='btn btn-primary' onclick='DelMembre(".$value['id_admin'].")'>Supprimer</button>
						    </div>
						</div>
						<hr>
			 		";
		 		}
	 		}else{
	 			echo "
	 				<h6 align='center'>Aucune personne sur la liste</h6>
	 			";
	 		}
	 	}
	 	if (isset($_POST['RecupAdminDetaille'])) {
	 		include '../../config/connexion.php';
			include '../../modele/admin/modele.admin.php';
			$modele = new ModeleAdmin();
	 		$id_admin = $_POST['RecupAdminDetaille'];
	 		$donne = $modele->GetUserId($id_admin);
	 		if ($donne) {
	 			if($donne['profil_admin']=='' || $donne['profil_admin']==NULL)
						$urllogo="content/data/image/admin/profile.png";
					else
				    	$urllogo="content/data/image/admin/".$donne['profil_admin'];
 ?>
 			<div class="col" style="text-align: center;"> 
				<img src="<?php echo $urllogo ?>" width="90" height="90"> 
			</div>
			<br>
			<div class="row">
				<table class="table table-hover">
					<tbody>
						<tr>
							<td>Nom</td>
							<td><?php echo $donne['nom_admin']; ?></td>
						</tr>
						<tr>
							<td>Prénom</td>
							<td><?php echo $donne['prenom_admin']; ?></td>
						</tr>
						<tr>
							<td>Contact</td>
							<td><?php echo $donne['contact_admin']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $donne['email_admin']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col" style="text-align: center;">
				<h6>Poste : <?php echo $donne['poste_admin'] ?></h6>
				<?php if ($donne['poste_admin'] != NULL || $donne['poste_admin'] != "") { ?>
				<button class="btn btn-primary" onclick="DisplayBlock('posteMAJ');this.disabled=true" id="changePost">Changement de poste</button>
				<?php }else{ ?>
				<button class="btn btn-primary" onclick="DisplayBlock('posteMAJ');this.disabled=true" id="changePost">Nouveau poste</button>
				<?php } ?>
				<?php if ($donne['poste_admin'] != NULL || $donne['poste_admin'] != "") { ?>
				<button class="btn btn-primary" onclick="Licencier(<?php echo $donne['id_admin']; ?>);">Licencier</button>
				<?php } ?>
				<button class="btn btn-primary" onclick="DisplayBlock('renitialiseMdp')">Mot de passe</button>
				<div id="renitialiseMdp" style="display: none;">
					<hr>
					<label>Rénitialiser le mot de passe</label>
					<div class="col">
						<div class="form-group">
							<button class="btn btn-primary" onclick="DisplayBlock('parDNMd');">Nouveau mot de passe</button>
						</div>
					</div>
					<span id="parDNMd" style="display: none;">
						<div class="col">
							<div class="form-group">
								<label>Par défault</label>
								<input type="text" class="form-control" name="RmdpNew" id="RmdpNew" value="1234<?php echo $donne['pseudo_admin']; ?>" style="text-align: center;">
							</div>
						</div>
						<div class="col">
							<button class="btn btn-primary" onclick="TueLVmp(<?php echo $donne['id_admin']; ?>)">Confirmer</button>
							<button class="btn btn-primary" onclick="DisplayNone('renitialiseMdp');">Annuler</button>
						</div>
					</span>
				</div>
				<hr>
				<div id="posteMAJ" style="display: none;">
					<label>Nouveau poste pour <?php echo $donne['prenom_admin']; ?></label>
					<div class="col">
						<div class="form-group">
							<select class="form-control" id="posteAdminMAJ">
							<option></option>
								<option value="MA">MANAGEMENT DES AFFAIRES</option>
								<option value="INFO">INFORMATIQUE</option>
								<option value="GESS">GESTION DES STOCKS</option>
								<option value="COM">COMMUNICATION</option>
								<option value="FI">FINANCE</option>
								<option value="MAR">MARKETING</option>
							</select>
						</div>
						<button class="btn btn-primary" style="width: 45%;" onclick="MAJPoste(<?php echo $donne['id_admin'] ?>);">Mettre à jour</button>
						<button class="btn btn-primary" style="width: 45%;" onclick="DisplayNone('posteMAJ');document.getElementById('changePost').disabled=false;">Annuler</button>
					</div>
				</div>
			</div>
 <?php 
 		}
	 }
	 if (isset($_POST['TueLVmpV'])) {
	 		include '../../config/connexion.php';
			include '../../modele/admin/modele.admin.php';
			$modele = new ModeleAdmin();
	 		$id_admin = $_POST['TueLVmpV'];
	 		$valeurT = $_POST['valeurT'];
	 		$modele->MAJTLue($id_admin,md5($valeurT));
	 		echo "ok";
	 }
	 if (isset($_POST['MAJPostee'])) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
		 		include '../../config/connexion.php';
				include '../../modele/admin/modele.admin.php';
				include '../../modele/notification/modele.notification.php';
				$modeleNotif = new ModeleNotification();
				$modele = new ModeleAdmin();
	 		
		 		$id_admin = $_POST['MAJPostee'];
		 		$idEnvoie = $_SESSION['id_admin'];
		 		$posteUser = $_POST['Valeur'];

		 		if ($posteUser == "MA") {
		 			$valeurPoste = "MANAGEMENT DES AFFAIRES";
		 		}
		 		else if ($posteUser == "INFO") {
		 			$valeurPoste = "INFORMATIQUE";
		 		}
		 		else if ($posteUser == "GESS") {
		 			$valeurPoste = "GESTION DES STOCKS";
		 		}
		 		else if ($posteUser == "COM") {
		 			$valeurPoste = "COMMUNICATION";
		 		}
		 		else if ($posteUser == "FI") {
		 			$valeurPoste = "FINANCE";
		 		}
		 		else if ($posteUser == "MAR") {
		 			$valeurPoste = "MARKETING";
		 		}
		 		else{
		 			$valeurPoste = NULL;
		 		}

		 		if ($valeurPoste!=NULL) {
		 			$modele->MAJPosteId($id_admin,$valeurPoste);

		 			$text = "CHANGEMENT DE NOUVEAU POSTE";
		 			$type = "POSTE";
		 			$modeleNotif->AddNotif($idEnvoie,$id_admin,$text,$type);
		 
		 			echo $id_admin;
		 		}else{
		 			echo "Error";
		 		}
			}else{
		 		echo "Error";
			}
	 }
	 if (isset($_POST['LicenceAdmin'])) {
	 		session_start();
			if (isset($_SESSION['id_admin'])) {
		 		include '../../config/connexion.php';
				include '../../modele/admin/modele.admin.php';
				include '../../modele/notification/modele.notification.php';
				$modeleNotif = new ModeleNotification();
				$modele = new ModeleAdmin();
		 		$id_admin = $_POST['LicenceAdmin'];
		 		$idEnvoie = $_SESSION['id_admin'];
		 		$ver = $modele->GetOut($id_admin);
		 		if ($ver == "ok") {
		 			$text = "EN ATTENTE DE NOUVEAU POSTE";
		 			$type = "POSTE";
		 			$modeleNotif->AddNotif($idEnvoie,$id_admin,$text,$type);
		 			echo "ok";
		 		}else{
		 			echo "Erreur de l'action";
		 		}	
			}else{
		 		echo "Erreur de l'action";
			}
	 }
	 if (isset($_POST['SupAdmin'])) {
	 		include '../../config/connexion.php';
			include '../../modele/admin/modele.admin.php';
			$modele = new ModeleAdmin();
	 		$id_admin = $_POST['SupAdmin'];
	 		$ver = $modele->DelAdmin($id_admin);
	 		if ($ver == "ok") {
	 			echo "ok";
	 		}else{
	 			echo "Erreur de l'action";
	 		}
	 }
	 if (isset($_POST['addAdmin'])) {
	 	include '../../config/connexion.php';
		include '../../modele/admin/modele.admin.php';
		$modele = new ModeleAdmin();
		

	 	$nomUser = $_POST['nomUser'];
	 	$prenomUser = $_POST['prenomUser'];
	 	$contactUser = $_POST['contactUser'];
	 	$posteUser = $_POST['posteUser'];

	 	$pseudoUser = $_POST['pseudoUser'];
	 	$mdpUser = $_POST['mdpUser'];

	 		if ($posteUser == "MA") {
	 			$valeurPoste = "MANAGEMENT DES AFFAIRES";
	 		}
	 		else if ($posteUser == "INFO") {
	 			$valeurPoste = "INFORMATIQUE";
	 		}
	 		else if ($posteUser == "GESS") {
	 			$valeurPoste = "GESTION DES STOCKS";
	 		}
	 		else if ($posteUser == "COM") {
	 			$valeurPoste = "COMMUNICATION";
	 		}
	 		else if ($posteUser == "FI") {
	 			$valeurPoste = "FINANCE";
	 		}
	 		else if ($posteUser == "MAR") {
	 			$valeurPoste = "MARKETING";
	 		}
	 		else{
	 			$valeurPoste = NULL;
	 		}

		$test = $modele->GetUserPseudoVer($pseudoUser);
		if ($test) {
	 		$res =  "Pseudo existe déjà";
	 	}else{
	 		if ($valeurPoste!=NULL) {
		 		$modele->AddAdmin($pseudoUser,md5($mdpUser),$nomUser,$prenomUser,$contactUser,$valeurPoste);
		 		$res =  "Effectuer";
	 		}else{
	 			$res = "Erreur de l'insertion";
	 		}
	 	}
  ?>
  		<script>
		 	window.top.window.alert('<?php echo $res; ?>');
		 	<?php if ($res == "Effectuer") { ?>
			 	window.top.window.ResetForm('addAdmin');
			 	window.top.window.DisplayNone('genereCo');
			 	window.top.window.DisplayNone('addRes');
			 	window.top.window.AllAdminRecup();
		 	<?php }else{ ?>
		 		window.top.window.alert('<?php echo $res; ?>');
		 	<?php } ?>
		 </script>
  <?php 
		}

		if (isset($_POST['GetAllCFA'])) {
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
			session_start();
			$donne = $modele->GetAllUser();

			if ($donne) {
		 		foreach ($donne as $key => $value) {
		 				if($value['imageUser']=='' || $value['imageUser']==NULL)
							$urllogo="content/data/image/utilisateur/profile.png'";
						else
					    	$urllogo="content/data/image/utilisateur/".$value['imageUser'];

			 		echo "
			 			<div class='row'>
						    <div class='col-sm-3' style='text-align: center;'>
						    	<img src='".$urllogo."' width='80' height='80'>
						    </div>
						    <div class='col-sm-4' style='text-align: center;'>
							    <h5 align='center'>".$value['prenomUser']." ".$value['nomUser']."</h5>
							    <small class='text-center'>".$value['emailUser']."</small><br>
							    <small class='text-center'>".$value['provinceUser']."</small>
						    </div>
						    <div class='col-sm-5' style='text-align: center;'><br>
						        <button class='btn btn-primary' onclick='DetailleUser(".$value['idUser'].")'>Détaille</button>
						        <a href='tel:".$value['contactUser']."' target='blank'><button class='btn btn-primary'>Contacter</button></a>
						        <a data-toggle='modal' data-target='#MessageClients' onclick='MessageForUser(".$value['idUser'].",".$_SESSION['id_admin'].")'><button class='btn btn-primary'>Message</button></a>
						    </div>
						</div>
						<hr>
			 		";
		 		}
	 		}else{
	 			echo "
	 				<h6 align='center'>Aucune personne sur la liste</h6>
	 			";
	 		}


		}

		if (isset($_POST['GetSurClient'])) {
			include '../../modele/admin/modele.admin.php';
			include '../../modele/carat/modele.carat.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
			$modeleC = new CaratCredit();
			
			$idUser = $_POST['idUserUserC'];
			$donne = $modele->GetUserById($idUser);
			$donneC = $modeleC->GetCreditUser($idUser);
			$donneAct = $modeleC->GetCreditUserActiviteAll($idUser);


			if ($donne) {
					if ($donne['imageUser']=="" || $donne['imageUser']==NULL) {
						$urlImg = "content/data/image/utilisateur/profile.png";
					}else{
						$urlImg = "content/data/image/utilisateur/".$donne['imageUser'];
					}

					list($anne,$timed) = explode(" ", $donne['inscriptionUser']);
				echo "
											<div class='row'>
						              			<div class='col'>
						              				<h4 class='badge badge-warning float-right'>Inscription : ".$anne."</h4>
						              				<h4 class='badge badge-warning float-left'>Crédit : ".$donneC['creditPC']."</h4>
						              			</div>
						              		</div>
						              		<div class='tete' style='text-align: center;'>
						                        <img src='".$urlImg."' width='15%'>
						              			<h4>".$donne['nomUser']." ".$donne['prenomUser']."</h4>
						              			<h6>Compte : ".$donneC['numCompte']."</h6>
						              		</div><hr>
						              		<div class='row'>
								                    <div class='col'>
								                        <div style='float: right;'>
								                        	<button class='btn btn-primary btn-sm' href='#detaUTra' data-toggle='collapse'>TRANSACTION <i class='fa fa-reply'></i></button>
								                        	<a href='tel:".$donne['contactUser']."'><button class='btn btn-primary btn-sm'>CONTACTER <i class='fa fa-phone'></i></button></a>
								                        	<!-- <button onclick=\"LoadPdfClient('".$donne['nomUser']."');\" class='btn btn-primary btn-sm'>PDF <i class='fa fa-print'></i></button>
								                        	<button class='btn btn-primary btn-sm btn-sm'>EMAIL <i class='fa fa-comment'></i></button>-->
								                        	<button class='btn btn-primary btn-sm' data-toggle='collapse' href='#detaUbio'>DESCRIPTION <i class='fa fa-user'></i></button>
								                       	</div>
								                    </div>
											</div>
											<span  class='collapse' id='detaUTra'>
												<hr>
												<div class='row'>
													<div class='col'>
														<div class='form-group'>
															<label>Recherche transaction</label>
															<input type='number' id='reT".$donne['idUser']."' class='form-control' placeholder='Référence de transaction' min='0' />
															<button class='btn btn-primary' style='width:100%' onclick=\"SearchTr('reT".$donne['idUser']."');\">Rechercher</button>
														</div>
													</div>
													<div class='col'>
														<div class='form-group'>
															<label>Ajout crédit</label>
															<input type='number' id='add".$donne['idUser']."' class='form-control' placeholder='Montant du crédit' min='0' />
															<button class='btn btn-primary' style='width:100%' onclick=\"AddCredit('add".$donne['idUser']."',".$donne['idUser'].");\">Ajouter</button>
														</div>
													</div>
													<div class='col'>
														<div class='form-group'>
															<label>Retire crédit</label>
															<input type='number' id='ret".$donne['idUser']."' class='form-control' placeholder='Montant du crédit' min='0' />
															<button class='btn btn-primary' style='width:100%' onclick=\"retireCredit('ret".$donne['idUser']."',".$donne['idUser'].",'motre".$donne['idUser']."');\">Retire</button>
															<label align='center'>Motif</label>
															<select class='form-control' id='motre".$donne['idUser']."'>
																<option></option>
																<option>LIVRAISON</option>
																<option>ACHAT PRODUIT</option>
															</select>
														</div>
													</div>
												</div>
												<div id='valinySearch'></div>
												<hr>
												<div class='row'>
												 	<div class='col'>
												 		<h6 align='center'>Transaction</h6>
												 	</div>
												 </div>
												<div class='table-responsive mb-4'>
												<table class='table'>
													<thead class='bg-light'>
									                    <tr>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase align-items-center'>Admin</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Action</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Montant</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Nouveau solde</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Référence</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Date</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Heure</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'></strong></th>
									                    </tr>
									                 </thead>
									                 <tbody>
									                    ";
									foreach ($donneAct as $key => $valueAct) {
												if ($valueAct['idAdminRes']==0) {
													$aff = "Client";
												}else{
	 										 		$val = $modele->GetUserId($valueAct['idAdminRes']);
	 										 		$aff = $val['pseudo_admin'];
												}
									         echo "
									         			<tr>
									                      <td class='border-0' scope='col'>".$aff."</td>
									                      <td class='border-0' scope='col'>".$valueAct['Action']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['montant']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['Solde']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['ReferCarat']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['DateCA']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['HeureCA']."</td>
									                    </tr>
									         ";	
									}                    
									echo " 
									                 </tbody>							
												</table>
												</div>
											</span>
											<span class='collapse' id='detaUbio'>
							              		<hr>
												<div class='row'>
													<div class='col'>
									              		<div class='table-responsive mb-4'>
															<table class='table'>
													                    <tr class='bg-light'>
													                      <th class='border-0' scope='col'> <strong class='text-small'>Nom</strong></th>
													                      <th class='border-0' scope='col'> <strong class='text-small'>Prénom</strong></th>
													                      <th class='border-0' scope='col'> <strong class='text-small'>Sexe </strong></th>
													                      <th class='border-0' scope='col'> <strong class='text-small'>Province</strong></th>
													                      <th class='border-0' scope='col'> <strong class='text-small'>Contact</strong></th>
													                      <th class='border-0' scope='col'> <strong class='text-small'>Email</strong></th>
													                    </tr>
													                    <tr>
													                      <th class='border-0' scope='col'> ".$donne['nomUser']."</th>
													                      <th class='border-0' scope='col'> ".$donne['prenomUser']."</th>
													                      <th class='border-0' scope='col'> ".$donne['sexeUser']."</th>
													                      <th class='border-0' scope='col'> ".$donne['provinceUser']."</th>
													                      <th class='border-0' scope='col'> ".$donne['contactUser']."</th>
													                      <th class='border-0' scope='col'> ".$donne['emailUser']."</th>
													                    </tr>								
															</table>
														</div>
													</div>
												</div>
											</span>
				";
			}else{
				echo "Erreur de l'affichage";
			}
		}

		if (isset($_POST['searchRef'])) {
			include '../../modele/carat/modele.carat.php';
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new CaratCredit();
			$modeleUser = new ModeleAdmin();

			$Ref = $_POST['RefV'];
			$donne = $modele->SearchRef($Ref);
				if ($donne) {

					if ($donne['idAdminRes']==0) {
						$aff = "Client";
					}else{
	 					$val = $modeleUser->GetUserId($donne['idAdminRes']);
	 					$aff = $val['pseudo_admin'];
					}

				echo "
					 <div class='row'>
					 	<div class='col'>
					 		<h6 align='center'>Recherche Ref : ".$Ref."</h6>
					 	</div>
					 </div>
					 <div class='table-responsive mb-4'>
						<table class='table'>
								<thead class='bg-light'>
										                <tr>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase align-items-center'>Admin</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Action</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Montant</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Nouveau solde</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Référence</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Date</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Heure</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'></strong></th>
									                    </tr>
								</thead>
								<tbody>
	 													<tr>
									                      <td class='border-0' scope='col'>".$aff."</td>
									                      <td class='border-0' scope='col'>".$donne['Action']."</td>
									                      <td class='border-0' scope='col'>".$donne['montant']."</td>
									                      <td class='border-0' scope='col'>".$donne['Solde']."</td>
									                      <td class='border-0' scope='col'>".$donne['ReferCarat']."</td>
									                      <td class='border-0' scope='col'>".$donne['DateCA']."</td>
									                      <td class='border-0' scope='col'>".$donne['HeureCA']."</td>
									                    </tr>
	 							</tbody>							
						</table>
					</div>
				";
			}else {
				echo "Aucune donnée trouvé";
			}
		}


		if (isset($_POST['GetSurClientFacture'])) {
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
			
			$idUser = $_POST['idUserUserCF'];
			$donne = $modele->GetUserById($idUser);

			list($anne,$timed) = explode(" ", $donne['inscriptionUser']);
			if ($donne) {
					if ($donne['imageUser']=="" || $donne['imageUser']==NULL) {
						$urlImg = "content/data/image/utilisateur/profile.png";
					}else{
						$urlImg = "content/data/image/utilisateur/".$donne['imageUser'];
					}
				echo "
											<div class='row'>
						              			<div class='col'>
						              				<h4 class='badge badge-warning float-right'>".$anne."</h4>
						              			</div>
						              		</div>
						              		<div class='tete' style='text-align: center;'>
						                        <img src='".$urlImg."' width='15%'>
						              			<h4>".$donne['nomUser']." ".$donne['prenomUser']."</h4>
						              		</div><hr>
						              		<div class='row'>
								                    <div class='col'>
								                        <div style='float: right;'>
								                        	<a href='tel:".$donne['contactUser']."'><button class='btn btn-primary btn-sm btn-sm'>CONTACTER <i class='fa fa-phone'></i></button></a>
								                       	</div>
								                    </div>
											</div>
						              		<div class='col'>
						              			
											</div>
				";
			}else{
				echo "Erreur de l'affichage";
			}
		}

		if (isset($_POST['RechercheC'])) {
			session_start();
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
			
			$donne = $_POST['donne'];
			$donneRe = $modele->RechercheClient($donne);

			echo "
				<div class='row'>
			";
				if ($donneRe) {
					foreach ($donneRe as $key => $value) {
						if ($value['imageUser']!=NULL || $value['imageUser']!="") {
							$img = "content/data/image/utilisateur/".$value['imageUser'];
						}else{
							$img = "content/data/image/utilisateur/profile.png";
						}
						echo "
							<div class='col-sm-4' style='text-align: center;margin-top: 20px;'>
				    			<img src='".$img."' width='70' height='70'>
				    			<h4>".$value['nomUser']." ".$value['prenomUser']."</h4>
				    			<button class='btn btn-primary' onclick='DetailleUser(".$value['idUser'].")'>Détaille</button>
			        			<a href='tel:".$value['contactUser']."' target='blank'><button class='btn btn-primary'>Contacter</button></a>
			        			<a data-toggle='modal' data-target='#MessageClients' onclick='MessageForUser(".$value['idUser'].",".$_SESSION['id_admin'].")'><button class='btn btn-primary'>Message</button></a>
							</div>
						";
					}
				}else{
					echo "
						<div class='col-sm-4' style='text-align: center;'>
							<h6 align='center'>Aucune données trouvé</h6>
						</div>
					";
				}
		    echo"
		    	</div>
			";	
		}

		if (isset($_POST['msgFUser'])) {
			session_start();
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
			$idUser = $_POST['idUserResp'];
			$idAdmin = $_POST['idAdminResp'];
			if ($idAdmin == $_SESSION['id_admin']) {
				$donne = $modele->GetUserById($idUser);
				if ($donne['imageUser']!=NULL || $donne['imageUser']!="") {
					$img = "content/data/image/utilisateur/".$donne['imageUser'];
				}else{
					$img = "content/data/image/utilisateur/profile.png";
				}
				echo "
					<div class='row'>
			    		<div class='col-sm-4 text-center'>
			    			<img src='".$img."' width='70' height='70'>
			    			<h4>".$donne['nomUser']." ".$donne['prenomUser']."</h4>
			    			<small>".$donne['provinceUser']."</small><br>
			    			<small>".$donne['emailUser']."</small>
			    		</div>
			    		<div class='col-sm-8'>
			    			<label>Message pour le clients</label>
			    			<textarea class='p-4 form-control' id='textForUser'></textarea>
			    			<button data-dismiss='modal' class='mt-2 btn btn-primary btn-block' onclick='EnvoieMessageForUser(".$donne['idUser'].",".$_SESSION['id_admin'].");'>Envoyer</button>
			    		</div>
			    	</div>
				";
			}else{
				echo "ko";
			}
			
		}

		if (isset($_POST['EnvoiemsgFUser'])) {
			session_start();
			include '../../modele/admin/modele.admin.php';
			include '../../modele/activite/modele.activite.php';
			include '../../modele/notificationUser/modele.notificationUser.php';
			include '../../config/connexion.php';

			$modeleActivite = new ActivityAdmin();
			$modele = new ModeleAdmin();
			$modeleNotifUser = new ModeleNotificationUser();

			$message = $_POST['message'];
			$idAdminResp = $_POST['idAdminResp'];
			$idUserResp = $_POST['idUserResp'];

			if ($idAdminResp == $_SESSION['id_admin']) {
				$donneUser = $modele->GetUserById($idUserResp);

				$messageEnvoieActivite = "MESSAGE POUR ".$donneUser['nomUser']." ".$donneUser['prenomUser']." | Contact : ".$donneUser['contactUser']." | Email : ".$donneUser['emailUser']." | Province : ".$donneUser['provinceUser'];
				$TypeAct = "MESSAGE POUR UTILISATEUR";
				$modeleActivite->AddActivite($idAdminResp,$TypeAct,$messageEnvoieActivite);

				$modeleNotifUser->AddNotifNothing($donneUser['idUser'],$message);

				echo "ok";
			}else{
				echo "Erreur 4589";
			}
		}

		if (isset($_POST['statusSite'])) {
			session_start();
			include '../../modele/admin/modele.admin.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModeleAdmin();
			if ($_SESSION['id_admin']) {
				$valeur = $_POST['statusSite'];

				$modele->StatusSite($valeur);

				if ($valeur == "off") {
					$messageEnvoieActivite = "Désactivation du site";	
				}else{
					$messageEnvoieActivite = "Activation du site";	
				}

				$TypeAct = "SUR";
				$modeleActivite->AddActivite($_SESSION['id_admin'],$TypeAct,$messageEnvoieActivite);

				echo "ok";
			}else{
				echo "Erreur 4589";
			}
		}


		if (isset($_POST['ReloadCompte'])) {
			session_start();
			include '../../modele/admin/modele.admin.php';
			include '../../modele/sur/modele.sur.php';
			include '../../config/connexion.php';
			if ($_SESSION['id_admin']) {
				$modele = new SurModele();
				$surIab = $modele->GetSur();

				if ($surIab['off'] == NULL) {
					echo "ko";
				}else{
					$heures   = $surIab['ofH'];
				    $minutes  = $surIab['ofM']; 
				    $secondes = $surIab['ofS'];
				    $annee = date("Y");  
				    $mois  = date("m");  
				    $jour  = date("d"); 
				    $secondes = mktime(date("H") + $heures,date("i") + $minutes,date("s") + $secondes,$mois,$jour,$annee) - time();

				    echo $secondes;
				}
				
			}else{
				echo "Erreur 4589";
			}
		}

		if (isset($_POST['ReloadCompteS'])) {
			session_start();
			include '../../modele/admin/modele.admin.php';
			include '../../config/connexion.php';
			$modele = new ModeleAdmin();
			if ($_SESSION['id_admin']) {
				$Day = $_POST['Day'];
				$Hour = $_POST['Hour'];
				$Minutes = $_POST['Minutes'];
				$Seconde = $_POST['Seconde'];

				$modele->UpdateHourMinuSeco($Hour,$Minutes,$Seconde);

				echo "ok";
			}else{
				echo "Erreur 4589";
			}
		}

   ?>
