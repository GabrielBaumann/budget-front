<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Beneficiario;
use Source\Models\Entidade;
use Source\Models\Material;
use Source\Models\Obras;
use Source\Models\Unidade;
use Source\Models\Usuario;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/");        
    }

    public function inicio() : void
    {   

        $beneficiarios = (new Beneficiario())->find()->fetch(true);

        echo $this->view->render("pag_inicio", [
            "title" => "MENU",
            "beneficiario" => $beneficiarios
        ]);    
    }

    public function beneficiario(?array $data) : void
    {   
        if(!empty($data)) {

            if (in_array("", $data)) {
                $json['message'] = "Preencha todos os dados";
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

    public function cadastroBeneficiario(?array $data) : void
    {   
        $beneficiario = (new Beneficiario());

        $id = $data['id'] ?? null;

        if ($id) {

            $dados = (new Beneficiario())->findByIdObra($data['id']);

            echo $this->view->render("formulario_beneficiario", [
                "title" => "Editar Beneficiario",
                "tituloFormulario" => "Editar Beneficiário/Obra",
                "url" => url("/"),
                "dados" => $dados
            ]); 

            return;
        }

        if(!empty($data)) {

            if (in_array("", $data)) {
                $json['message'] = "Preencha todos os dados";
                echo json_encode($json);
                return;
            }

            $beneficiario->cadastrarBeneficiario(
                1,
                $data['nome'],
                $data['cpf'],
                $data['endereco'],
                $data['endereco'],
                $data['telefone'],
                $data['email']
            );

            $beneficiario->save();

            $json['redirect'] = url("/");
            echo json_encode($json);
            return;
        }

        

        echo $this->view->render("formulario_beneficiario", [
            "title" => "Beneficiario",
            "tituloFormulario" => "Beneficiário/Obra",
            "url" => url("/"),
            "dados" => null
        ]);     
    }

    public function unidadeMedida() : void
    {
        $undiades = (new Unidade())->find()->fetch(true);

        echo $this->view->render("pag_unidade_medida", [
            "title" => "Medidas cadastradas",
            "unidades" => $undiades
        ]);
    }

    public function cadastroUnidade(?array $data) : void
    {   
        $undiades = (new Unidade());

        $id = $data['id'] ?? null;

        if ($id) {
            $dados = $undiades->findIdUnidade($id);
            
            echo $this->view->render("formulario_unidade", [
                "title" => "Editar Unidades de Medida",
                "tituloFormulario" => "Editar Unidade",
                "url" => url("/unidade"),
                "dados" => $dados
            ]);

            return;
        }

        if(!empty($data)) {
            
            $undiades->cadastarUnidade(
                1,
                $data['unidade'],
                $data['abreviacao'],
                $data['observacoes']
            );

            $undiades->save();

            $json['redirect'] = url("/unidade");
            echo json_encode($json);
            return;
        }

        echo $this->view->render("formulario_unidade", [
            "title" => "Unidade de Medida",
            "tituloFormulario" => "Unidade",
            "url" => url("/unidade"),
            "dados" => null
        ]);
    }

}
