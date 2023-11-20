document.getElementById('AjoutPublicationFor').onsubmit = function() {
	document.getElementById('envoieFoCours').innerHTML = "Envoie en cours ...";	
};
document.getElementById('ModifPublicationFormation').onsubmit = function() {
	document.getElementById('ModifFoCours').innerHTML = "Modification en cours ...";	
};
function ModifOKF() {
	document.getElementById('ModifFoCours').innerHTML = "Modification réussi";
}
function EnvoieOKF(){
	document.getElementById('envoieFoCours').innerHTML = "Envoie réussi";
	ImgOK('imageOneFor');
	ImgOK('imageTwoFor');
	ImgOK('imageThreeFor');
	ImgOK('imageFourFor');
	setTimeout(function() {
		document.getElementById('envoieFoCours').innerHTML = "";
	},3000);
}

function ResetForm(id) {
	var id= document.getElementById(id);
	id.reset();
}
function ModifForm(id) {
	var id= document.getElementById(id);
	id.style.display = "none";
}
// function ValideFormation() {
// 	var AjoutPublicationFor= document.getElementById('AjoutPublicationFor');
// 	AjoutPublicationFor.reset();
// 	RecupAllFormation();
// }
// function ValideModif() {
// 	RecupAllFormation();
// 	var modifUForModifFor = document.getElementById('modifUForModifFor');
// 	modifUForModifFor.style.display = "none";
// }
function AnnulerModiFormation() {
	var ModifPublicationFormation= document.getElementById('ModifPublicationFormation');
	ModifPublicationFormation.reset();
	RecupAllFormation();
	var modifUForModifFor = document.getElementById('modifUForModifFor');
	modifUForModifFor.style.display = "none";
}
function RecupActiviteFormation(id,categorie) {
	var url = "controller/publication/controller.apublication.php";
	var id = document.getElementById(id);
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupActFor: categorie
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
function modifPubFor(idPub) {
	var url = "controller/publication/controller.apublication.php";
	var modifUForModifFor = document.getElementById('modifUForModifFor');
	var idPubModifFor = document.getElementById('idPubModifFor');
	var nomModifAffFor = document.getElementById('nomModifAffFor');


	modifUForModifFor.style.display = "block";
	location = "#modifUForModifFor";
	
	idPubModifFor.value = idPub;

    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupPub: idPub
        }),
        dataType: "text",
        success: function(res) {
            $("#nomModifAffFor").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });

	// nomModifAffFor.innerHTML = nom;

}
function supPubFor(idPub) {
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
                	RecupAllFormation();
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
function RecupAllFormation() {
	var url = "controller/publication/controller.apublication.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupFormation: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#listeFormation").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
    RecupActiviteFormation('FormationLangue','LANGUE');
    RecupActiviteFormation('FormationInformatique','INFORMATIQUE');
	RecupActiviteFormation('FormationMecanique','MECANIQUE');
}
RecupAllFormation();
setInterval("RecupAllFormation()",5000);
