function GetAllNotifCommandeRR() {
	var url = "controller/utilisateurNav/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifCommande: 23
        }),
        dataType: "text",
        success: function(res) {
        	$("#contentCommandeR").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotifCommandeCountRR() {
	var url = "controller/utilisateurNav/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifCommandeNombre: 25
        }),
        dataType: "text",
        success: function(res) {
        	if (res=="KO") {
        		$("#badgeCountCoR").html("");
        	}else{
        		$("#badgeCountCoR").html(res);
        	}
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function SeeCommandeURR(idCo) {
    var url = "controller/utilisateurNav/controller.notification.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            SeeItBabeCU: idCo
        }),
        dataType: "text",
        success: function(res) {
            DetailleOneCommandeRR(idCo);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
// /NOTIFICATION
// ADMIN COMMANDE

function RAllCommandeRR() {
    var url = "controller/utilisateurNav/controller.ausernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            GetAllC: "go"
        }),
        dataType: "text",
        success: function(res) {
            $("#allCRR").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RAllCommandeConclusRR() {
    var url = "controller/utilisateurNav/controller.ausernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            GetAllCC: "LIVRAISON"
        }),
        dataType: "text",
        success: function(res) {
            $("#allCLRR").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RAllCommandeValiderRR() {
        var url = "controller/utilisateurNav/controller.ausernav.php";
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                GetAllCC: "VALIDER"
            }),
            dataType: "text",
            success: function(res) {
                $("#allCVRR").html(res);
            },
            error: function(e) {
                alert('Verifier votre connexion internet');
                window.location.reload();
            }
        });
}
function RAllCommandeDeclinerRR() {
        var url = "controller/utilisateurNav/controller.ausernav.php";
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                GetAllCC: "DECLINER"
            }),
            dataType: "text",
            success: function(res) {
                $("#allCDRR").html(res);
            },
            error: function(e) {
                alert('Verifier votre connexion internet');
                window.location.reload();
            }
        });
}
function RAllCommandeAnnulerRR() {
        var url = "controller/utilisateurNav/controller.ausernav.php";
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                GetAllCC: "ANNULER"
            }),
            dataType: "text",
            success: function(res) {
                $("#allCARR").html(res);
            },
            error: function(e) {
                alert('Verifier votre connexion internet');
                window.location.reload();
            }
        });
}




function LoadFactureRR(numeroCommande) {
    var detailleCommandeFactureE = document.getElementById('detailleCommandeFactureR');
    detailleCommandeFactureE.style.display = "block";
    kendo.drawing
    .drawDOM("#detailleCommandeFactureR", 
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
function DetailleOneCommandeRR(idCoco) {
    var url = "controller/utilisateurNav/controller.ausernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            GetDeSurCo: "go",
            idCo: idCoco
        }),
        dataType: "text",
        success: function(res) {
            window.location = "#detailleCommandeR";
            $("#detailleCommandeR").html(res);
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
                    $("#detailleCommandeFactureR").html(res);
                },  
                error: function(e) {
                    alert('Verifier votre connexion internet');
                    window.location.reload();
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

function LivreCommandeRR(idCoco) {
    var url = "controller/utilisateurNav/controller.ausernav.php";
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
                    DetailleOneCommandeRR(idCoco);
                    NotifCommandeRRR();
                }else{
                    alert(res);
                }
            }
        });
    }
}
function ConclureCommandeR(idCoco) {
    var url = "controller/utilisateurNav/controller.ausernav.php";
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
                    DetailleOneCommandeRR(idCoco);
                    AllNotifCommandeRRRR();
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
function SupCommandeR(idCoco) {
    var url = "controller/utilisateurNav/controller.ausernav.php";
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
                    NotifCommandeRRR();
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
function DeclineCommandeR(idCoco,motif) {
    var url = "controller/utilisateurNav/controller.ausernav.php";
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
                        DetailleOneCommandeRR(idCoco);
                        AllNotifCommandeRRRR();
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



function NotifCommandeRRR(){
    GetAllNotifCommandeRR();
    GetAllNotifCommandeCountRR();
}

function AllNotifCommandeRRRR() {
      RAllCommandeRR();
      RAllCommandeAnnulerRR();
      RAllCommandeConclusRR();
      RAllCommandeDeclinerRR();
      RAllCommandeValiderRR();
}

setInterval("AllNotifCommandeRRRR()",5000);
setInterval("NotifCommandeRRR()",5000);
