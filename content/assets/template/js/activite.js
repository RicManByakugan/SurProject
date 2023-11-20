// PUB---------------------------------------------------------------------
function AffichePub(id_pub,typePost) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
    var url = "controller/publication/controller.publication.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        AffichePubA: id_pub,
        useragent: navigator.userAgent,
        platform: navigator.platform,
        product: navigator.product
      }),
      dataType: "text",
      success: function(res) {
      	$("#donnePublication").html(res);
      	$.ajax({
          		type: "POST",
          		url: url,
          		data: ({
          			RecupDonnePubTypeLeft: 167853,
            		TypePost: typePost
          		}),
          		dataType : "text",
          		success: function(res) {
          			$("#GenreView").html(res);
          		},
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
        });
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
function RecupAllPost() {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        RecupDonnePub: "go"
      }),
      dataType: "text",
      success: function(res) {
      	$("#donnePublication").html(res);
      	$("#GenreView").html("");
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
RecupAllPost();
function RecupAllPostType(type) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        RecupDonnePubType: "go",
        TypePost: type
      }),
      dataType: "text",
      success: function(res) {
      	$("#donnePublication").html(res);
      	$.ajax({
      		type: "POST",
      		url: url,
      		data: ({
      			RecupDonnePubTypeLeft: "go",
        		TypePost: type
      		}),
      		dataType : "text",
      		success: function(res) {
      			ScrollToTo('oneContent');
      			$("#GenreView").html(res);
      		},
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
      	});
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
function RecupAllPostTypeGenre(type,genre) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
		$.ajax({
          type: "POST",
          url: url,
          data: ({
            RecupDonneTypePubGenre: type,
            genre: genre
          }),
          dataType: "text",
          success: function(res) {
      		  ScrollToTo('oneContent');
          	$("#donnePublication").html(res);
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });	
}
function RecupAllPostTypeGenreCat(type,cat,genre) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
		$.ajax({
          type: "POST",
          url: url,
          data: ({
            RecupDonneTypePubGenreCat: type,
            genre: genre,
            cat: cat
          }),
          dataType: "text",
          success: function(res) {
      		  ScrollToTo('oneContent');
          	$("#donnePublication").html(res);
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });	
}
function RecupAllPostProduit(categorie) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
		var url = "controller/publication/controller.publication.php";
    if (categorie != "Tout") {
        $.ajax({
          type: "POST",
          url: url,
          data: ({
            RecupDonnePubProduit: "go",
            cat: categorie
          }),
          dataType: "text",
          success: function(res) {
      		ScrollToTo('oneContent');
          	$("#donnePublication").html(res);
          	$.ajax({
          		type: "POST",
          		url: url,
          		data: ({
          			// RecupDonnePubTypeLeft: "go",
          			RecupDonnePubTypeLeftCat: categorie,
            		TypePost: "PRODUIT"
          		}),
          		dataType : "text",
          		success: function(res) {
          			$("#GenreView").html(res);
          		},
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
          	});
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });	
    }else{
    	RecupAllPostType("PRODUIT");
    }
}
function RecupAllPostService(categorie) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
    if (categorie != "Tout") {
        $.ajax({
          type: "POST",
          url: url,
          data: ({
            RecupDonnePubService: "go",
            cat: categorie
          }),
          dataType: "text",
          success: function(res) {
          	$("#donnePublication").html(res);
          	$.ajax({
          		type: "POST",
          		url: url,
          		data: ({
          			RecupDonnePubTypeLeftCat: categorie,
            		TypePost: "SERVICE"
          		}),
          		dataType : "text",
          		success: function(res) {
          			$("#GenreView").html(res);
          		},
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
          	});
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });
    }else{
    	RecupAllPostType("SERVICE");
    }
}
function RecupAllPostFormation(categorie) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
    if (categorie != "Tout") {
        $.ajax({
          type: "POST",
          url: url,
          data: ({
            RecupDonnePubFormation: "go",
            cat: categorie
          }),
          dataType: "text",
          success: function(res) {
          	$("#donnePublication").html(res);
          	$.ajax({
          		type: "POST",
          		url: url,
          		data: ({
          			// RecupDonnePubTypeLeft: "go",
          			RecupDonnePubTypeLeftCat: categorie,
            		TypePost: "FORMATION"
          		}),
          		dataType : "text",
          		success: function(res) {
          			$("#GenreView").html(res);
          		},
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
          	});
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });
     }else{
    	RecupAllPostType("FORMATION");
    }
}
function RechercheSur() {
	var RechercheLieu = document.getElementById('RechercheCateLieu');
	var RechercheCate = document.getElementById('RechercheCate');
	if (rechercheSurP.value != "") {
		Recherche(rechercheSurP.value,RechercheCate.value);
	}
}
function Recherche(nom,categorie) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        Recherche: nom,
        Categorie: categorie
      }),
      dataType: "text",
      success: function(res) {
      	$("#donnePublication").html(res);
      	$("#GenreView").html("");
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
function RechercheLieu(nom,lieu) {
	$("#donnePublication").html("<div style='text-align:center;'><div class='spinner-border text-warning'></div></div>");
	var url = "controller/publication/controller.publication.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        RechercheLieu: nom,
        lieuRe: lieu
      }),
      dataType: "text",
      success: function(res) {
      	$("#donnePublication").html(res);
      	$("#GenreView").html("");
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
// PUB---------------------------------------------------------------------

function ScrollToTo(id) {
    document.getElementById(id).scrollIntoView({
      behavior: 'smooth'
    });
}
function ShowImage(modal,img1,imgModal,text,TexteDesc) {
	var modal = document.getElementById(modal);

	var img = document.getElementById(img1);
	var modalImg = document.getElementById(imgModal);
	var captionText = document.getElementById(text);

	modal.style.display = "block";
	modalImg.src = img.src;
	captionText.innerHTML = TexteDesc;
}


// SPONS---------------------------------------------------------------------
function RecupAllSpons() {
	var url = "controller/sponsors/controller.sponsors.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        RecupSponsListeCl: "go"
      }),
      dataType: "text",
      success: function(res) {
      	$("#SponsListe").html(res);
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
function RecupAllPart() {
	var url = "controller/partenaire/controller.partenaire.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        RecupPartListeCl: "go"
      }),
      dataType: "text",
      success: function(res) {
      	$("#PartListe").html(res);
      },
      error: function(e) {
          alert('Verifier votre connexion internet');
          window.location.reload();
      }
    });
}
RecupAllSpons();
RecupAllPart();
setInterval("RecupAllSpons()",10000);
setInterval("RecupAllPart()",10000);
// SPONS---------------------------------------------------------------------



// USER---------------------------------------------------------------------
function TestUserCode(idUser) {
	var code = prompt("Entrer le code validation dans votre adresse email");
	if (code != "" && code != null) {
          var url = "controller/utilisateur/controller.utilisateur.php";
          $.ajax({
              type: "POST",
              url: url,
              data: ({
                TestCode: idUser,
                codeEnvoie: code
              }),
              dataType: "text",
              success: function(res) {
                  if (res=="ok") {
                    window.location.reload();
                    window.location.reload();
                  }
                  else if(res=="codeKO"){
                    alert('Code incorrecte, Voir dans votre adresse email');
                    TestUserCode(idUser);
                  }
              },
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
            });
	}else{
  		TestUserCode(idUser);
	}
}
function ChangeItPro(mailm) {
    var url = "controller/utilisateur/controller.utilisateur.php";
    var aa = prompt("Entrer nouveau mot de passe");
    if (aa!="" && aa!=null) {
        $.ajax({
          type: "POST",
          url: url,
          data: ({
            UserDPN: mailm,
            mdp: aa
          }),
          dataType: "text",
          success: function(res) {
              if (res=="ok") {
                window.location.reload();
                window.location.reload();
              }
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });
    }else{
      ChangeItPro(mailm);
    }
}
function ConnexUser(idCo,mdp,error,container) {
    var url = "controller/utilisateur/controller.utilisateur.php";
    var idCoo = document.getElementById(idCo);
    var mdpp = document.getElementById(mdp);
    var errorr = document.getElementById(error);
    if (idCoo.value != "") {
      if (mdpp.value != "") {
        container.innerHTML = "Traitement...";
        container.disabled = true;
         $.ajax({
            type: "POST",
            url: url,
            data: ({
                connexion : 4456,
                idCo : idCoo.value,
                mdp : mdpp.value
            }),
            dataType : "text",
            success: function(res) {
                if (res == "OK") {
                  container.innerHTML = "Effectuer...";
                  window.location = "index.php";
                }else if (res == "MDP") {
                  container.innerHTML = "Effectuer";
                  location = "index.php?compte=mdp";
                }else if(res == "Erreur de connexion"){
                  location.reload();
                }else if(res=="koUser"){
                  container.innerHTML = "Effectuer";
                  location = "index.php?compte=co";
                }else{
                  container.innerHTML = "Entrer";
                  container.disabled = false;
                  errorr.innerHTML = res;
                }
            },
            error: function(e) {
                alert('Verifier votre connexion internet');
                window.location.reload();
            }
        });

      }else{
        errorr.innerHTML = "Entrer le mot de passe";
      }
    }else{
      errorr.innerHTML = "Entrer l'adresse email ou numéro téléphone";
    }
 }
 function RecupMdpUser(idEmail,container) {
     var email = document.getElementById(idEmail);
     if (email.value == "") {
          alert("Entrer l'adresse email");
     }else{
          container.innerHTML = "Vérification...";
          container.disabled = true;
          var errorRecu = document.getElementById('errorRecu');
          var successRecu = document.getElementById('successRecu');
          var url = "controller/utilisateur/controller.utilisateur.php";
          errorRecu.innerHTML = "";
          successRecu.innerHTML = "";
          $.ajax({
              type: "POST",
              url: url,
              data: ({
                EmailRecup: email.value
              }),
              dataType: "text",
              success: function(res) {
                  if (res=="ok") {
                    errorRecu.innerHTML = "";
                    successRecu.innerHTML = "";
                    container.innerHTML = "Effectuer ...";
                    location.reload();
                  }else{
                    container.disabled = false;
                    container.innerHTML = "Entrer à nouveau";
                    errorRecu.innerHTML = "Erreur vérifiez votre adresse email";
                    successRecu.innerHTML = "";
                  }
              },
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
          });
     }
 }
 function ReenvoyeCo(idUser, container) {
    //REENVOYE CODE
      if (confirm('Réenvoyer le code de confirmation')) {
          var url = "controller/utilisateur/controller.utilisateur.php";
          container.innerHTML = "Envoie en cours ...";
          container.disabled = true;
          $.ajax({
              type: "POST",
              url: url,
              data: ({
                EmailRecupResendCo: idUser
              }),
              dataType: "text",
              success: function(res) {
                  if (res=="ok") {
                    container.innerHTML = "Effectuer, chargement à nouveau";
                    location.reload();
                  }else{ 
                    alert(res);
                    container.innerHTML = "Erreur de l'envoie ...";
                    location.reload();
                  }
              },
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
          });
      }
 } 
 function Reenvoye(idUser, container) {
    //REENVOYE CODE
      if (confirm('Réenvoyer le code de confirmation')) {
          var url = "controller/utilisateur/controller.utilisateur.php";
          container.innerHTML = "Envoie en cours ...";
          container.disabled = true;
          $.ajax({
              type: "POST",
              url: url,
              data: ({
                EmailRecupResend: idUser
              }),
              dataType: "text",
              success: function(res) {
                  if (res=="ok") {
                    container.innerHTML = "Effectuer, chargement à nouveau";
                    location.reload();
                  }else{ 
                    alert(res);
                    container.innerHTML = "Erreur de l'envoie ...";
                    location.reload();
                  }
              },
              error: function(e) {
                  alert('Verifier votre connexion internet');
                  window.location.reload();
              }
          });
      }
 }
 function TestUserCodeVerification(idUser,container) {
    var code = $("#codeUserRecap").val();
    if (code != "" && code != null) {
      var url = "controller/utilisateur/controller.utilisateur.php";
      $("#errorCoRecapVerifSuite").html("");
      container.innerHTML = "Vérification...";
      container.disabled = true;
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            TestCodeVerif: idUser,
            codeEnvoie: code
          }),
          dataType: "text",
          success: function(res) {
              if (res=="ok") {
                  $("#errorCoRecapVerifSuite").html("");
                  var stepOne = document.getElementById('stepOne');
                  var suiteRec = document.getElementById('suiteRec');
                  stepOne.style.display = "none";
                  suiteRec.style.display = "none";
                  container.innerHTML = "Effectuer ...";
                  location.reload();
              }else if (res=="ko") {
                  alert("Erreur de l'action");
                  location.reload();
              }else{
                  container.disabled = false;
                  container.innerHTML = "Confirmer à nouveau";
                  $("#errorCoRecapVerifSuite").html("Erreur de confirmation, verifier votre code de confirmation ou <a href='#service' data-toggle='modal' data-target='#AppelSur'>contactez l'administration</a>");
              }
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });
    }else{
      $("#errorCoRecapVerifSuite").html("Code vide");
    }
} function TestUserCodeVerificationCo(idUser,container) {
    var code = $("#codeUserRecapCo").val();
    if (code != "" && code != null) {
      var url = "controller/utilisateur/controller.utilisateur.php";
      $("#errorCoRecapVerifSuiteCo").html("");
      container.innerHTML = "Vérification...";
      container.disabled = true;
      $.ajax({
          type: "POST",
          url: url,
          data: ({
            TestCodeVerifCo: idUser,
            codeEnvoieCo: code
          }),
          dataType: "text",
          success: function(res) {
              if (res=="ok") {
                  $("#errorCoRecapVerifSuiteCo").html("");
                  container.innerHTML = "Effectuer ...";
                  location.reload();
              }else if (res=="ko") {
                  alert("Erreur de l'action");
                  location.reload();
              }else{
                  container.disabled = false;
                  container.innerHTML = "Confirmer à nouveau";
                  $("#errorCoRecapVerifSuiteCo").html("Erreur de confirmation, verifier votre code de confirmation ou <a href='#service' data-toggle='modal' data-target='#AppelSur'>contactez l'administration</a>");
              }
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
        });
    }else{
      $("#errorCoRecapVerifSuiteCo").html("Code vide");
    }
}
function ConfirmUserMdp(idUser,container) {
    var mdp1 = document.getElementById('newMdpRec');
    var mdp2 = document.getElementById('newMdpRec2');
    var errorCoVerifSuite = document.getElementById('errorCoVerifSuite');
    errorCoVerifSuite.innerHTML = "";
    if (mdp1.value!="" && mdp2.value!="" && mdp1.value==mdp2.value) {
        container.innerHTML = "Traitement...";
        container.disabled = true;
        var url = "controller/utilisateur/controller.utilisateur.php";
        $.ajax({
            type: "POST",
            url: url,
            data: ({
              TestCodeVerifSuite: idUser,
              mdp: mdp2.value
            }),
            dataType: "text",
            success: function(res) {
               if (res=="ok") {
                  container.innerHTML = "Effectuer";
                  window.location.reload();
               }else if (res=="ko") {
                  alert('Error');
                  window.location.reload();
               }else{
                  container.disabled = false;
                  container.innerHTML = "Confirmer";
                  errorCoVerifSuite.innerHTML = res;
               }
            },
            error: function(e) {
                alert('Verifier votre connexion internet');
                window.location.reload();
            }
          });
    }else{
      errorCoVerifSuite.innerHTML = "Deux mots de passes incorrecte";
    }
}
// USER---------------------------------------------------------------------

// USERNAV
function RecupPanierUserNav() {
    $("#tableListeCommandeNav").html("<div class='row'><div class='col-sm-12 text-center'><div class='spinner-grow text-warning'></div></div></div>");
    var url = "controller/utilisateurNav/controller.usernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            RecupPanier: 12,
            useragent: navigator.userAgent,
            platform: navigator.platform,
            product: navigator.product
        }),
        dataType : "text",
        success: function(res) {
          if (res=="attente") {
            RecupPanierUserNav();
          }else{
            $("#tableListeCommandeNav").html(res);
          }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}RecupPanierUserNav();
function AddToCartNav(idPub,qtP) {
    var url = "controller/utilisateurNav/controller.usernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            PanierUser: 14,
            idPubPanier: idPub,
            Qt: qtP,
            useragent: navigator.userAgent,
            platform: navigator.platform,
            product: navigator.product
        }),
        dataType : "text",
        success: function(res) {
            if (res=="ok") {
                RecupPanierUserNav();
            }else if (res=="Erreur") {
               window.location.reload();
            }else{
                alert(res);
                // ScrollToTo('panierPanier');
            }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function ViderPanierUserNav() {
    $("#tableListeCommandeNav").html("<div class='row'><div class='col-sm-12 text-center'><div class='spinner-grow text-warning'></div></div></div>");
    var url = "controller/utilisateurNav/controller.usernav.php";
    if (confirm("Vider le panier ?")) {
      $.ajax({
              type: "POST",
              url: url,
              data: ({
                  Videanier: "0",
                  useragent: navigator.userAgent,
                  platform: navigator.platform,
                  product: navigator.product
              }),
              dataType : "text",
              success: function(res) {
                  if (res=="ok") {
                      RecupPanierUserNav();
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
function ChangeQtPubUserNav(idPanier,qt) {
    var url = "controller/utilisateurNav/controller.usernav.php";
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
                    RecupPanierUserNav();
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

function SupPanierUserNav(idPanier) {
    var url = "controller/utilisateurNav/controller.usernav.php";
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
                      RecupPanierUserNav();
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
function AcceptePanierUserNav(id,idPub) {
    $("#confirmTelCoNav").html("<div class='row'><div class='col-sm-12 text-center'><div class='spinner-grow text-warning'></div></div></div>");
    var url = "controller/utilisateurNav/controller.usernav.php";
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
            $("#confirmTelCoNav").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function AcceptePanierSurNav(container) {
        var nom = document.getElementById('nomuserpaie');
        var prenom = document.getElementById('prenomuserpaie');
        var accepteConCommande = document.getElementById('accepteConCommande');
        var NummodePaiee = document.getElementById('NummodePaie');
        var modePaiee = document.getElementById('modePaie');
        var AdresseodePaiee = document.getElementById('AdresseodePaie');
        var modePaieProa = document.getElementById('modePaiePro');
        if (accepteConCommande.value=="" || nom.value=="" || prenom.value=="" || NummodePaiee.value=="" || modePaiee.value=="" || AdresseodePaiee.value=="" || modePaieProa.value=="") {
            alert('Formulaire incomplet');
        }else{
        var url = "controller/utilisateurNav/controller.usernav.php";
        if (confirm("Confirmer votre demande ?")) {
            container.disabled = true;
            container.innerHTML = "Traitement...";
            $.ajax({
                    type: "POST",
                    url: url,
                    data: ({
                        CommandeOK: "ok",
                        TypeMo: modePaiee.value,
                        NumMo: NummodePaiee.value,
                        AdresMo: AdresseodePaiee.value,
                        ProMo: modePaieProa.value,
                        nomMo: nom.value,
                        prenomMo: prenom.value,
                        useragent: navigator.userAgent,
                        platform: navigator.platform,
                        product: navigator.product
                    }),
                    dataType : "text",
                    success: function(res) {
                        if (res=="ok") {
                            container.innerHTML = "Effectuer";
                            alert('Effectuer, SUR vous contactera');
                            window.location.reload();
                        }else{
                            container.innerHTML = "Confirmer";
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
function RecupCommandeNav() {
    $("#tableListeCommandeEffectruerNav").html("<div class='row'><div class='col-sm-12 text-center'><div class='spinner-grow text-warning'></div></div></div>");
    var url = "controller/utilisateurNav/controller.usernav.php";
    $.ajax({
            type: "POST",
            url: url,
            data: ({
                RecupCommandePNav: 15,
                useragent: navigator.userAgent,
                platform: navigator.platform,
                product: navigator.product
            }),
            dataType : "text",
            success: function(res) {
                $("#tableListeCommandeEffectruerNav").html(res);
            },
            error: function(e) {
                alert('Verifier votre connexion internet');
                window.location.reload();
            }
    });
}RecupCommandeNav();

function AfficheDetailleCommandeNav(idComCom) {
    $("#affciheDetailleComNav").html("<div class='row'><div class='col-sm-12 text-center'><div class='spinner-grow text-warning'></div></div></div>");
    var url = "controller/utilisateurNav/controller.usernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            RecupDetailmm: 45,
            idUseidComComNav: idComCom
        }),
        dataType : "text",
        success: function(res) {
            $("#affciheDetailleComNav").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
function AnnulerCommandeNav(idComCom) {
    var url = "controller/utilisateurNav/controller.usernav.php";
    if (confirm("Annuler cette commande ?")) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
                AnclCNav: 23,
                idCoAnC: idComCom
            }),
            dataType: "text",
            success: function(res) {
                if (res=="ok") {
                    RecupCommandeNav();
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
function SupCommandeUserNav(idCoco) {
    var url = "controller/utilisateurNav/controller.usernav.php";
    if (confirm("Supprimer cette commande ?")) {
      $.ajax({
          type: "POST",
          url: url,
          data: ({
              SUiclUserNav: 32,
              idCoCSuU: idCoco
          }),
          dataType: "text",
          success: function(res) {
              if (res=="ok") {
                  RecupCommandeNav();
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

function RecupNotifUserCountNav() {
    var url = "controller/utilisateurNav/controller.usernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            getAllNC: 58,
            useragent: navigator.userAgent,
            platform: navigator.platform,
            product: navigator.product
        }),
        dataType: "text",
        success: function(res) {
            $("#bellUNav").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}RecupNotifUserCountNav();
setInterval("RecupNotifUserCountNav()",5000);

function NotifUserSeeingNav(idUser) {
    var url = "controller/utilisateurNav/controller.usernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            seeNotif: 45,
            useragent: navigator.userAgent,
            platform: navigator.platform,
            product: navigator.product
        }),
        dataType: "text",
        success: function(res) {
            if(res=="ok"){
                RecupNotifUserCountNav();
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
function RecupNotifUserNav() {
    var url = "controller/utilisateurNav/controller.usernav.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            getAllNav: 0,
            useragent: navigator.userAgent,
            platform: navigator.platform,
            product: navigator.product
        }),
        dataType: "text",
        success: function(res) {
            $("#listeNotifUserNav").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}RecupNotifUserNav();
function LoadOffreNew() {
    var url = "controller/publication/controller.publication.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            loadOffre: 12
        }),
        dataType: "text",
        success: function(res) {
            $("#offreAffiche").html(res);
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
// setInterval("LoadOffreNew()",5000);
// USERNAV

function Close(modal) {
	var modal = document.getElementById(modal);
	var span = document.getElementsByClassName("close")[0];
  	modal.style.display = "none";
}


var slideIndex = 1;

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

function ReloadCompteUser() {
    var url = "controller/sur/controller.sur.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            ReloadCompte: 12
        }),
        dataType: "text",
        success: function(res) {
            if (res == "ok") {
                window.location.reload()
            }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
    });
}
setInterval("ReloadCompteUser()",1000);
