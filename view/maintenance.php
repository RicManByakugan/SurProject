<!DOCTYPE html>
<html>
<head>
	<title>SUR | MAINTENANCE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="content/data/image/logo/logo.png">
    <link href="content/assets/template/css/azia.css" rel="stylesheet">
    <link href="content/assets/template/font/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="content/assets/template/css/sur.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image:url(content/data/image/lolo.png);">
	<div id="preloader">
        <div style='text-align:center;' id="status">
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
            <div class="spinner-grow text-warning"></div>
        </div>
    </div>

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
              <a href="index.php" class="az-logo"><img src="content/data/image/logo.png" width="100" height="100"></a>
              <a href="index.php"  class="d-lg-none logo-min"><img src="content/data/image/logo.png" width="50" height="50"></a>
            </div>
            <div class="az-header-menu">
              <div class="az-header-menu-header">
                <a href="index.php" class="az-logo"><span></span></a>
              </div>
               <span class="az-sur" id="az-sur-sol">
                    <h1>Solution Unique et Rapide</h1>
               </span>
            </div>
            <div class="az-header-right">
              <div class="input-group">
                <select class="input-select form-control" disabled>
                    <option value="Tout Categorie">Tout</option>
                    <option value="HIGHTECH">High-Tech</option>
                    <option value="VETEMENT">Vêtement et chaussures</option>
                    <option value="AGROALIMENTAIRE">Agro-alimentaires</option>
                    <option value="JOUER">Jouer</option>
                    <option value="ACCESSOIRE">Accessoire et autres</option>
                </select>
                <input type="search" disabled placeholder="Recherche" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-primary" disabled>
                    <i class="fas fa-search"></i>
                  </button>
                </span>                 
              </div>    
            </div>
        </div>
    </div>
    
	<div class="m-0 w-100">
		<div class="container">
			<div class="pt-5 row">
				<div class="col-sm-12">
					<h3 align="center">Site en cours de maintenance</h3>
                    <hr>
                    <h1 class="compteR" align="center"><i class="m-1 fa fa-code"></i></h1>
				</div>
			</div>
            <h1 id="IdcompteRebours" class="mt-2 compteRR text-center"></h1>
		</div>
    </div>

    <script type="text/javascript">
        var temps = <?php echo $secondes;?>;
        var timer =setInterval('CompteaRebour()',1000);
        function CompteaRebour(){
            temps-- ;
            j = parseInt(temps) ;
            h = parseInt(temps/3600) ;
            m = parseInt((temps%3600)/60) ;
            s = parseInt((temps%3600)%60) ;
            document.getElementById('IdcompteRebours').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' + (m<10 ? "0"+m : m) + ' mn : ' + (s<10 ? "0"+s : s) + ' s ';
            if ((s == 0 && m ==0 && h ==0)) {
               clearInterval(timer);
               url = "<?php echo $redirection;?>"
               Redirection(url)
            }
        }
        function Redirection(url) {
            setTimeout("window.location=url", 500)
        }
    </script>
    <script src="content/assets/template/jquery/jquery.min.js"></script>
    <script src="content/assets/template/js/merage.js"></script>
    <script src="content/assets/template/js/wow.min.js"></script> 
    <script src="content/assets/template/js/loading.js"></script>
</body>
</html>