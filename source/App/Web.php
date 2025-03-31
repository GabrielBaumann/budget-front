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

        $beneficiario = [
            ["nome" => "Gabirel Belmont",
            "cpf" => "666555877"],
            ["nome" => "Lucas Silva",
            "cpf" => "12345687"],
            ["nome" => "Tiago Silva",
            "cpf" => "13246578"],
            ["nome" => "Victor Laras",
            "cpf" => "7894561"],

        ];

        echo $this->view->render("pag_beneficiario", [
            "title" => "Beneficiario",
            "listaUsuario" => $beneficiario
        ]);    
    }

    public function obras() : void
    {   
        $obras = [
            ["nomeObra" => "Obra 01",
            "status" => "em andamento"],
            ["nomeObra" => "Obra 02",
            "status" => "Planejamento"],
            ["nomeObra" => "Obra 02",
            "status" => "Concluído"]
        ];

        echo $this->view->render("pag_obras", [
            "title" => "Obras",
            "listObra" => $obras
        ]);    
    }

    public function materiais() : void
    {
        $material = [
            ["nome" => "Tijolo", "quantidade" => "3mil", "valorUnitario" => 1258.20],
            ["nome" => "Cimento", "quantidade" => "60", "valorUnitario" => 58.00],
            ["nome" => "Cerâmica", "quantidade" => "20", "valorUnitario" => 125.25],
            ["nome" => "Argamassa", "quantidade" => "20p", "valorUnitario" => 58,53]
        ];

        echo $this->view->render("pag_materiais", [
            "title" => "Materiais",
            "listMateriais" => $material
            
        ]);
    }


}
