<?php

namespace Source\App;

use Source\Core\Controller;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/");        
    }

    public function inicio() : void
    {

        echo $this->view->render("pag_inicio", [
            "title" => "MENU",
            "valor" => 10
        ]);    
    }

    public function beneficiario() : void
    {
        echo $this->view->render("pag_beneficiario", [
            "title" => "Beneficiario"
        ]);    
    }
}
