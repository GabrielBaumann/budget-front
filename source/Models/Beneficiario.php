<?php

namespace Source\Models;

use Source\Core\Model;

class Beneficiario extends Model
{
    public function __construct()
    {
        parent::__construct(
            "obra_beneficiario", ["id_obra_beneficiario"], ["nome_beneficiario_obra", "cpf"]
        );
    }

    public function cadastrarBeneficiario(
        int $idusuarios = 1,
        string $nome_beneficiario_obra,
        string $cpf,
        string $rua,
        string $endereco,
        string $contato,
        string $email
    ) : Beneficiario {
        $this->id_usuario = $idusuarios;
        $this->nome_beneficiario_obra = $nome_beneficiario_obra;
        $this->cpf = $cpf;
        $this->rua = $rua;
        $this->endereco = $endereco;
        $this->contato = $contato;
        $this->email = $email;
        
        return $this;     
    }

    public function save() : bool
    {
        $this->create($this->safe());
        return true; 
    }

    public function findByIdObra($idObra) : Beneficiario
    {
        $this->find("id_obra_beneficiario = :id", "id={$idObra}");
        return $this->fetch();    
    }

}
