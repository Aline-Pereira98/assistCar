$(document).ready(function() {
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
        placa: $("#placa"),
        chassi: $("#chassi"),
        modelo: $("#modelo"),
        montadora: $("#montadora"),
        situacao: $("#situacao")
    };

    function preencherCampos(data) {
        campos.nome.val(data.nome);
        campos.documento.val(data.documento);
        campos.email.val(data.email);
        campos.cep.val(data.cep);
        campos.rua.val(data.rua);
        campos.numero.val(data.numero);
        campos.bairro.val(data.bairro);
        campos.cidade.val(data.cidade);
        campos.estado.val(data.estado);
        campos.placa.val(data.placa || '');
        campos.chassi.val(data.chassi || '');
        campos.modelo.val(data.modelo || '');
        campos.montadora.val(data.montadora || '');
        campos.situacao.val(data.situacao || '');
    }

    $.ajax({
        url: 'http://minas:1529/treinamento/Aline/assistCar/src/Controllers/retorna_dados.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                preencherCampos(response.data);
            } else {
                alert(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("ERRO:", error);
            alert("Erro ao obter os dados");
        }
    });
});
