<!DOCTYPE html>
<html>
<head>
	<title>SUR</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../assets/typicons.font/typicons.css" rel="stylesheet">
    <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/mdi/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/azia.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../../../image/logo.png">
</head>
<body>
     <div class="az-signup-wrapper">
      <div class="az-column-signup-left">
        <div>
          <img src="../../../image/logo.png" width="100" height="100"><br><br>
          <h1 class="az-logo">Solution Unique et Rapide</h1>
          <h5>Vendez,achetez ce dont vous voulez</h5>
          <p>Desc</p>
          <a href="../../accueil/accueil/1accueil.php" class="btn btn-outline-indigo">Voir</a>
        </div>
      </div>
      <div class="az-column-signup">
        <h1 align="left"><img src="../../../image/logo.png" width="100" height="100"></h1>
        <div class="az-signup-header">
          <h2>Inscription</h2>
          <h5>Remplissez les données</h5>

          <form>
            <div class="row">
                  <div class="col form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" placeholder="Nom..." id="newName" required>
                  </div>
                  <div class="col form-group">
                      <label>Prénom <small style="color: red;">*</small></label>
                      <input type="text" class="form-control" placeholder="Prénom..." id="newPrenom">
                  </div>
                </div>
                <!-- <div class="form-group">
                      <label>Province <small style="color: red;">*</small></label>
                      <select class="form-control" id="entrepriseProvince" required>
                          <option value="Antananarivo">Antananarivo</option>
                          <option value="Antsiranana">Antsiranana</option>
                          <option value="Fianarantsoa">Fianarantsoa</option>
                          <option value="Mahajanga">Mahajanga</option>
                          <option value="Toamasina">Toamasina</option>
                          <option value="Toliara">Toliara</option>
                      </select>
                </div> -->
                <div class="form-group">
                  <label>Téléphone <small style="color: red;">*</small></label>
                  <input type="tel" class="form-control" placeholder="Numéro téléphone..." id="newTel">
                </div>
                <div class="form-group">
                  <label>Mot de passe <small style="color: red;">*</small></label>
                  <input type="password" class="form-control" placeholder="Mot de passe..." id="newMdp">
                </div>
                <div class="form-group">
                  <label>Confirmer mot de passe <small style="color: red;">*</small></label>
                  <input type="password" class="form-control" placeholder="Mot de passe..." id="newMdp2">
                </div>
            <button class="btn btn-az-primary btn-block">S'inscrire</button>
          </form>
        </div>
        <div class="az-signup-footer">
          <br>
          <p>Se connecter sur le site <a href="connexion.php">connexion</a></p>
        </div>
      </div>
    </div>

</body>
</html>