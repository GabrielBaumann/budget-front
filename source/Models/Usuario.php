<?php

namespace Source\Models;

use Source\Core\Model;

class Usuario extends Model
{
    public function __construct()
    {
        parent::__construct(
            "usuarios", ["idusuarios"], ["nome","email","senha","telefone"]
        );
    }
}
