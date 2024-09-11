$(document).ready(function() {

    const form = $("#form");
    const message = $('#message');

    const campos = {
        placa: $("#placa"),
        chassi: $("#chassi"),
        modelo: $("#modelo"),
        montadora: $("#montadora"),
        situacao: $("#situacao")
    };

    $.each(campos, function(_, campo) {
        campo.on("blur", function() {
            validarCampo(campo);
        });
    });

    $('#btnCadastro').on("click", function(event) {
        event.preventDefault();
        console.log("Botão clicado");

        if (!checkForm()) {
            console.log("Formulário inválido");
            return; 
        }

        var formData = {};

        $.each(campos, function(key, campo) {
            formData[key] = campo.val();
        });

        console.log("Dados do formulário:", formData);
        
        $.ajax({
            url: "http://minas:1529/treinamento/Aline/assistCar/src/controllers/cadastrar_carro.php",
            method: "POST",
            data: formData, 
            
            success: function(response) {
                console.log("Resposta do servidor:", response);
                const result = JSON.parse(response);
                if (result.success) {
                    alert("Veículo cadastrado com sucesso! java");
                } else {
                    alert("Erro ao cadastrar veículo: " + result.error);
                }
                window.location.replace('http://minas:1529/treinamento/Aline/assistCar/src/Views/areaBeneficiario.php')
                
            },
            error: function(xhr, status, error) {
                console.error("Erro ao cadastrar veículo:", error);
                alert("Erro ao cadastrar veículo!!"); 
            }
        });
    });    

    function validarCampo(campo) {
        const valor = campo.val();
        const formItem = campo.parent();

        if (valor === "") {
            errorInput(campo, "Este campo é obrigatório");
            return false;
        } else {
            formItem.removeClass('error');
            formItem.find(".error-message").remove();
            return true;
        }
    }

    function checkForm() {
        let isValid = true;

        $.each(campos, function(_, campo) {
            if (!validarCampo(campo)) {
                isValid = false;
            }
        });

        return isValid;
    }

    function errorInput(campo, mensagem) {
        const formItem = campo.parent();
        let textMessage = formItem.find(".error-message");

        if (textMessage.length === 0) {
            textMessage = $("<span class='error-message'></span>");
            formItem.append(textMessage);
        }

        textMessage.text(mensagem);
        formItem.addClass("error");
    }

});
