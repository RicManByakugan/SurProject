<?php 
	/**
	 * 
	 */
	class ActivityUser
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}
		public function AddUserAct($idUser,$desc)
		{
			$sql = "INSERT INTO activiteuser(idUserAct,descAct,DateActU,HeureActU) VALUES('$idUser','$desc',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function AddUserActSeeing($idUserUs,$idPubUs,$descUs)
		{
			$sql = "INSERT INTO usersee(idUserUs,idPubUs,descUs,dateUs,heureUs) VALUES('$idUserUs','$idPubUs','$descUs',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function GetUserActSeeing($idUser)
		{
			$sql = "SELECT * FROM usersee INNER JOIN publication ON usersee.idPubUs=publication.id_pub WHERE usersee.idUserUs='$idUser' ORDER BY usersee.idUs DESC";
			$recup = $this->bdd->query($sql);
			
			$donne = $recup->fetchall();

			// foreach ($donne as $key => $value) {
			// 	$sql2 = "SELECT * FROM usersee INNER JOIN publication ON usersee.idPubUs=publication.id_pub WHERE usersee.idPubUs!='".$value['idPubUs']."' ORDER BY usersee.idUs DESC";

			// 	$recupVrai = $this->bdd->query($sql2);
				
			// 	$donne2 = $recup->fetchall();
			// }
			
			// $sqlV = "SELECT * FROM publication INNER JOIN usersee ON publication.id_pub=usersee.idPubUs WHERE publication.categorie_pub!='".$donne2['categorie_pub']."' ORDER BY publication.id_pub DESC";
			// $recupVrai = $this->bdd->query($sqlV);

			return $donneV = $recup->fetchall();
		}
		public function GetUserActSeeingR()
		{
			$sql = "SELECT * FROM usersee INNER JOIN publication ON usersee.idPubUs=publication.id_pub LIMIT 1";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetUserActByType($idUser,$type)
		{
			$sql = "SELECT COUNT(idActiviteUser) AS nombreAct FROM activiteuser WHERE idUserAct='$idUser' AND descAct='$type'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetCountActByType($type,$idUser)
		{
			$sql = "SELECT COUNT(idActiviteUser) AS nombreActType FROM activiteuser WHERE descAct='$type' AND 	idUserAct='$idUser'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
	}

 ?>