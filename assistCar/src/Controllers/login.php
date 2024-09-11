<?php

include_once '../database/connection.php';
include_once './src/Models/Beneficiario.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); 

$documento = $_POST['documento'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($documento) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'CPF e Senha são obrigatórios!']);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM tbl_associado WHERE documento = ?");
$stmt->bind_param("s", $documento);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();

        session_start();
        $_SESSION['idAssociado'] = $row['idAssociado']; 
       
        echo json_encode(['success' => true, 'redirect' => 'http://minas:1529/treinamento/Aline/assistCar/src/Views/areaBeneficiario.php']);

} else {
    echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
}



