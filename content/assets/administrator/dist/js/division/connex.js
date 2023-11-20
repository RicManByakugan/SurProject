function ConnectAdmin() {
      var url = "controller/admin/controller.admin.php";
      var connexion = document.getElementById('connexion');
      var result = document.getElementById('result');
      result.style.color = "blue";
      $("#result").html("Connexion en cours");
      connexion.disabled = true;
      $.ajax({
        type: "POST",
        url: url,
        data: ({
            connexionAdmin : "GO",
            pseudo : $("#pseudo").val(),
            mdp : $("#mdp").val()
        }),
        dataType: "text",
        success: function(res) {
              if (res=="OK") {
                connexion.disabled = true;
                result.style.color = "blue";
                $("#result").html("Connexion réussi");
                location = "index.php?admin=1";
              }else{
                connexion.disabled = false;
                result.style.color = "red";
                $("#result").html(res);
              }
        },
        error: function(e) {
            alert('Verifier votre connexion internet');
            window.location.reload();
        }
      }); 
}