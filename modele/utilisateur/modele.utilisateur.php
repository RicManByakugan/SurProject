<?php 
	
	/**
	 * 
	 */
	class UtilisateurModele
	{
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}
		public function AddUser($nomUser,$prenomUser,$sexeUser,$contactUser,$emailUser,$mdpUser,$provinceUser)
		{
			$now = time();
			$codeUser = rand(10000,99999);
			$nomEnvoie = htmlentities($nomUser, ENT_QUOTES, "UTF-8");
			$prenomEnvoie = htmlentities($prenomUser, ENT_QUOTES, "UTF-8");
			$emailEnvoie = htmlentities($emailUser, ENT_QUOTES, "UTF-8");
			// Envoie Email
			// $msga = "Bonjour ".$nomUser." ".$prenomUser.", Voici votre code de confirmation : ".$codeUser;
			// mail($emailEnvoie, "COMPTE SUR" , $msga);
			$sql = "INSERT INTO utilisateur(nomUser,prenomUser,sexeUser,contactUser,emailUser,mdpUser,provinceUser,statusUser,inscriptionUser,dernierCoUser,codeUser,UserReady) VALUES('$nomEnvoie','$prenomEnvoie','$sexeUser','$contactUser','$emailEnvoie','$mdpUser','$provinceUser','OK',NOW(),$now,'$codeUser','KO')";
			$this->bdd->exec($sql);
		}
		public function AddCaratUser($idUser)
		{
			$sql = "SELECT * FROM carat WHERE idUserPC='$idUser'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			if ($donne) {
				echo "Erreur";
			}else{
				$num = "6728-100".$idUser;
				$sql = "INSERT INTO carat(idUserPC,numCompte,creditPC) VALUES('$idUser','$num',0)";
				$this->bdd->exec($sql);
			}
		}
		public function GetUserLast()
		{
			$sql = "SELECT MAX(idUser) AS lastId FROM utilisateur";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserByEmail($email)
		{
			$sql = "SELECT * FROM utilisateur WHERE emailUser='$email'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function CheckGetUserByMail($email)
		{
			$sql = "SELECT * FROM utilisateur WHERE emailUser='$email'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			if ($donne) {
				return "ko";
			}else{
				return "ok";
			}
		}
		public function GetUserId($id)
		{
			$sql = "SELECT * FROM utilisateur WHERE idUser=$id";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserConnexion($idCo)
		{
			$sql = "SELECT * FROM utilisateur WHERE contactUser='$idCo' OR emailUser='$idCo'";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}
		public function UpdateUserUser($type,$valeur,$idUser)
		{
			$sql = "UPDATE utilisateur SET $type='$valeur' WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}
		public function UpdateUserUserPs($mdp,$idUser)
		{
			$sql = "UPDATE utilisateur SET mdpUser='$mdp' WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}

		public function UpdateUserNPM($idUser,$mdp)
		{
			$sql = "UPDATE utilisateur SET mdpUser='$mdp' WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}
		public function RenPdmUsr($idUser)
		{
			$sql = "UPDATE utilisateur SET mdpUser=NULL WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}
		public function SetUserCode($email)
		{
			$codeUser = rand(10000,99999);
			$sql = "UPDATE utilisateur SET codeUser='$codeUser' WHERE emailUser='$email'";
			$this->bdd->exec($sql);
		}
		public function DelImageUserUC($idUser)
		{
			$sql = "UPDATE utilisateur SET imageUser=NULL WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}
		public function UpdateStatusContact($idCo,$status)
		{
			$sql = "UPDATE utilisateur SET statusUser='$status' WHERE contactUser='$idCo' OR emailUser='$idCo'";
			$this->bdd->exec($sql);
		}
		public function UpdateStatusId($idUser,$status)
		{
			$sql = "UPDATE utilisateur SET statusUser='$status' WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}
		public function UpdateCodeUser($idUser)
		{
			$sql = "UPDATE utilisateur SET codeUser=NULL,UserReady='OK' WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}
		public function RenUserReadyMdp($idUser)
		{
			$sql = "UPDATE utilisateur SET UserReady='MDP' WHERE idUser='$idUser'";
			$this->bdd->exec($sql);
		}

	}

 ?>