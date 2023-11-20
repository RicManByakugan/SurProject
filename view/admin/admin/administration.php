<!DOCTYPE html>
<html>
<head>
	<title>SURADMIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="content/data/image/logoAdmin.png">

	<link rel="stylesheet" href="content/assets/administrator/font/typicons.font/typicons.css">
	<link rel="stylesheet" href="content/assets/administrator/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="content/assets/administrator/dist/css/style-sur-admin.css" type="text/css">
	<link rel="stylesheet" href="content/assets/administrator/dist/css/adminlte.min.css">
	<style type="text/css">
	    #preloader{position:fixed;top:0; left:0; right:0; bottom:0; background:#fff; z-index:99999;text-align:center;background-repeat:no-repeat;width: 100%;}
	     #status{margin-top: 200px;}
	</style>
</head>
<body>
	<div id="preloader">
        <div style='text-align:center;' id="status">
        	<div class="spinner-border text-warning"></div>
        </div>
    </div>

    <!-- 2CONTAIN -->
	<div class="container mt-3">
	    <div class="modal fade" id="ModifPostPostPost">
		      <div class="modal-dialog modal-xl">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h4 class="modal-title">Contrôle pub <i class="typcn typcn-shopping-cart"></i></h4>
		            <button type="button" class="close" data-dismiss="modal">×</button>
		          </div>
		          <div class="modal-body" id="modifPostPub"></div>
		      </div>
		    </div>
	    </div>
    </div>

	<div class="container">
		<div class="modal fade" id="Params">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h4 class="modal-title">Reglages <i class="typcn typcn-cog"></i></h4>
	            <button type="button" class="close" data-dismiss="modal">×</button>
	          </div>
	            <div class="modal-body">
	                <table class="table">
	                  <tr>
	                    <td>Biographie</td>
	                    <td></td>
	                    <td></td>
	                    <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bioModal">Modifier</button></td>
	                  </tr>
	                  <tr>
	                    <td>Connexion</td>
	                    <td></td>
	                    <td></td>
	                    <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ConModal">Modifier</button></td>
	                  </tr>
	              </table>
	            </div>
	        </div>
	      </div>
	    </div>
	</div>

	<div class="container">
	    <div class="modal fade" id="bioModal">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h4 class="modal-title">Biographie <i class="typcn typcn-cog"></i></h4>
	            <button type="button" class="close" data-dismiss="modal">×</button>
	          </div>
	          <form method="POST" action="controller/admin/controller.admin.php" enctype="multipart/form-data">
	          		<div class="modal-body">
	              	<div class="form-group">
	              		<label>Nom</label>
	              		<input type="text" name="newName" class="form-control" placeholder="<?php echo $donneAdmin['nom_admin'] ?>">
	              	</div>
	              	<div class="form-group">
	              		<label>Prénom</label>
	              		<input type="text" name="newLast" class="form-control" placeholder="<?php echo $donneAdmin['prenom_admin'] ?>">
	              	</div>
	              	<div class="form-group">
	              		<label>Contact (numéro telphone)</label>
	              		<input type="text" name="newContact" class="form-control" placeholder="<?php echo $donneAdmin['contact_admin'] ?>">
	              	</div>
	              	<div class="form-group">
	              		<label>Email</label>
	              		<input type="text" name="newEmail" class="form-control" placeholder="<?php echo $donneAdmin['email_admin'] ?>">
	              	</div>
	              	<div class="form-group">
	              		<label>Profil</label>
	              		<div class="form-group">
							<input type="file" name="newProfil" id="newProfil" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'MajSub','logoEnProUser');">
							<label for="newProfil"><small class="btn btn-primary">Entrer une image <i class="typcn typcn-image-outline"></i></small></label>
							<label for="delP"><small class="btn btn-primary" onclick="DelImageUserAdmin();">Supprimer l'image</small></label>
						</div>
						<img src="content/data/image/logo/logo.png" width="100" height="100" id="logoEnProUser" style="display: none;"><br>
	              		<input type="text" name="id_admin" class="form-control" hidden value="<?php echo $id_admin; ?>">
	              	</div>
	              </div>
	              <div class="modal-footer">
	                  <button class="btn btn-sm btn-primary" type="submit" name="MajSub" id="MajSub">Modifier</button>
	                  <small class="btn btn-sm btn-primary" data-dismiss="modal">Annuler</small>
	               </div>
	           </form>
	        </div>
	      </div>
	    </div>
	</div>


	<div class="container">
	    <div class="modal fade" id="ConModal">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h4 class="modal-title">Connexion <i class="typcn typcn-cog"></i></h4>
	            <button type="button" class="close" data-dismiss="modal">×</button>
	          </div>
	          <div class="modal-body">
	          	<div class="form-group">
	          		<label>Mot de passe (Ancien)</label>
	                <input type="text" id="id_admin" hidden value="<?php echo $id_admin; ?>">
	          		<input type="password" id="old_mdp" class="form-control">
	          	</div>
	          	<div class="form-group">
	          		<label>Mot de passe (Nouveau)</label>
	          		<input type="password" id="new_mdp1" class="form-control">
	          	</div>
	          	<div class="form-group">
	          		<label>Mot de passe (Confirmez)</label>
	          		<input type="password" id="new_mdp2" class="form-control">
	          	</div>
	          </div>
	            <small id="error" style="color: red;text-align: center;"></small>
	            <small id="success" style="color: green;text-align: center;"></small>
	          <div class="modal-footer">
	              <button class="btn btn-sm btn-primary" id="new_mdpbtn" onclick="NewBtnFuncoation();">Modifier</button>
	              <small class="btn btn-sm btn-primary" data-dismiss="modal">Annuler</small>
	           </div>
	        </div>
	      </div>
	    </div>
	</div>

	

	<div class="wrapper">

			<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-top: -20px;">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
			      </li>
			    </ul>

			    <ul class="navbar-nav ml-auto">

			      <li class="nav-item dropdown">
			        <a style="cursor: pointer;" class="nav-link" data-toggle="dropdown">
			          <!-- COMMANDE RAPIDE -->
			          <i class="fa fa-shopping-bag text-success"></i>
			          <span class="badge badge-primary navbar-badge" id="badgeCountCoR"></span>
			        </a>
			        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          <span class="dropdown-item dropdown-header text-success">Commandes rapide</span>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" id="contentCommandeR"></a>
			          <div class="dropdown-divider"></div>
			          </a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a style="cursor: pointer;" class="nav-link" data-toggle="dropdown">
			          <!-- COMMANDE -->
			          <i class="fa fa-shopping-bag"></i>
			          <span class="badge badge-primary navbar-badge" id="badgeCountCo"></span>
			        </a>
			        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          <span class="dropdown-item dropdown-header">Commandes</span>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" id="contentCommande"></a>
			          <div class="dropdown-divider"></div>
			          </a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a style="cursor: pointer;" class="nav-link" data-toggle="dropdown">
			          <i class="far fa-bell "></i>
			          <span class="badge badge-primary navbar-badge" id="badgeCount"></span>
			        </a>
			        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          <span class="dropdown-item dropdown-header" id="nombreNotif"></span>
			          <div class="dropdown-divider"></div>

			          <span id="allNotif"></span>

			          <div class="dropdown-divider"></div>
			          
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a style="cursor: pointer;" class="nav-link" data-toggle="dropdown">
			          <!-- MESSAGE -->
			          <i class="far fa-comments"></i>
			          <span class="badge badge-primary navbar-badge" id="badgeCountMessage"></span>
			        </a>
			        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          <span class="dropdown-item dropdown-header" onclick="ChangeItBabe('message','service','produit','formation','sponsors','donne','bienvenue','adminC','messageAdmin','activite','commande','commandeR');">Messages</span>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" id="contentMessage"></a>
			          <div class="dropdown-divider"></div>
			          </a>
			        </div>
			      </li>

			      <li class="nav-item">
			        <a href="index.php?admin=1" class="nav-link" role="button">
			          <i class="fas fa-undo"></i>
			        </a>
			      </li>

			      <li class="nav-item">
			        <a style="cursor: pointer;" class="nav-link" data-widget="fullscreen" role="button">
			          <i class="fas fa-expand-arrows-alt"></i>
			        </a>
			      </li>
			      
			      <li class="nav-item dropdown">
			      	<a style="cursor: pointer;" class="nav-link" data-toggle="dropdown">
			          <i class="far fa-user"></i>
			        </a>
			         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          	<span class="dropdown-item dropdown-header"><?php echo $donneAdmin['nom_admin']." ".$donneAdmin['prenom_admin']; ?></span>
			         	<div class="dropdown-divider"></div>
			         	<span class="dropdown-item" style="text-align: center;">
				         	<small class="btn btn-primary" data-toggle="modal" data-target="#Params">Paramètre</small>
				         	<a href="controller/admin/controller.admin.php?deconnexion=<?php echo $donneAdmin['id_admin'] ?>"><small class="btn btn-primary">Déconnexion</small></a>
			         	</span>
			          	<div class="dropdown-divider"></div>
			        </div>
			      </li>
			    
			    </ul>
			  </nav>

			<aside class="main-sidebar sidebar-dark-primary elevation-4">
			    <a href="index.html" target="blank" class="brand-link">
			      <img src="content/data/image/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
			      <span class="brand-text font-weight-light">SUR ADMIN</span>
			    </a>

			    <div class="sidebar">

			      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			        <div class="image">
			          <?php if ($donneAdmin['profil_admin'] != "" && $donneAdmin['profil_admin'] != NULL) { ?>
			          	<img src="content/data/image/admin/<?php echo $donneAdmin['profil_admin']; ?>" class="img-circle elevation-2">
			          <?php }else{ ?>
			          	<img src="content/data/image/admin/profile.png" class="img-circle elevation-2">
			          <?php } ?>
			        </div>
			        <div class="info">
			          <a class="users-list-name"><?php echo $donneAdmin['nom_admin']." ".$donneAdmin['prenom_admin']; ?></a>
			        </div>
			      </div>

			      <div class="row">
			      	<div class="col-sm-12">
			      		<?php if ($donneAdmin['poste_admin']=="INFORMATIQUE") { ?>
			         		<?php if ($surIab['off'] == NULL){ ?>
			         			<small class="btn btn-block btn-primary" onclick="SiteSur('off',this)">Désactiver</small>
			         		<?php }else{  ?>
			         			<small class="btn btn-block btn-primary" onclick="SiteSur('on',this)">Activer</small>
			         		<?php }  ?>
			         	<?php } ?>
			      	</div>
			      </div>


			      <nav class="mt-2">
			        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          			 
	      			  
	      			  <li class="nav-header">CLIENTS</li>

	      			  <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('commandeR','produit','service','formation','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','client','commande');">
			              <i class="nav-icon typcn typcn-shopping-bag text-success"></i>
			              <p class="text-success">
			                Commandes
			              </p>
			            </a>
			          </li>
			          
			           <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('commande','produit','service','formation','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','client','commandeR');">
			              <i class="nav-icon typcn typcn-shopping-bag"></i>
			              <p>
			                Commandes
			              </p>
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('produit','service','formation','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-shopping-cart"></i>
			              <p>
			                Produits
			              </p>
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('service','produit','formation','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-calendar-outline"></i>
			              <p>
			                Service
			              </p>
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('formation','service','produit','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-mortar-board"></i>
			              <p>
			                Formation
			              </p>
			            </a>
			          </li>
			           <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('client','produit','service','formation','sponsors','message','donne','bienvenue','adminC','messageAdmin','activite','commande','commandeR');">
			              <i class="nav-icon typcn typcn-group"></i>
			              <p>
			                Liste
			              </p>
			            </a>
			          </li>
			        </ul><br>

			        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          			 
	      			  <li class="nav-header">COMMUNAUTE</li>
			          
			          <!-- <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('messageAdmin','service','produit','formation','sponsors','donne','bienvenue','adminC','message','activite');">
			              <i class="nav-icon typcn typcn-user"></i>
			              <p>
			                Administration
			              </p>
			            </a>
			          </li> -->

			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('message','service','produit','formation','sponsors','donne','bienvenue','adminC','messageAdmin','activite','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-message"></i>
			              <p>
			                Messages
			              </p>
			            </a>
			          </li>

	      			</ul> <br>
			        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          			 
	      			  <li class="nav-header">SITE</li>
			          
			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('activite','donne','service','produit','formation','message','sponsors','bienvenue','adminC','messageAdmin','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-arrow-repeat-outline"></i>
			              <p>
			                Activités
			              </p>
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('donne','service','produit','formation','message','sponsors','bienvenue','adminC','messageAdmin','activite','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-device-tablet"></i>
			              <p>
			                Coordonnées
			              </p>
			            </a>
			          </li> 
			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('sponsors','service','produit','formation','message','donne','bienvenue','adminC','messageAdmin','activite','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-group"></i>
			              <p>
			                Sponsors & Partenaires
			              </p>
			            </a>
			          </li>
			         </ul><br>
			        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	      			  <?php if ($donneAdmin['poste_admin']=="INFORMATIQUE") { ?>
			          <li class="nav-header">ADMINISTRATION</li>
			          
			          <li class="nav-item">
			            <a class="nav-link" onclick="ChangeItBabe('adminC','donne','service','produit','formation','message','sponsors','bienvenue','messageAdmin','activite','commande','client','commandeR');">
			              <i class="nav-icon typcn typcn-edit"></i>
			              <p>
			                Liste
			              </p>
			            </a>
			          </li>
			          <?php } ?>

			        </ul>
			      </nav>

			    </div>
			  </aside>

			<div class="content-wrapper">

<!-- LIGNE*********************************************************************************************** -->

				<!-- bienvenue -->
				<span style="display: block;" id="bienvenue">
					<div class="content-header">
					  <div class="container-fluid">
					    <div class="row mb-2">
					      <div class="col-sm-6">
					        <h1 class="m-0">Bienvenue</h1>
					      </div>
					      <div class="col-sm-6">
					        <ol class="breadcrumb float-sm-right">
					            <li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
					          </ol>
					      </div>
					    </div>
					  </div>
					  <hr>
					</div>

					<section class="content">
					  <div class="container-fluid" style="text-align: center;">
					    <img src="content/data/image/logo.png" width="100" height="100">
					    <h3>Administrator</h3>
					    <?php if ($donneAdmin['nom_admin'] != "" || $donneAdmin['nom_admin'] != NULL) { ?>
					    <small>Nom : <?php echo $donneAdmin['nom_admin']; ?></small><br>
					      <?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL){ ?>
					      <small>Poste : <?php echo $donneAdmin['poste_admin']; ?></small>
					      <?php }else{ ?>
					      <small>Poste : en attente de nouveau poste</small><br>
					      <small style="color: red;">Contacter l'administration</small>
					      <?php } ?>
					    <?php }else{ ?>
					    <small style="color: red;">Mettez à jour votre profil <i class="fa fa-user"></i></small>
					    <?php } ?>


					    <?php if ($donneAdmin['contact_admin'] == "" || $donneAdmin['contact_admin'] == NULL || $donneAdmin['email_admin'] == "" || $donneAdmin['email_admin'] == NULL) { ?>
					    <br><small style="color: red;">Mettez à jour votre profil <i class="fa fa-user"></i></small>
					    <?php } ?>

					  </div>
					</section>
				</span>
				<!-- /bienvenue -->


<!-- LIGNE*********************************************************************************************** -->

				<!-- produit -->
				<?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL) {  ?>	    
					<span style="display: none;" id="produit">
							
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0"><i class="typcn typcn-shopping-cart"></i> Produit</h1>
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active">Produit</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<section class="content container-fluid">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Vendez des Produits
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#vProduit" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body">
									          	<div class="row collapse" id="vProduit">
										          		<div class="col-sm-5">
									          				<form id="AjoutPublication" enctype="multipart/form-data" action="controller/publication/controller.publication.php" target="ajoutProduit" method="POST">
											          			<div class="row">
													            	<div class="col">
														            		<div class="form-group">
														            			<label>Titre</label>
														            			<input type="text" name="nomPub" class="form-control" placeholder="Titre du produit" required>
														            			<input type="text" name="idamin" value="<?php echo $id_admin ?>" class="form-control" hidden>
														            			<input type="text" name="typePub" value="PRODUIT" class="form-control" hidden>
														            		</div>
													            	</div>
													            	<div class="col">
														            		<div class="form-group">
														            			<label>Prix (Ariary)</label>
														            			<input type="number" name="prixPub" class="form-control" min="0" placeholder="Prix du produit" required>
														            		</div>
														            </div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Catégorie</label>
													            		<select class="form-control" name="catPub" required>
													            			<option></option>
													            			<option value="HIGHTECH">High-Tech</option>
													            			<option value="VETEMENT">Vêtement et chaussures</option>
													            			<option value="AGROALIMENTAIRE">Agro-alimentaires</option>
													            			<option value="JOUER">Jouer</option>
													            			<option value="ACCESSOIRE">Accessoire et autres</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Cible</label>
													            		<select class="form-control" name="GenrePub" required>
													            			<option></option>
													            			<option value="Tout">Tout le monde</option>
													            			<option value="Homme">Homme</option>
													            			<option value="Femme">Femme</option>
													            			<option value="Jeune Homme">Jeune homme</option>
													            			<option value="Jeune Femme">Jeune femme</option>
													            			<option value="Ado">Ado</option>
													            			<option value="Enfant">Enfant</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Niveau de priorité</label>
													            		<select class="form-control" name="PrioPub" required>
													            			<option></option>
													            			<option value="1">1</option>
													            			<option value="2">2</option>
													            			<option value="3">3</option>
													            			<option value="4">4</option>
													            			<option value="5">5</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Disponibilité</label>
													            		<div class="row">
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Antananarivo" required> Antananarivo</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Antsiranana"> Antsiranana</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Fianarantsoa"> Fianarantsoa</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Mahajanga"> Mahajanga</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toamasina"> Toamasina</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toliara"> Toliara</label><br>
													            		</div>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Description</label>
													            		<textarea class="form-control" placeholder="Description du produit..." name="descPub" style="height: 121px;"></textarea>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img1Pub" id="img1Pub" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePub','imageOne');">
														            		<label for="img1Pub"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageOne" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img2Pub" id="img2Pub" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePub','imageTwo');">
														            		<label for="img2Pub"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageTwo" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img3Pub" id="img3PubProduit" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePub','imageThree');">
														            		<label for="img3PubProduit"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageThree" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img4Pub" id="img4PubProduit" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePub','imageFour');">
														            		<label for="img4PubProduit"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageFour" style="display: none;">
													            	</div>
													            </div><br>
													            <div class="row">
													            	<div class="col">
													            		<button type="submit" class="btn btn-primary" style="width: 100%;" name="envoiePub" id="envoiePub">Envoyer</button>
													            		<small id="envoiePcCours"></small>
													            	</div>
													            </div>
												            </form>
									          		</div>	

									          		<div class="col-sm-7">
									          			<div class="row activy-ty">
												          	<div class="col-lg-4" id="produitHighTech"></div>
												          	<div class="col-lg-4" id="produitVetement"></div>
												          	<div class="col-lg-4" id="produitAgro"></div>
												          	<div class="col-lg-4" id="produitJouer"></div>
												          	<div class="col-lg-4" id="produitAccessoire"></div>
												    	</div>
									          		</div>

									          	</div>
									          </div>			          
									        </div>
								    	</div>
								    </section>
								</div>      
						</section>


						<section class="content container-fluid" id="modifUserModif" style="display: none;">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Modification Produit : <b id="nomModifAff"></b>
									            </h3>
									          </div>
									          <div class="card-body">
									          		<form id="ModifPublication" enctype="multipart/form-data" action="controller/publication/controller.publication.php" target="ajoutProduit" method="POST">
											          	<div class="row">
											            	<div class="col">
												            		<div class="form-group">
												            			<label>Titre</label>
												            			<input name="nameModif" type="text" class="form-control" placeholder="Titre du produit">
												            			<input id="idPubModif" type="text" name="idPubModif" class="form-control" hidden>
												            			<input type="text" name="typa" value="PRODUIT" class="form-control" hidden>
												            			<input type="text" name="userActAdmin" value="<?php echo $id_admin; ?>" class="form-control" hidden>
												            		</div>
											            		</div>
											            	<div class="col">
												            		<div class="form-group">
												            			<label>Prix (Ariary)</label>
												            			<input name="prixModif" type="number" class="form-control" min="0" placeholder="Prix du produit">
												            		</div>
												            </div>
											            </div>
											             <div class="row">
												            	<div class="col">
												            		<label>Catégorie</label>
												            		<select class="form-control" name="catModif">
												            			<option></option>
												            			<option value="HIGHTECH">High-Tech</option>
													            		<option value="VETEMENT">Vêtement et chaussures</option>
													            		<option value="AGROALIMENTAIRE">Agro-alimentaires</option>
													            		<option value="JOUER">Jouer</option>
													            		<option value="ACCESSOIRE">Accessoire et autres</option>
												            		</select>
												            	</div>
												        </div>
												        <div class="row">
													            	<div class="col">
													            		<label>Cible</label>
													            		<select class="form-control" name="GenreModif">
													            			<option></option>
													            			<option value="Tout">Tout le monde</option>
													            			<option value="Homme">Homme</option>
													            			<option value="Femme">Femme</option>
													            			<option value="Jeune Homme">Jeune homme</option>
													            			<option value="Jeune Femme">Jeune femme</option>
													            			<option value="Ado">Ado</option>
													            			<option value="Enfant">Enfant</option>
													            		</select>
													            	</div>
													    </div>
													    <div class="row">
													            	<div class="col">
													            		<label>Niveau de priorité</label>
													            		<select class="form-control" name="PrioModif">
													            			<option></option>
													            			<option value="1">1</option>
													            			<option value="2">2</option>
													            			<option value="3">3</option>
													            			<option value="4">4</option>
													            			<option value="5">5</option>
													            		</select>
													            	</div>
													    </div>
													    <div class="row">
													            	<div class="col">
													            		<label>Disponibilité</label>
													            		<div class="row">
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="AntananarivoMo"> Antananarivo</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="AntsirananaMo"> Antsiranana</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="FianarantsoaMo"> Fianarantsoa</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="MahajangaMo"> Mahajanga</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="ToamasinaMo"> Toamasina</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toliara"> Toliara</label><br>
													            		</div>
													            	</div>
													    </div>
											            <div class="row">
											            	<div class="col">
											            		<label>Description</label>
											            		<textarea id="descModif" name="descModif" class="form-control" placeholder="Description du produit..." style="height: 121px;"></textarea>
											            	</div>
											            </div>
											            <div class="row">
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(1,'idPubModif');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif1" id="imgModif1" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSub','imageOneModif');">
												            		<label for="imgModif1"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
												            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageOneModif" style="display: none;">
											            	</div>
											            	<div class="col">
																<label>Image</label>
																<i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(2,'idPubModif');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif2" id="imgModif2" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSub','imageTwoModif');">
												            		<label for="imgModif2"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
												            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageTwoModif" style="display: none;">
											            	</div>
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(3,'idPubModif');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif3" id="imgModif3" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSub','imageThreeModif');">
												            		<label for="imgModif3"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
												            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageThreeModif" style="display: none;">
											            	</div>
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(4,'idPubModif');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif4" id="imgModif4" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSub','imageFourModif');">
												            		<label for="imgModif4"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
												            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageFourModif" style="display: none;">
											            	</div>
											            </div>
											            <div class="row">
											            	<div class="col">
											            		<button type="submit" class="btn btn-primary" name="modifPubSub" id="modifPubSub">Modifier</button>
											            		<button class="btn btn-primary" onclick="AnnulerModi();">Annuler</button><br>
											            		<small id="ModifPrCours"></small>
											            	</div>
											            </div>
									          		</form>
									          </div>
									        </div>
								    	</div>
								    </section>

								</div>      
						</section>


						<section class="content container-fluid">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title" id="produitliste">
									              Listes des Produits
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#listeProduit" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body">
									          	<div class="row collapse" id="listeProduit"></div>
									          </div>
									        </div>
								    	</div>
								    </section>
								</div>      
						</section>

						<iframe id="ajoutProduit" name="ajoutProduit" style="visibility: hidden;display: none;"></iframe>
					</span>
				<?php }else{?>
					<span style="display: none;" id="produit">
						<div class="container" style="text-align: center;">
							<h3 align="center">Produit : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small><br>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?>
				<!-- /produit -->


<!-- LIGNE*********************************************************************************************** -->


<!-- LIGNE*********************************************************************************************** -->
				<!-- service -->
				<?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL) {  ?>	    
					<span style="display: none;" id="service">
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0"><i class="typcn typcn-calendar-outline"></i> Service</h1>
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active">Service</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<section class="content container-fluid">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Ajouter des Services
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#vService" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body">
									          	<div class="row collapse" id="vService">
										          		<div class="col-sm-5">
									          				<form id="AjoutPublicationSer" enctype="multipart/form-data" action="controller/publication/controller.publication.php" target="ajoutService" method="POST">
											          			<div class="row">
													            	<div class="col">
														            		<div class="form-group">
														            			<label>Titre</label>
														            			<input type="text" name="nomPub" class="form-control" placeholder="Titre du Service" required>
														            			<input type="text" name="idamin" value="<?php echo $id_admin ?>" class="form-control" hidden>
														            			<input type="text" name="typePub" value="SERVICE" class="form-control" hidden>
														            		</div>
													            		</div>
													            	<div class="col">
														            		<div class="form-group">
														            			<label>Prix (Ariary)</label>
														            			<input type="number" name="prixPub" class="form-control" min="0" placeholder="Prix du Service" required>
														            		</div>
														            </div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Catégorie</label>
													            		<select class="form-control" name="catPub" required>
													            			<option></option>
													            			<option value="TRANSPORT">Transport</option>
													            			<option value="EVENTS">Evenementiel</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Cible</label>
													            		<select class="form-control" name="GenrePub" required>
													            			<option></option>
													            			<option value="Tout">Tout le monde</option>
													            			<option value="Homme">Homme</option>
													            			<option value="Femme">Femme</option>
													            			<option value="Jeune Homme">Jeune homme</option>
													            			<option value="Jeune Femme">Jeune femme</option>
													            			<option value="Ado">Ado</option>
													            			<option value="Enfant">Enfant</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Niveau de priorité</label>
													            		<select class="form-control" name="PrioPub" required>
													            			<option></option>
													            			<option value="1">1</option>
													            			<option value="2">2</option>
													            			<option value="3">3</option>
													            			<option value="4">4</option>
													            			<option value="5">5</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Disponibilité</label>
													            		<div class="row">
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Antananarivo" required> Antananarivo</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Antsiranana"> Antsiranana</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Fianarantsoa"> Fianarantsoa</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Mahajanga"> Mahajanga</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toamasina"> Toamasina</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toliara"> Toliara</label><br>
													            		</div>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Description</label>
													            		<textarea class="form-control" placeholder="Description du Service..." name="descPub" style="height: 121px;"></textarea>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img1Pub" id="img1PubSer" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubSer','imageOneServ');">
														            		<label for="img1PubSer"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageOneServ" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img2Pub" id="img2PubSer" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubSer','imageTwoServ');">
														            		<label for="img2PubSer"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageTwoServ" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img3Pub" id="img3PubSer" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubSer','imageThreeServ');">
														            		<label for="img3PubSer"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageThreeServ" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img4Pub" id="img4PubSer" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubSer','imageFourServ');">
														            		<label for="img4PubSer"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														            	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageFourServ" style="display: none;">
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<button type="submit" class="btn btn-primary" style="width: 100%;" name="envoiePub" id="envoiePubSer">Envoyer</button>
													            		<small id="envoieSeCours"></small>
													            	</div>
													            </div>
												            </form>
									          		</div>	

									          		<div class="col-sm-7">
									          			<div class="row activy-ty">
												          	<div class="col-lg-4" id="ServiceTransport"></div>
												          	<div class="col-lg-4" id="ServiceEvents"></div>
												    	</div>
									          		</div>

									          	</div>
									          </div>			          
									        </div>
								    	</div>
								    </section>
								</div>      
						</section>

						<section class="content container-fluid" id="modifUserModifSer" style="display: none;">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Modification Service : <b id="nomModifAffSer"></b>
									            </h3>
									          </div>
									          <div class="card-body">
									          		<form id="ModifPublicationService" enctype="multipart/form-data" action="controller/publication/controller.publication.php" target="ajoutService" method="POST">
											          	<div class="row">
											            	<div class="col">
												            		<div class="form-group">
												            			<label>Titre</label>
												            			<input name="nameModif" type="text" class="form-control" placeholder="Titre du Service">
												            			<input id="idPubModifSer" type="text" name="idPubModif" class="form-control" hidden>
												            			<input type="text" name="typa" value="SERVICE" class="form-control" hidden>
												            			<input type="text" name="userActAdmin" value="<?php echo $id_admin; ?>" class="form-control" hidden>
												            		</div>
											            		</div>
											            	<div class="col">
												            		<div class="form-group">
												            			<label>Prix (Ariary)</label>
												            			<input name="prixModif" type="number" class="form-control" min="0" placeholder="Prix du Service">
												            		</div>
												            </div>
											            </div>
											             <div class="row">
												            	<div class="col">
												            		<label>Catégorie</label>
												            		<select class="form-control" name="catModif">
												            			<option></option>
												            			<option value="TRANSPORT">Transport</option>
													            		<option value="EVENTS">Evenementiel</option>
												            		</select>
												            	</div>
												        </div>
												        <div class="row">
													            	<div class="col">
													            		<label>Cible</label>
													            		<select class="form-control" name="GenreModif">
													            			<option></option>
													            			<option value="Tout">Tout le monde</option>
													            			<option value="Homme">Homme</option>
													            			<option value="Femme">Femme</option>
													            			<option value="Jeune Homme">Jeune homme</option>
													            			<option value="Jeune Femme">Jeune femme</option>
													            			<option value="Ado">Ado</option>
													            			<option value="Enfant">Enfant</option>
													            		</select>
													            	</div>
													    </div>
													    <div class="row">
													            	<div class="col">
													            		<label>Niveau de priorité</label>
													            		<select class="form-control" name="PrioModif">
													            			<option></option>
													            			<option value="1">1</option>
													            			<option value="2">2</option>
													            			<option value="3">3</option>
													            			<option value="4">4</option>
													            			<option value="5">5</option>
													            		</select>
													            	</div>
													    </div>
													    <div class="row">
													            	<div class="col">
													            		<label>Disponibilité</label>
													            		<div class="row">
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="AntananarivoMo"> Antananarivo</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="AntsirananaMo"> Antsiranana</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="FianarantsoaMo"> Fianarantsoa</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="MahajangaMo"> Mahajanga</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="ToamasinaMo"> Toamasina</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toliara"> Toliara</label><br>
													            		</div>
													            	</div>
													    </div>
											            <div class="row">
											            	<div class="col">
											            		<label>Description</label>
											            		<textarea id="descModif" name="descModif" class="form-control" placeholder="Description du Service..." style="height: 121px;"></textarea>
											            	</div>
											            </div>
											            <div class="row">
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(1,'idPubModifSer');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif1" id="imgModif1Ser" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubSer','imageOneServMo');">
												            		<label for="imgModif1Ser"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
														        <img src="content/data/image/logo/logo.png" width="100" height="100" id="imageOneServMo" style="display: none;">
											            	</div>
											            	<div class="col">
																<label>Image</label>
																<i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(2,'idPubModifSer');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif2" id="imgModif2Ser" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubSer','imageTwoServMod');">
												            		<label for="imgModif2Ser"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
														        <img src="content/data/image/logo/logo.png" width="100" height="100" id="imageTwoServMod" style="display: none;">
											            	</div>
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(3,'idPubModifSer');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif3" id="imgModif3Ser" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubSer','imageThreeServMod');">
												            		<label for="imgModif3Ser"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
											            			<!-- <input type="text" id="idPubModifSer" value="id_pub" hidden> -->
												            	</div>
														        <img src="content/data/image/logo/logo.png" width="100" height="100" id="imageThreeServMod" style="display: none;">
											            	</div>
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(4,'idPubModifSer');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif4" id="imgModif4Ser" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubSer','imageFourServMod');">
												            		<label for="imgModif4Ser"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
											            			<!-- <input type="text" id="idPubModifSer" value="id_pub" hidden> -->
												            	</div>
														        <img src="content/data/image/logo/logo.png" width="100" height="100" id="imageFourServMod" style="display: none;">
											            	</div>
											            </div>
											            <div class="row">
											            	<div class="col">
											            		<button type="submit" class="btn btn-primary" name="modifPubSub" id="modifPubSubSer">Modifier</button>
											            		<button class="btn btn-primary" onclick="AnnulerModiService();">Annuler</button><br>
											            		<small id="ModifSeCours"></small>
											            	</div>
											            </div>
									          		</form>
									          </div>
									        </div>
								    	</div>
								    </section>

								</div>      
						</section>

						<section class="content container-fluid">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title" id="Serviceliste">
									              Listes des Services
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#listeService" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body">
									          	<div class="row collapse" id="listeService">
									          	</div>
									          </div>
									        </div>
								    	</div>
								    </section>

								</div>      
						</section>

						<iframe id="ajoutService" name="ajoutService" style="visibility: hidden;display: none;"></iframe>
					</span>
				<?php }else{?>
					<span style="display: none;" id="service">
						<div class="container" style="text-align: center;">
							<h3 align="center">Service : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?>
				<!-- /service -->
<!-- LIGNE*********************************************************************************************** -->



<!-- LIGNE*********************************************************************************************** -->
				<!-- formation -->
				<?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL) {  ?>	    
					<span style="display: none;" id="formation">
						
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0"><i class="typcn typcn-mortar-board"></i> Formation</h1>
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active">Formation</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<section class="content container-fluid">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Ajouter des Formations
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#vFormation" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body">
									          	<div class="row collapse" id="vFormation">
										          		<div class="col-sm-5">
									          				<form id="AjoutPublicationFor" enctype="multipart/form-data" action="controller/publication/controller.publication.php" target="ajoutFormation" method="POST">
											          			<div class="row">
													            	<div class="col">
														            		<div class="form-group">
														            			<label>Titre</label>
														            			<input type="text" name="nomPub" class="form-control" placeholder="Titre du Formation" required>
														            			<input type="text" name="idamin" value="<?php echo $id_admin ?>" class="form-control" hidden>
														            			<input type="text" name="typePub" value="FORMATION" class="form-control" hidden>
														            		</div>
													            		</div>
													            	<div class="col">
														            		<div class="form-group">
														            			<label>Prix (Ariary)</label>
														            			<input type="number" name="prixPub" class="form-control" min="0" placeholder="Prix du Formation" required>
														            		</div>
														            </div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Catégorie</label>
													            		<select class="form-control" name="catPub" required>
													            			<option></option>
													            			<option value="LANGUE">Langue</option>
													            			<option value="INFORMATIQUE">Informatique</option>
													            			<option value="MECANIQUE">Mécanique Automobile</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Cible</label>
													            		<select class="form-control" name="GenrePub" required>
													            			<option></option>
													            			<option value="Tout">Tout le monde</option>
													            			<option value="Homme">Homme</option>
													            			<option value="Femme">Femme</option>
													            			<option value="Jeune Homme">Jeune homme</option>
													            			<option value="Jeune Femme">Jeune femme</option>
													            			<option value="Ado">Ado</option>
													            			<option value="Enfant">Enfant</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Niveau de priorité</label>
													            		<select class="form-control" name="PrioPub" required>
													            			<option></option>
													            			<option value="1">1</option>
													            			<option value="2">2</option>
													            			<option value="3">3</option>
													            			<option value="4">4</option>
													            			<option value="5">5</option>
													            		</select>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Disponibilité</label>
													            		<div class="row">
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Antananarivo" required> Antananarivo</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Antsiranana"> Antsiranana</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Fianarantsoa"> Fianarantsoa</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Mahajanga"> Mahajanga</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toamasina"> Toamasina</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toliara"> Toliara</label><br>
													            		</div>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Description</label>
													            		<textarea class="form-control" placeholder="Description du Formation..." name="descPub" style="height: 121px;"></textarea>
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img1Pub" id="img1PubFor" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubFor','imageOneFor');">
														            		<label for="img1PubFor"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														        		<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageOneFor" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img2Pub" id="img2PubFor" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubFor','imageTwoFor');">
														            		<label for="img2PubFor"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														       			<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageTwoFor" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img3Pub" id="img3PubFor" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubFor','imageThreeFor');">
														            		<label for="img3PubFor"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														       			<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageThreeFor" style="display: none;">
													            	</div>
													            	<div class="col">
													            		<label>Image</label>
													            		<div class="form-group">
														            		<input type="file" name="img4Pub" id="img4PubFor" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'envoiePubFor','imageFourFor');">
														            		<label for="img4PubFor"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
														            	</div>
														       			<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageFourFor" style="display: none;">
													            	</div>
													            </div>
													            <div class="row">
													            	<div class="col">
													            		<button type="submit" class="btn btn-primary" style="width: 100%;" name="envoiePub" id="envoiePubFor">Envoyer</button>
													            		<small id="envoieFoCours"></small>
													            	</div>
													            </div>
												            </form>
									          		</div>	

									          		<div class="col-sm-7">
									          			<div class="row activy-ty">
												          	<div class="col-lg-4" id="FormationLangue"></div>
												          	<div class="col-lg-4" id="FormationInformatique"></div>
												          	<div class="col-lg-4" id="FormationMecanique"></div>
												    	</div>
									          		</div>

									          	</div>
									          </div>			          
									        </div>
								    	</div>
								    </section>
								</div>      
						</section>

						<section class="content container-fluid" id="modifUForModifFor" style="display: none;">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Modification Formation : <b id="nomModifAffFor"></b>
									            </h3>
									          </div>
									          <div class="card-body">
									          		<form id="ModifPublicationFormation" enctype="multipart/form-data" action="controller/publication/controller.publication.php" target="ajoutFormation" method="POST">
											          	<div class="row">
											            	<div class="col">
												            		<div class="form-group">
												            			<label>Titre</label>
												            			<input name="nameModif" type="text" class="form-control" placeholder="Titre du Formation">
												            			<input id="idPubModifFor" type="text" name="idPubModif" class="form-control" hidden>
												            			<input type="text" name="typa" value="FORMATION" class="form-control" hidden>
												            			<input type="text" name="userActAdmin" value="<?php echo $id_admin; ?>" class="form-control" hidden>
												            		</div>
											            		</div>
											            	<div class="col">
												            		<div class="form-group">
												            			<label>Prix (Ariary)</label>
												            			<input name="prixModif" type="number" class="form-control" min="0" placeholder="Prix du Formation">
												            		</div>
												            </div>
											            </div>
											             <div class="row">
												            	<div class="col">
												            		<label>Catégorie</label>
												            		<select class="form-control" name="catModif">
												            			<option></option>
												            			<option value="LANGUE">Langue</option>
													            		<option value="INFORMATIQUE">Informatique</option>
													            		<option value="MECANIQUE">Mécanique Automobile</option>
												            		</select>
												            	</div>
												        </div>
												        <div class="row">
													            	<div class="col">
													            		<label>Cible</label>
													            		<select class="form-control" name="GenreModif">
													            			<option></option>
													            			<option value="Tout">Tout le monde</option>
													            			<option value="Homme">Homme</option>
													            			<option value="Femme">Femme</option>
													            			<option value="Jeune Homme">Jeune homme</option>
													            			<option value="Jeune Femme">Jeune femme</option>
													            			<option value="Ado">Ado</option>
													            			<option value="Enfant">Enfant</option>
													            		</select>
													            	</div>
													    </div>
													    <div class="row">
													            	<div class="col">
													            		<label>Niveau de priorité</label>
													            		<select class="form-control" name="PrioModif">
													            			<option></option>
													            			<option value="1">1</option>
													            			<option value="2">2</option>
													            			<option value="3">3</option>
													            			<option value="4">4</option>
													            			<option value="5">5</option>
													            		</select>
													            	</div>
													    </div>
													    <div class="row">
													            	<div class="col">
													            		<label>Disponibilité</label>
													            		<div class="row">
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="AntananarivoMo"> Antananarivo</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="AntsirananaMo"> Antsiranana</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="FianarantsoaMo"> Fianarantsoa</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="MahajangaMo"> Mahajanga</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="ToamasinaMo"> Toamasina</label>
														            		<label class="col-sm-4" style="font-weight: normal;"><input type="checkbox" name="Toliara"> Toliara</label><br>
													            		</div>
													            	</div>
													    </div>
											            <div class="row">
											            	<div class="col">
											            		<label>Description</label>
											            		<textarea id="descModif" name="descModif" class="form-control" placeholder="Description du Formation..." style="height: 121px;"></textarea>
											            	</div>
											            </div>
											            <div class="row">
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(1,'idPubModifFor');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif1" id="imgModif1For" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubFor','imageOneForMod');">
												            		<label for="imgModif1For"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
														       	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageOneForMod" style="display: none;">
											            	</div>
											            	<div class="col">
																<label>Image</label>
																<i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(2,'idPubModifFor');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif2" id="imgModif2For" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubFor','imageTwoForMod');">
												            		<label for="imgModif2For"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
												            	</div>
														       	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageTwoForMod" style="display: none;">
											            	</div>
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(3,'idPubModifFor');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif3" id="imgModif3For" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubFor','imageThreeForMod');">
												            		<label for="imgModif3For"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
											            			<!-- <input type="text" id="idPubModifFor" value="id_pub" hidden> -->
												            	</div>
														       	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageThreeForMod" style="display: none;">
											            	</div>
											            	<div class="col">
													            <label>Image</label>
													            <i class="fas fa-times" style="cursor: pointer;border:1px solid;border-radius: 50%;" onclick="DeleteImage(4,'idPubModifFor');"></i>
											            		<div class="form-group">
												            		<input type="file" name="imgModif4" id="imgModif4For" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'modifPubSubFor','imageFourForMod');">
												            		<label for="imgModif4For"><small class="btn btn-primary"><i class="typcn typcn-image-outline"></i></small></label>
											            			<!-- <input type="text" id="idPubModifFor" value="id_pub" hidden> -->
												            	</div>
														       	<img src="content/data/image/logo/logo.png" width="100" height="100" id="imageFourForMod" style="display: none;">
											            	</div>
											            </div>
											            <div class="row">
											            	<div class="col">
											            		<button type="submit" class="btn btn-primary" name="modifPubSub" id="modifPubSubFor">Modifier</button>
											            		<button class="btn btn-primary" onclick="AnnulerModiFormation();">Annuler</button><br>
											            		<small id="ModifFoCours"></small>
											            	</div>
											            </div>
									          		</form>
									          </div>
									        </div>
								    	</div>
								    </section>

								</div>      
						</section>
						
						<section class="content container-fluid">
								<div class="row">
									<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title" id="Formationliste">
									              Listes des Formations
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#listeFormation" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body">
									          	<div class="row collapse" id="listeFormation"></div>
									          </div>
									        </div>
								    	</div>
								    </section>

								</div>      
						</section>

						<iframe id="ajoutFormation" name="ajoutFormation" style="visibility: hidden;display: none;"></iframe>
					</span>
				<?php }else{?>
					<span style="display: none;" id="formation">
						<div class="container" style="text-align: center;">
							<h3 align="center">Formation : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?>
				<!-- /formation -->
<!-- LIGNE*********************************************************************************************** -->
	    

<!-- LIGNE*********************************************************************************************** -->
				<!-- message -->
				<span style="display: none;" id="message">
					
					<div class="content-header">
					  <div class="container-fluid">
					    <div class="row mb-2">
					      <div class="col-sm-6">
					        <h1 class="m-0"><i class="typcn typcn-message"></i> Message de groupe</h1>
					      </div>
					      <div class="col-sm-6">
					        <ol class="breadcrumb float-sm-right">
					            <li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
					              <li class="breadcrumb-item active">Message</li>
					          </ol>
					      </div>
					    </div>
					  </div>
					  <hr>
					</div>


					<div class="row container-fluid">
					    <div class="col-sm-7">
					         <div class="card direct-chat direct-chat-primary">
					              <div class="card-header">
					                <h3 class="card-title">Discussion</h3>

					                <div class="card-tools"></div>
					              </div>

					              <div class="card-body">
					                <div class="direct-chat-messages" id="listeMessage"></div>
					              </div>

					              <div class="card-footer">
					                <form id="AjoutMessage" enctype="multipart/form-data" action="controller/message/controller.message.php" target="ajoutMessage" method="POST">
					                    <label for="imgMess1"><small class="btn btn-primary">Image</small></label>
					                      <input type="file" name="imgMess1" id="imgMess1" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'EnvoieMess','imgMess11');">
					                    <label for="imgMess2"><small class="btn btn-primary">Image</small></label>
					                      <input type="file" name="imgMess2" id="imgMess2" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'EnvoieMess','imgMess22');">
					                    <label for="imgMess3"><small class="btn btn-primary">Image</small></label>
					                      <input type="file" name="imgMess3" id="imgMess3" accept=".jpg,.png,.jpeg" class="form-control inputfile" onchange="CheckImage(this,'EnvoieMess','imgMess33');">
					                    <img src="content/data/image/logo/logo.png" width="100" height="100" id="imgMess11" style="display: none;">
					                    <img src="content/data/image/logo/logo.png" width="100" height="100" id="imgMess22" style="display: none;">
					                    <img src="content/data/image/logo/logo.png" width="100" height="100" id="imgMess33" style="display: none;">
					                    <div class="input-group">
					                      <textarea name="messageEnvoie" placeholder="Ecrivez votre message..." class="form-control"></textarea>
					                      <input type="text" name="id_adminMessage" value="<?php echo $id_admin; ?>" hidden class="form-control">
					                      <span class="input-group-append">
					                        <button type="submit" class="btn btn-primary" name="EnvoieMess" id="EnvoieMess" onclick="ValideMessage();">Envoyer</button>
					                      </span>
					                    </div>
					                </form>
					              </div>

					            </div>
					    </div>

					    <div class="col-sm-5">
					      <div class="card">
					                  <div class="card-header">
					                    <h3 class="card-title">Administration</h3>

					                    <div class="card-tools">
					                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
					                        <i class="fas fa-minus"></i>
					                      </button>
					                    </div>
					                  </div>
					                  <div class="card-body p-0">
					                    <ul class="users-list clearfix" id="listeUser"></ul>
					                  </div>
					        </div>
					    </div>

					</div>

					<iframe id="ajoutMessage" name="ajoutMessage" style="visibility: hidden;display: none;"></iframe>
				</span>	    
				<!-- /message -->
<!-- LIGNE*********************************************************************************************** -->
				
				<span style="display: none;" id="messageAdmin"></span>


<!-- LIGNE*********************************************************************************************** -->
				<!-- activite -->
				<span style="display: none;" id="activite">
					<div class="content-header">
						<div class="container-fluid">
							<div class="row mb-2">
								<div class="col-sm-6">
									<h1 class="m-0"><i class="typcn typcn-arrow-repeat-outline"></i> Activités</h1>
									<!-- <label onclick="AllAdminRecup();" style="cursor: pointer;"><i class="typcn typcn-arrow-sync"></i></label> -->
								</div>
								<div class="col-sm-6">
									<ol class="breadcrumb float-sm-right">
								    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
								        <li class="breadcrumb-item active">Activités</li>
								    </ol>
								</div>
							</div>
						</div>
						<hr>
					</div>

					 <section class="content">
					     		<div class="container-fluid">
									<div class="row">
							          
							          <div class="col-12 col-sm-6 col-md-4">
							            <div class="info-box">
							              <span class="info-box-icon bg-info elevation-1"><i class="typcn typcn-shopping-cart"></i></span>
							              <div class="info-box-content">
							                <span class="info-box-text">Produit</span>
							                <span class="info-box-number" id="proAct"></span>
							              </div>
							            </div>
							          </div>

							          <div class="col-12 col-sm-6 col-md-4">
							            <div class="info-box">
							              <span class="info-box-icon bg-info elevation-1"><i class="typcn typcn-calendar-outline"></i></span>
							              <div class="info-box-content">
							                <span class="info-box-text">Service</span>
							                <span class="info-box-number" id="seAct"></span>
							              </div>
							            </div>
							          </div>

							          <div class="col-12 col-sm-6 col-md-4">
							            <div class="info-box">
							              <span class="info-box-icon bg-info elevation-1"><i class="typcn typcn-mortar-board"></i></span>
							              <div class="info-box-content">
							                <span class="info-box-text">Formation</span>
							                <span class="info-box-number" id="foAct"></span>
							              </div>
							            </div>
							          </div>

							          <div class="col-12 col-sm-6 col-md-3">
							            <div class="info-box">
							              <span class="info-box-icon bg-info elevation-1"><i class="typcn typcn-group"></i></span>
							              <div class="info-box-content">
							                <span class="info-box-text">Sponsors</span>
							                <span class="info-box-number" id="sponsAct"></span>
							              </div>
							            </div>
							          </div>

							          <div class="col-12 col-sm-6 col-md-3">
							            <div class="info-box">
							              <span class="info-box-icon bg-info elevation-1"><i class="typcn typcn-group"></i></span>
							              <div class="info-box-content">
							                <span class="info-box-text">Partenaire</span>
							                <span class="info-box-number" id="PartAct"></span>
							              </div>
							            </div>
							          </div>

							        </div>
								</div>
					</section>


						<section class="content">
					     		<div class="container-fluid">
					            	<div class="card">
						              <div class="card-header border-transparent">
						                <h3 class="card-title">Commande</h3>
						                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#actEffeC" style="float: right;">Voir</button>
						              </div>

						              <div class="card-body p-0">
						                <div class="table-responsive collapse" id="actEffeC">
						                  <table class="table m-0">
						                    <thead>
						                    <tr>
						                      <th>Admin</th>
						                      <th>Type</th>
						                      <th>Action</th>
						                      <th>Date | Heure</th>
						                    </tr>
						                    </thead>
						                    <tbody id="tbodyActCommande"></tbody>
						                  </table>
						                </div>

						              </div>
						            </div>
							</div>
						</section>
					 
					 <section class="content">
					     		<div class="container-fluid">
					   
					            <div class="card">
					              <div class="card-header border-transparent">
					                <h3 class="card-title">Action effectué</h3>
					                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#actEffe" style="float: right;">Voir</button>
					              </div>

					              <div class="card-body p-0">
					                <div class="table-responsive collapse" id="actEffe">
					                  <table class="table m-0">
					                    <thead>
					                    <tr>
					                      <th>Admin</th>
					                      <th>Type</th>
					                      <th>Action</th>
					                      <th>Date | Heure</th>
					                    </tr>
					                    </thead>
					                    <tbody id="tbodyAct"></tbody>
					                  </table>
					                </div>

					              </div>
					            </div>
						</div>
					</section>
				</span>	 
				<!-- /activite -->
<!-- LIGNE*********************************************************************************************** -->


<!-- LIGNE*********************************************************************************************** -->
				<!-- commande -->
				<?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL) {  ?>	    
					<span style="display: none;" id="commande">
						
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0"><i class="typcn typcn-shopping-bag"></i> Commandes</h1>
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active">Commandes</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<section class="content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-5">
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Nouvelle Commande</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NN" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NN">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allC"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande livraison</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NC" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NC">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCL"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande conclus</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NV" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NV">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCV"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande declinée</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#ND" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="ND">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCD"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande annulée</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NA" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NA">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCA"></ul>
								              </div>
										</div>
									</div>
									<div class="col">
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Détaille</h3>
								              </div>

								              <div class='card-body p-0' id="detailleCommande"></div><hr>
								              <div class='card-body p-0' id="detailleCommandeFacture" style="display: none;"></div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</span>
				<?php }else{?>
					<span style="display: none;" id="commande">
						<div class="container" style="text-align: center;">
							<h3 align="center">Commande : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small><br>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?> 
				<!-- /commande -->

				<!-- commande -->
				<?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL) {  ?>	    
					<span style="display: none;" id="commandeR">
						
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0 text-success"><i class="typcn typcn-shopping-bag"></i> Commande Rapide</h1>
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active text-success">Commandes</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<section class="content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-5">
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Nouvelle Commande</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NNRR" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NNRR">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCRR"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande livraison</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NCRR" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NCRR">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCLRR"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande conclus</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NVRR" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NVRR">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCVRR"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande declinée</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NDRR" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NDRR">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCDRR"></ul>
								              </div>
										</div>
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Commande annulée</h3>
								                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#NARR" style="float: right;">Voir</button>
								              </div>

								              <div class="card-body p-0 collapse" id="NARR">
								                <ul class="products-list product-list-in-card pl-2 pr-2" id="allCARR"></ul>
								              </div>
										</div>
									</div>
									<div class="col">
										<div class="card">
								              <div class="card-header">
								                <h3 class="card-title">Détaille</h3>
								              </div>

								              <div class='card-body p-0' id="detailleCommandeR"></div><hr>
								              <div class='card-body p-0' id="detailleCommandeFactureR" style="display: none;"></div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</span>
				<?php }else{?>
					<span style="display: none;" id="commandeR">
						<div class="container" style="text-align: center;">
							<h3 align="center">Commande : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small><br>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?> 
				<!-- /commande -->
<!-- LIGNE*********************************************************************************************** -->


<!-- LIGNE*********************************************************************************************** -->
				<!-- sponsors -->
				<?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL) {  ?>	    
					<span style="display: none;" id="sponsors">
						
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0"><i class="typcn typcn-group"></i> Sponsors et partenaires</h1>
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active">Sponsors</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="row">
							<div class="col-sm-5">
								<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Sponsors
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#SponsGo" style="float: right;">Ajouter</button>
									          </div>
									          <form class="collapse" enctype="multipart/form-data" action="controller/sponsors/controller.sponsors.php" target="ajoutSpons" method="POST" id="SponsGo">
										          <div class="card-body">
										          	<div class="row">
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Nom</label>
										          				<input type="text" name="nomSpons" class="form-control" placeholder="Nom..." required>
										          				<input type="text" name="idAdmin" value="<?php echo $id_admin; ?>" class="form-control" hidden>
										          			</div>
										          		</div>
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Contact</label>
										          				<input type="tel" name="contactSpons" class="form-control" placeholder="Contact...">
										          			</div>
										          		</div>
										          	</div>
										          	<div class="row">
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Province</label>
										          				<select class="form-control" name="provinceSpons" required>
							                                        <option value="Antananarivo">Antananarivo</option>
							                                        <option value="Antsiranana">Antsiranana</option>
							                                        <option value="Fianarantsoa">Fianarantsoa</option>
							                                        <option value="Mahajanga">Mahajanga</option>
							                                        <option value="Toamasina">Toamasina</option>
							                                        <option value="Toliara">Toliara</option>
							                                    </select>
										          			</div>
										          		</div>
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Adresse</label>
										          				<input type="tel" name="adresseSpons" class="form-control" placeholder="Adresse...">
										          			</div>
										          		</div>
										          	</div>
										          	<div class="row">
										          		<div class="col">
										          			<label>Logo</label>
										          			<div class="form-group">
										          				<input type="file" id="logoSpons" name="logoSpons" class="form-control inputfile" required onchange="CheckImage(this,'envoieSpons','logoEn');">
										          				<label for="logoSpons" style="width: 100%;"><small class="btn btn-primary" style="width: 100%;"><i class="typcn typcn-image-outline"></i></small></label>
										          			</div>
														    <img src="content/data/image/logo/logo.png" width="100" height="100" id="logoEn" style="display: none;"><br>
										          		</div>
										          	</div>
										          	<button class="btn btn-primary" type="submit" name="envoieSpons" id="envoieSpons">Ajouter</button><br>
										          	<small id="NotifSponsAdd"></small>
										          </div>
									          </form>			          
									        </div>
								    	</div>
								</section>

								<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Partenaire
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#PartGo" style="float: right;">Ajouter</button>
									          </div>
									          <form class="collapse" enctype="multipart/form-data" action="controller/partenaire/controller.partenaire.php" target="ajoutSpons" method="POST" id="PartGo">
										          <div class="card-body">
										          	<div class="row">
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Nom</label>
										          				<input type="text" name="nomPart" class="form-control" placeholder="Nom..." required>
										          				<input type="text" name="idAdmin" value="<?php echo $id_admin; ?>" class="form-control" hidden>
										          			</div>
										          		</div>
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Contact</label>
										          				<input type="tel" name="contactPart" class="form-control" placeholder="Contact...">
										          			</div>
										          		</div>
										          	</div>
										          	<div class="row">
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Province</label>
										          				<select class="form-control" name="provincePart" required>
							                                        <option value="Antananarivo">Antananarivo</option>
							                                        <option value="Antsiranana">Antsiranana</option>
							                                        <option value="Fianarantsoa">Fianarantsoa</option>
							                                        <option value="Mahajanga">Mahajanga</option>
							                                        <option value="Toamasina">Toamasina</option>
							                                        <option value="Toliara">Toliara</option>
							                                    </select>
										          			</div>
										          		</div>
										          		<div class="col">
										          			<div class="form-group">
										          				<label>Adresse</label>
										          				<input type="tel" name="adressePart" class="form-control" placeholder="Adresse...">
										          			</div>
										          		</div>
										          	</div>
										          	<div class="row">
										          		<div class="col">
										          			<label>Logo</label>
										          			<div class="form-group">
										          				<input type="file" id="logoPart" name="logoParta" class="form-control inputfile" required onchange="CheckImage(this,'envoiePart','logoEnPart');">
										          				<label for="logoPart" style="width: 100%;"><small class="btn btn-primary" style="width: 100%;"><i class="typcn typcn-image-outline"></i></small></label>
										          			</div>
														    <img src="content/data/image/logo/logo.png" width="100" height="100" id="logoEnPart" style="display: none;"><br>
										          		</div>
										          	</div>
										          	<button class="btn btn-primary" type="submit" name="envoiePart" id="envoiePart">Ajouter</button><br>
										          	<small id="NotifparteAdd"></small>
										          </div>
									          </form>			          
									        </div>
								    	</div>
								</section>
							</div>
							<div class="col-sm-7">
								<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Liste des sponsors
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#marqueListe" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body marqueListe collapse" id="marqueListe"></div>			          
									        </div>
								    	</div>
								</section>
								<section class="content" style="width: 100%;">
								      	<div class="container-fluid">
									        <div class="card  color-palette-box">
									          <div class="card-header">
									            <h3 class="card-title">
									              Liste des partenaires
									            </h3>
						                  		<button class="btn btn-sm btn-primary" data-toggle="collapse" href="#marqueListeP" style="float: right;">Voir</button>
									          </div>
									          <div class="card-body marqueListe collapse" id="marqueListeP"></div>			          
									        </div>
								    	</div>
								</section>
							</div>
						</div>

						<iframe id="ajoutSpons" name="ajoutSpons" style="visibility: hidden;display: none;"></iframe>
					</span>
				<?php }else{?>
					<span style="display: none;" id="sponsors">
						<div class="container" style="text-align: center;">
							<h3 align="center">Formation : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?>
				<!-- /sponsors -->
<!-- LIGNE*********************************************************************************************** -->



<!-- LIGNE*********************************************************************************************** -->
				<!-- donne -->
				<?php if ($donneAdmin['poste_admin']!="" && $donneAdmin['poste_admin']!=NULL) {  ?>	    
					<span style="display: none;" id="donne">
						
						<div class="content-header">
						  <div class="container-fluid">
						    <div class="row mb-2">
						      <div class="col-sm-6">
						        <h1 class="m-0"><i class="typcn typcn-device-tablet"></i> Coordonnées du Site</h1>
						      </div>
						      <div class="col-sm-6">
						        <ol class="breadcrumb float-sm-right">
						            <li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
						              <li class="breadcrumb-item active">Site</li>
						          </ol>
						      </div>
						    </div>
						  </div>
						  <hr>
						</div>

						<section class="content">
						    <div class="container">
						        <div class="card color-palette-box">
						                <div class="card-header">
						                  <h3 class="card-title">
						                    Téléphone
						                  </h3>
						                  <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#telCo" style="float: right;">Voir</button>
						                </div>
						                <div class="card-body">
						                      <div class="row collapse" id="telCo">
						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><img src="content/data/image/airtel.ico" width="160" height="80"> <br><u><small id="afficheTel3"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="telaJour3" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="Modif('telephone3','telaJour3');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('tel_sur3')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><img src="content/data/image/orange.png" width="80" height="80"> <br><u><small id="afficheTel2"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="telaJour2" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="Modif('telephone2','telaJour2');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('tel_sur2')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><img src="content/data/image/telma.ico" height="80" width="80"> <br><u><small id="afficheTel"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="telaJour" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="Modif('telephone','telaJour');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('tel_sur')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                         <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><img src="content/data/image/Autre.png" height="80" width="140"> <br><u><small id="afficheTelAnother"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="telaJourAnother" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="Modif('telephoneAnother','telaJourAnother');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('autre_tel')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>
						                      </div>
						                </div>
						        </div>
						    </div>
						</section>

						<section class="content">
						  <div class="container-fluid">
						    <div class="card color-palette-box">
						      <div class="card-header">
						        <h3 class="card-title">
						          Email
						        </h3>
						        <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#MailCo" style="float: right;">Voir</button>
						      </div>
						      <div class="card-body">
						        <div class="row collapse" id="MailCo">
						              <div class="col-12 col-sm-6 col-md-3">
						                <div class="info-box mb-3">
						                  <div class="info-box-content">
						                    <span style="text-align: center;">Email <br><u><small id="afficheMail">email@email.com</small></u><hr></span>
						                    <span class="info-box-text"><input type="text" id="mailaJour" class="form-control" placeholder="Mettre à jour"></span>
						                    <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="Modif('email','mailaJour');">Mettre à jour</button></span>
						                    <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('email_sur')">Effacer</button></span>
						                  </div>
						                </div>
						              </div>
						        </div>
						      </div>
						    </div>
						  </div>
						</section>


						<!-- <section class="content">
						  <div class="container-fluid">
						    <div class="card color-palette-box">
						      <div class="card-header">
						        <h3 class="card-title">
						          Date arrivage et promotion
						        </h3>
						        <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#DateCo" style="float: right;">Voir</button>
						      </div>
						      <div class="card-body">
						        <div class="row collapse" id="DateCo">
						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box mb-3">
						                            <div class="info-box-content">
						                                <span style="text-align: center;">Date nouveau arrivage <br><u><small id="afficheArrivage">Dernier date : 04/07/15</small></u><hr></span>
						                                <span class="info-box-text"><input type="date" id="arriveaJour" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="Modif('arrivage','arriveaJour');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('newArrivage_sur')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box mb-3">
						                            <div class="info-box-content">
						                                <span style="text-align: center;">Date promotion <br><u><small id="afficheProm">Dernier date : 04/07/15</small></u><hr></span>
						                                <span class="info-box-text"><input type="date" id="promaJour" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="Modif('promotion','promaJour');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('newProm_sur')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>
						        </div>
						      </div>
						    </div>
						  </div>
						</section> -->

						<section class="content">
						    <div class="container-fluid">
						        <div class="card color-palette-box">
						                <div class="card-header">
						                  <h3 class="card-title">
						                    Réseau sociaux
						                  </h3>
						                  <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#RSCo" style="float: right;">Voir</button>
						                </div>
						                <div class="card-body">
						                     <div class="row collapse" id="RSCo">
						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><i class="typcn typcn-social-facebook"></i> Facebook <br><u><small id="afficheRF"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="fbaJour" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="ModifReseau('facebook','fbaJour');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('fbSur')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box mb-3">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><i class="typcn typcn-social-twitter"></i> Twitter <br><u><small id="afficheRT"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="twitteaJour" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="ModifReseau('twitter','twitteaJour');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('twiSur')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box mb-3">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><i class="typcn typcn-social-youtube"></i> Youtube <br><u><small id="afficheRY"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="YouaJour" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="ModifReseau('youtube','YouaJour');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('youSur')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                        <div class="col-12 col-sm-6 col-md-3">
						                          <div class="info-box mb-3">
						                            <div class="info-box-content">
						                                <span style="text-align: center;"><i class="typcn typcn-social-instagram"></i> Instagram <br><u><small id="afficheRI"></small></u><hr></span>
						                                <span class="info-box-text"><input type="text" id="InsaJour" class="form-control" placeholder="Mettre à jour"></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="ModifReseau('instagram','InsaJour');">Mettre à jour</button></span>
						                                <span class="info-box-number"><button class="btn btn-primary" style="width: 100%;" onclick="EffaceDonneSur('instaSur')">Effacer</button></span>
						                            </div>
						                          </div>
						                        </div>

						                      </div>
						                </div>
						        </div>
						    </div>
						</section>

					</span>
				<?php }else{?>
					<span style="display: none;" id="donne">
						<div class="container" style="text-align: center;">
							<h3 align="center">Formation : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?>
				<!-- /donne -->
<!-- LIGNE*********************************************************************************************** -->
		    


<!-- LIGNE*********************************************************************************************** -->
				<span style="display: none;" id="adminC">
					<?php if ($donneAdmin['poste_admin']=="INFORMATIQUE") { ?>
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0"><i class="typcn typcn-edit"></i> Administration</h1>
										<!-- <label onclick="AllAdminRecup();" style="cursor: pointer;"><i class="typcn typcn-arrow-sync"></i></label> -->
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active">Administration</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<section class="content">
									      	<div class="container-fluid">
										        <div class="card color-palette-box">
											          <div class="card-header">
											          	<h3 class="card-title">Ajouter une nouvelle personne</h3>
											            <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#addNewUser" style="float: right;">Ajout</button>
											          </div>
											          <div id="addNewUser" class="card-body collapse" style="overflow-x: hidden;">
									    				<form id="addAdmin" action="controller/admin/controller.admin.php" target="ajoutUser" method="POST">
												          	<div class="row">
												          		<div class="col">
												          			<div class="form-group">
																	    <label>Nom</label>
																	    <input type="text" name="nomUser" id="nomUser" class="form-control" placeholder="Entrer le nom" required>
																    </div>
												          		</div>
												          		<div class="col">
												          			<div class="form-group">
																	    <label>Prénom</label>
																	    <input type="text" name="prenomUser" id="prenomUser" class="form-control" placeholder="Entrer le prenom" required>
																    </div>
												          		</div>
												          	</div>
												          	<div class="col">
												          		<div class="form-group">
												          			<label>Contact</label>
												          			<input type="text" name="contactUser" class="form-control" placeholder="Entrer le contact" required>
												          		</div>
												          	</div>
												          	<div class="col">
												          		<div class="form-group">
																	    <label>Poste</label>
																	    <select class="form-control" name="posteUser" id="posteUser">
																			<option></option>
																			<option value="MA">MANAGEMENT DES AFFAIRES</option>
																			<option value="INFO">INFORMATIQUE</option>
																			<option value="GESS">GESTION DES STOCKS</option>
																			<option value="COM">COMMUNICATION</option>
																			<option value="FI">FINANCE</option>
																			<option value="MAR">MARKETING</option>
																		</select>
																</div>
												          	</div>
												          	<div class="col">
												          		<small class="btn btn-primary" onclick="GenerateCo();">Générer le code de connexion par défaut</small>
												          	</div><br>
												          	<span id="genereCo" style="display: none;">
													          	<div class="col">
													          		<label>Connexion</label><hr>
														          	<div class="row">
														          		<div class="col">
														          			<label>Pseudo</label>
														          			<input type="text" name="pseudoUser" id="pseudoUser" class="form-control" id="pseudoUser">
														          		</div>
														          		<div class="col">
														          			<label>Mot de passe</label>
														          			<input type="text" name="mdpUser" id="mdpUser" class="form-control" id="mdpUser">
														          		</div>
														          	</div><br>
													          	</div>
													          	<div class="col">
													          		<button class="btn btn-primary" type="submit" name="addAdmin" onclick="DisplayBlock('addRes')">Ajouter</button><br>
													          		<small id="addRes" style="display: none;">Ajout en cours</small>
													          	</div>
												          	</span>
								    					</form>
											          </div>		          
										        </div>
									    	</div>
								</section>
								<section class="content">
								      	<div class="container-fluid">
									        <div class="card color-palette-box">
										          <div class="card-header">
										            <h3 class="card-title">Liste des administrations actif</h3>
										            <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="collapse" href="#listeAdmin">Voir</button>
										          </div>
										          <div class="card-body collapse" id="listeAdmin"></div>		          
									        </div>
								    	</div>
								</section>
								<section class="content">
								      	<div class="container-fluid">
									        <div class="card color-palette-box">
										          <div class="card-header">
										            <h3 class="card-title">Liste des administrations licencié</h3>
										            <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="collapse" href="#listeAdminLicencie">Voir</button>
										          </div>
										          <div class="card-body collapse" id="listeAdminLicencie"></div>		          
									        </div>
								    	</div>
								</section>
							</div>
							<div class="col-sm-6">
								<section class="content" id="afficheAdmin">
								      	<div class="container-fluid">
									        <div class="card color-palette-box">
										          <div class="card-header">
										            <h3 class="card-title">
										              Détaille
										            </h3>
										          </div>
										          <div class="card-body" id="detaileAdmin">
										          </div>
										    </div>
										</div>
								</section>
							</div>
						</div>
						<iframe id="ajoutProduit" name="ajoutUser" style="visibility: hidden;display: none;"></iframe>
					<?php } ?>
				</span>
<!-- LIGNE*********************************************************************************************** -->


<!-- LIGNE*********************************************************************************************** -->
				<?php if ($donneAdmin['poste_admin']=="INFORMATIQUE" && $donneAdmin['poste_admin']=="INFORMATIQUE") {  ?>	    
					<span style="display: none;" id="client">
						<div class="content-header">
							<div class="container-fluid">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h1 class="m-0"><i class="typcn typcn-group"></i> Listes des clients</h1>
									</div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
									    	<li class="breadcrumb-item"><a><?php echo $donneAdmin['nom_admin']; ?></a></li>
									        <li class="breadcrumb-item active">Clients</li>
									    </ol>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="modal fade" id="MessageClients">
							  <div class="modal-dialog modal-lg">
							    <div class="modal-content">
								    <div class="modal-header">
								        <h4 class="modal-title">Client <i class="typcn typcn-group"></i></h4>
								        <button type="button" class="close" data-dismiss="modal">×</button>
								    </div>
								    <div class="modal-body" id="messageForClients"></div>
							    </div>
							  </div>
						</div>

						<section class="content">
							<div class="container-fluid">
								<div class="col">
									<div class="card">
										    <div class="card-header">
										        <h3 class="card-title">Rechercher</h3>
										    </div>
										    <div class="card-body">
										    	<div class="row">
										    		<div class="col">
										    			<div class="form-group">
												    		<label>Numéro de compte | Nom | Prenom</label>
												        	<input type="text" id="rechercheCliC" placeholder="Recherche Client" class="form-control">
												        </div>
												        	<button class="btn btn-primary" style="width: 100%;" onclick="RechercheCompte('rechercheCliC');">Rechercher</button>
										    		</div>
										    	</div>
										    </div>
										    <div class="card-body p-0" id="RechrC"></div>
									</div>
								</div>
							</div>
						</section>


						<section class="content">
							<div class="container-fluid">
								<div class="col">
										<div class="card">
										              <div class="card-header">
										                <h3 class="card-title">Liste des clients</h3>
										                <button class="btn btn-sm btn-primary" data-toggle="collapse" href="#listeC" style="float: right;" onclick="RecupAllClient()">Voir</button>
										              </div>

										              <div class="card-body p-0 collapse" id="listeC">

										              </div>
										</div>
									<!-- <div class="col">
									</div> -->
										<div class="card">
										              <div class="card-header">
										                <h3 class="card-title">Détaille</h3>
										              </div>

										              <div class='card-body p-0' id="detailleClient"></div><hr>
										              <div class='card-body p-0' id="detailleClientFact" style="display: none;"></div>
										</div>
									<!-- <div class="col">
									</div> -->
								</div>
							</div>
						</section>
					</span>
				<?php }else{?>
					<span style="display: none;" id="client">
						<div class="container" style="text-align: center;">
							<h3 align="center">Client : Poste non requis</h3>
							<small>Seule les personnes agrées à ce poste ont le droit d'y entrer</small><br>
							<small>Status de votre poste : <?= $donneAdmin['poste_admin'] ?></small>
						</div>
					</span>
				<?php } ?>  	    
<!-- LIGNE*********************************************************************************************** -->
			</div>
	</div>
    <!-- /2CONTAIN -->

		


<!-- LIGNE*********************************************************************************************** -->
	<!-- 2CONTAIN -->
	<script src="content/assets/administrator/dist/jquery/jquery.min.js"></script>

	<script src="content/assets/administrator/dist/js/division/contain.js"></script>
	
	<script src="content/assets/administrator/plugins/jquery/jquery.min.js"></script>
	<script src="content/assets/administrator/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script>
	  $.widget.bridge('uibutton', $.ui.button)
	</script>
	<script src="content/assets/administrator/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="content/assets/administrator/dist/js/adminlte.js"></script>
	<script src="content/assets/administrator/dist/js/demo.js"></script>
	<script src="content/assets/administrator/dist/js/pages/dashboard.js"></script>
	<!-- /2CONTAIN -->
<!-- LIGNE*********************************************************************************************** -->

	<script src="content/assets/administrator/dist/jquery/jquery.min.js"></script>

<!-- LIGNE*********************************************************************************************** -->
	<!-- PRODUIT -->
	<script src="content/assets/administrator/dist/js/division/produit.js"></script>
	<!-- /PRODUIT -->
<!-- LIGNE*********************************************************************************************** -->


<!-- LIGNE*********************************************************************************************** -->
	<!-- SERVICE -->
	<script src="content/assets/administrator/dist/js/division/service.js"></script>
	<!-- /SERVICE -->

<!-- LIGNE*********************************************************************************************** -->
	<!-- FORMATION -->
	<script src="content/assets/administrator/dist/js/division/formation.js"></script>
	<!-- /FORMATION -->


<!-- LIGNE*********************************************************************************************** -->
	<!-- MESSAGE -->
	<script src="content/assets/administrator/dist/js/division/message.js"></script>
	
	<!-- /MESSAGE -->
<!-- LIGNE*********************************************************************************************** -->


<!-- LIGNE*********************************************************************************************** -->
	<!-- ACTIVITE -->
	<script src="content/assets/administrator/dist/js/division/activite.js"></script>
	<!-- /ACTIVITE -->
<!-- LIGNE*********************************************************************************************** -->



<!-- LIGNE*********************************************************************************************** -->
	<!-- COMMANDE -->
	<!-- PDF -->
	<script src="content/assets/administrator/dist/js/division/commande.js"></script>	
	<script src="content/assets/administrator/dist/js/division/commandeR.js"></script>	
	<!-- /COMMANDE -->
<!-- LIGNE*********************************************************************************************** -->



<!-- LIGNE*********************************************************************************************** -->
	<!-- SPONSORS -->
	<script src="content/assets/administrator/dist/js/division/sponsors.js"></script>	
	<!-- /SPONSORS -->
<!-- LIGNE*********************************************************************************************** -->
  



<!-- LIGNE*********************************************************************************************** -->
	<!-- DONNE -->
	<script src="content/assets/administrator/dist/js/division/donne.js"></script>	
	<!-- /DONNE -->
<!-- LIGNE*********************************************************************************************** -->
    

<!-- LIGNE*********************************************************************************************** -->
	<!-- ADMINC -->
	<script src="content/assets/administrator/dist/js/division/adminC.js"></script>	
	<!-- /ADMINC -->
<!-- LIGNE*********************************************************************************************** -->


<!-- LIGNE*********************************************************************************************** -->
	<!-- CLIENT -->
	<!-- PDF -->
	<script src="content/assets/administrator/dist/js/division/client.js"></script>	
	<!-- /CLIENT -->
<!-- LIGNE*********************************************************************************************** -->

	<script src="content/assets/administrator/dist/pdf/jszip.min.js"></script>
	<script src="content/assets/administrator/dist/pdf/kendo.all.min.js"></script>
    <script src="content/assets/administrator/dist/js/wow.min.js"></script> 
    <script src="content/assets/administrator/dist/js/loading.js"></script>
</body>
</html>