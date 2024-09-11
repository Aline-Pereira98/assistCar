<?php
include_once '../database/connection.php';

session_start();

if (!isset($_SESSION['idAssociado'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado!']);
    exit;
}

$idAssociado = $_SESSION['idAssociado'];

$sql = "
SELECT 
    a.nome, a.documento, a.email, a.cep, a.rua, a.numero, a.bairro, a.cidade, a.estado,
    b.placa, b.chassi, b.modelo, b.montadora, b.situacao
FROM 
    tbl_associado a
LEFT JOIN 
    tbl_veiculo b ON a.idAssociado = b.idAssociado
WHERE 
    a.idAssociado = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idAssociado);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'data' => $row]);
} else {
    echo json_encode(['success' => false, 'message' => 'Dados do usuário não encontrados.']);
}

$stmt->close();
$conn->close();
?>
