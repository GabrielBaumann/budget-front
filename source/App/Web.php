<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Beneficiario;
use Source\Models\Entidade;
use Source\Models\Material;
use Source\Models\Obras;
use Source\Models\Usuario;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/");        
    }

    public function inicio() : void
    {   

        $totUsuario = (new Beneficiario())->find()->count();
        $totObras = (new Obras())->find()->count();
        $totMaterial = (new Material())->find()->count();

        $totais = [
            "totBeneficio" => $totUsuario,
            "totObras" => $totObras,
            "obraNovasMes" => 50,
            "totMateriais" => $totMaterial,
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

    public function obras(?array $data) : void
    {   

        $obras = (new Obras());

        if(!empty($data)) {
            
            if (in_array("", $data)) {
                $json['message'] = "erro";
                echo json_encode($json);
                return;
            }

            $obras->cadastrarObras(
                1,
                $data['nome-obra'],
                $data['endereco'],
                "Planejamento"
            );

            $obras->save();

            $json['redirect'] = url("/ob");
            echo json_encode($json);
            return;

        }


        $obra = $obras->find()->fetch(true);

        echo $this->view->render("pag_obras", [
            "title" => "Obras",
            "listObra" => $obra
        ]);    
    }

    public function materiais(?array $data) : void
    {
        $material = (new Material());

        if (!empty($data)) {

            if (in_array("", $data)) {
                $json['message'] = "erro";
                echo json_encode($json);
                return;
            }

            $material->cadastrarMaterial(
                1,
                $data['nome-material'],
                $data['quantidade'],
                $data['valor'],
                $data['descricao']
            );

            $material->save();

            $json['redirect'] = url("/mat");
            echo json_encode($json);
            return;
        }

        $materiais = $material->find()->fetch(true);

        echo $this->view->render("pag_materiais", [
            "title" => "Materiais",
            "listMateriais" => $materiais
            
        ]);
    }


}
