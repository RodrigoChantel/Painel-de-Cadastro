<?php

class login{

    public function index($user, $pw){
        echo "{$user}{$pw}";
    }

    public function format(){
        echo "Salve rodrigo";
    }

    public function resetPassword($email){
        //Aqui você vai verificar no banco se este email
        //existe. Se existir, você redefine a senha.
        //header("Location: http://localhost/cpainel/index.php");
        echo $email;
    }
}
