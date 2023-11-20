<?php 
		if (isset($_POST['RecupNotif']) && $_POST['RecupNotif'] == 13) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/notification/modele.notification.php';
				include '../../config/connexion.php';
				$modele = new ModeleNotification();
				$idAdmin = $_SESSION['id_admin'];
				$donne = $modele->GetNotifUser($idAdmin);

				if ($donne) {
					foreach ($donne as $key => $value) {

						if ($value['dateNotif']==date("Y-m-d")) {
							$datedate = "Aujourd'hui";	
						}else{
							$datedate = $value['dateNotif'];
						}
						
						if ($value['statusNotif']=="ENVOIE") {
							$style = "style='color:blue;'";
						}else{
							$style = "";
						}

						echo "
								<a class='dropdown-item' onclick='NotifSee(".$value['id_notif'].");'>
						            <i class='fas fa-bell mr-2' ".$style."></i> ".$value['typeNotif']."
						            <span class='float-right text-muted text-sm'>".$datedate."</span><hr>
						            <h6>".$value['descNotif']."</h6>
						        </a><hr>
						";
					}
				}else{
					echo "<a class='dropdown-item' style='text-align:center;'>Aucune notification</a>";
				}
			}else{
		 		echo "Erreur de l'action";
			}
		}
		if (isset($_POST['RecupNotifNombre'])) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/notification/modele.notification.php';
				include '../../config/connexion.php';
				$modele = new ModeleNotification();
				$idAdmin = $_SESSION['id_admin'];
				$donne = $modele->GetNotifCount($idAdmin);
				
				if ($donne==NULL || $donne['nombre']==0) {
				    echo "KO";
				}else{
				    echo $donne['nombre'];
				}
			}else{
		 		echo "KO";
			}
		}
		if (isset($_POST['RecupNotifMessageNombre']) && $_POST['RecupNotifMessageNombre'] == 21) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/notification/modele.notification.php';
				include '../../config/connexion.php';
				$modele = new ModeleNotification();
				$idAdmin = $_SESSION['id_admin'];
				$donne = $modele->GetNotifMessageCount($idAdmin);
				
				if ($donne==NULL || $donne['nombre']==0) {
				    echo "KO";
				}else{
				    echo "";
				}
			}else{
		 		echo "Erreur de l'action";
			}
		}
		if (isset($_POST['RecupNotifCommandeNombre']) && $_POST['RecupNotifCommandeNombre'] == 25) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/notification/modele.notification.php';
				include '../../config/connexion.php';
				$modele = new ModeleNotification();
				$idAdmin = $_SESSION['id_admin'];
				$donne = $modele->GetNotifCommandeCount($idAdmin);
				
				if ($donne==NULL || $donne['nombre']==0) {
				    echo "KO";
				}else{
				    echo "<audio src='content/data/music/rington.mp3' autoplay loop></audio>".$donne['nombre'];
				}
			}else{
		 		echo "KO";
			}
		}

		if (isset($_POST['SeeNotif'])) {
			include '../../modele/notification/modele.notification.php';
			include '../../config/connexion.php';
			$modele = new ModeleNotification();
			$idNOtif = $_POST['SeeNotif'];
			$donne = $modele->NotifChangeS($idNOtif);
			echo "ok";
		}


		if (isset($_POST['RecupNotifMessage']) && $_POST['RecupNotifMessage'] == 17) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/notification/modele.notification.php';
				include '../../config/connexion.php';
				$modele = new ModeleNotification();
				$idUser = $_SESSION['id_admin'];
				$donne = $modele->GetNotifUserMessageG($idUser);
				if ($donne) {
					foreach ($donne as $key => $value) {
						if($value['profil_admin']=='' || $value['profil_admin']==NULL)
							$urllogo="content/data/image/admin/profile.png'";
						else
					    	$urllogo="content/data/image/admin/".$value['profil_admin'];

					    $temps=strtotime($value['tempsNotif']);
			        	$temps_affiche=date("g:i a",$temps);

			        	if ($value['dateNotif'] == date("Y-m-d")) {
			        		$new = "<small style='text-align:center;color:blue;'>Aujourd'hui</small>";
			        	}else{
			        		$new = "";
			        	}


						$script = "ChangeItBabe('message','service','produit','formation','sponsors','donne','bienvenue','adminC','messageAdmin','activite');";
						//$script = "ChangeItBabe('message','service','produit','formation','sponsors','donne','bienvenue','adminC','messageAdmin','activite');NotifSeeMessage(".$value['id_notif'].");";
						echo "
									<div class='media' onclick=".$script." style='cursor:pointer;'>
										  <img src='".$urllogo."' class='img-size-50 mr-3 img-circle'>
							              <div class='media-body'>
											".$new."
							                <h3 class='dropdown-item-title'>".$value['typeNotif']."</h3>
							                <p class='text-sm'>".$value['descNotif']."</p>
							                <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ".$temps_affiche." | ".$value['dateNotif']."</p>
							              </div>
							         </div>
							         <hr>

						";
					}
				}else{
					echo "<a class='dropdown-item' style='text-align:center;'>Aucune message</a>";
				}
			}else{
				echo "Error";
			}
		}
		if (isset($_POST['RecupNotifCommande']) && $_POST['RecupNotifCommande'] == 23) {
			session_start();
			if (isset($_SESSION['id_admin'])) {
				include '../../modele/notification/modele.notification.php';
				include '../../config/connexion.php';
				$modele = new ModeleNotification();
				
				$idUser = $_SESSION['id_admin'];

				$donne = $modele->GetNotifCommande();
				if ($donne) {

					foreach ($donne as $key => $value) {

						if($value['imageUser']=="" || $value['imageUser']==NULL){
							$urllogo="content/data/image/utilisateur/profile.png'";
						}else{
					    	$urllogo="content/data/image/utilisateur/".$value['imageUser'];
						}		      

						if($value['statusNotifNC'] == "ENVOIE"){
							$new = "<small class='text-small badge-danger'>Nouveau : ".$value['idNumNC']."</small>";
						}else{
							$new = "<small class='text-small'>".$value['idNumNC']."</small>";
						}

			        	$temps=strtotime($value['heureNotifNC']);
			        	$temps_affiche=date("g:i a",$temps);

						$script = "SeeCommandeU(".$value['idNumNC'].");ChangeItBabe('commande','produit','service','formation','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','client')";
						echo "
									<div class='media' onclick=\"".$script."\" style='cursor:pointer;'>
										  <img src='".$urllogo."' class='img-size-50 mr-3 img-circle'>
							              <div class='media-body'>
											".$new."
							                <p class='text-sm'>".$value['descNotifNC']."</p>
							                <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ".$temps_affiche." | ".$value['dateNotifNC']."</p>
							              </div>
							         </div>
							         <hr>

						";
					}
				}else{
					echo "<a class='dropdown-item' style='text-align:center;'>Aucune commande</a>";
				}
			}else{
				echo "Error";
			}
		}

		if (isset($_POST['SeeItBabeCU'])) {
			include '../../modele/notification/modele.notification.php';
			include '../../config/connexion.php';
			$modele = new ModeleNotification();
			
			$idC = $_POST['SeeItBabeCU'];

			$modele->SeeCommande($idC);

			echo "ok";
		}







 ?>