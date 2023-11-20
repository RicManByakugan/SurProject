<?php 
	/**
	 * 
	 */
	class ModeleNotificationUserNav
	{

		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddNotifCo($idUserNotif,$idCoNotifL,$descNotifU)
		{
			$textEnvoie = htmlentities($descNotifU, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO utlilisateurusernotification(idUserNotifNC,idCoNotifLNC,descNotifUNC,statusNUNC,dateNUNC,heureNUNC) VALUES('$idUserNotif','$idCoNotifL','$textEnvoie','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function AddNotifPub($idUserNotif,$idPubNotifL,$descNotifU)
		{
			$textEnvoie = htmlentities($descNotifU, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO utlilisateurusernotification(idUserNotifNC,idPubNotifLNC,descNotifUNC,statusNUNC,dateNUNC,heureNUNC) VALUES('$idUserNotif','$idPubNotifL','$textEnvoie','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function AddNotifNothing($idUserNotif,$descNotifU)
		{
			$textEnvoie = htmlentities($descNotifU, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO utlilisateurusernotification(idUserNotifNC,descNotifUNCNC,statusNUNC,dateNUNC,heureNUNC) VALUES('$idUserNotif','$textEnvoie','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function GetAllNotifUserCo($idUserNotif)
		{
			$sql = "SELECT * FROM utlilisateurusernotification WHERE idCoNotifLNC IS NOT NULL AND idUserNotifNC='$idUserNotif' ORDER BY idUNotifNC DESC LIMIT 3";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllNotifUserCount($idUserNotif)
		{
			$sql = "SELECT COUNT(idUNotifNC) AS nombre FROM utlilisateurusernotification WHERE idUserNotifNC='$idUserNotif' AND statusNUNC='ENVOIE'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetAllNotifUserPub($idUserNotif)
		{
			$sql = "SELECT * FROM utlilisateurusernotification WHERE idPubNotifLNC IS NOT NULL AND idUserNotifNC='$idUserNotif' ORDER BY idUNotifNC DESC LIMIT 3";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetAllNotifUserNothing($idUserNotif)
		{
			$sql = "SELECT * FROM utlilisateurusernotification WHERE idUserNotifNC='$idUserNotif' AND idPubNotifLNC IS NULL AND idCoNotifLNC IS NULL ORDER BY idUNotifNC DESC LIMIT 1";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function UserSeeNotif($idUser)
		{
			$sql = "UPDATE utlilisateurusernotification SET statusNUNC='SEE' WHERE idUserNotifNC='$idUser'";
			$this->bdd->exec($sql);
		}


	}

 ?>