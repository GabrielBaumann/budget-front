<?php

namespace Source\Models;

use Source\Core\Model;

class Usuario extends Model
{
    public function __construct()
    {
        parent::__construct(
            "usuarios", ["id_usuarios"], ["nome","email","senha","telefone"]
        );
    }

    public function autenticar(string $email, string $senha)
    {
        $usuario = $this->find("email = :email", "email={$email}");

        if(!empty($usuario)) {

            if($usuario->fetch()->senha === $senha){
                var_dump("Senha Ok");
            } else {
                $this->message = "Senha incorreta!";
                return false;
            }
            
        } else {
            $this->message = "Usuário não cadastrado!";
            return false;
        }

    }
}
