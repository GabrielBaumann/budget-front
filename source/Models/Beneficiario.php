<?php

namespace Source\Models;

use Source\Core\Model;

class Beneficiario extends Model
{
    public function __construct()
    {
        parent::__construct(
            "beneficiarios", ["idusuarios"], ["nome", "email", "senha"]
        );
    }
}
