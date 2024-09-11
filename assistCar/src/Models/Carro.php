<?php

include_once '../database/connection.php';

class Carro {
    private $conn;
    private $table_name = "tbl_veiculo";

    public $placa;
    public $chassi;
    public $modelo;
    public $montadora;
    public $situacao;
    public $idAssociado;

    public function __construct($conn){
        $this->conn = $conn;
    }

    
    public function create () {
        $query = "INSERT INTO " . $this->table_name . " (placa, chassi, modelo, montadora, situacao, idAssociado) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query); 
        
        if (!$stmt) {
            error_log("Erro ao preparar a consulta: " . $this->conn->error);
            echo "Erro ao preparar a consulta: " . $this->conn->error;
            return false;
        }
        
        $stmt->bind_param("sssssi", $this->placa, $this->chassi, $this->modelo, $this->montadora, $this->situacao, $this->idAssociado);
        
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Erro ao executar a consulta: " . $stmt->error);
            echo "Erro ao executar a consulta: " . $stmt->error;
        }

        return false;
        
    }
    
}