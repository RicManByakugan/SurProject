function AddToCart(idPub,qtP) {
    var url = "controller/panier/controller.panier.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            PanierUser: 14,
            idPubPanier: idPub,
            Qt: qtP
        }),
        dataType : "text",
        success: function(res) {
            if (res=="ok") {
                RecupPanier();
            }else if (res=="Erreur") {
                window.reload();
            }else{
                alert(res);
                ScrollToTo('panierPanier');
            }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RecupPanier() {
    var url = "controller/panier/controller.panier.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            RecupPanierP: 12
        }),
        dataType : "text",
        success: function(res) {
            $("#tableListeCommande").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RecupCommande() {
    var url = "controller/commande/controller.commande.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            RecupCommandeP: 15
        }),
        dataType : "text",
        success: function(res) {
            $("#tableListeCommandeEffectruer").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function ChangeQtPub(idPanier,qt) {
    var url = "controller/panier/controller.panier.php";
    if (qt <= 0) {
        alert("Erreur de l'action");
    }else{
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                idPanierChange: idPanier,
                QtPan: qt
            }),
            dataType : "text",
            success: function(res) {
                if (res=="ok") {
                    RecupPanier();
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
function SupPanier(idPanier) {
    var url = "controller/panier/controller.panier.php";
    if (confirm("Poursuivre l'action ?")) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                Suppanier: idPanier
            }),
            dataType : "text",
            success: function(res) {
                if (res=="ok") {
                    RecupPanier();
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
function ViderPanier() {
    var url = "controller/panier/controller.panier.php";
    if (confirm("Vider le panier ?")) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                Videanier: "0"
            }),
            dataType : "text",
            success: function(res) {
                if (res=="ok") {
                    RecupPanier();
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
function AcceptePanier(id,idPub) {
    var url = "controller/panier/controller.panier.php";
    id.disabled = true;
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            accpPan: "ok",
            idPUbAcp: idPub
        }),
        dataType : "text",
        success: function(res) {
            $("#confirmTelCo").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function AcceptePanierSur() {
    var NummodePaiee = document.getElementById('NummodePaie');
    var modePaiee = document.getElementById('modePaie');
    var AdresseodePaiee = document.getElementById('AdresseodePaie');
    var modePaieProa = document.getElementById('modePaiePro');
    if (NummodePaiee.value=="" || modePaiee.value=="" || AdresseodePaiee.value=="" || modePaieProa.value=="") {
        alert('Formulaire incomplet');
    }else{
        var url = "controller/commande/controller.commande.php";
        if (confirm("Confirmer votre demande ?")) {
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                    CommandeOK: "ok",
                    TypeMo: modePaiee.value,
                    NumMo: NummodePaiee.value,
                    AdresMo: AdresseodePaiee.value,
                    ProMo: modePaieProa.value
                }),
                dataType : "text",
                success: function(res) {
                    if (res=="ok") {
                        alert('Effectuer, SUR vous contactera');
                        window.location.reload();
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
function AfficheDetailleCommande(idComCom) {
    var url = "controller/commande/controller.commande.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            RecupDetailmm: "0",
            idUseidComCom: idComCom
        }),
        dataType : "text",
        success: function(res) {
            $("#affciheDetailleCom").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
    
}
function SupCommandeUser(idCoco) {
    var url = "controller/commande/controller.commande.php";
    if (confirm("Supprimer cette commande ?")) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                SUiclUser: "go",
                idCoCSuU: idCoco
            }),
            dataType: "text",
            success: function(res) {
                if (res=="ok") {
                    RecupCommande();
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
function AnnulerCommande(idComCom) {
    var url = "controller/commande/controller.commande.php";
    if (confirm("Annuler cette commande ?")) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                AnclC: "go",
                idCoAnC: idComCom
            }),
            dataType: "text",
            success: function(res) {
                if (res=="ok") {
                    RecupCommande();
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
function RecupNotifUser() {
    var url = "controller/notificationUser/controller.notificationUser.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            getAllN: 45
        }),
        dataType: "text",
        success: function(res) {
            $("#listeNotifUser").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function RecupNotifUserCount() {
    var url = "controller/notificationUser/controller.notificationUser.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            getAllNC: 58
        }),
        dataType: "text",
        success: function(res) {
            $("#bellEffC").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function SupImageUClient() {
    var url = "controller/utilisateur/controller.utilisateur.php";
    if (confirm("Supprimer votre profil")) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                idUserSupImgUC: 11
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
}
function NotifUserSeeing(idUser) {
    var url = "controller/notificationUser/controller.notificationUser.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            seeNotif: "go",
            idUserSN: idUser
        }),
        dataType: "text",
        success: function(res) {
            if(res=="ok"){
                RecupNotifUserCount();
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
RecupNotifUser();
RecupCommande();
RecupPanier();
RecupNotifUserCount();
setInterval("RecupCommande()",1000);
setInterval("RecupNotifUser()",1000);
setInterval("RecupNotifUserCount()",5000);


function SuggestionUser() {
    var url = "controller/utilisateur/controller.utilisateur.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
          suggesUser: 66
        }),
        dataType: "text",
        success: function(res) {
            $("#userSugg").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}SuggestionUser();
function AfficheImage(input,output) {
    var o = document.getElementById(output);
    o.src = window.URL.createObjectURL(input.files[0]);
    o.style.display = "block";
}
function CheckImage(input,btn,output) {
    var btn = document.getElementById(btn);
    if (!input.files) {
        alert("Navigateur obsolète ! Mettez à jour ou changer de navigateur");
        input.value = null;
    }else {
        var file = input.files[0];
        if (file.size < 1000000) {
            btn.disabled = false;
            AfficheImage(input,output);
        }else{
            alert('Image trop grande, Chargé une nouvelle image');
            btn.disabled = true;
            input.value = null;
        }
    }
}
function CountActUpUser(type,idRes) {
    var url = "controller/activiteUser/controller.activiteUser.php";
    var ress = document.getElementById(idRes);
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            CountAct: type
        }),
        dataType: "text",
        success: function(res) {
            ress.innerHTML = res;
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function LogOutUser() {
    var url = "controller/utilisateur/controller.utilisateur.php";
    if (confirm("Se deconnecter du site ?")) {
        $.ajax({
          type: "POST",
          url: url,
          data: ({
            idUserDeco: 99
          }),
          dataType: "text",
          success: function(res) {
            if (res=="OK") {
                window.location = "index.php";
            }
            else{
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
function ModificationUser(TypeModif,ValeurModif) {
    if (confirm("Poursuivre l'action ?")) {
        var url = "controller/utilisateur/controller.utilisateur.php";
        var ValeurModifModif = document.getElementById(ValeurModif);
        $.ajax({
              type: "POST",
              url: url,
              data: ({
                TypeModiff: TypeModif,
                Valeur: ValeurModifModif.value
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ok") {
                    window.location.reload();
                }else{
                    alert(res);
                    window.location.reload();
                }
              },
              error: function(e) {
                alert('Verifier votre connexion internet');
                window.location.reload();
              }
        });
    }
}
function ModificationUserPassword(mdpA,mdp1,mdp2) {
    var url = "controller/utilisateur/controller.utilisateur.php";
    var mdpAA = document.getElementById(mdpA);
    var mdp11 = document.getElementById(mdp1);
    var mdp22 = document.getElementById(mdp2);

    if (mdp11.value == mdp22.value) {
        if (mdpAA.value != "" || mdpAA.value != null) {
            $.ajax({
                  type: "POST",
                  url: url,
                  data: ({
                    upMdrea:14,
                    mdpAAA: mdpAA.value,
                    PsUp: mdp11.value
                  }),
                  dataType: "text",
                  success: function(res) {
                    if (res=="ok") {
                        window.location.reload();
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
            alert("Ancien mot de passe incorrecte");
        }
    }else{
        alert("Les deux mot de passe incorrecte");
    }
}
