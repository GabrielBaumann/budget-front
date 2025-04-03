<?php

namespace Source\Models;

use Source\Core\Model;

class Material extends Model
{
    public function __construct()
    {
        parent::__construct("materiais",["idmateriais"],["idusuarios","material","unidade","preco_unitario","descricao"]);        
    }

    public function cadastrarMaterial(
        int $idUsuarios = 1,
        string $material,
        string $unidade,
        int $preco_unitario,
        string $descricao
    ) : Material  {
        $this->idusuarios = $idUsuarios;
        $this->material = $material;
        $this->unidade = $unidade;
        $this->preco_unitario = $preco_unitario;
        $this->descricao = $descricao;

        return $this;
    }

    public function save() : bool
    {
        $this->create($this->safe());
        return true;    
    }

}
