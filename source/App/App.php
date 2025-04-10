<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Beneficiario;
use Source\Models\Entidade;
use Source\Models\Material;
use Source\Models\Obras;
use Source\Models\Unidade;
use Source\Models\Usuario;
use Source\Support\Message;

class App extends Controller
{
    public $message;

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/app/");        
        
        $this->message = (new Message());
    }

    public function inicio() : void
    {   

        $beneficiarios = (new Beneficiario())->find()->fetch(true);

        echo $this->view->render("pag_inicio", [
            "title" => "MENU",
            "beneficiario" => $beneficiarios
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
                "url" => url("/ini"),
                "dados" => $dados,
            ]); 

            return;
        }

        if(!empty($data)) {

            if (in_array("", $data)) {
                $json['message'] = $this->message->error("Preencha todos os dados")->render();
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

            $json['redirect'] = url("/ini");
            echo json_encode($json);
            return;
        }

        echo $this->view->render("formulario_beneficiario", [
            "title" => "Beneficiario",
            "tituloFormulario" => "Beneficiário/Obra",
            "url" => url("/ini"),
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
           
            if(empty($data['unidade']) || empty($data['abreviacao'])) {
                $json['message'] = $this->message->warning("Preencha todos os campos")->render();
                echo json_encode($json);
                return;
            }

            $undiades->cadastarUnidade(
                1,
                $data['unidade'],
                $data['abreviacao'],
                $data['observacoes']
            );

            $undiades->save();

            $json['message'] = $this->message->success("Cadastro feito com sucesso!")->render();
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
