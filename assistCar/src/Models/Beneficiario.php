<?php

//include __DIR__ . "/Models/Situacao.php";

class Beneficiario {
    public ?int $idAssociado;
    public string $nome;
    public string $documento;
    public string $email;
    public string $cep;
    public string $rua;
    public int $numero;
    public string $bairro;
    public string $cidade;
    public string $estado;
    public string $senha;

    public function __construct($nome, $documento, $email, $cep, $rua, $numero, $bairro, $cidade, $estado, $senha, $idAssociado = null) {
        $this->idAssociado = $idAssociado;
        $this->nome = $nome;
        $this->documento = $documento;
        $this->email = $email;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->senha = $senha;
    }
}
