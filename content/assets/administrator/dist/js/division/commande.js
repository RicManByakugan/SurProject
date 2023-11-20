function LoadFacture(numeroCommande) {
	var detailleCommandeFactureE = document.getElementById('detailleCommandeFacture');
	detailleCommandeFactureE.style.display = "block";
	kendo.drawing
	.drawDOM("#detailleCommandeFacture", 
	{ 
	   	paperSize: "A2",
		margin: { top: "1cm", bottom: "1cm" },
		scale: 0.8,
		height: 500
	})
	.then(function(group){
	    kendo.drawing.pdf.saveAs(group, "Facture"+numeroCommande+".pdf")
		detailleCommandeFactureE.style.display = "none";
	});
}
function DetailleOneCommande(idCoco) {
		var url = "controller/commande/controller.commande.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetDeSurCo: "go",
				idCo: idCoco
		    }),
		    dataType: "text",
		    success: function(res) {
	        	window.location = "#detailleCommande";
	        	$("#detailleCommande").html(res);
	        	// ----------------------FACTURE--------------------
	        	$.ajax({
					type: "POST",
				    url: url,
				    data: ({
						GetDeSurCoFacture: "go",
						idCoFacture: idCoco
				    }),
				    dataType: "text",
				    success: function(res) {
			        	$("#detailleCommandeFacture").html(res);
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
function RAllCommande() {
		var url = "controller/commande/controller.commande.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetAllC: "go"
		    }),
		    dataType: "text",
		    success: function(res) {
	        	$("#allC").html(res);
		    },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
}
function RAllCommandeConclus() {
		var url = "controller/commande/controller.commande.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetAllCC: "LIVRAISON"
		    }),
		    dataType: "text",
		    success: function(res) {
	        	$("#allCL").html(res);
		    },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
}
function RAllCommandeValider() {
		var url = "controller/commande/controller.commande.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetAllCC: "VALIDER"
		    }),
		    dataType: "text",
		    success: function(res) {
	        	$("#allCV").html(res);
		    },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
}
function RAllCommandeDecliner() {
		var url = "controller/commande/controller.commande.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetAllCC: "DECLINER"
		    }),
		    dataType: "text",
		    success: function(res) {
	        	$("#allCD").html(res);
		    },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
}
function RAllCommandeAnnuler() {
		var url = "controller/commande/controller.commande.php";
		$.ajax({
			type: "POST",
		    url: url,
		    data: ({
				GetAllCC: "ANNULER"
		    }),
		    dataType: "text",
		    success: function(res) {
	        	$("#allCA").html(res);
		    },
	        error: function(e) {
	            alert('Verifier votre connexion internet');
	            window.location.reload();
	        }
        });
}
function DeclineCommande(idCoco,motif) {
		var url = "controller/commande/controller.commande.php";
		var motiff = document.getElementById(motif);
		if (motiff.value=="") {
			alert("Remplissez le motif pour le client");
		}else{
			if (confirm("Décliner la demande du client ?")) {
				$.ajax({
					type: "POST",
				    url: url,
				    data: ({
						Decl: "go",
						idCoD: idCoco,
						motifD: motiff.value
				    }),
				    dataType: "text",
				    success: function(res) {
				    	if (res=="ok") {
				    		DetailleOneCommande(idCoco);
				    		AllNotifCommande();
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
}
function LivreCommande(idCoco) {
		var url = "controller/commande/controller.commande.php";
		if (confirm("Effectuer la livraison ?")) {
			$.ajax({
				type: "POST",
			    url: url,
			    data: ({
					Licl: "go",
					idCoLi: idCoco
			    }),
			    dataType: "text",
			    success: function(res) {
			    	if (res=="ok") {
			    		DetailleOneCommande(idCoco);
			    		AllNotifCommande();
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
function ConclureCommande(idCoco) {
		var url = "controller/commande/controller.commande.php";
		if (confirm("Assurez-vous que la livraison est bien terminer ?")) {
			$.ajax({
				type: "POST",
			    url: url,
			    data: ({
					Cicl: "go",
					idCoCi: idCoco
			    }),
			    dataType: "text",
			    success: function(res) {
			    	if (res=="ok") {
			    		DetailleOneCommande(idCoco);
			    		AllNotifCommande();
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
function SupCommande(idCoco) {
		var url = "controller/commande/controller.commande.php";
		if (confirm("Supprimer cette commande ?")) {
			$.ajax({
				type: "POST",
			    url: url,
			    data: ({
					SUicl: "go",
					idCoCSu: idCoco
			    }),
			    dataType: "text",
			    success: function(res) {
			    	if (res=="ok") {
	        			$("#detailleCommande").html("");
			    		AllNotifCommande();
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
function AllNotifCommande() {
	  RAllCommande();
	  RAllCommandeAnnuler();
	  RAllCommandeConclus();
	  RAllCommandeDecliner();
	  RAllCommandeValider();
}

AllNotifCommande();
setInterval("AllNotifCommande()",5000);