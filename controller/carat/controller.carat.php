<?php 
		if (isset($_POST['addC'])) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/carat/modele.carat.php';
				include '../../modele/notificationUser/modele.notificationUser.php';
				include '../../config/connexion.php';
				$modele = new CaratCredit();
				$modeleUserN = new ModeleNotificationUser();
			
				$solde = $_POST['soldeAC'];
				$idUser = $_POST['idUser'];
				$idAdmin = $_SESSION['id_admin'];

				if ($solde<=0) {
					echo "Erreur";
				}else{
					$do = $modele->AddCarat($idUser,$solde,$idAdmin);
					if ($do=="ok") {
						$do = $modele->GetCreditUser($idUser);
						$text = "Vous avez recus de nouveau crédit carat : ".$solde." pour votre participation sur nos boîtes à collecte";
						$modeleUserN->AddNotifCarat($idUser,$text);
						echo "ok";
					}else{
						echo $do;
					}
				}
			}else{
				echo "Erreur";
			}
		}
		if (isset($_POST['subC'])) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/carat/modele.carat.php';
				include '../../modele/notificationUser/modele.notificationUser.php';
				include '../../config/connexion.php';
				$modele = new CaratCredit();
				$modeleUserN = new ModeleNotificationUser();
			
				$solde = $_POST['soldeSC'];
				$idUser = $_POST['idUser'];
				$idAdmin = $_SESSION['id_admin'];
				$motif = $_POST['motif'];
				
				if ($solde<=0) {
					echo "Erreur";
				}else{
					$do = $modele->SubCarat($idUser,$solde,$idAdmin);
					if ($do=="ok") {
						$text = "Vous avez fait un retrait de credit carat : ".$solde.". Raison : ".$motif;
						$modeleUserN->AddNotifCarat($idUser,$text);
						echo "ok";
					}else{
						echo $do;
					}
				}
			}else{
				echo "Erreur";
			}
		}
		if (isset($_POST['RetraitCarat'])) {
			include '../../modele/carat/modele.carat.php';
			include '../../modele/utilisateur/modele.utilisateur.php';
			include '../../config/connexion.php';
			$modele = new CaratCredit();
			$modeleUser = new UtilisateurModele();

			$idUser = $_POST['idUserRC'];
			$montant = $_POST['montantZ'];
			$motif = $_POST['motifZ'];
			$mdp = $_POST['pswZ'];

			if ($montant<0) {
				echo "Erreur";
			}else{
				$donneUser = $modeleUser->GetUserId($idUser);
				if ($donneUser) {
					if ($donneUser['mdpUser']==md5($mdp)) {
						 $do = $modele->RetraitUser($idUser,$montant,$motif);
						 echo $do;
					}else{
						echo "Mot de passe incorrect";
					}
				}else{
					echo "Erreur";
				}
			}
		}

		if (isset($_POST['RecupCarta'])) {
			include '../../modele/carat/modele.carat.php';
			include '../../config/connexion.php';
			$modele = new CaratCredit();
			
			$idUser = $_POST['idUserCR'];
			
			$donne = $modele->GetCreditUser($idUser);
			$donneActivite = $modele->GetCreditUserActiviteUser($donne['idCarat']);

			echo "
				<div class='row'>
                    <div class='col'>
                    	<!--<h6 align='right'>NIF : </h6>                
                    	<h6 align='right'>STAT :</h6>-->                
                    	<h6 align='left'>Numéro de compte : ".$donne['numCompte']."</h6	>                
                    </div>
                </div>
				<hr>
				<div class='row'>
                    <div class='col'>
                    	<h4 align='left' class='text-muted'>Solde : ".number_format($donne['creditPC'])." Crédit</h4>
                    </div>
                    <div class='col'>
                        <div style='float: right;'>
		                   	<button class='btn btn-primary' data-dismiss='modal' data-toggle='modal' data-target='#retraitUser'>Retrait <i class='fa fa-copyright'></i></button>
		                   	<button class='btn btn-primary' data-dismiss='modal' data-toggle='modal' data-target='#AppelSur'>Service <i class='fa fa-phone'></i></button>
		                   	<button class='btn btn-primary' onclick='ViderTransaction(".$donne['idCarat'].")'>Vider <i class='fa fa-trash'></i></button>
                       	</div>
                    </div>
                </div>
                <hr>
                <div class='table-responsive mb-4'>
					<table class='table'>
							<thead class='bg-light'>
									                    <tr>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Action</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Montant</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Solde</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Référence</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Date</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'>Heure</strong></th>
									                      <th class='border-0' scope='col'> <strong class='text-small text-uppercase'></strong></th>
									                    </tr>
							</thead>
							<tbody>
			";
			if ($donneActivite) {
			foreach ($donneActivite as $key => $valueAct) {
					if ($valueAct['Action'] == "AJOUT CREDIT") {
						$res = "RECUS";
					}elseif ($valueAct['Action'] == "RETIRE CREDIT") {
						$res = "RETRAIT";
					}else{
						$res = $valueAct['Action'];
					}
					echo "
														<tr>
									                      <td class='border-0' scope='col'>".$res."</td>
									                      <td class='border-0' scope='col'>".$valueAct['montant']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['Solde']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['ReferCarat']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['DateCA']."</td>
									                      <td class='border-0' scope='col'>".$valueAct['HeureCA']."</td>
									                    </tr>
					";	
			}
			}else{
				echo "
								<tr>
			                      <th class='border-0' scope='col'> <strong class='text-small'>Les transactions s'afficheront ici</strong></th>
			                    </tr>
				";
			}
			echo " 
			            </tbody>							
					</table>
				</div>

			";
		}

		if (isset($_POST['Vidit'])) {
			include '../../modele/carat/modele.carat.php';
			include '../../config/connexion.php';
			$modele = new CaratCredit();
			
			$idC = $_POST['idC'];

			$modele->ViderTransactionUser($idC);

			echo "ok";
		}

 ?>