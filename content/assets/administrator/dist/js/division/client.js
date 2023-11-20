function EnvoieMessageForUser(idUser,idAdmin) {
	if(confirm("Envoyer le message ?")){
		var url = "controller/admin/controller.admin.php";
		var textFor = document.getElementById("textForUser");
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				EnvoiemsgFUser: "go",
				message: textFor.value,
				idUserResp: idUser,
				idAdminResp: idAdmin
		    }),
		    dataType: "text",
		    success: function(res) {
		    	if (res == 'ok') {
		    		textFor.value = "";
		    		alert('Envoyer');
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
function MessageForUser(idUser,idAdmin) {
	var url = "controller/admin/controller.admin.php";
	$.ajax({
		type: "POST",
	    url: url,
	    data: ({
			msgFUser: "go",
			idUserResp: idUser,
			idAdminResp: idAdmin
	    }),
	    dataType: "text",
	    success: function(res) {
	    	$("#messageForClients").html(res);
	    },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
	});
}
function LoadPdfClient(nom) {
	var detailleUserPdf = document.getElementById('detailleClientFact');
	detailleUserPdf.style.display = "block";
	kendo.drawing
	.drawDOM("#detailleClientFact", 
	{ 
	   	paperSize: "A2",
		margin: { top: "1cm", bottom: "1cm" },
		scale: 0.8,
		height: 500
	})
	.then(function(group){
	    kendo.drawing.pdf.saveAs(group, "Client-SUR-"+nom+".pdf")
		detailleUserPdf.style.display = "none";
	});
}
function SearchTr(search) {
		var url = "controller/admin/controller.admin.php";
		var searchZ = document.getElementById(search);
		if (searchZ.value!="") {
			$.ajax({
				type: "POST",
			    url: url,
			    data: ({
					searchRef: "go",
					RefV: searchZ.value
			    }),
			    dataType: "text",
			    success: function(res) {
			    	$("#valinySearch").html(res);
			    },
		        error: function(e) {
		            alert('Verifier votre connexion internet');
		            window.location.reload();
		        }
	        });
		}else{
			alert('Remplissez le donné');
		}
}
function AddCredit(solde,idUserI) {
		var url = "controller/carat/controller.carat.php";
		var soldes = document.getElementById(solde);
		if (soldes.value!=0 && soldes.value > 0) {
			$.ajax({
				type: "POST",
			    url: url,
			    data: ({
					addC: "go",
					soldeAC: soldes.value,
					idUser: idUserI
			    }),
			    dataType: "text",
			    success: function(res) {
			    	if (res=="ok") {
				    	alert('Effectuer');
				    	DetailleUser(idUserI);
			    	}else{
			    		alert(res);
			    	}
			    },
		        error: function(e) {
		            alert('Verifier votre connexion internet');
		            window.location.reload();
		        }
	        });
		}else{
			alert('Erreur');
		}
}
function retireCredit(solde,idUserI,motif) {
		var url = "controller/carat/controller.carat.php";
		var soldes = document.getElementById(solde);
		var motifD = document.getElementById(motif);
		if (soldes.value!=0 && soldes.value>0 && motifD.value=="") {
			$.ajax({
				type: "POST",
			    url: url,
			    data: ({
					subC: "go",
					soldeSC: soldes.value,
					idUser: idUserI,
					motif: motifD.value
			    }),
			    dataType: "text",
			    success: function(res) {
			    	if (res=="ok") {
				    	alert('Effectuer');
				    	DetailleUser(idUserI);
			    	}else{
			    		alert(res);
			    	}
			    },
		        error: function(e) {
		            alert('Verifier votre connexion internet');
		            window.location.reload();
		        }
	        });
		}else{
			alert('Donnée manquante');
		}
}
function RechercheCompte(id) {
		var url = "controller/admin/controller.admin.php";
		var search = document.getElementById(id);
		if (search.value=="") {
			alert('Remplissez la donné à rechercher');
		}else{
			$.ajax({
				type: "POST",
			    url: url,
			    data: ({
					RechercheC: "go",
					donne: search.value
			    }),
			    dataType: "text",
			    success: function(res) {
		        	$("#RechrC").html(res);
			    },
		        error: function(e) {
		            alert('Verifier votre connexion internet');
		            window.location.reload();
        		}
	        });
        }
}
function RecupAllClient() {
		var url = "controller/admin/controller.admin.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetAllCFA: "go"
		    }),
		    dataType: "text",
		    success: function(res) {
	        	$("#listeC").html(res);
		    },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
}
function DetailleUser(idUser) {
		var url = "controller/admin/controller.admin.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetSurClient: "go",
				idUserUserC: idUser
		    }),
		    dataType: "text",
		    success: function(res) {
	        	window.location = "#detailleClient";
	        	$("#detailleClient").html(res);
			    $("#RechrC").html("");
	        	// ----------------------FACTURE--------------------
	        	$.ajax({
					type: "POST",
				    url: url,
				    data: ({
						GetSurClientFacture: "go",
						idUserUserCF: idUser
				    }),
				    dataType: "text",
				    success: function(res) {
			        	$("#detailleClientFact").html(res);
				    }
		        });
	        	// ----------------------FACTURE--------------------
		    },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
}
RecupAllClient();
setInterval("RecupAllClient()",5000);
