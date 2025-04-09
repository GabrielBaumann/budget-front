<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Usuario;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/web/");
    }

    public function login(?array $data) : void
    {
        $usuario = (new Usuario);
        var_dump($usuario->autenticar("silvan@gmaill.com","113245678"));
        
        echo $this->view->render("login", [
            "title" => "Login"
        ]);
    }

}
