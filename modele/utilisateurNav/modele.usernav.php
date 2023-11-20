<?php 

	class ModeleUserNav
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddUserNav($UserAgent,$Platform,$Product)
		{
			$UserAgentEnvoie = htmlentities($UserAgent, ENT_QUOTES, "UTF-8");
			$PlatformEnvoie = htmlentities($Platform, ENT_QUOTES, "UTF-8");
			$ProductEnvoie = htmlentities($Product, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO utlisateurnav(UserAgent,Platform,Product,DatedAt,TimeAt) VALUES('$UserAgent','$Platform','$Product',NOW(),NOW())";
			$this->bdd->exec($sql);
			return "ok";
		}
		// PANIER
		public function AddPanierNav($idUserPanier,$idPubPanier,$QtPanier)
		{
			$sqlVeri = "SELECT * FROM utlisateurnavpanier WHERE idUserNPa='$idUserPanier' AND idPubNPa='$idPubPanier' AND statusPanierNPa='ATTENTE'";
			$recup = $this->bdd->query($sqlVeri);
			$donne = $recup->fetch();
			if ($donne) {
				return "ko";				
			}else{
				$sql = "INSERT INTO utlisateurnavpanier(idUserNPa,idPubNPa,QtPanierNPa,statusPanierNPa, 	DateNPa,HeureNPa) VALUES('$idUserPanier','$idPubPanier','$QtPanier','ATTENTE',NOW(),NOW())";
				$this->bdd->exec($sql);
				return "ok";
			}
		}
		public function AccepteCoAttente($idUser)
		{
			$sql = "UPDATE utlisateurnavpanier SET statusPanierNPa='VALIDER' WHERE idUserNPa='$idUser'";
			$this->bdd->exec($sql);
		}

		public function VidePanierUserNav($idUserNav)
		{
			$sql = "DELETE FROM utlisateurnavpanier WHERE idUserNPa='$idUserNav'";
			$this->bdd->exec($sql);
		}

		public function SupPanierPan($idunPanier)
		{
			$sql = "DELETE FROM utlisateurnavpanier WHERE idunPanier='$idunPanier'";
				$this->bdd->exec($sql);
		}

		public function UpdateQtePubNav($idPanier,$Qte)
		{
			$sql = "UPDATE utlisateurnavpanier SET QtPanierNPa='$Qte' WHERE idunPanier='$idPanier'";
			$this->bdd->exec($sql);
		}

		public function GetUserNav($UserAgent,$Platform,$Product)
		{
			$sql = "SELECT * FROM utlisateurnav WHERE UserAgent='$UserAgent' AND Platform='$Platform' AND Product='$Product'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function RecupPanierUserNav($idUserNav)
		{
			$sql = "SELECT * FROM utlisateurnavpanier INNER JOIN publication ON utlisateurnavpanier.idPubNPa=publication.id_pub WHERE utlisateurnavpanier.idUserNPa='$idUserNav' AND utlisateurnavpanier.statusPanierNPa='ATTENTE' ORDER BY utlisateurnavpanier.idunPanier DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		// COMMANDE
		public function AddCommande($idComCoUser,$idComUser,$nomUser,$prenomUser,$idComPub,$QtCom,$opCom,$numCom,$adreCom,$proCom)
		{
			$sql = "INSERT INTO utlisateurnavcommande(idCoNamerNCa,idUserNCa,nomNCa,prenomNCa,idPubNCa,QtCNCa,opNCa,numNCa,adreNCa,proNCa,statusNCa,DateNCa,HeureNCa) VALUES('$idComCoUser','$idComUser','$nomUser','$prenomUser','$idComPub','$QtCom','$opCom','$numCom','$adreCom','$proCom','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function AddNotifCommande($idNumNC,$idUserNC,$descNotifNC)
		{
			$sql = "INSERT INTO utilisateurnotifcommande(idNumNCUS,idUserNCUS,descNotifNCUS,statusNotifNCUS,dateNotifNCUS,heureNotifNCUS) VALUES('$idNumNC','$idUserNC','$descNotifNC','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
			
		}
		public function TestIC($idComCoUser)
		{
			$sqlVeri = "SELECT * FROM utlisateurnavcommande WHERE idCoNamerNCa='$idComCoUser'AND statusNCa='ENVOIE'";
			$recup = $this->bdd->query($sqlVeri);
			$donne = $recup->fetch();
			if ($donne) {
				return "ko";				
			}else{
				return "ok";
			}
		}
		public function RecupCommandeId($idUser)
		{
			$sql = "SELECT DISTINCT idCoNamerNCa,DateNCa,HeureNCa,statusNCa FROM utlisateurnavcommande WHERE utlisateurnavcommande.idUserNCa='$idUser' AND utlisateurnavcommande.statusNCa!='ANNULER' ORDER BY idComFaitNCa DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function RecupCommandeCoUser($idCo)
		{
			$sql = "SELECT * FROM utlisateurnavcommande INNER JOIN publication ON utlisateurnavcommande.idPubNCa=publication.id_pub WHERE utlisateurnavcommande.idCoNamerNCa='$idCo' ORDER BY utlisateurnavcommande.idComFaitNCa DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function AnnuleCommande($idComCoUser)
		{
			$sql = "UPDATE utlisateurnavcommande SET statusNCa='ANNULER' WHERE idCoNamerNCa='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}
		public function SupIDCommande($idComCoUser)
		{
			$sql = "DELETE FROM utlisateurnavcommande WHERE idCoNamerNCa='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}

		// NOTIFICATION
		public function GetCommandeNumCo($idNumco)
		{
			$sql = "SELECT DISTINCT idUserNCa FROM utlisateurnavcommande WHERE idCoNamerNCa ='$idNumco'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetPostById($id)
		{
			$sql = "SELECT * FROM publication WHERE id_pub='$id'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetAllNotifUserCountNav($idUserNotif)
		{
			$sql = "SELECT COUNT(idUNotifNC) AS nombre FROM utlilisateurusernotification WHERE idUserNotifNC='$idUserNotif' AND statusNUNC='ENVOIE'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function UserSeeNotif($idUser)
		{
			$sql = "UPDATE utlilisateurusernotification SET statusNUNC='SEE' WHERE idUserNotifNC='$idUser'";
			$this->bdd->exec($sql);
		}

		public function GetAllNotifUserCo($idUserNotif)
		{
			$sql = "SELECT * FROM utlilisateurusernotification WHERE idCoNotifLNC IS NOT NULL AND idUserNotifNC='$idUserNotif' ORDER BY idUNotifNC DESC LIMIT 2";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllNotifUserPub($idUserNotif)
		{
			$sql = "SELECT * FROM utlilisateurusernotification WHERE idPubNotifLNC IS NOT NULL AND idUserNotifNC='$idUserNotif' ORDER BY idUNotifNC DESC LIMIT 2";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllNotifUserNothing($idUserNotif)
		{
			$sql = "SELECT * FROM utlilisateurusernotification WHERE idUserNotifNC='$idUserNotif' AND idPubNotifLNC IS NULL AND idCoNotifLNC IS NULL ORDER BY idUNotifNC DESC LIMIT 1";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}




	}

 ?>