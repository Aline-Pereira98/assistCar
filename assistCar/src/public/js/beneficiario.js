$(document).ready(function() {
    const form = $("#form");

    const campos = {
        nome: $("#nome"),
        documento: $("#documento"),
        email: $("#email"),
        cep: $("#cep"),
        rua: $("#rua"),
        numero: $("#numero"),
        bairro: $("#bairro"),
        cidade: $("#cidade"),
        estado: $("#estado"),
        senha: $("#senha"),
        senhaconfirmacao: $("#senhaconfirmacao")
    }

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
            url: "../Controllers/BeneficiarioController.php",
            method: "POST",
            data: formData,
            
            success: function(response) {
                Swal.fire({
                    title: 'Cadastro realizado com sucesso!',
                    text: 'Deseja cadastrar um veículo ou ir para a área de associado?',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Cadastrar veículo',
                    cancelButtonText: 'Ir para área de associado'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'http://minas:1529/treinamento/Aline/assistCar/src/Views/carro.html';
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        window.location.href = 'http://minas:1529/treinamento/Aline/assistCar/src/Views/areaBeneficiario.php';
                    }

                    
                });
              
            },
    
            error: function(xhr, status, error) {
                alert("Erro ao cadastrar beneficiario JS."); 
                Swal.fire({
                    title: 'Erro',
                    text: 'Erro ao cadastrar beneficiário.',
                    icon: 'error'
                });
            }
            
        });
        
    });

    campos.cep.on('focusout', async () => {
        try {
            const onlyNumbers = /^[0-9]+$/;
            const cepValid = /^[0-9]{8}$/;

            if (!onlyNumbers.test(campos.cep.val()) || !cepValid.test(campos.cep.val())) {
                throw { cep_error: 'Cep inválido' };
            }

            const response = await fetch(`https://viacep.com.br/ws/${campos.cep.val()}/json/`);

            if (!response.ok) {
                throw await response.json();
            }

            const responseCep = await response.json();
            campos.rua.val(responseCep.logradouro);
            campos.bairro.val(responseCep.bairro);
            campos.cidade.val(responseCep.localidade);
            campos.estado.val(responseCep.uf);

        } catch (error) {
            if (error?.cep_error) {
                alert(error.cep_error); 
            }
            console.log(error);
        }
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
