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

    public function autenticar(string $email, string $senha): bool
    {
        $usuario = $this->find("email = :email", "email={$email}");

        if(!empty($usuario->fetch())) {

            if($usuario->fetch()->senha === $senha){
                // var_dump("Senha Ok");
                $this->message->success("Ok")->render();
                return true;
            } else {
                // var_dump("Senha errada");
                $this->message->warning("Senha incorreta!")->render();
                return false;
            }
            
        } else {
            // var_dump("Usuário não cadastrado");
            $this->message->error("Usuário não encontrado")->render();
            return false;
        }

    }
}
