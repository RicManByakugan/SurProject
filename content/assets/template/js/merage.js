
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
            if (res == "ko") {
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