<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Usuario;
use Source\Support\Message;

class Web extends Controller
{

    public $message;

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/web/");

        $this->message = new Message();
    }

    public function login(?array $data) : void
    {   
        $usuario = (new Usuario());
        if(!empty($data)){

            if(empty($data['usuario']) || empty($data['senha'])){
                $json['message'] = $this->message->error("Preecha todos os campos")->render();
                echo json_encode($json);
                return;
            }

            if ($usuario->autenticar($data['usuario'], $data['senha'])) {
                // var_dump($data);
                $json['message'] = $usuario->message()->render();
                $json['redirect'] = url("/ini");
                echo json_encode($json);
                return;
            } else {
                $json['message'] = $usuario->message()->render();
                echo json_encode($json);
                return;
            }      
            return;
        }



        echo $this->view->render("login", [
            "title" => "Login"
        ]);
    }

}
