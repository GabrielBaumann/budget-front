<?php

namespace Source\Models;

use Source\Core\Model;

class Obras extends Model
{
    public function __construct()
    {
        parent::__construct(
            "obras", ["idobras"], ["endereco","status"]
        );
    }

    public function cadastrarObras(
        int $idusuarios = 1,
        string $rua,
        string $endereco,
        string $status
    ) : Obras {
        $this->idusuarios = $idusuarios;
        $this->rua = $rua;
        $this->endereco = $endereco;
        $this->status = $status;

        return $this;
    }

    public function save() : bool 
    {

        $this->create($this->safe());
        return true;
    }
}
