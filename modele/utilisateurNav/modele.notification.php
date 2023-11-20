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
		public function GetNotifCommande()
		{
			$sql = "SELECT * FROM utilisateurnotifcommande INNER JOIN utilisateur ON utilisateurnotifcommande.idUserNCUS=utilisateur.idUser ORDER BY utilisateurnotifcommande.idNCUS DESC LIMIT 4";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetNotifCommandeCount($id)
		{
			$sql = "SELECT COUNT(idNCUS) AS nombre FROM utilisateurnotifcommande WHERE statusNotifNCUS='ENVOIE'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function SeeCommande($idC)
		{
			$sql = "UPDATE utilisateurnotifcommande SET statusNotifNCUS='VU' WHERE idNumNCUS='$idC'";
			$this->bdd->exec($sql);
		}
	}

 ?>