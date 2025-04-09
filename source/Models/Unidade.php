<?php

namespace Source\Models;

use Source\Core\Model;

class Unidade extends Model
{
    public function __construct()
    {
        parent::__construct(
            "unidade",["id_unidade"],["unidade", "abreviacao"]
        );
    }

    public function cadastarUnidade(
        int $idUsuario = 1,
        string $unidade,
        string $abreviacao,
        string $observacao
    ) : Unidade{
        $this->id_usuario = $idUsuario;
        $this->unidade = $unidade;
        $this->abreviacao = $abreviacao;
        $this->observacao = $observacao;

        return $this;
    }

    public function save() : bool
    {
        $this->create($this->safe());
        return true;    
    }

    public function findIdUnidade(int $id) : Unidade
    {
        $this->find("id_unidade = :id", "id={$id}");
        return $this->fetch();    
    }

}
