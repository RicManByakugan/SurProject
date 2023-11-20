<?php 

	if (isset($_POST['RecupMess'])) {
		session_start();
 		if (isset($_SESSION['id_admin'])) {
			include '../../modele/message/modele.message.php';
			include '../../config/connexion.php';
			$modele = new MessageModele();
		 	$donne = $modele->GetMessage();
		 	$idAdmin = $_SESSION['id_admin'];
		 	foreach ($donne as $key => $value) {
				if($value['profil_admin']==''||$value['profil_admin']==NULL)
					$urllogo="content/data/image/admin/profile.png'";
				else
			    	$urllogo="content/data/image/admin/".$value['profil_admin'];

			    $temps=strtotime($value['heure_mess']);
	        	$temps_affiche=date("g:i a",$temps);

					if($value['imageMess1']!=''||$value['imageMess1']!=NULL)
	        		$imgOne = "<a href='content/data/image/message/".htmlentities($value['imageMess1'], ENT_QUOTES, "UTF-8")."' target='blank'><img src='content/data/image/message/".$value['imageMess1']."' width='100' height='100' /></a>";
	        	else
	        		$imgOne = "";


					if($value['imageMess2']!=''||$value['imageMess2']!=NULL)
	        		$imgTwo = "<a href='content/data/image/message/".htmlentities($value['imageMess2'], ENT_QUOTES, "UTF-8")."' target='blank'><img src='content/data/image/message/".$value['imageMess2']."' width='100' height='100' /></a>";
	        	else
	        		$imgTwo = "";
					

					if($value['imageMess3']!=''||$value['imageMess3']!=NULL)
	        		$imgThree = "<a href='content/data/image/message/".htmlentities($value['imageMess3'], ENT_QUOTES, "UTF-8")."' target='blank'><img src='content/data/image/message/".$value['imageMess3']."' width='100' height='100' /></a>";
	        	else
	        		$imgThree = "";


	        	if($value['contain_mess']!='' || $value['contain_mess']!=NULL)
	        		$messagea = "<div class='direct-chat-text'>".$value['contain_mess']."</div>";
	        	else
	        		$messagea = "<div class='direct-chat-text'>...</div>";

			    if ($value['idAdmin_mess']!=$idAdmin) {
				 	echo "
							<div class='direct-chat-msg'>
			                    <div class='direct-chat-infos clearfix'>
			                      <span class='direct-chat-name float-left'>".$value['prenom_admin']." ".$value['nom_admin']." (".$value['poste_admin'].")</span>
			                      <span class='direct-chat-timestamp float-right'>".$temps_affiche."  | ".$value['date_mess']."</span>
			                    </div>
			                    <img class='direct-chat-img' src='".$urllogo."' alt='message user image'>
			                      ".$messagea."
			                </div>
			                <div>
			                	".$imgOne."
			                	".$imgTwo."
			                	".$imgThree."
			                </div>  
					";
			    }else{
			    	echo "
							<div class='direct-chat-msg right'>
			                    <div class='direct-chat-infos clearfix'>
			                      <span class='direct-chat-name float-left'>".$value['prenom_admin']." ".$value['nom_admin']." (".$value['poste_admin'].")</span>
			                      <span class='direct-chat-timestamp float-right'>".$temps_affiche."  | ".$value['date_mess']."</span>
			                    </div>
			                    <img class='direct-chat-img' src='".$urllogo."' alt='message user image'>
			                      ".$messagea."
			                </div>
			                <div>
			                	".$imgOne."
			                	".$imgTwo."
			                	".$imgThree."
			                </div>  
					";
			    }
			}
 		}
	}


	if (isset($_POST['EnvoieMess'])) {
		include '../../modele/message/modele.message.php';
		include '../../config/connexion.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new ModeleNotification();
		$modele = new MessageModele();
		
		$id_adminMessage = $_POST['id_adminMessage'];
		$messageEnvoie = $_POST['messageEnvoie'];
		
		$imgMess1 = $_FILES['imgMess1']['name'];
		$imgMess2 = $_FILES['imgMess2']['name'];
		$imgMess3 = $_FILES['imgMess3']['name'];

		$nomFile1 = "";
		$nomFile2 = "";
		$nomFile3 = "";


		$text = "NOUVEAU MESSAGE";
		$type = "MESSAGE DE GROUPE";
		$idAdminNull = NULL;
	 	$modeleNotif->AddNotif($id_adminMessage,NULL,$text,$type);

		if (!empty($imgMess1)) {
					$fileInfo = pathinfo($_FILES['imgMess1']['name']);
					$ext = $fileInfo['extension'];
					$nomFile1 = rand().time().'surimageAdmin.'.$ext;
					$target = "../../content/data/image/message/".$nomFile1;
					
					 	if (file_exists($target)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgMess1']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgMess1']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
		}
		if (!empty($imgMess2)) {
					$fileInfo2 = pathinfo($_FILES['imgMess2']['name']);
					$ext = $fileInfo2['extension'];
					$nomFile2 = rand().time().'surimageAdmin.'.$ext;
					$target2 = "../../content/data/image/message/".$nomFile2;
					
					 	if (file_exists($target)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgMess2']['tmp_name'], $target2)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgMess2']['tmp_name'], $target2)) {
									$errora = NULL;
								}
					 	}
		}
		if (!empty($imgMess3)) {
					$fileInfo3 = pathinfo($_FILES['imgMess3']['name']);
					$ext = $fileInfo3['extension'];
					$nomFile3 = rand().time().'surimageAdmin.'.$ext;
					$target3 = "../../content/data/image/message/".$nomFile3;
					
					 	if (file_exists($target)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgMess3']['tmp_name'], $target3)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgMess3']['tmp_name'], $target3)) {
									$errora = NULL;
								}
					 	};
		}
	
		$modele->AddMessage($id_adminMessage,$messageEnvoie,$nomFile1,$nomFile2,$nomFile3);
 ?>
			 <script>
					window.top.window.ValideIdmessage();
			</script>
 <?php 
		}










  ?>