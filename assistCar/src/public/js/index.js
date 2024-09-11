$(document).ready(function () {
   
    $('#btn').on("click", function (event) {
        event.preventDefault();
        console.log("Botão clicado");

        var documento = $('#documento').val();
        var senha = $('#senha').val();
        

        $.ajax({
            url: 'http://minas:1529/treinamento/Aline/assistCar/src/Controllers/login.php',
            type: 'POST',
            data: {
                documento: documento,
                senha: senha
            },
            dataType: 'json',
            success: function (response) {
                console.log("Resposta do servidor: ", response); 
                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("ERRO:", error);
                alert("Erro ao conectar ao servidor: " + xhr.responseText);
            }
        });
    });

});


