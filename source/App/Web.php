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
        $totais = [
            "totBeneficio" => 1000,
            "totObras" => 1000,
            "obraNovasMes" => 50,
            "totMateriais" => 1000,
            "materialEstoqueBaixo" => 25,
            "totGeral" => 1000000,
            "porcentagem" => "50%"
        ];

        echo $this->view->render("pag_inicio", [
            "title" => "MENU",
            "totais" => $totais
        ]);    
    }

    public function beneficiario() : void
    {
        echo $this->view->render("pag_beneficiario", [
            "title" => "Beneficiario"
        ]);    
    }
}
