<?php 
	/**
	 * 
	 */
	class ActivityAdmin
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}
		public function GetAllActivite()
		{
			$sql = "SELECT * FROM activite INNER JOIN administration ON activite.idAdminAct=administration.id_admin WHERE activite.TypeAct!='COMMANDE' ORDER BY activite.id_activite DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllActiviteCo()
		{
			$sql = "SELECT * FROM activite INNER JOIN administration ON activite.idAdminAct=administration.id_admin WHERE activite.TypeAct='COMMANDE' ORDER BY activite.id_activite DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function AddActivite($idAdminAct,$TypeAct,$DescAct)
		{
			$descriptionEnvoie = htmlentities($DescAct, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO activite(idAdminAct,TypeAct,DescAct,heureAct,dateAct) VALUES('$idAdminAct','$TypeAct','$descriptionEnvoie',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function GetCount($name)
		{
			$sql = "SELECT COUNT(id_pub) AS nombre FROM publication WHERE type_pub='$name'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetCountSpons()
		{
			$sql = "SELECT COUNT(id_spons) AS nombre FROM sponsors";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetCountPat()
		{
			$sql = "SELECT COUNT(id_partenaire) AS nombre FROM partenaire";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
	}

 ?>