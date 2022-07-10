<?php

class Conection
{

    static public function conect(){
        define('HOST', '127.0.0.1');
        define('USUARIO', 'root');
        define('SENHA', '');
        define('DB', 'cpainel');
        $x = mysqli_connect (HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar-se ao banco de dados');
        return $x;
    }
}