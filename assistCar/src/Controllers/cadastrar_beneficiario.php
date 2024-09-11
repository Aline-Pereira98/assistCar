<?php

include_once '../database/connection.php';
include_once '../Models/Beneficiario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $beneficiario = new Beneficiario($conn);

    $beneficiario->nome = $_POST['nome'];
    $beneficiario->documento = $_POST['documento'];
    $beneficiario->email = $_POST['email'];
    $beneficiario->cep = $_POST['cep'];
    $beneficiario->rua = $_POST['rua'];
    $beneficiario->numero = $_POST['numero'];
    $beneficiario->bairro = $_POST['bairro'];
    $beneficiario->cidade = $_POST['cidade'];
    $beneficiario->estado = $_POST['estado'];
    $beneficiario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    if ($beneficiario->create()) {
        session_start();
        $_SESSION['idAssociado'] = $conn->insert_id;
        echo json_encode(['success' => true, 'redirect' => 'areaBeneficiario.php']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar beneficiário.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'O formulário não foi enviado.']);
}
?>
