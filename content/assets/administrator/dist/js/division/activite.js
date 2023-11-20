function RecupAct() {
	var url = "controller/activite/controller.activite.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupActivity: "go"
        }),
        dataType: "text",
        success: function(res) {
        	$("#tbodyAct").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RecupActCommande() {
	var url = "controller/activite/controller.activite.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupActivityCo: "go"
        }),
        dataType: "text",
        success: function(res) {
        	$("#tbodyActCommande").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RecupCount(nom,id) {
    var url = "controller/activite/controller.activite.php";
    var id = document.getElementById(id);
    $.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupActivityCount: nom
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
function RecupCountSpons() {
    var url = "controller/activite/controller.activite.php";
  	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupActivityCountSponsSpons: ""
        }),
        dataType: "text",
        success: function(res) {
        	$("#sponsAct").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });	
}

function RecupCountPat() {
    var url = "controller/activite/controller.activite.php";
  	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupActivityCountPat: ""
        }),
        dataType: "text",
        success: function(res) {
        	$("#PartAct").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });	
}
function AllActivity() {
	RecupAct();
	RecupActCommande();
	RecupCount("PRODUIT","proAct");
	RecupCount("SERVICE","seAct");
	RecupCount("FORMATION","foAct");
	RecupCountSpons();
	RecupCountPat();
}
AllActivity();
setInterval("AllActivity()",5000);