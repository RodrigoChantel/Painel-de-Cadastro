<?php

class Conection
{

    static public function conect(){
        $HOST= '127.0.0.1';
        $USUARIO= 'root';
        $SENHA= '';
        $DB = 'cpainel';
        $x = mysqli_connect ($HOST, $USUARIO, $SENHA, $DB) or die ('Não foi possível conectar-se ao banco de dados');
        return $x;
    }
}