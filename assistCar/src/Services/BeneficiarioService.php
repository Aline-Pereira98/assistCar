<?php

require_once '../Models/Beneficiario.php';
require_once '../Repositories/BeneficiarioRepository.php';


class BeneficiarioService {
    private $beneficiarioRepository;

    public function __construct($conn) {
        $this->beneficiarioRepository = new BeneficiarioRepository($conn);
    }

    public function criarBeneficiario($dados) {
        foreach ($dados as $key => $value) {
            if ($key !== 'senha') {
                $dados[$key] = strtoupper($value);
            }
        }

        $dados['senha'] = password_hash($dados['senha'], PASSWORD_BCRYPT);

        $beneficiario = new Beneficiario(
            //$dados['idAssociado'],
            $dados['nome'],
            $dados['documento'],
            $dados['email'],
            $dados['cep'],
            $dados['rua'],
            $dados['numero'],
            $dados['bairro'],
            $dados['cidade'],
            $dados['estado'],
            $dados['senha']
        );

       
        return $this->beneficiarioRepository->salvaBeneficiario($beneficiario);
    }
}
