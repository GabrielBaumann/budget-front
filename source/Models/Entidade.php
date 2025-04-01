<?php

namespace Source\Models;

use Source\Core\Model;

class Entidade extends Model
{
    public function __construct()
    {
        parent::__construct(
            "entidades", ["identidade"],["responsavel", "email"]
        );
    }
}
