<!DOCTYPE html>
<html>
<head>
    <title>SURADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="content/data/image/logoAdmin.png">
    <link href="content/assets/administrator/dist/css/azia.css" rel="stylesheet">
</head>
<body>
  <br><br>
  <div class="az-signin-wrapper">
      <div class="az-card-signin">
        <h1 align="center"><img src="content/data/image/logo.png" width="100" height="100"></h1>
        <div class="az-signin-header">
          <h2 align="center">SUR ADMNISTRATOR</h2>
          
            <div class="form-group">
              <label>Pseudo</label>
              <input type="text" class="form-control" placeholder="Pseudo" id="pseudo">
            </div>
            <div class="form-group">
              <label>Mot de passe</label>
              <input type="password" class="form-control" placeholder="Entrer le mot de passe" id="mdp">
            </div>
            <button class="btn btn-az-primary btn-block" id="connexion" onclick="ConnectAdmin();">Se connecter</button>
          
          <p style="color: red;" id="result"></p>
        </div>
         <p><a>Contacter l'administration en cas de problème</a></p>
      </div>
    </div>
    <script src="content/assets/administrator/dist/jquery/jquery.min.js"></script>
    <script src="content/assets/administrator/dist/js/division/connex.js"></script>
</body>
</html>