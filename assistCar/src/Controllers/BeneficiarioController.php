<?php

//include __DIR__ . '/../Service/BeneficiarioService.php';
require_once '../Services/BeneficiarioService.php';
require_once '../config/connection.php';

class BeneficiarioController {
    private $beneficiarioService;

    public function __construct() {
        $this->beneficiarioService = new BeneficiarioService($GLOBALS['conn']);
    }

    public function criarBeneficiario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = $_POST;

            error_log("Dados recebidos: " . print_r($dados, true));

           

            $resultado = $this->beneficiarioService->criarBeneficiario($dados);

            if ($resultado) {
                echo json_encode(['success' => true, 'message' => 'Beneficiário criado com sucesso!']);
            } else {
                error_log("Erro ao criar beneficiário");
                echo json_encode(['success' => false, 'message' => 'Falha ao criar beneficiário.']);
            }
        }
    }
}

$controller = new BeneficiarioController();
$controller->criarBeneficiario();
