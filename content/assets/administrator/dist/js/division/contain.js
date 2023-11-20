function SiteSur(status,container) {
    if (confirm("Poursuivre l'action du site")) {
        var url = "controller/admin/controller.admin.php";
        container.disabled = true;
        container.innerHTML = "Traitement...";
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                statusSite: status
            }),
            dataType: "text",
            success: function(res) {
                if (res == "ok") {
                    alert('Effectuer')
                    container.innerHTML = "Effectuer";
                    window.location.reload()
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

function ReloadCompte() {
    var url = "controller/admin/controller.admin.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            ReloadCompte: 12
        }),
        dataType: "text",
        success: function(res) {
            if (res != "ko") {
                Traitement(res)
            }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function Traitement(temps){
    var url = "controller/admin/controller.admin.php";
    temps-- ;
    j = parseInt(temps) ;
    h = parseInt(temps/3600) ;
    m = parseInt((temps%3600)/60) ;
    s = parseInt((temps%3600)%60) ;
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            ReloadCompteS: 12,
            Day: j,
            Hour: h,
            Minutes: m,
            Seconde: s
        }),
        dataType: "text",
        success: function(res) {
            if (res!="ok") {
                alert(res)
            }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
setInterval("ReloadCompte()",1000);




function NotifSee(id) {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        SeeNotif: id
        }),
        dataType: "text",
        success: function(res) {
			if (res == "ok") {
				location = "sura.php?admin=1";
			}
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function NotifSeeMessage(id) {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        SeeNotif: id
        }),
        dataType: "text",
        success: function(res) {},
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotif() {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotif: 13
        }),
        dataType: "text",
        success: function(res) {
        	$("#allNotif").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function DelImageUserAdmin() {
	var url = "controller/admin/controller.admin.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        idAdminPDel: 15
        }),
        dataType: "text",
        success: function(res) {
        	alert("Effectuer");
        	location.reload();
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotifMessage() {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifMessage: 17
        }),
        dataType: "text",
        success: function(res) {
        	$("#contentMessage").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotifMessageCount() {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifMessageNombre: 21
        }),
        dataType: "text",
        success: function(res) {
        	if (res=="KO") {
        		$("#badgeCountMessage").html("");
        	}else{
        		$("#badgeCountMessage").html(res);
        	}
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotifCommande() {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifCommande: 23
        }),
        dataType: "text",
        success: function(res) {
        	$("#contentCommande").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotifCommandeCount() {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifCommandeNombre: 25
        }),
        dataType: "text",
        success: function(res) {
        	if (res=="KO") {
        		$("#badgeCountCo").html("");
        	}else{
        		$("#badgeCountCo").html(res);
        	}
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function SeeCommandeU(idCo) {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        SeeItBabeCU: idCo
        }),
        dataType: "text",
        success: function(res) {
        	DetailleOneCommande(idCo);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotifLe() {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifNombre: 32
        }),
        dataType: "text",
        success: function(res) {
        	if (res=="KO") {
        		$("#nombreNotif").html("");
        	}else{
        		$("#nombreNotif").html(res+" Notifications");
        	}
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function GetAllNotifBadge() {
	var url = "controller/notification/controller.notification.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        RecupNotifNombre: 32
        }),
        dataType: "text",
        success: function(res) {
        	if (res=="KO") {
        		$("#badgeCount").html("");
        	}else{
        		$("#badgeCount").html(res);
        	}
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function NewBtnFuncoation() {
	var url = "controller/admin/controller.admin.php";
	$.ajax({
        type: "POST",
        url: url,
        data: ({
	        new_mdpbtn: "go",
            id_admin: $("#id_admin").val(),
            old_mdp: $("#old_mdp").val(),
            new_mdp1: $("#new_mdp1").val(),
            new_mdp2: $("#new_mdp2").val()
        }),
        dataType: "text",
        success: function(res) {
        	if (res=="OK") {
              $("#success").html("Effectuer"); 
              $("#error").html(""); 
              location = "index.php?admin=1";
            }
            else{
               $("#error").html(res); 
            }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function ChangeItBabe(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12,id13) {
	var id1 = document.getElementById(id1);
	var id2 = document.getElementById(id2);
	var id3 = document.getElementById(id3);
	var id4 = document.getElementById(id4);
	var id5 = document.getElementById(id5);
	var id6 = document.getElementById(id6);
	var id7 = document.getElementById(id7);
	var id8 = document.getElementById(id8);
	var id9 = document.getElementById(id9);
	var id10 = document.getElementById(id10);
	var id11 = document.getElementById(id11);
    var id12 = document.getElementById(id12);
	var id13 = document.getElementById(id13);

	id1.style.display = "block";
	id2.style.display = "none";
	id3.style.display = "none";
	id4.style.display = "none";
	id5.style.display = "none";
	id6.style.display = "none";
	id7.style.display = "none";
	id8.style.display = "none";
	id9.style.display = "none";
	id10.style.display = "none";
	id11.style.display = "none";
    id12.style.display = "none";
	id13.style.display = "none";

}
function AllNotif() {
	GetAllNotif();
	GetAllNotifLe();
	GetAllNotifBadge();
	GetAllNotifMessageCount();
	GetAllNotifCommandeCount();
	GetAllNotifMessage();
	GetAllNotifCommande();
}

AllNotif();
setInterval("AllNotif()",5000);
