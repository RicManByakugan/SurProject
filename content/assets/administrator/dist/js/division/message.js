function RecupUserList() {
	var url = "controller/admin/controller.admin.php";
    $.ajax({
          type: "POST",
          url: url,
          data: ({
            RecupUserLis: 40
          }),
          dataType: "text",
          success: function(res) {
                $("#listeUser").html(res);
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
    });
}
function RecupMess() {
    var url = "controller/message/controller.message.php";
    $.ajax({
          type: "POST",
          url: url,
          data: ({
            RecupMess: 12,
          }),
          dataType: "text",
          success: function(res) {
                $("#listeMessage").html(res);
          },
          error: function(e) {
              alert('Verifier votre connexion internet');
              window.location.reload();
          }
    });
}
function ValideIdmessage() {
    var AjoutMessage= document.getElementById('AjoutMessage');
    ImgOK('imgMess11');
    ImgOK('imgMess22');
    ImgOK('imgMess33');
    AjoutMessage.reset();
}
function MessageJs() {
  RecupUserList();
  RecupMess();
}
setInterval("MessageJs()",5000);
