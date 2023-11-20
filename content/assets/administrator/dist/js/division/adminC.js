function DisplayBlock(id) {
	var idMAJ = document.getElementById(id);
	idMAJ.style.display = "block";
}
function DisplayNone(id) {
	var idMAJ = document.getElementById(id);
	idMAJ.style.display = "none";	
}
function GetAllAdmin() {
	var url = "controller/admin/controller.admin.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupAdmin: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#listeAdmin").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllAdminLicencie() {
	var url = "controller/admin/controller.admin.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupAdminLicencie: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#listeAdminLicencie").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function DelMembre(idAdmin) {
	if (confirm('Voulez-vous vraiment supprimer ce membre?')) {
		var url = "controller/admin/controller.admin.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        SupAdmin: idAdmin
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res=="ok") {
	                AllAdminRecup();
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
function DetailleAdmin(idAdmin) {
	var url = "controller/admin/controller.admin.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupAdminDetaille: idAdmin
        }),
        dataType: "text",
        success: function(res) {
        	location = "#afficheAdmin";
            $("#detaileAdmin").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function Licencier(idAdmin) {
	if (confirm('Voulez-vous vraiment licencier ce membre?')) {
		var url = "controller/admin/controller.admin.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        LicenceAdmin: idAdmin
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res=="ok") {
	                $("#detaileAdmin").html("");
	                AllAdminRecup();
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
function MAJPoste(idAdmin) {
	if ($("#posteAdminMAJ").val() != "") {
		var url = "controller/admin/controller.admin.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        MAJPostee: idAdmin,
		        Valeur: $("#posteAdminMAJ").val()
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res == "Error") {
	        		alert("Erreur de l'insertion");
	        	}else{
		        	// alert('Effectuer');
		        	AllAdminRecup();
		        	// alert(res);
		        	DetailleAdmin(res);
		        }
	        },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
	}else{
		alert('Entrer le poste');
	}
}
function TueLVmp(id) {
	if (confirm("Poursuivre l'action ?")) {
		var url = "controller/admin/controller.admin.php";
        $.ajax({
	        type: "POST",
	        url: url,
	        data: ({
		        TueLVmpV: id,
		        valeurT: $("#RmdpNew").val()
	        }),
	        dataType: "text",
	        success: function(res) {
	        	if (res=="ok") {
		        	alert('Effectuer');
	        		$("#detaileAdmin").html("");
	        	}
	        },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
	}
}
function GenerateCo() {
	if ($("#nomUser").val() != "" && $("#posteUser").val() != "") {
		var genereCo = document.getElementById('genereCo');
		var nom = $("#nomUser").val();
		genereCo.style.display = "block";
		$("#mdpUser").val("1234"+nom);
		$("#pseudoUser").val(nom);

	}else{
		alert('Remplissez le formulaire');
	}
}
function AllAdminRecup() {
	GetAllAdmin();
	GetAllAdminLicencie();
}
AllAdminRecup();
