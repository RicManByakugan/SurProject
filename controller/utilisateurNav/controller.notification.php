<?php 
	if (isset($_POST['RecupNotifCommande']) && $_POST['RecupNotifCommande'] == 23) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/utilisateurNav/modele.notification.php';
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

					if($value['statusNotifNCUS'] == "ENVOIE"){
						$new = "<small class='text-small badge-danger'>Nouveau : ".$value['idNumNCUS']."</small>";
					}else{
						$new = "<small class='text-small'>".$value['idNumNCUS']."</small>";
					}

		        	$temps=strtotime($value['heureNotifNCUS']);
		        	$temps_affiche=date("g:i a",$temps);

					$script = "SeeCommandeURR(".$value['idNumNCUS'].");ChangeItBabe('commandeR','produit','service','formation','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','client','commande')";
					echo "
								<div class='media' onclick=\"".$script."\" style='cursor:pointer;'>
									  <img src='".$urllogo."' class='img-size-50 mr-3 img-circle'>
						              <div class='media-body'>
										".$new."
						                <p class='text-sm'>".$value['descNotifNCUS']."</p>
						                <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ".$temps_affiche." | ".$value['dateNotifNCUS']."</p>
						              </div>
						         </div>
						         <hr>

					";
				}
			}else{
				echo "<a class='dropdown-item text-success' style='text-align:center;'>Aucune commande rapide</a>";
			}
		}else{
			echo "Error";
		}
	}

	if (isset($_POST['RecupNotifCommandeNombre']) && $_POST['RecupNotifCommandeNombre'] == 25) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/utilisateurNav/modele.notification.php';
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

	if (isset($_POST['SeeItBabeCU'])) {
		include '../../modele/utilisateurNav/modele.notification.php';
		include '../../config/connexion.php';
		$modele = new ModeleNotification();
		
		$idC = $_POST['SeeItBabeCU'];

		$modele->SeeCommande($idC);

		echo "ok";
	}


 ?>