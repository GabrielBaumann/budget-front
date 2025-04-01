<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Beneficiario;
use Source\Models\Entidade;
use Source\Models\Usuario;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/");        
    }

    public function inicio() : void
    {   

        $totUsuario = (new Usuario())->find()->count();

        $totais = [
            "totBeneficio" => $totUsuario,
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

    public function beneficiario(?array $data) : void
    {   
        if(!empty($data)) {
            
            if (in_array("", $data)) {
                $json['message'] = "erro";
                echo json_encode($json);
                return;
            }
            
            $joson['redirect'] = url("/");
            echo json_encode($joson);
            return;

            $usuario = (new Beneficiario())->find()->fetch(true);

            echo $this->view->render("pag_beneficiario", [
                "title" => "Beneficiario",
                "listaUsuario" => $usuario
            ]);

        }

        $usuario = (new Beneficiario())->find()->fetch(true);

        echo $this->view->render("pag_beneficiario", [
            "title" => "Beneficiario",
            "listaUsuario" => $usuario
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
