<?php

require_once '../Models/Beneficiario.php';
require_once '../config/connection.php';

class BeneficiarioRepository {
    private $conn;
    private $table_name = "tbl_associado";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function salvaBeneficiario(Beneficiario $beneficiario) {
        $query = "INSERT INTO . $this->table_name (nome, documento, email, cep, rua, numero, bairro, cidade, estado, senha) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        if ($stmt === false) {
            die('Preparacao falhou: ' . htmlspecialchars($this->conn->error));
            return false;
        }

        $stmt->bind_param('sssssissss', 
            //$beneficiario->idAssociado,
            $beneficiario->nome,
            $beneficiario->documento,
            $beneficiario->email,
            $beneficiario->cep,
            $beneficiario->rua,
            $beneficiario->numero,
            $beneficiario->bairro,
            $beneficiario->cidade,
            $beneficiario->estado,
            $beneficiario->senha
        );

        if ($stmt->execute()) {
            //return true;
            // Retornar o idAssociado gerado
            return $this->conn->insert_id;
        } else {
            error_log('Execute failed: ' . htmlspecialchars($stmt->error));
            return false;
        }
    }
}
