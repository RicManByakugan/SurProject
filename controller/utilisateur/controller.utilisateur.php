<?php 
			if (isset($_POST['connexion'])) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();

				$idCo = $_POST['idCo'];
				$mdp = $_POST['mdp'];

				$donne = $modele->GetUserConnexion($idCo);
				if ($donne) {
					if ($donne['mdpUser']==md5($mdp)) {
						if ($donne['UserReady']=="KO"){
							session_start();
							//EMAIL SEND HERE
							$_SESSION['confirmed'] = $donne['idUser'];
							echo "koUser";
						}elseif ($donne['UserReady']=="OK"){
							$modele->UpdateStatusContact($idCo,"OK");
							$modele->UpdateCodeUser($donne['idUser']);
							session_start();
							$_SESSION['idUser'] = $donne['idUser'];
							echo "OK";							
						}elseif ($donne['UserReady']=="MDP") {
							session_start();
							$_SESSION['userConfirmed'] = $donne['idUser'];
							echo "MDP";
						}else{
							echo "Erreur de connexion";
						}
					}else{
						echo "Mot de passe incorrect ou identifiant de connexion incorrect";
					}	
				}else{
					echo "Mot de passe incorrect ou identifiant de connexion incorrect";
				}
				
			}
			if (isset($_POST['idUserSupImgUC']) && $_POST['idUserSupImgUC'] == 11) {
				session_start();
				if (isset($_SESSION['idUser'])) {

					include '../../modele/utilisateur/modele.utilisateur.php';
					include '../../config/connexion.php';
					$modele = new UtilisateurModele();

					$id = $_SESSION['idUser'];

					$modele->DelImageUserUC($id);

					echo "ok";

				}else{
					echo "Erreur";
				}
			}
			if (isset($_POST['idUserDeco']) && $_POST['idUserDeco']==99) {
				session_start();
				if (isset($_SESSION['idUser'])) {
					include '../../modele/utilisateur/modele.utilisateur.php';
					include '../../config/connexion.php';
					$modele = new UtilisateurModele();
					$idUser = $_SESSION['idUser'];

					$modele->UpdateStatusId($idUser,"KO");
					session_destroy();
					session_unset();
					echo "OK";
				}else{
					echo "Erreur";
				}
			}

			if (isset($_POST['TestCode'])) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();
				$idUser = $_POST['TestCode'];
				$code = $_POST['codeEnvoie'];
				
				$donne = $modele->GetUserId($idUser);

				if ($donne['UserReady'] == "KO") {
					//-----------------------------------------------------------------------------------
					// Email
					// $msg = "Bonjour ".$donne['nomUser']." ".$donne['prenomUser'].", Voici votre code de confirmation : ".$donne['codeUser'];
     				// $email = $donne['emailUser'];
					// mail($email, "COMPTE SUR" , $msg);

					if ($donne['codeUser'] == $code) {
						$modele->UpdateCodeUser($idUser);
						session_start();
						$_SESSION['idUser'] = $donne['idUser'];
						echo "ok";
					}else{
						echo "codeKO";
					}
				}else{
					echo "nouveauMdp";
				}

			}
			if (isset($_POST['TestCodeVerif'])) {
				session_start();
				if (isset($_SESSION['userRecupMdp']) && $_SESSION['userRecupMdp'] == $_POST['TestCodeVerif']) {
					include '../../modele/utilisateur/modele.utilisateur.php';
					include '../../config/connexion.php';
					$modele = new UtilisateurModele();
					$idUser = $_SESSION['userRecupMdp'];
					$code = $_POST['codeEnvoie'];
					
					$donne = $modele->GetUserId($idUser);
				 	
					if ($donne['codeUser'] == $code) {
						$modele->RenPdmUsr($idUser);
						$modele->RenUserReadyMdp($idUser);
						$_SESSION['userConfirmed'] = $_SESSION['userRecupMdp'];
						echo "ok";
					}else{
						echo "Erreur";
					}
				}else{
					session_unset();
					session_destroy();
					echo "ko";
				}
			}
			if (isset($_POST['TestCodeVerifSuite'])) {
				session_start();
				if (isset($_SESSION['userConfirmed']) && $_SESSION['userConfirmed'] == $_POST['TestCodeVerifSuite']) {
					include '../../modele/utilisateur/modele.utilisateur.php';
					include '../../config/connexion.php';
					$modele = new UtilisateurModele();
					$idUser = $_SESSION['userConfirmed'];
					$mdp = $_POST['mdp'];
					if (strlen($mdp) > 5) {
						$donneUser = $modele->GetUserId($idUser);
						$modele->UpdateCodeUser($idUser);
						$donne = $modele->UpdateUserNPM($idUser,md5($mdp));
						session_unset();
						session_destroy();
						session_start();
						$_SESSION['idUser'] = $donneUser['idUser'];
						echo "ok";
					}else{
						echo "Mot de passe inférieure à 5 caractères";
					}
				}else{
					session_unset();
					session_destroy();
					echo "ko";
				}
			}

			if (isset($_POST['TestCodeVerifCo'])) {
				session_start();
				if (isset($_SESSION['confirmed']) && $_SESSION['confirmed'] == $_POST['TestCodeVerifCo']) {
					include '../../modele/utilisateur/modele.utilisateur.php';
					include '../../config/connexion.php';
					$modele = new UtilisateurModele();
					$idUser = $_SESSION['confirmed'];
					$code = $_POST['codeEnvoieCo'];
					$donne = $modele->GetUserId($idUser);

					if ($donne['codeUser'] == $code) {
						$modele->UpdateCodeUser($idUser);
						$_SESSION['idUser'] = $donne['idUser'];
						echo "ok";
					}else{
						echo "Code invalide";
					}
				}else{
					session_unset();
					session_destroy();
					session_destroy();
					echo "ko";
				}
			}

			if (isset($_POST['UserDPN'])) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();
				$mail = $_POST['UserDPN'];
				$mdp = $_POST['mdp'];
				
				$donneUser = $modele->GetUserByEmail($mail);
				$modele->UpdateCodeUser($donneUser['idUser']);
				$donne = $modele->UpdateUserNPM($donneUser['idUser'],md5($mdp));

				session_start();
				$_SESSION['idUser'] = $donneUser['idUser'];
				
				echo "ok";
			}


			if (isset($_POST['SubUser']) && isset($_POST['newName']) && isset($_POST['newSexe']) && isset($_POST['newMail']) && isset($_POST['newProvince']) && isset($_POST['newMdp1'])) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();

				$nom = $_POST['newName'];	
				$prenom = $_POST['newPrenom'];	
				$sexe = $_POST['newSexe'];	
				$tel = $_POST['newTel'];
				$mail = $_POST['newMail'];	
				$province = $_POST['newProvince'];	

				$newMdp1 = $_POST['newMdp1'];	
				$newMdp2 = $_POST['newMdp2'];	

				if ($newMdp1 == $newMdp2) {

					if (strlen($nom) > 2 && strlen($prenom) > 2) {

						if ($tel!=NULL && preg_match("#^03[2-4]{1}[0-9]{7}$#", $tel)) {
											
							if (strlen($newMdp2) > 5) {
						
								if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {

									$test = $modele->CheckGetUserByMail($mail);

									if ($test=="ok") {
										$modele->AddUser($nom,$prenom,$sexe,$tel,$mail,md5($newMdp2),$province);
										$donne = $modele->GetUserLast();
										$modele->AddCaratUser($donne['lastId']);
										$donne2 = $modele->GetUserId($donne['lastId']);
										session_unset();
										session_start();
										$_SESSION['confirmed'] = $donne['lastId'];
 ?>
 		<script>
 			window.top.window.document.getElementById('errorSubs').innerHTML = '';
 			window.top.window.document.getElementById('successSub').innerHTML = 'Effectuer';
 			window.top.window.document.getElementById('subsubmitForm').reset();
 			window.top.window.location = "../../index.php?compte=co";
 		</script>
<?php 								}else{ ?>
 		<script>
 			window.top.window.document.getElementById('successSub').innerHTML = '';
 			window.top.window.document.getElementById('errorSubs').innerHTML = 'Adresse email déjà prises, conectez-vous maintenant';
 		</script>
<?php 
		 							}
		 						}else{
?>
 		<script>
 			window.top.window.document.getElementById('successSub').innerHTML = '';
 			window.top.window.document.getElementById('errorSubs').innerHTML = 'Adresse email incorrecte';
 		</script>
<?php 
	 							}
	 						}else{
?>
 		<script>
 			window.top.window.document.getElementById('successSub').innerHTML = '';
 			window.top.window.document.getElementById('errorSubs').innerHTML = 'Mot de passe inférieure à 5 caractères';
 		</script>
<?php 
 							}
	 					}else{
  ?>
  		<script>
 			window.top.window.document.getElementById('successSub').innerHTML = '';
 			window.top.window.document.getElementById('errorSubs').innerHTML = 'Format du numéro incorrecte : 03{2-4}+7';
 		</script>
<?php 
	 					}
	 				}else{
 ?>
 		<script>
 			window.top.window.document.getElementById('successSub').innerHTML = '';
 			window.top.window.document.getElementById('errorSubs').innerHTML = 'Nom ou prénom trop court';
 		</script>
<?php	 									
	 				}
				}else{ ?>	
 		<script>
 			window.top.window.document.getElementById('successSub').innerHTML = '';
 			window.top.window.document.getElementById('errorSubs').innerHTML = 'Deux mots de passes incorrectes';
 		</script>
<?php
 				}
			}

		if (isset($_POST['EmailRecup'])) {
			include '../../modele/utilisateur/modele.utilisateur.php';
			include '../../config/connexion.php';
			$modele = new UtilisateurModele();
			$emailRec = $_POST['EmailRecup'];

			$test = $modele->CheckGetUserByMail($emailRec);
			$donne = $modele->GetUserByEmail($emailRec);
			if ($test != "ok") {
				$modele->SetUserCode($emailRec);
				// EMAIL
				// $msga = "Bonjour ".$donne['nomUser']." ".$donne['prenomUser'].", Voici votre code de confirmation : ".$donne['codeUser'];
    			// $emaila = $donne['emailUser'];
			 	// mail($emaila, "COMPTE SUR" , $msga);
				session_start();
				$_SESSION['userRecupMdp'] = $donne['idUser'];
				$_SESSION['userRecupMdpMail'] = $donne['emailUser'];
				echo "ok";
			}else{
				session_start();
				session_unset();
				session_destroy();
				echo "Erreur";
			}

		}
		if (isset($_POST['EmailRecupResend'])) {
			session_start();
			if (isset($_SESSION['userRecupMdp']) && $_POST['EmailRecupResend'] == $_SESSION['userRecupMdp']) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();
				$idUser = $_SESSION['userRecupMdp'];
				$donne = $modele->GetUserId($idUser);
				if ($donne) {
					// EMAIL
					// $msga = "Bonjour ".$donne['nomUser']." ".$donne['prenomUser'].", Voici votre code de confirmation : ".$donne['codeUser'];
	    			// 	$emaila = $donne['emailUser'];
				 	// 	mail($emaila, "COMPTE SUR" , $msga);
					echo "ok";
				}else{
					session_unset();
					session_destroy();
					echo "Erreur";
				}
			}else{
				session_unset();
				session_destroy();
				echo "Erreur";
			}
		}
		if (isset($_POST['EmailRecupResendCo'])) {
			session_start();
			if (isset($_SESSION['confirmed']) && $_POST['EmailRecupResendCo'] == $_SESSION['confirmed']) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();
				$idUser = $_SESSION['confirmed'];
				$donne = $modele->GetUserId($idUser);
				if ($donne) {
					// EMAIL
					// $msga = "Bonjour ".$donne['nomUser']." ".$donne['prenomUser'].", Voici votre code de confirmation : ".$donne['codeUser'];
	    			// 	$emaila = $donne['emailUser'];
				 	// 	mail($emaila, "COMPTE SUR" , $msga);
					echo "ok";
				}else{
					session_unset();
					session_destroy();
					echo "Erreur";
				}
			}else{
				session_unset();
				session_destroy();
				echo "Erreur";
			}
		}


		// CANNOT REDECLARE CLASS
		if (isset($_POST['TypeModiff'])) {
			session_start();
			if (isset($_SESSION['idUser'])) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../modele/activiteUser/modele.activiteUser.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();
				$modeleAct = new ActivityUser();

				$type = $_POST['TypeModiff'];
				$valModif = $_POST['Valeur'];
				$idUser = $_SESSION['idUser'];


				switch ($type) {
						case 'nomUser':
							$descdesc = "NOM";
							break;
						case 'prenomUser':
							$descdesc = "PRENOM";
							break;
						case 'sexeUser':
							$descdesc = "SEXE";
							break;
						case 'contactUser':
							$descdesc = "CONTACT";
							break;
						case 'provinceUser':
							$descdesc = "PROVINCE";
							break;
						
						default:
							$descdesc = NULL;
							break;
				}

				if ($type == "contactUser") {
					if (preg_match("#^03[2-4]{1}[0-9]{7}$#", $valModif)) {
						$donneAct = $modeleAct->GetUserActByType($idUser,$descdesc);
						$nombre = $donneAct['nombreAct'];

						// echo $nombre;
						if ($nombre < 3) {
							if ($descdesc != NULL) {
								$modele->UpdateUserUser($type,$valModif,$idUser);
								$modeleAct->AddUserAct($idUser,$descdesc);
								echo "ok";
							}else{
								echo "Erreur du mise à jour";
							}
						}else{
							echo "Limite de mise à jour : ".$descdesc." atteint";
						}
					}	
				}else{
					$donneAct = $modeleAct->GetUserActByType($idUser,$descdesc);
						$nombre = $donneAct['nombreAct'];

						// echo $nombre;
						if ($nombre < 3) {
							if ($descdesc != NULL) {
								$modele->UpdateUserUser($type,$valModif,$idUser);
								$modeleAct->AddUserAct($idUser,$descdesc);
								echo "ok";
							}else{
								echo "Erreur du mise à jour";
							}
						}else{
							echo "Limite de mise à jour : ".$descdesc." atteint";
						}
				}

			}else{
				echo "Erreur";
			}

		}

		if (isset($_POST['upMdrea']) && $_POST['upMdrea'] == 14) {
			session_start();
			if (isset($_SESSION['idUser'])) {
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../config/connexion.php';
				$modele = new UtilisateurModele();

				$mdpNew = $_POST['PsUp'];
				$mdpA = $_POST['mdpAAA'];
				$idUser = $_SESSION['idUser'];
				$user = $modele->GetUserId($idUser);

				if (strlen($mdpNew) > 5) {
					if ($user['mdpUser'] == md5($mdpA)) {
						$modele->UpdateUserUserPs(md5($mdpNew),$idUser);
						echo "ok";
					}else{
						echo "Ancien mot de passe incorrect";
					}
				}else{
					echo "Mot de passe inférieure à 5 caractères";
				}
			}else{
				echo "Erreur";
			}
		}

		if (isset($_POST['modifAvatar'])) {
			include '../../modele/utilisateur/modele.utilisateur.php';
			include '../../config/connexion.php';
			$modele = new UtilisateurModele();

			$idUser = $_POST['idUserAva'];
	 		$image = $_FILES['imgUPdateAvatar']['name'];

			if (!empty($image)) {
					$fileInfo = pathinfo($_FILES['imgUPdateAvatar']['name']);
					$ext = $fileInfo['extension'];
					$imgName = rand().time().'surimageUser.'.$ext;
					$target = "../../content/data/image/utilisateur/".$imgName;
					
					 	if (file_exists($target) && !empty($logoSpons)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgUPdateAvatar']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgUPdateAvatar']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

	 		$modele->UpdateUserUser("imageUser",$imgName,$idUser);
?>
<script>
		window.top.window.location.reload();
</script>
<?php 
		}

		// USER ACTIVITY
		if (isset($_POST['suggesUser']) && $_POST['suggesUser'] == 66) {
			session_start();
			if (isset($_SESSION['idUser'])) {

				include '../../modele/publication/modele.publication.php';
				include '../../modele/utilisateur/modele.utilisateur.php';
				include '../../modele/activiteUser/modele.activiteUser.php';
				include '../../modele/sur/modele.sur.php';
				include '../../config/connexion.php';
				
				$modeleSur = new SurModele();
				$modeleUserAct = new ActivityUser();
				$modelePub = new ModelePub();
				$modeleUser = new UtilisateurModele();


				$idUserSuggestion = $_SESSION['idUser'];

				$sur = $modeleSur->GetSur();

				$value = $modeleUserAct->GetUserActSeeing($idUserSuggestion);

				$value3 = $modeleUserAct->GetUserActSeeingR();

				if ($value) {
					
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$img = "content/data/image/publication/".$value['img1_pub'];
					}else{
						$img = "content/data/image/logo.png";
					}
					$donnePrice = $modelePub->GetPubLowPriceCat($value['categorie_pub'],$idUserSuggestion);

					echo "
								<div class='slider-item' style='background-image:url(content/data/image/lolo.png);background-size: cover;background-position: initial;width: 100%;'>
						          <div class='overlay'></div>
						          <div class='container'>
						            <div class='row no-gutters slider-text align-items-center justify-content-center'>
						              <div class='col-md-12 ftco-animate'>
						                <div class='text w-100 text-center'>
						                  <h2>SEULEMENT POUR VOUS ".$value['type_pub']." | ".$value['categorie_pub']."</h2>
						                  <h1 class='mb-3'>OFFRE</h1>
						                  <h2 class='mb-3'>".$value['titre_pub']." | Prix : ".number_format($value['prix_pub'])." Ar</h2><br>
						                  <button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('donnePublication');AffichePub(".$value['id_pub'].",'".$value['type_pub']."');\">VOIR</button>
						                  <button class='btn btn-primary btn-sm' data-dismiss='modal' data-toggle='modal' data-target='#AppelSur'>CONTACTER</button>
						                  <button class='btn btn-primary btn-sm' onclick=\"AddToCart(".$value['id_pub'].",1);\">AJOUTER</button>
						                </div>
						              </div>
						            </div>
						          </div>
						        </div>
					";

					if ($donnePrice['img1_pub']!=NULL || $donnePrice['img1_pub']!="") {
						$imgPrice = "content/data/image/publication/".$donnePrice['img1_pub'];
					}else{
						$imgPrice = "content/data/image/logo.png";
					}
					// var_dump($donnePrice);

					// echo "
					// 	 <div class='slider-item' style='background-image:url(content/data/image/lolo.png);background-size: cover;background-position: initial;width: 100%;'>
					// 	          <div class='overlay'></div>
					// 			  <!--<img src='".$imgPrice."' style='position:absolute;width:auto !important;top:70px;right:0px;height:300px;border-radius:50%> -->
					// 	          <div class='container'>
					// 	            <div class='row no-gutters slider-text align-items-center justify-content-center'>
					// 	              <div class='col-md-12 ftco-animate'>
					// 	                <div class='text w-100 text-center'>
					// 	                  <h2>MEILLEURE PRIX ".$donnePrice['type_pub']." | ".$donnePrice['categorie_pub']."</h2>
					// 	                  <h3 class='mb-3'>".$donnePrice['titre_pub']."</h3>
					// 	                  <h2>Prix : ".number_format($donnePrice['prix'])." Ar</h2><br><br>
					// 	                  <button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('donnePublication');AffichePub(".$donnePrice['id_pub'].",'".$donnePrice['type_pub']."');\">VOIR</button>
					// 	                  <a href='tel:".$sur['tel_sur']."'><button class='btn btn-primary btn-sm'>CONTACTER</button></a>
					// 	                  <button class='btn btn-primary btn-sm' onclick=\"AddToCart(".$value['id_pub'].",1);\">AJOUTER</i></button>
					// 	                </div>
					// 	              </div>
					// 	            </div>
					// 	          </div>
					// 	        </div>
					// ";
					// echo "
					// 	<div class='slider-item' style='background-image:url(content/data/image/lolo.png);background-size: cover;background-position: initial;width: 100%;'>
					// 	          <div class='overlay'></div>

					// 	          <div class='container'>
					// 	            <div class='row no-gutters slider-text align-items-center justify-content-center'>
					// 	              <div class='col-md-12 ftco-animate'>
					// 	                <div class='text w-100 text-center'>
					// 	                    <h2>PROFITER AVEC SUR</h2>
					// 	                    <h1 class='mb-3'>CREDIT CARAT</h1>
					// 	                    <button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('creditCinfo')\">Détaille</button>
					// 	                    <button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('donnePublication')\">Effectuer des commandes</button>
					// 	                </div>
					// 	              </div>
					// 	            </div>
					// 	          </div>
					// 	        </div>
					// ";

				}else{
					if ($value3['img1_pub']!=NULL || $value3['img1_pub']!="") {
						$img = "content/data/image/publication/".$value3['img1_pub'];
					}else{
						$img = "content/data/image/logo.png";
					}


					echo "
					 			<div class='slider-item' style='background-image:url(content/data/image/lolo.png);background-size: cover;background-position: initial;width: 100%;'>
						          <div class='overlay'></div>

						          <div class='container'>
						            <div class='row no-gutters slider-text align-items-center justify-content-center'>
						              <div class='col-md-12 ftco-animate'>
						                <div class='text w-100 text-center'>
						                    <h2>SUR VOUS ACCOMPAGNE</h2>
						                    <h1 class='mb-3'>COMMANDER</h1>
						                    <button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('donnePublication')\">Visiter</i></button>
						                    <button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('aboutSurAbout')\">A propos</button>
						                    <button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('footer')\">Contacter</button>
						                </div>
						              </div>
						            </div>
						          </div>
						        </div>
					";
				}

			}else{
				echo "Erreur";
			}

		}








     ?>