<?php 
		if (isset($_POST['getAllN']) && $_POST['getAllN'] == 45) {
			session_start();
			if (isset($_SESSION['idUser'])) {

				include '../../modele/publication/modele.publication.php';
				include '../../modele/commande/modele.commande.php';
				include '../../modele/notificationUser/modele.notificationUser.php';
				include '../../modele/sur/modele.sur.php';
				include '../../config/connexion.php';
				
				$modeleUserN = new ModeleNotificationUser();
				$modeleCo = new Commande();
				$modelepUB = new ModelePub();
				$modeleSur = new SurModele();

				$idUser = $_SESSION['idUser'];

				$donneCo = $modeleUserN->GetAllNotifUserCo($idUser);
				$donnePub = $modeleUserN->GetAllNotifUserPub($idUser);
				$donneNothing = $modeleUserN->GetAllNotifUserNothing($idUser);
				$surIab = $modeleSur->GetSur();

				if ($donneNothing) {
					foreach ($donneNothing as $key => $value) {
						$img1 = "<img src='content/data/image/logo.png' width='100' height='100'/>";
						
						if ($value['statusNU']=="ENVOIE") {
							$new = "<p class='small text-muted text-center'><span class='badge badge-warning px-3'>Nouveau</span></p>";
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
		                        		<p class='text-muted text-center' style='word-wrap: break-word;'>".$value['descNotifU']."</p>
		                        		".$new."
		                        		<p align='center' class='small'>".$value['dateNU']." | ".$value['heureNU']."</p>
		                        	</div>
		                        	<div class='col-sm-2'>
		                        		<a href='tel:".$surIab['tel_sur']."' target='blank' class='btn btn-sm btn-primary'>Contacter</a>
		                        	</div>
		                        </div><hr>

						";
					}
				}

				if ($donnePub) {
					foreach ($donnePub as $key => $value) {
							$donnePubP = $modelepUB->GetPostById($value['idPubNotifL']);
							if ($donnePubP['img1_pub']!=NULL && $donnePubP['img1_pub']!="") {
								$img1 = "<img id='imgOneAC' src='content/data/image/publication/".$donnePubP['img1_pub']."' width='100' height='100' />";
							}else{
								$img1 = "<img src='content/data/image/logo.png' width='100' height='100'/>";
							}

							if ($value['statusNU']=="ENVOIE") {
								$new = "<p class='small text-muted text-center'><span class='badge badge-warning px-3'>Nouveau</span></p>";
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
						<div class='row'>
							<div class='col'>
								<h6 align='center'>Bienvenue sur votre site de vente en ligne</h6>
							</div>	
						</div>
					";
				}

				if ($donneCo) {
					foreach ($donneCo as $key => $value) {
						$donnecP = $modeleCo->GetCommandeNumCo($value['idCoNotifL']);
						$dateA = date("Y-m-d");
						if ($value['dateNU']==$dateA) {
							$new = "<p class='small text-center badge badge-danger'>Aujourd'hui</p>";
						}else{
							$new = "";
						}

						echo "	
								<div class='row'>
		                        	<div class='col-sm-3 text-center'>
		                        		<img src='content/data/image/logo.png' width='100' height='100'/>
		                        	</div>
		                        	<div class='col-sm-7'>
		                        		<h4 align='center'>A propos du commande ".$value['idCoNotifL']."</h4>
		                        		<p class='small text-muted text-center'>".nl2br($value['descNotifU'])."</p>
		                        		".$new."
		                        	</div>
		                        	<div class='col'>
		                        		<button class='btn btn-block btn-sm btn-primary' onclick=\"AfficheDetailleCommande(".$value['idCoNotifL'].");\" data-dismiss='modal' data-toggle='modal' data-target='#ComDetaille'>Voir</button>
		                        	</div>
		                        </div><hr>
						";
					}
				}else{
					echo "
						<hr>
						<div class='row'>
							<div class='col'>
								<h6 align='center'>Recevez les notifications ici</h6>
							</div>	
						</div>
					";
				}

			}else{
				echo "Erreur";
			}

		}


		if (isset($_POST['getAllNC']) && $_POST['getAllNC'] == 58) {
			session_start();
			if (isset($_SESSION['idUser'])) {

				include '../../modele/notificationUser/modele.notificationUser.php';
				include '../../config/connexion.php';
				$modeleUserN = new ModeleNotificationUser();
				
				$idUser = $_SESSION['idUser'];

				$donneCo = $modeleUserN->GetAllNotifUserCount($idUser);

				if ($donneCo && $donneCo['nombre']!=NULL && $donneCo['nombre']!=0) {
					echo "
	    				<audio src='content/data/music/rington.mp3' autoplay loop></audio>
						<div class='settings-trigger-three' data-toggle='modal' data-target='#UserNotifS' onclick='NotifUserSeeing(".$idUser.");'>
		            		<i class='fa fa-bell'></i>
		        		</div>
					";
				}else{
					echo "
						<div class='settings-trigger-three2' data-toggle='modal' data-target='#UserNotifS'>
		            		<i class='fa fa-bell'></i>
		        		</div>
					";
				}

			}else{
				echo "Erreur";
			}
		}

		if (isset($_POST['seeNotif'])) {
			include '../../modele/notificationUser/modele.notificationUser.php';
			include '../../config/connexion.php';
			$modeleUserN = new ModeleNotificationUser();
			
			$idUser = $_POST['idUserSN'];

			$modeleUserN->UserSeeNotif($idUser);

			echo "ok";
		}











 ?>