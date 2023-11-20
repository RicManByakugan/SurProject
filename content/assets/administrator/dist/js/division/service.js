// function Valide() {
// 	var AjoutPublicationSer= document.getElementById('AjoutPublicationSer');
// 	AjoutPublicationSer.reset();
// 	RecupAllService();
// }
// function ValideModif() {
// 	RecupAllService();
// 	var modifUserModifSer = document.getElementById('modifUserModifSer');
// 	modifUserModifSer.style.display = "none";
// }
document.getElementById('AjoutPublicationSer').onsubmit = function() {
	document.getElementById('envoieSeCours').innerHTML = "Envoie en cours ...";	
};
document.getElementById('ModifPublicationService').onsubmit = function() {
	document.getElementById('ModifSeCours').innerHTML = "Modification en cours ...";	
};
function ModifOKS() {
	document.getElementById('ModifSeCours').innerHTML = "Modification réussi";
}
function EnvoieOKS(){
	document.getElementById('envoieSeCours').innerHTML = "Envoie réussi";
	ImgOK('imageOneServ');
	ImgOK('imageTwoServ');
	ImgOK('imageThreeServ');
	ImgOK('imageFourServ');
	setTimeout(function() {
		document.getElementById('envoieSeCours').innerHTML = "";
	},3000);
}
function AnnulerModiService() {
	var ModifPublicationService= document.getElementById('ModifPublicationService');
	ModifPublicationService.reset();
	RecupAllService();
	var modifUserModifSer = document.getElementById('modifUserModifSer');
	modifUserModifSer.style.display = "none";
}
function RecupActiviteService(id,categorie) {
	var url = "controller/publication/controller.apublication.php";
	var id = document.getElementById(id);
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupActSer: categorie
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
function modifPubSer(idPub) {
	var url = "controller/publication/controller.apublication.php";
	var modifUserModifSer = document.getElementById('modifUserModifSer');
	var idPubModifSer = document.getElementById('idPubModifSer');
	var nomModifAffSer = document.getElementById('nomModifAffSer');


	modifUserModifSer.style.display = "block";
	location = "#modifUserModifSer";
	// 
	idPubModifSer.value = idPub;

    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupPub: idPub
        }),
        dataType: "text",
        success: function(res) {
            $("#nomModifAffSer").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });

	// nomModifAffSer.innerHTML = nom;

}
function supPubSer(idPub) {
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
                	RecupAllService();
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
function RecupAllService() {
	var url = "controller/publication/controller.apublication.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupService: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#listeService").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
    RecupActiviteService('ServiceTransport','TRANSPORT');
	RecupActiviteService('ServiceEvents','EVENTS');
}
RecupAllService();
setInterval("RecupAllService()",5000);
