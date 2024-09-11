<?php
session_start();
if (!isset($_SESSION['idAssociado'])) {
    // header("Location: login.php");
    echo "Usuário não autenticado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/areaBeneficiario.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Area do associado</title>
</head>

<body>
    <div class="container">
        <section class="header">
            <h2>Bem vindo!<?php echo $_SESSION['nome'];?></h2>
        </section>
        <div class="sair"><a href="../Controllers/logout.php">Sair</a></div>
        <div class="img">
            <img src="../public/assets/perfil-de-usuario.png" alt="Seus dados">
            <img src="../public/assets/carro-novo.png" alt="Seus veiculos">
        </div>
        <div class="conteinerAcc">
            <div class="accBeneficiario">
                <button class="btnBeneficiario">Seus dados</button>
                <div class="panel">
                    <form id="form" class="form">
        
                        <div class="form-content">
                            <label for="nome"><?php echo utf8_decode('Nome do beneficiário');?></label>
                            <input type="text" id="nome" name="nome" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="documento">Documento</label>
                            <input type="text" id="documento" name="documento" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" disabled="">
        
                        </div>
        
                        <div class="form-content">
                            <label for="cep">Cep</label>
                            <input type="cep" id="cep" name="cep" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="rua">Rua</label>
                            <input type="text" id="rua" name="rua" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="numero">Número</label>
                            <input type="number" id="numero" name="numero" disabled="">
        
                        </div>
        
                        <div class="form-content">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" disabled="">
        
                        </div>
        
                        <div class="form-content">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" disabled="">
        
                        </div>
        
                        <div class="form-content">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" name="estado" disabled="">
        
                        </div>
                    </form>
                </div>
            </div>
            <div class="accCarro">
                <button class="btnCarro">Seus veiculos</button>
                <div class="panel">
                    <form id="form" class="form">
        
                        <div class="form-content">
                            <label for="placa">Placa</label>
                            <input type="text" id="placa" name="placa" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="chassi">Chassi</label>
                            <input type="text" id="chassi" name="chassi" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="modelo">Modelo</label>
                            <input type="text" id="modelo" name="modelo" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="montadora">Montadora</label>
                            <input type="text" id="montadora" name="montadora" disabled="">
                        </div>
        
                        <div class="form-content">
                            <label for="situacao">Situação</label>
                            <input type="text" id="situacao" name="situacao" disabled="">
                        </div>

                    </form>
                    <p>Se o campos do veiculo estiverem em branco, e por que voce neo possui veiculo cadastrado. Para cadastrar, clique no botao abaixo </p>
                    <a href="http://minas:1529/treinamento/Aline/assistCar/src/Views/carro.html"><button class="btnCadastro">Cadastrar veiculo</button></a>
                    
                </div> 
                
            </div>

        </div> 
    </div>
    <script src="./src/public/js/accordion.js"></script>
    <script src="./src/public/js/retornaDados.js"></script>

</body>

</html>