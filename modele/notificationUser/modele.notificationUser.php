<?php 
	/**
	 * 
	 */
	class ModeleNotificationUser
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
			$sql = "INSERT INTO usernotification(idUserNotif,idCoNotifL,descNotifU,statusNU,dateNU,heureNU) VALUES('$idUserNotif','$idCoNotifL','$textEnvoie','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function AddNotifPub($idUserNotif,$idPubNotifL,$descNotifU)
		{
			$textEnvoie = htmlentities($descNotifU, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO usernotification(idUserNotif,idPubNotifL,descNotifU,statusNU,dateNU,heureNU) VALUES('$idUserNotif','$idPubNotifL','$textEnvoie','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function AddNotifNothing($idUserNotif,$descNotifU)
		{
			$textEnvoie = htmlentities($descNotifU, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO usernotification(idUserNotif,descNotifU,statusNU,dateNU,heureNU) VALUES('$idUserNotif','$textEnvoie','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function GetAllNotifUserCo($idUserNotif)
		{
			$sql = "SELECT * FROM usernotification WHERE idCoNotifL IS NOT NULL AND idUserNotif='$idUserNotif' ORDER BY idUNotif DESC LIMIT 3";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllNotifUserCount($idUserNotif)
		{
			$sql = "SELECT COUNT(idUNotif) AS nombre FROM usernotification WHERE idUserNotif='$idUserNotif' AND statusNU='ENVOIE'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetAllNotifUserPub($idUserNotif)
		{
			$sql = "SELECT * FROM usernotification WHERE idPubNotifL IS NOT NULL AND idUserNotif='$idUserNotif' ORDER BY idUNotif DESC LIMIT 3";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetAllNotifUserNothing($idUserNotif)
		{
			$sql = "SELECT * FROM usernotification WHERE idUserNotif='$idUserNotif' AND idPubNotifL IS NULL AND idCoNotifL IS NULL ORDER BY idUNotif DESC LIMIT 1";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function UserSeeNotif($idUser)
		{
			$sql = "UPDATE usernotification SET statusNU='SEE' WHERE idUserNotif='$idUser'";
			$this->bdd->exec($sql);
		}


	}

 ?>