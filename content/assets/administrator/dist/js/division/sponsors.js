document.getElementById('SponsGo').onsubmit = function() {
	document.getElementById('NotifSponsAdd').innerHTML = "Envoie en cours ...";	
};
document.getElementById('PartGo').onsubmit = function() {
	document.getElementById('NotifparteAdd').innerHTML = "Envoie en cours ...";	
};
function Reset(id) {
	var idid= document.getElementById(id);
	idid.reset();
	if (id == "SponsGo") {
		document.getElementById('NotifSponsAdd').innerHTML = "Envoie réussie";	
		setTimeout(function() {
			document.getElementById('NotifSponsAdd').innerHTML = "";
		},3000);
		ImgOK('logoEn');
	}
	if (id == "PartGo") {
		document.getElementById('NotifparteAdd').innerHTML = "Envoie réussie";	
		setTimeout(function() {
			document.getElementById('NotifparteAdd').innerHTML = "";
		},3000);
		ImgOK('logoEnPart');
	}
	RecupAllSpons();
}
function SupSpons(idSpons) {
	if (confirm("Supprimer le sponsor ?")) {
		var url = "controller/sponsors/controller.sponsors.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        SupSpons: idSpons
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res=="OK") {
	        		alert('Effectuer');
	        	}
                RecupAllSpons();
	        },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
	}
}
function SupPartenaire(idPart) {
	if (confirm("Supprimer le partenaire ?")) {
		var url = "controller/partenaire/controller.partenaire.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        SupPartid: idPart
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res=="OK") {
	        		alert('Effectuer');
	        	}
                RecupAllPat();
	        },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
	}
}
function RecupAllSpons() {
	var url = "controller/sponsors/controller.sponsors.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupSpons: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#marqueListe").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RecupAllPat() {
	var url = "controller/partenaire/controller.partenaire.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupPat: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#marqueListeP").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
RecupAllSpons();
RecupAllPat();
setInterval("RecupAllSpons()",5000);
setInterval("RecupAllPat()",5000);
