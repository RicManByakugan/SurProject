document.getElementById('AjoutPublication').onsubmit = function() {
	document.getElementById('envoiePcCours').innerHTML = "Envoie en cours ...";	
};
document.getElementById('ModifPublication').onsubmit = function() {
	document.getElementById('ModifPrCours').innerHTML = "Modification en cours ...";	
};
function ModifOKP() {
	document.getElementById('ModifPrCours').innerHTML = "Modification réussi";
}
function ImgOK(img) {
	var img1 = document.getElementById(img);
	img1.style.display = "none";
}
function EnvoieOKP(){
	document.getElementById('envoiePcCours').innerHTML = "Envoie réussi";
	ImgOK('imageOne');
	ImgOK('imageTwo');
	ImgOK('imageThree');
	ImgOK('imageFour');
	setTimeout(function() {
		document.getElementById('envoiePcCours').innerHTML = "";
	},3000);
}
function EnvoieKOPP(error){
	document.getElementById('envoiePcCours').innerHTML = error;
	setTimeout(function() {
		document.getElementById('envoiePcCours').innerHTML = "";
	},3000);
}

function CheckImage(input,btn,output) {
	// var input = document.getElementById(img);
	var btn = document.getElementById(btn);
	if (!input.files) {
    	alert("Navigateur obsolète ! Mettez à jour ou changer de navigateur");
        input.value = null;
    }else {
        var file = input.files[0];
        if (file.size < 900000) {
        	btn.disabled = false;
        	AfficheImage(input,output);
        }else{
            alert('Image trop grande, Chargé une nouvelle image');
        	btn.disabled = true;
            input.value = null;
        }
    }
}
function AfficheImage(input,output) {
	var o = document.getElementById(output);
	o.src = window.URL.createObjectURL(input.files[0]);
	o.style.display = "block";
	// setTimeout(function() {
	// 	o.style.display = "none";
	// }, 10000);
}


function AnnulerModi() {
	var ModifPublication= document.getElementById('ModifPublication');
	ModifPublication.reset();
	RecupAllProduit();
	var modifUserModif = document.getElementById('modifUserModif');
	modifUserModif.style.display = "none";
}
function RecupActiviteProduit(id,categorie) {
	var url = "controller/publication/controller.apublication.php";
	var id = document.getElementById(id);
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupAct: categorie
        }),
        dataType: "text",
        success: function(res) {
            id.innerHTML = res;
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function DeleteImage(numImg,idPub) {
	var url = "controller/publication/controller.apublication.php";
	var idPubP = document.getElementById(idPub);
	if (confirm("Supprimer l'image ?")) {
		$.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        DelIm: numImg,
		        idPubDI: idPubP.value
	        }),
	        dataType: "text",
	        success: function(res) {
                if (res=="ok") {
                	alert('Image Supprimer');
                }else{
                	alert(res);
                }
	        },
		    error: function(e) {
		        alert('Verifier votre connexion internet');
		        window.location.reload();
		    }
        });
    }
}
function modifPub(idPub) {
	var url = "controller/publication/controller.apublication.php";
	var modifUserModif = document.getElementById('modifUserModif');
	var idPubModif = document.getElementById('idPubModif');
	var nomModifAff = document.getElementById('nomModifAff');


	modifUserModif.style.display = "block";
	location = "#modifUserModif";

	idPubModif.value = idPub;

    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupPub: idPub
        }),
        dataType: "text",
        success: function(res) {
            $("#nomModifAff").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });

	// nomModifAff.innerHTML = nom;

}
function supPub(idPub) {
	if (confirm("Supprimer cette publication ?")) {
		var url = "controller/publication/controller.apublication.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        SupPub: idPub
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res=="OK") {
                	RecupAllProduit();
	        	}else{
	        		alert(res);
	        	}
	        },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
	}
}
function RecupAllProduit() {
	var url = "controller/publication/controller.apublication.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupProduit: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#listeProduit").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
	RecupActiviteProduit('produitHighTech','HIGHTECH');
    RecupActiviteProduit('produitVetement','VETEMENT');
	RecupActiviteProduit('produitAgro','AGROALIMENTAIRE');
	RecupActiviteProduit('produitJouer','JOUER');
	RecupActiviteProduit('produitAccessoire','ACCESSOIRE');
}

function DetaillePostAdmin(idPost) {
    $("#modifPostPub").html("");
	var url = "controller/publication/controller.apublication.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupPostDetailleAdminPub: idPost
        }),
        dataType: "text",
        success: function(res) {
            $("#modifPostPub").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}

function ValidePromPost(idPost) {
	var url = "controller/publication/controller.apublication.php";
	if (confirm('Confirmez le nouveau promotion')) {
		if ($("#pourcentage").val() == null || $("#pourcentage").val() == ""|| $("#dateProm").val() == ""|| $("#dateProm").val() == "") {
			alert('Entrer le niveau de pourcentage')
		}else{
		    $.ajax({
		        type: "POST",
		        url: url,
		        data: ({
			        PromPub: idPost,
			        pourcentage: $("#pourcentage").val(),
			        dateProm: $("#dateProm").val()
		        }),
		        dataType: "text",
		        success: function(res) {
		        	if (res=="ok") {
		        		DetaillePostAdmin(idPost)
		        	}else{
		        		alert(res)
		        	}
		        },
		        error: function(e) {
		            alert('Verifier votre connexion internet');
		            window.location.reload();
		        }
		    });
		}
	}
}
function AnnulerPromotion(idPost) {
	var url = "controller/publication/controller.apublication.php";
	if (confirm('Annulez le promotion en cours')) {
		$.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        PromPubAnnul: idPost
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res=="ok") {
	        		DetaillePostAdmin(idPost)
	        	}else{
	        		alert(res)
	        	}
	        },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
	    });
	}
}

RecupAllProduit();
setInterval("RecupAllProduit()",5000);
