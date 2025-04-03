<?php

namespace Source\Models;

use Source\Core\Model;

class Beneficiario extends Model
{
    public function __construct()
    {
        parent::__construct(
            "beneficiarios", ["idbeneficiarios"], ["nome", "email", "senha"]
        );
    }

    public function cadastrarBeneficiario(
        int $idusuarios = 1,
        string $nome,
        string $cpf,
        string $rua,
        string $endereco,
        string $contato
    ) : Beneficiario {
        $this->idusuarios = $idusuarios;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rua = $rua;
        $this->endereco = $endereco;
        $this->contato = $contato;
        
        return $this;     
    }

    public function save() : bool
    {
        $this->create($this->safe());
        return true; 
    }

}
