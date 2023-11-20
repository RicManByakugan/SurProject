<?php 
	/**
	 * 
	 */
	class ModeleNotification
	{

		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}


		public function AddNotif($idEnvoie,$idRecoit,$text,$type)
		{
			$textEnvoie = htmlentities($text, ENT_QUOTES, "UTF-8");

			if ($idRecoit==NULL) {
				$sql = "INSERT INTO notification(idAdminEnvoie,idAdminRecoit,descNotif,typeNotif,statusNotif,dateNotif,tempsNotif) VALUES('$idEnvoie',NULL,'$textEnvoie','$type','ENVOIE',NOW(),NOW())";
				$this->bdd->exec($sql);
			}else{
				$sql = "INSERT INTO notification(idAdminEnvoie,idAdminRecoit,descNotif,typeNotif,statusNotif,dateNotif,tempsNotif) VALUES('$idEnvoie','$idRecoit','$textEnvoie','$type','ENVOIE',NOW(),NOW())";
				$this->bdd->exec($sql);
			}
		}

		public function GetNotifUser($idRecoit)
		{
			$sql = "SELECT * FROM notification WHERE idAdminRecoit='$idRecoit' AND typeNotif!='MESSAGE DE GROUPE' ORDER BY id_notif AND typeNotif DESC LIMIT 4";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetNotifUserMessageG($idAmdin)
		{
			$sql = "SELECT * FROM notification INNER JOIN administration ON notification.idAdminEnvoie=administration.id_admin WHERE notification.idAdminEnvoie!='$idAmdin' AND typeNotif='MESSAGE DE GROUPE' AND idAdminRecoit IS NULL ORDER BY id_notif DESC LIMIT 4";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetNotifCount($id)
		{
			$sql = "SELECT COUNT(id_notif) AS nombre FROM notification WHERE idAdminRecoit='$id' AND statusNotif='ENVOIE' AND typeNotif!='MESSAGE DE GROUPE'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			return $donne;
		}
		public function GetNotifMessageCount($id)
		{
			$sql = "SELECT COUNT(id_notif) AS nombre FROM notification WHERE idAdminEnvoie!='$id' AND typeNotif='MESSAGE DE GROUPE' AND idAdminRecoit IS NULL";
			// $sql = "SELECT COUNT(id_notif) AS nombre FROM notification WHERE idAdminEnvoie!='$id' AND statusNotif='ENVOIE' AND typeNotif='MESSAGE DE GROUPE' AND idAdminRecoit IS NULL";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			return $donne;
		}

		public function NotifChangeS($idNotif)
		{
			$sql = "UPDATE notification SET statusNotif='VU' WHERE id_notif='$idNotif'";
			$this->bdd->exec($sql);
		}

		// ------------------------------------------------------------------------------------
		public function AddNotifCommande($idNumNC,$idUserNC,$descNotifNC)
		{
			$sql = "INSERT INTO notifcommande(idNumNC,idUserNC,descNotifNC,statusNotifNC,dateNotifNC,heureNotifNC) VALUES('$idNumNC','$idUserNC','$descNotifNC','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
			
		}
		public function GetNotifCommande()
		{
			$sql = "SELECT * FROM notifcommande INNER JOIN utilisateur ON notifcommande.idUserNC=utilisateur.idUser ORDER BY notifcommande.idNC DESC LIMIT 4";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetNotifCommandeCount($id)
		{
			$sql = "SELECT COUNT(idNC) AS nombre FROM notifcommande WHERE statusNotifNC='ENVOIE'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function SeeCommande($idC)
		{
			$sql = "UPDATE notifcommande SET statusNotifNC='VU' WHERE idNumNC='$idC'";
			$this->bdd->exec($sql);
		}



	}

 ?>