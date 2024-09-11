<?php
// var_dump($_POST);
// header('Content-Type: application/json');
session_start();
include_once '../database/connection.php';
include_once './src/Models/Carro.php';

if (!isset($_SESSION['idAssociado'])) {
    echo json_encode(['success' => false, 'error' => 'Usuário não está logado.']);
    exit;
}

$idAssociado = $_SESSION['idAssociado'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!isset($_POST['placa']) || !isset($_POST['chassi']) || !isset($_POST['modelo']) || !isset($_POST['montadora']) || !isset($_POST['situacao'])) {
        echo json_encode(['success' => false, 'error' => 'Dados incompletos.']);
        exit;
    }

    $carro = new Carro($conn);

    $carro->placa = $_POST['placa'];
    $carro->chassi = $_POST['chassi'];
    $carro->modelo = $_POST['modelo'];
    $carro->montadora = $_POST['montadora'];
    $carro->situacao = $_POST['situacao'];
    $carro->idAssociado = $idAssociado;

    if ($carro->create()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao cadastrar o veículo.']);
    }
}else {
    echo json_encode(['success' => false, 'error' => 'Método de requisição inválido.']);
}
?>
