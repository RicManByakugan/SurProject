<?php 

	if (isset($_POST['RecupPostDetailleAdminPub'])) {
		session_start();
 		if (isset($_SESSION['id_admin'])) {
			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			$modele = new ModelePub();
			$idPub = $_POST['RecupPostDetailleAdminPub'];
			$donne = $modele->GetPostById($idPub);

			if ($donne) {
				if ($donne['img1_pub']!=NULL && $donne['img1_pub']!="") {
					$img1 = "<img class='product-image' src='content/data/image/publication/".$donne['img1_pub']."'>";
					$img1c = "<img src='content/data/image/publication/".$donne['img1_pub']."'>";
				}else{
					$img1 = "<img class='product-image' src='content/data/image/logo.png'/>";
					$img1c = "";
				}

				if ($donne['img2_pub']!=NULL && $donne['img2_pub']!="") {
					$img2 = "<img class='product-image' src='content/data/image/publication/".$donne['img2_pub']."'>";
					$img2c = "<img src='content/data/image/publication/".$donne['img2_pub']."'>";
				}else{
					$img2 = "<img class='product-image' src='content/data/image/logo.png'/>";
					$img2c = "";
				}

				if ($donne['img3_pub']!=NULL && $donne['img3_pub']!="") {
					$img3 = "<img class='product-image' src='content/data/image/publication/".$donne['img3_pub']."'>";
					$img3c = "<img src='content/data/image/publication/".$donne['img3_pub']."'>";
				}else{
					$img3 = "<img class='product-image' src='content/data/image/logo.png'/>";
					$img3c = "";
				}

				if ($donne['img4_pub']!=NULL && $donne['img4_pub']!="") {
					$img4 = "<img class='product-image' src='content/data/image/publication/".$donne['img4_pub']."'>";
					$img4c = "<img src='content/data/image/publication/".$donne['img4_pub']."'>";
				}else{
					$img4 = "<img class='product-image' src='content/data/image/logo.png'/>";
					$img4c = "";
				}

				$dateNowA = date("Y-m-d");
				if ($donne['prix_prom'] == NULL && $donne['date_com'] == NULL || $donne['date_com'] < $dateNowA) {
					$btnProm = "<button class='btn btn-block btn-primary' data-toggle='collapse' href='#promInput'>Créer</button>";
					$promVer = "";
					$actProm = "
							<span id='promInput' class='collapse'>
								<small>Le prix sera réduit par le niveau de pourcentage</small>
								<hr>
								<div class='row'>
									<div class='col-sm-4'>
										<div class='form-group'>
											<label>Prix</label>
											<input type='number' readonly class='form-control' value='".$donne['prix_pub']."'/>
										</div>
									</div>
									<div class='col-sm-8'>
										<div class='form-group'>
											<label>Pourcentage</label>
											<select class='form-control' id='pourcentage'>
												<option value='5'>5%</option>
												<option value='10'>10%</option>
												<option value='20'>20%</option>
												<option value='30'>30%</option>
											</select>
										</div>
									</div>
								</div>
								<div class='row'>
									<div class='col-sm-12'>
										<div class='form-group'>
											<label>Fin du promotion</label>
											<input type='date' class='form-control' id='dateProm' />
										</div>
									</div>
								</div>
								<div class='row'>
									<div class='col-sm-12'>
										<button class='btn btn-primary btn-block' onclick='ValidePromPost(".$donne['id_pub'].")'>Valider</button>
									</div>
								</div>
							</span>
					";
				}else{
					$btnProm = "<button class='btn btn-block btn-primary' onclick='AnnulerPromotion(".$donne['id_pub'].")'>Annuler le promotion</button>";
					$promVer = " : en cours (- ".$donne['prix_prom']."%)<br><hr><small>Date : ".$donne['date_com']."</small>";
					$actProm = "";
				}

				$promotion = "
					<div class='row'>
						<div class='col-sm-12'>
							".$btnProm."
						</div>
					</div>
					<hr>
					".$actProm."
				";

				$delPost = "
					<button class='btn btn-primary btn-block' onclick='supPub(".$donne['id_pub'].");'>Supprimer</button>
				";

				
				if ($donne['type_pub'] == "PRODUIT") {
					echo "
						<div class='row'>
							<div class='col-sm-4'>
								<div class='row'>
									<div class='col-sm-8'>
						              <div class='col-12'>
						                ".$img1."
						              </div>
						            </div>
						            <div class='col-4'>
						                <div class='product-image-thumb'>".$img1c."</div>
						                <div class='product-image-thumb'>".$img2c."</div>
						                <div class='product-image-thumb'>".$img3c."</div>
						                <div class='product-image-thumb'>".$img4c."</div>
						            </div>
					            </div>

							    <div class='mt-3 card  color-palette-box'>
						          <div class='card-header'>
						          	<h3 class='card-title'>
						              Promotion ".$promVer."</b>
						            </h3>
						          </div>
						          <div class='card-body'>
						          	".$promotion."
						          </div>
								</div>

								<div class='mt-3 card  color-palette-box'>
						          <div class='card-header'>
						          	<h3 class='card-title'>
						              Suppression
						            </h3>
						          </div>
						          <div class='card-body'>
						          	".$delPost."
						          </div>
								</div>

							</div>
							<div class='col-sm-8'>
								<div class='container-fluid'>
							        <div class='card  color-palette-box'>
							          <div class='card-header'>
							            <h3 class='card-title'>
							              Modification du Produit</b>
							            </h3>
							          </div>
							          <div class='card-body'>
							          		<form id='ModifPublication' enctype='multipart/form-data' action='controller/publication/controller.publication.php' target='ajoutProduit' method='POST'>
									          	<div class='row'>
									            	<div class='col'>
										            		<div class='form-group'>
										            			<label>Titre</label>
										            			<input name='nameModif' type='text' class='form-control' placeholder='Titre du produit' value='".$donne['titre_pub']."'>
										            			<input id='idPubModif' type='text' name='idPubModif' class='form-control' hidden value='".$idPub."'>
										            			<input type='text' name='userActAdmin' value='".$_SESSION['id_admin']."' class='form-control' hidden>
										            			<input type='text' name='typa' value='PRODUIT' class='form-control' hidden>
										            		</div>
									            		</div>
									            	<div class='col'>
										            		<div class='form-group'>
										            			<label>Prix (Ariary)</label>
										            			<input name='prixModif' type='number' class='form-control' min='0' placeholder='Prix du produit'  value='".$donne['prix_pub']."'>
										            		</div>
										            </div>
									            </div>
									             <div class='row'>
										            	<div class='col'>
										            		<label>Catégorie : ".$donne['categorie_pub']."</label>
										            		<select class='form-control' name='catModif'>
										            			<option></option>
										            			<option value='HIGHTECH'>High-Tech</option>
											            		<option value='VETEMENT'>Vêtement et chaussures</option>
											            		<option value='AGROALIMENTAIRE'>Agro-alimentaires</option>
											            		<option value='JOUER'>Jouer</option>
											            		<option value='ACCESSOIRE'>Accessoire et autres</option>
										            		</select>
										            	</div>
										        </div>
										        <div class='row'>
											            	<div class='col'>
											            		<label>Cible : ".$donne['genrePub']."</label>
											            		<select class='form-control' name='GenreModif'>
											            			<option></option>
											            			<option value='Tout'>Tout le monde</option>
											            			<option value='Homme'>Homme</option>
											            			<option value='Femme'>Femme</option>
											            			<option value='Jeune Homme'>Jeune homme</option>
											            			<option value='Jeune Femme'>Jeune femme</option>
											            			<option value='Ado'>Ado</option>
											            			<option value='Enfant'>Enfant</option>
											            		</select>
											            	</div>
											    </div>
											    <div class='row'>
											            	<div class='col'>
											            		<label>Niveau de priorité : ".$donne['PrioPub']."</label>
											            		<select class='form-control' name='PrioModif'>
											            			<option></option>
											            			<option value='1'>1</option>
											            			<option value='2'>2</option>
											            			<option value='3'>3</option>
											            			<option value='4'>4</option>
											            			<option value='5'>5</option>
											            		</select>
											            	</div>
											    </div>
											    <div class='row'>
											            	<div class='col'>
											            		<label>Disponibilité</label>
											            		<div class='row'>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='AntananarivoMo'> Antananarivo</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='AntsirananaMo'> Antsiranana</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='FianarantsoaMo'> Fianarantsoa</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='MahajangaMo'> Mahajanga</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='ToamasinaMo'> Toamasina</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='Toliara'> Toliara</label><br>
											            		</div>
											            	</div>
											    </div>
									            <div class='row'>
									            	<div class='col'>
									            		<label>Description</label>
									            		<textarea id='descModif' name='descModif' class='form-control' style='height: 121px;' placeholder='".$donne['desc_pub']."'></textarea>
									            	</div>
									            </div>
									            <div class='row'>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(1,'idPubModif');\"/></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif1' id='imgModif1' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSub','imageOneModif');\">
										            		<label for='imgModif1'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
										            	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageOneModif' style='display: none;'>
									            	</div>
									            	<div class='col'>
														<label>Image</label>
														<i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(2,'idPubModif');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif2' id='imgModif2' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSub','imageTwoModif');\">
										            		<label for='imgModif2'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
										            	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageTwoModif' style='display: none;'>
									            	</div>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(3,'idPubModif');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif3' id='imgModif3' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSub','imageThreeModif');\">
										            		<label for='imgModif3'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
										            	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageThreeModif' style='display: none;'>
									            	</div>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(4,'idPubModif');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif4' id='imgModif4' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSub','imageFourModif');\">
										            		<label for='imgModif4'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
										            	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageFourModif' style='display: none;'>
									            	</div>
									            </div>
									            <div class='row'>
									            	<div class='col'>
									            		<button type='submit' class='btn btn-block btn-primary' name='modifPubSub' id='modifPubSub'>Modifier</button>
									            	</div>
									            	<div class='col'>
									            		<button class='btn btn-block btn-primary' data-dismiss='modal'>Annuler</button>
									            	</div>
									            </div>
									            <small id='ModifPrCours'></small>
							          		</form>
							          </div>
							        </div>
						    	</div>
							</div>
						</div>
					";
				}elseif ($donne['type_pub'] == "SERVICE") {
					echo "
						<div class='row'>
							<div class='col-sm-4'>
								<div class='row'>
									<div class='col-sm-8'>
						              <div class='col-12'>
						                ".$img1."
						              </div>
						            </div>
						            <div class='col-4'>
						                <div class='product-image-thumb'>".$img1c."</div>
						                <div class='product-image-thumb'>".$img2c."</div>
						                <div class='product-image-thumb'>".$img3c."</div>
						                <div class='product-image-thumb'>".$img4c."</div>
						            </div>
					            </div>
							    <div class='mt-3 card color-palette-box'>
						          <div class='card-header'>
						          	<h3 class='card-title'>
						              Promotion ".$promVer."</b>
						            </h3>
						          </div>
						          <div class='card-body'>
						          	".$promotion."
						          </div>
								</div>
								<div class='mt-3 card  color-palette-box'>
						          <div class='card-header'>
						          	<h3 class='card-title'>
						              Suppression
						            </h3>
						          </div>
						          <div class='card-body'>
						          	".$delPost."
						          </div>
								</div>
							</div>
							<div class='col-sm-8'>
						      	<div class='container-fluid'>
							        <div class='card  color-palette-box'>
							          <div class='card-header'>
							            <h3 class='card-title'>
							              Modification Service
							            </h3>
							          </div>
							          <div class='card-body'>
							          		<form id='ModifPublicationService' enctype='multipart/form-data' action='controller/publication/controller.publication.php' target='ajoutService' method='POST'>
									          	<div class='row'>
									            	<div class='col'>
										            		<div class='form-group'>
										            			<label>Titre</label>
										            			<input name='nameModif' type='text' class='form-control' placeholder='Titre du Service'  value='".$donne['titre_pub']."'>
										            			<input id='idPubModifSer' type='text' name='idPubModif' class='form-control' hidden value='".$idPub."'>
										            			<input type='text' name='typa' value='SERVICE' class='form-control' hidden>
											            		<input type='text' name='userActAdmin' value='".$_SESSION['id_admin']."' class='form-control' hidden>
										            		</div>
									            		</div>
									            	<div class='col'>
										            		<div class='form-group'>
										            			<label>Prix (Ariary)</label>
										            			<input name='prixModif' type='number' class='form-control' min='0' placeholder='Prix du Service'  value='".$donne['prix_pub']."'>
										            		</div>
										            </div>
									            </div>
									             <div class='row'>
										            	<div class='col'>
										            		<label>Catégorie : ".$donne['categorie_pub']."</label>
										            		<select class='form-control' name='catModif'>
										            			<option></option>
										            			<option value='TRANSPORT'>Transport</option>
											            		<option value='EVENTS'>Evenementiel</option>
										            		</select>
										            	</div>
										        </div>
										        <div class='row'>
											            	<div class='col'>
											            		<label>Cible : ".$donne['genrePub']."</label>
											            		<select class='form-control' name='GenreModif'>
											            			<option></option>
											            			<option value='Tout'>Tout le monde</option>
											            			<option value='Homme'>Homme</option>
											            			<option value='Femme'>Femme</option>
											            			<option value='Jeune Homme'>Jeune homme</option>
											            			<option value='Jeune Femme'>Jeune femme</option>
											            			<option value='Ado'>Ado</option>
											            			<option value='Enfant'>Enfant</option>
											            		</select>
											            	</div>
											    </div>
											    <div class='row'>
											            	<div class='col'>
											            		<label>Niveau de priorité : ".$donne['PrioPub']."</label>
											            		<select class='form-control' name='PrioModif'>
											            			<option></option>
											            			<option value='1'>1</option>
											            			<option value='2'>2</option>
											            			<option value='3'>3</option>
											            			<option value='4'>4</option>
											            			<option value='5'>5</option>
											            		</select>
											            	</div>
											    </div>
											    <div class='row'>
											            	<div class='col'>
											            		<label>Disponibilité</label>
											            		<div class='row'>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='AntananarivoMo'> Antananarivo</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='AntsirananaMo'> Antsiranana</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='FianarantsoaMo'> Fianarantsoa</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='MahajangaMo'> Mahajanga</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='ToamasinaMo'> Toamasina</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='Toliara'> Toliara</label><br>
											            		</div>
											            	</div>
											    </div>
									            <div class='row'>
									            	<div class='col'>
									            		<label>Description</label>
									            		<textarea id='descModif' name='descModif' class='form-control' style='height: 121px;' placeholder='".$donne['desc_pub']."'></textarea>
									            	</div>
									            </div>
									            <div class='row'>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(1,'idPubModifSer');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif1' id='imgModif1Ser' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubSer','imageOneServMo');\">
										            		<label for='imgModif1Ser'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
												        <img src='content/data/image/logo/logo.png' width='100' height='100' id='imageOneServMo' style='display: none;'>
									            	</div>
									            	<div class='col'>
														<label>Image</label>
														<i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(2,'idPubModifSer');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif2' id='imgModif2Ser' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubSer','imageTwoServMod');\">
										            		<label for='imgModif2Ser'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
												        <img src='content/data/image/logo/logo.png' width='100' height='100' id='imageTwoServMod' style='display: none;'>
									            	</div>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(3,'idPubModifSer');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif3' id='imgModif3Ser' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubSer','imageThreeServMod');\">
										            		<label for='imgModif3Ser'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
									            			<!-- <input type='text' id='idPubModifSer' value='id_pub' hidden> -->
										            	</div>
												        <img src='content/data/image/logo/logo.png' width='100' height='100' id='imageThreeServMod' style='display: none;'>
									            	</div>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;' onclick=\"DeleteImage(4,'idPubModifSer');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif4' id='imgModif4Ser' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubSer','imageFourServMod');\">
										            		<label for='imgModif4Ser'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
									            			<!-- <input type='text' id='idPubModifSer' value='id_pub' hidden> -->
										            	</div>
												        <img src='content/data/image/logo/logo.png' width='100' height='100' id='imageFourServMod' style='display: none;'>
									            	</div>
									            </div>
									            <div class='row'>
									            	<div class='col'>
									            		<button type='submit' class='btn btn-block btn-primary' name='modifPubSub' id='modifPubSubSer'>Modifier</button>
									            	</div>
									            	<div class='col'>
									            		<button class='btn btn-block btn-primary' data-dismiss='modal'>Annuler</button><br>
									            	</div>
									            </div>
									            <small id='ModifSeCours'></small>
							          		</form>
							          </div>
							        </div>
								</div>
					    	</div>
					    </div>
					";
				}elseif ($donne['type_pub'] == "FORMATION") {
					echo "
						<div class='row'>
							<div class='col-sm-4'>
								<div class='row'>
									<div class='col-sm-8'>
						              <div class='col-12'>
						                ".$img1."
						              </div>
						            </div>
						            <div class='col-4'>
						                <div class='product-image-thumb'>".$img1c."</div>
						                <div class='product-image-thumb'>".$img2c."</div>
						                <div class='product-image-thumb'>".$img3c."</div>
						                <div class='product-image-thumb'>".$img4c."</div>
						            </div>
					            </div>
							    <div class='mt-3 card color-palette-box'>
						          <div class='card-header'>
						          	<h3 class='card-title'>
						              Promotion ".$promVer."</b>
						            </h3>
						          </div>
						          <div class='card-body'>
						          	".$promotion."
						          </div>
								</div>
								<div class='mt-3 card  color-palette-box'>
						          <div class='card-header'>
						          	<h3 class='card-title'>
						              Suppression
						            </h3>
						          </div>
						          <div class='card-body'>
						          	".$delPost."
						          </div>
								</div>
							</div>
							<div class='col-sm-8'>
						      	<div class='container-fluid'>
							        <div class='card  color-palette-box'>
							          <div class='card-header'>
							            <h3 class='card-title'>
							              Modification Formation
							            </h3>
							          </div>
							          <div class='card-body'>
							          		<form id='ModifPublicationFormation' enctype='multipart/form-data' action='controller/publication/controller.publication.php' target='ajoutFormation' method='POST'>
									          	<div class='row'>
									            	<div class='col'>
										            		<div class='form-group'>
										            			<label>Titre</label>
										            			<input name='nameModif' type='text' class='form-control' placeholder='Titre du Formation' value='".$donne['titre_pub']."'>
										            			<input id='idPubModifFor' type='text' name='idPubModif' class='form-control' hidden value='".$idPub."'>
										            			<input type='text' name='typa' value='FORMATION' class='form-control' hidden>
										            			<input type='text' name='userActAdmin' value='value='".$_SESSION['id_admin']."' class='form-control' hidden>
										            		</div>
									            		</div>
									            	<div class='col'>
										            		<div class='form-group'>
										            			<label>Prix (Ariary)</label>
										            			<input name='prixModif' type='number' class='form-control' min='0' placeholder='Prix du Formation' value='".$donne['prix_pub']."'>
										            		</div>
										            </div>
									            </div>
									             <div class='row'>
										            	<div class='col'>
										            		<label>Catégorie :  ".$donne['categorie_pub']."</label>
										            		<select class='form-control' name='catModif'>
										            			<option></option>
										            			<option value='LANGUE'>Langue</option>
											            		<option value='INFORMATIQUE'>Informatique</option>
											            		<option value='MECANIQUE'>Mécanique Automobile</option>
										            		</select>
										            	</div>
										        </div>
										        <div class='row'>
											            	<div class='col'>
											            		<label>Cible : ".$donne['genrePub']."</label>
											            		<select class='form-control' name='GenreModif'>
											            			<option></option>
											            			<option value='Tout'>Tout le monde</option>
											            			<option value='Homme'>Homme</option>
											            			<option value='Femme'>Femme</option>
											            			<option value='Jeune Homme'>Jeune homme</option>
											            			<option value='Jeune Femme'>Jeune femme</option>
											            			<option value='Ado'>Ado</option>
											            			<option value='Enfant'>Enfant</option>
											            		</select>
											            	</div>
											    </div>
											    <div class='row'>
											            	<div class='col'>
											            		<label>Niveau de priorité : ".$donne['PrioPub']."</label>
											            		<select class='form-control' name='PrioModif'>
											            			<option></option>
											            			<option value='1'>1</option>
											            			<option value='2'>2</option>
											            			<option value='3'>3</option>
											            			<option value='4'>4</option>
											            			<option value='5'>5</option>
											            		</select>
											            	</div>
											    </div>
											    <div class='row'>
											            	<div class='col'>
											            		<label>Disponibilité</label>
											            		<div class='row'>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='AntananarivoMo'> Antananarivo</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='AntsirananaMo'> Antsiranana</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='FianarantsoaMo'> Fianarantsoa</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='MahajangaMo'> Mahajanga</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='ToamasinaMo'> Toamasina</label>
												            		<label class='col-sm-4' style='font-weight: normal;'><input type='checkbox' name='Toliara'> Toliara</label><br>
											            		</div>
											            	</div>
											    </div>
									            <div class='row'>
									            	<div class='col'>
									            		<label>Description</label>
									            		<textarea id='descModif' name='descModif' class='form-control' style='height: 121px;' placeholder='".$donne['desc_pub']."'></textarea>
									            	</div>
									            </div>
									            <div class='row'>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;border:1px solid;border-radius: 50%;' onclick=\"DeleteImage(1,'idPubModifFor');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif1' id='imgModif1For' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubFor','imageOneForMod');\">
										            		<label for='imgModif1For'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
												       	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageOneForMod' style='display: none;'>
									            	</div>
									            	<div class='col'>
														<label>Image</label>
														<i class='fas fa-times' style='cursor: pointer;border:1px solid;border-radius: 50%;' onclick=\"DeleteImage(2,'idPubModifFor');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif2' id='imgModif2For' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubFor','imageTwoForMod');\">
										            		<label for='imgModif2For'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
										            	</div>
												       	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageTwoForMod' style='display: none;'>
									            	</div>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;border:1px solid;border-radius: 50%;' onclick=\"DeleteImage(3,'idPubModifFor');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif3' id='imgModif3For' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubFor','imageThreeForMod');\">
										            		<label for='imgModif3For'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
									            			<!-- <input type='text' id='idPubModifFor' value='id_pub' hidden> -->
										            	</div>
												       	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageThreeForMod' style='display: none;'>
									            	</div>
									            	<div class='col'>
											            <label>Image</label>
											            <i class='fas fa-times' style='cursor: pointer;border:1px solid;border-radius: 50%;' onclick=\"DeleteImage(4,'idPubModifFor');\"></i>
									            		<div class='form-group'>
										            		<input type='file' name='imgModif4' id='imgModif4For' accept='.jpg,.png,.jpeg' class='form-control inputfile' onchange=\"CheckImage(this,'modifPubSubFor','imageFourForMod');\">
										            		<label for='imgModif4For'><small class='btn btn-primary'><i class='typcn typcn-image-outline'></i></small></label>
									            			<!-- <input type='text' id='idPubModifFor' value='id_pub' hidden> -->
										            	</div>
												       	<img src='content/data/image/logo/logo.png' width='100' height='100' id='imageFourForMod' style='display: none;'>
									            	</div>
									            </div>
									            <div class='row'>
									            	<div class='col'>
									            		<button type='submit' class='btn btn-block btn-primary' name='modifPubSub' id='modifPubSubFor'>Modifier</button>
									            	</div>
									            	<div class='col'>
									            		<button class='btn btn-block btn-primary' onclick='AnnulerModiFormation();'>Annuler</button><br>
									            	</div>
									            </div>
									            <small id='ModifFoCours'></small>
							          		</form>
							          </div>
							        </div>
						    	</div>
					    	</div>
					    </div>
					";
				}else{
					echo "<h1 class='mt-5 text-muted' align='center'>Erreur de l'action</h1>";
				}


			}else{
				echo "
					<h1 class='mt-5 text-muted' align='center'>Erreur, ce publication n'existe plus dans la base</h1>
				";
			}

		}else{
			echo "
					<h1 class='mt-5 text-muted' align='center'>Erreur de l'action</h1>
			";
		}

	}


	if (isset($_POST['PromPub'])) {
		session_start();
 		if (isset($_SESSION['id_admin'])) {
			include '../../modele/activite/modele.activite.php';
			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			$modele = new ModelePub();
			$modeleActivite = new ActivityAdmin();
			$idPub = $_POST['PromPub'];
			$pourcentage = $_POST['pourcentage'];
			$dateProm = $_POST['dateProm'];
			$dateNow = date("Y-m-d");
			if ($dateProm <= $dateNow) {
				echo "Date incorrecte";
			}else{
				$donne = $modele->GetPostById($idPub);
				if ($donne) {
					$res = $modele->PromotionForPost($idPub,$pourcentage,$dateProm);
					if ($res == "ok") {
						$type = "PROMOTION";
						$descAct = "AJOUT";
				 		$modeleActivite->AddActivite($_SESSION['id_admin'],$type,$descAct);
				 		echo "ok";
					}else{
						echo "Erreur de l'action";
					}
				}else{
					echo "Erreur de l'action";
				}
			}
		}else{
			echo "Erreur de l'action";
		}
	}
	if (isset($_POST['PromPubAnnul'])) {
		session_start();
 		if (isset($_SESSION['id_admin'])) {
			include '../../modele/activite/modele.activite.php';
			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			$modele = new ModelePub();
			$modeleActivite = new ActivityAdmin();
			$idPub = $_POST['PromPubAnnul'];
			$donne = $modele->GetPostById($idPub);
			if ($donne) {
				$res = $modele->CancelPromotionForPost($idPub);
				if ($res == "ok") {
					$type = "PROMOTION";
					$descAct = "RETIRE";
			 		$modeleActivite->AddActivite($_SESSION['id_admin'],$type,$descAct);
			 		echo "ok";
				}else{
					echo "Erreur de l'action";
				}
			}else{
				echo "Erreur de l'action";
			}
		}else{
			echo "Erreur de l'action";
		}
	}

	if (isset($_POST['SupPub'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/publication/modele.publication.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModelePub();

			$SupPub = $_POST['SupPub'];
			$idAdmin = $_SESSION['id_admin'];
			$post = $modele->GetPostById($SupPub);

			$typePub = $post['type_pub'];
			$descAct = "SUPPRESSION";
	 		$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
			
			$modele->SuppPub($SupPub);
			
			echo "OK";
		}else{
			echo "Erreur de l'action";
		}
	}
	if (isset($_POST['RecupPub'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
		$modele = new ModelePub();
		$RecupPub = $_POST['RecupPub'];
		$donne = $modele->GetPostById($RecupPub);
		echo $donne['titre_pub'];

	}

	if (isset($_POST['DelIm'])) {
	 	session_start();
	 	if (isset($_SESSION['id_admin'])) {
	 		include '../../modele/publication/modele.publication.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModelePub();

			$nombre = $_POST['DelIm'];
			$idPub = $_POST['idPubDI'];
			$idAdmin = $_SESSION['id_admin'];

			$modele->UpdateImageDel($nombre,$idPub);

			$descAct = "MODIFICATION";
			$typa = "PUB IMAGE";
	 		$modeleActivite->AddActivite($idAdmin,$typa,$descAct);

			echo "ok";
	 	}else{
	 		echo "Erreur de l'action";
	 	}
	}
	if (isset($_POST['RecupProduit'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
		$modele = new ModelePub();

		$donne = $modele->GetPostProduit();
		if ($donne) {
			foreach ($donne as $key => $value) {
				if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
					$img = "<img src='content/data/image/publication/".$value['img1_pub']."' width='100%'/>";
				}else{
					$img = "";
				}

				if($value['profil_admin']==''||$value['profil_admin']==NULL)
					$urllogo="content/data/image/admin/profile.png'";
				else
			    	$urllogo="content/data/image/admin/".$value['profil_admin'];

				$dateNowA = date("Y-m-d");
			    if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
			    	$promAffiche = "";
			    }else{
			    	$promAffiche = "<span class='mt-2 badge badge-warning float-right'> -".$value['prix_prom']."% </span>";
			    }
				echo "
					<div class='col-sm-4 produitListe'  data-toggle='modal' data-target='#ModifPostPostPost' onclick='DetaillePostAdmin(".$value['id_pub'].");'>
						".$promAffiche."
						<div class='row'>
							<div class='col-sm-5 p-1'>
								".$img."
							</div>	
							<div class='col-sm-7'>
								<h3 align='center'>".$value['titre_pub']."</h3><hr>
								<small>".nl2br(substr($value['desc_pub'], 0, 40))." ...</small><hr>
								<small>Prix : ".number_format($value['prix_pub'])." Ar</small><hr>
								<i class='typcn typcn-time'></i> <small>".$value['date_pub']."</small> | <small>".$value['heure_pub']."</small>
							</div>	
						</div>
						<hr>
						<div class='col'>
							<img src='".$urllogo."' width='40' height='40'>
						    <small>".$value['nom_admin']." (".$value['poste_admin'].")</small>
						</div>
						<hr>
						<h1 align='center'>
							<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#ModifPostPostPost' onclick='DetaillePostAdmin(".$value['id_pub'].");'>Contrôle</button>
						</h1>
					</div>
				"	;
			}
		}else{
			echo "Liste vide";
		}
	}
	if (isset($_POST['RecupService'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
		$modele = new ModelePub();

		$donne = $modele->GetPostService();
		if ($donne) {
			foreach ($donne as $key => $value) {
				if($value['profil_admin']==''||$value['profil_admin']==NULL)
					$urllogo="content/data/image/admin/profile.png'";
				else
			    	$urllogo="content/data/image/admin/".$value['profil_admin'];

			    if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
					$img = "<img src='content/data/image/publication/".$value['img1_pub']."' width='100%'/><hr>";
				}else{
					$img = "";
				}

				$dateNowA = date("Y-m-d");
			    if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
			    	$promAffiche = "";
			    }else{
			    	$promAffiche = "<span class='mt-2 badge badge-warning float-right'> -".$value['prix_prom']."% </span>";
			    }

				echo "
					<div class='col-sm-4 produitListe'  data-toggle='modal' data-target='#ModifPostPostPost' onclick='DetaillePostAdmin(".$value['id_pub'].");'>
						".$promAffiche."
						<div class='row'>
							<div class='col-sm-5 p-1'>
								".$img."
							</div>	
							<div class='col-sm-7'>
								<h3 align='center'>".$value['titre_pub']."</h3><hr>
								<small>".nl2br(substr($value['desc_pub'], 0, 40))." ...</small><hr>
								<small>Prix : ".number_format($value['prix_pub'])." Ar</small><hr>
								<i class='typcn typcn-time'></i> <small>".$value['date_pub']."</small> | <small>".$value['heure_pub']."</small>
							</div>	
						</div>
						<hr>
						<div class='col'>
							<img src='".$urllogo."' width='40' height='40'>
						    <small>".$value['nom_admin']." (".$value['poste_admin'].")</small>
						</div>
						<hr>
						<h1 align='center'>
							<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#ModifPostPostPost' onclick='DetaillePostAdmin(".$value['id_pub'].");'>Contrôle</button>
						</h1>
					</div>
				"	;
			}
		}else{
			echo "Liste vide";
		}
	}
	if (isset($_POST['RecupFormation'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
		$modele = new ModelePub();

		$donne = $modele->GetPostFormation();
		if ($donne) {
			foreach ($donne as $key => $value) {
				if($value['profil_admin']==''||$value['profil_admin']==NULL)
					$urllogo="content/data/image/admin/profile.png'";
				else
			    	$urllogo="content/data/image/admin/".$value['profil_admin'];

			    if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
					$img = "<img src='content/data/image/publication/".$value['img1_pub']."' width='100%'/><hr>";
				}else{
					$img = "";
				}

				$dateNowA = date("Y-m-d");
				if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
			    	$promAffiche = "";
			    }else{
			    	$promAffiche = "<span class='mt-2 badge badge-warning float-right'> -".$value['prix_prom']."% </span>";
			    }

				echo "
					<div class='col-sm-4 produitListe'  data-toggle='modal' data-target='#ModifPostPostPost' onclick='DetaillePostAdmin(".$value['id_pub'].");'>
						".$promAffiche."
						<div class='row'>
							<div class='col-sm-5 p-1'>
								".$img."
							</div>	
							<div class='col-sm-7'>
								<h3 align='center'>".$value['titre_pub']."</h3><hr>
								<small>".nl2br(substr($value['desc_pub'], 0, 40))." ...</small><hr>
								<small>Prix : ".number_format($value['prix_pub'])." Ar</small><hr>
								<i class='typcn typcn-time'></i> <small>".$value['date_pub']."</small> | <small>".$value['heure_pub']."</small>
							</div>	
						</div>
						<hr>
						<div class='col'>
							<img src='".$urllogo."' width='40' height='40'>
						    <small>".$value['nom_admin']." (".$value['poste_admin'].")</small>
						</div>
						<hr>
						<h1 align='center'>
							<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#ModifPostPostPost' onclick='DetaillePostAdmin(".$value['id_pub'].");'>Contrôle</button>
						</h1>
					</div>
				"	;
			}
		}else{
			echo "Liste vide";
		}
	}

	if (isset($_POST['RecupAct'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
		$modele = new ModelePub();
			$cat = $_POST['RecupAct'];
		$donne = $modele->GetPostCount($cat);
			
		echo "
			<div class='small-box bg-info'>
				<div class='inner'>
					<h3 align='center'>".$donne['nombre']."</h3>

					<p align='center'>".$cat."</p>
				</div>
				<div class='icon'>
					<i class='ion ion-bag'></i>
				</div>
			</div>
		";
	}
	if (isset($_POST['RecupActSer'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
		$modele = new ModelePub();
		$cat = $_POST['RecupActSer'];
		$donne = $modele->GetPostCountService($cat);
		
		echo "
			<div class='small-box bg-info'>
				<div class='inner'>
					<h3 align='center'>".$donne['nombre']."</h3>

					<p align='center'>".$cat."</p>
				</div>
				<div class='icon'>
					<i class='ion ion-bag'></i>
				</div>
			</div>
		";
	}
	if (isset($_POST['RecupActFor'])) {
		include '../../modele/publication/modele.publication.php';
		include '../../config/connexion.php';
		$modele = new ModelePub();
		$cat = $_POST['RecupActFor'];
		$donne = $modele->GetPostCountFormation($cat);
		
		echo "
			<div class='small-box bg-info'>
				<div class='inner'>
					<h3 align='center'>".$donne['nombre']."</h3>

					<p align='center'>".$cat."</p>
				</div>
				<div class='icon'>
					<i class='ion ion-bag'></i>
				</div>
			</div>
		";
	}


 ?>