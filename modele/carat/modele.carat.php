<?php 

	class CaratCredit
	{
		
		private $bdd;

		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}
		public function AddCarat($idUser,$solde,$idAdmin)
		{
			$sql = "SELECT * FROM carat WHERE idUserPC='$idUser'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			$timeR = rand().date("s").date("d");
			$somme = $donne['creditPC']+$solde;
			if ($somme<0) {
				return "Crédit inférieure à 0";
			}else{
				$act = "AJOUT CREDIT";
				$this->UpdateCUser($idUser,$somme);
				$this->AddCaratActivity($donne['idCarat'],$idAdmin,$act,$solde,$somme,$timeR);
				return "ok";
			}
		}
		public function SubCarat($idUser,$solde,$idAdmin)
		{
			$sql = "SELECT * FROM carat WHERE idUserPC='$idUser'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			$timeR = rand().date("s").date("d");
			$sub = $donne['creditPC']-$solde;
			if ($sub<0) {
				return "Crédit inférieure à 0";
			}else{
				$act = "RETIRE CREDIT";
				$this->UpdateCUser($idUser,$sub);
				$this->AddCaratActivity($donne['idCarat'],$idAdmin,$act,$solde,$sub,$timeR);
				return "ok";
			}
		}
		public function SearchRef($ref)
		{
			$sql = "SELECT * FROM carat INNER JOIN caratactvity ON carat.idCarat=caratactvity.idCaratC WHERE caratactvity.ReferCarat='$ref'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function RetraitUser($idUser,$montant,$motif)
		{
			$sql = "SELECT * FROM carat WHERE idUserPC='$idUser'";
			$recup = $this->bdd->query($sql);
			$donne = $recup->fetch();
			$timeR = rand().date("s").date("d");
			$sub = $donne['creditPC']-$montant;
			if ($sub<0) {
				return "Crédit inférieure à 0";
			}else{
				$act = "RETIRE CREDIT : ".$motif;
				$this->UpdateCUser($idUser,$sub);
				$this->AddCaratActivity($donne['idCarat'],0,$act,$montant,$sub,$timeR);
				return "ok";
			}
		}
		public function UpdateCUser($idUser,$valeur)
		{
			$sql = "UPDATE carat SET creditPC='$valeur' WHERE idUserPC='$idUser'";
			$this->bdd->exec($sql);
		}
		public function AddCaratActivity($idCaratC,$idAdminRes,$Action,$montant,$Solde,$ref)
		{
			$sql = "INSERT INTO caratactvity(idCaratC,idAdminRes,Action,montant,Solde,ReferCarat,DateCA,HeureCA) VALUES('$idCaratC','$idAdminRes','$Action','$montant','$Solde','$ref',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function GetCreditUserActivite($idCaratAc)
		{
			$sql = "SELECT * FROM carat INNER JOIN caratactvity ON carat.idCarat=caratactvity.idCaratC WHERE caratactvity.idCaratC='$idCaratAc' ORDER BY caratactvity.idCaratAct DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetCreditUserActiviteUser($idUser)
		{
			$sql = "SELECT * FROM carat INNER JOIN caratactvity ON carat.idCarat=caratactvity.idCaratC WHERE carat.idUserPC='$idUser' AND caratactvity.cacheUser IS NULL ORDER BY caratactvity.idCaratAct DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetCreditUserActiviteAll($idUser)
		{
			$sql = "SELECT * FROM carat INNER JOIN caratactvity ON carat.idCarat=caratactvity.idCaratC WHERE carat.idUserPC='$idUser' ORDER BY caratactvity.idCaratAct DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetCreditUser($idUser)
		{
			$sql = "SELECT * FROM carat WHERE idUserPC='$idUser'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function ViderTransactionUser($idC)
		{
			$sql = "UPDATE caratactvity SET cacheUser='OK' WHERE idCaratC='$idC'";
			$this->bdd->exec($sql);
		}
		public function VideCarat($idUser)
		{
			$sql = "UPDATE carat SET creditPC=0 WHERE idUserPC='$idUser'";
			$this->bdd->exec($sql);
		}


	}



 ?>