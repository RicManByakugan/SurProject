function EffaceDonneSur(nom) {
  if (confirm("Poursuivre l'action ? ")) {
    var url = "controller/sur/controller.sur.php";
     $.ajax({
        type: "POST",
        url: url,
        data: ({
          effaceDonne: nom
        }),
        dataType: "text",
        success: function(res) {
          if (res=="ok") {
            All();
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
function Modif(nom,idValue) {
    var url = "controller/sur/controller.sur.php";
    var idValue = document.getElementById(idValue);
    if (idValue.value == "") {
      alert('Donnée vide. Entré votre donnée');
    }
    else{
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            ModifSur: nom,
            valeur: idValue.value
          }),
          dataType: "text",
          success: function(res) {
            if (res=="ok") {
              All();
            }else{
              alert(res);
            }
            idValue.value = "";
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
      });
    }
}
function ModifReseau(nom,idValue) {
    var url = "controller/sur/controller.sur.php";
    var idValue = document.getElementById(idValue);
    if (idValue.value == "") {
      alert('Donnée vide. Entré votre donnée');
    }
    else{
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            ModifSurReseau: nom,
            valeur: idValue.value
          }),
          dataType: "text",
          success: function(res) {
            if (res=="ok") {      
              All();
            }else{
              alert(res);
            }
            idValue.value = "";
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
      });
    }
}
function RecupDonne(id,karazany) {
    var url = "controller/sur/controller.sur.php";
    var idRes = document.getElementById(id);
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        RecupDonneSite: karazany
      }),
      dataType: "text",
      success: function(res) {
      	if (res != null) {
            idRes.innerHTML = ""+res;
      	}
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
function AllReseauUUUU() {
  RecupDonne('afficheTel','telephone');
  RecupDonne('afficheTelAnother','telephoneAnother');
  RecupDonne('afficheTel2','telephone2');
  RecupDonne('afficheTel3','telephone3');
  
  RecupDonne('afficheMail','mail');
  RecupDonne('afficheArrivage','arrivage');
  RecupDonne('afficheProm','promotion');

  RecupDonne('afficheRF','facebook');
  RecupDonne('afficheRI','instagram');
  RecupDonne('afficheRY','youtube');
  RecupDonne('afficheRT','twitter');
}
AllReseauUUUU();
