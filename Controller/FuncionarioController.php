<?php

use LDAP\Result;

include_once('/xampp/htdocs/CPainel/Model/Conection.php');
class FuncionarioController{
    public function funcionarios($nome1, $sobrenome1, $rg1, $email1, $empresa1){
        if($nome1 == null || $sobrenome1 == null || $rg1 == null || $email1 == null || $empresa1 == null){
            header("location: http://localhost/cpainel/views/naofunciona.php");
        }
        $this->sendWhitDB($nome1, $sobrenome1, $rg1, $email1, $empresa1);
    }
    public function sendWhitDB($nomePost, $sobrenomePost, $rgPost, $emailPost, $empresaPost){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $nomecad = mysqli_real_escape_string($conexao, $nomePost);
        $sobrenomecad = mysqli_real_escape_string($conexao, $sobrenomePost);
        $rgcad = mysqli_real_escape_string($conexao, $rgPost);
        $emailcad = mysqli_real_escape_string($conexao, $emailPost);
        $empresacad = mysqli_real_escape_string($conexao, $empresaPost);

        $queryDB = "select * from funcionarios where rg = '{$rgcad}' or email = '{$emailcad}'";
        $checkEmployees = mysqli_query($conexao, $queryDB);
        $count = mysqli_num_rows($checkEmployees);

        if($count >= 1){
            echo "funcionário já possui cadastro em nosso sistema.";
            die;
        }

        $insertEmployees = "INSERT INTO funcionarios (nome, sobrenome, rg, email, empresa) 
                            VALUES ('{$nomecad}','{$sobrenomecad}', '{$rgcad}', '{$emailcad}', '{$empresacad}')";
        $registerEmployees = mysqli_query($conexao, $insertEmployees);
        if($registerEmployees == true){
            echo "<script type='text/javascript'>alert('Você cadastrou o $nomecad com sucesso.');location='http://localhost/cpainel/views/admin/index.php';</script>";
        }
        else{
            echo "Error:'{$registerEmployees->error}'";
        }

    }

    public function nFuncionarios(){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $sqlQuery = "select ID_Funcionario from funcionarios";
        $checklist = mysqli_query($conexao, $sqlQuery);
        $numrows = mysqli_num_rows($checklist);
        echo $numrows;
    }

    public function cFuncionarios(){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $sqlQuery = "select * from funcionarios";
        $check = mysqli_query($conexao, $sqlQuery);
        $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
        return $checkAssoc;
    }

    public function join(){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $sqlQuery = "SELECT *
                    FROM funcionarios
                    INNER JOIN empresa
                    ON funcionarios.empresa = empresa.id";
        $check = mysqli_query($conexao, $sqlQuery);
        $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
        return $checkAssoc;
    }
    

    public function funcionarioEdit($idcad, $nome, $sobrenome, $rg, $email, $empresa){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $nomecad = mysqli_real_escape_string($conexao, $nome);
        $sobrenomecad = mysqli_real_escape_string($conexao, $sobrenome);
        $rgcad = mysqli_real_escape_string($conexao, $rg);
        $emailcad = mysqli_real_escape_string($conexao, $email);
        $empresacad = mysqli_real_escape_string($conexao, $empresa);

        $update = "UPDATE funcionarios SET nome='$nomecad', sobrenome='$sobrenomecad', rg='$rgcad', email='$emailcad', empresa='$empresacad' where ID_Funcionario=$idcad";
        $registerEmployees = mysqli_query($conexao, $update);
        if($registerEmployees == true){
            echo "<script type='text/javascript'>alert('As alterações em $nomecad foram salvas.');location='http://localhost/cpainel/views/admin/index.php';</script>";
        }else{
            echo "deu ruim";
        }

    }

    public function editfunc($aaa){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $idReturn = mysqli_real_escape_string($conexao, $aaa['id']);
        $sqlQuery = "select * from funcionarios where ID_Funcionario = '{$idReturn}'";
        $result = $conexao->query($sqlQuery);
        $cheklist = $result->fetch_all(MYSQLI_ASSOC);
        return $cheklist;
    }

    public function show(){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $emp = new FuncionarioController;
        $emp = $emp->editfunc($_GET);
        $emp = $emp[0];

        $idReturn = mysqli_real_escape_string($conexao, $emp['empresa']);
        $sqlQuery = "select * from empresa where id = '{$idReturn}'";
        $result = $conexao->query($sqlQuery);
        $cheklist = $result->fetch_all(MYSQLI_ASSOC);
        $cheklist = $cheklist[0];
        return $cheklist;
    }

    public function buscadorFuncionario($buscaNome){
        if($buscaNome == NULL){
            echo "<script type='text/javascript'>alert('Não é possível buscar por campo vazio!  Levaremos você de volta para página inicial.');location='http://localhost/cpainel/views/admin/index.php';</script>";
        }else{
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $transformaEmString = mysqli_real_escape_string($conexao, $buscaNome);
        $sqlQuery = "select * from funcionarios where nome like '%{$transformaEmString}%' ";
        $buscador = $conexao->query($sqlQuery);
        $resultado = $buscador->fetch_all(MYSQLI_ASSOC);

        foreach ($resultado as $result){
            echo "<hr>" . $result['nome'] . "&nbsp;" . $result['sobrenome'] . 
            "&nbsp; &nbsp;" .
            "<a href='http://localhost/cpainel/controller/Redirect.php?page=editarFuncionario&id={$result['ID_Funcionario']}'>&#9998;</a>" .
            "&nbsp; &nbsp;" . 
            "<a href='http://localhost/cpainel/controller/Redirect.php?page=deleteFuncionario&id={$result['ID_Funcionario']}'>&#10006;</a>" . "<hr>";
            //header("location: http://localhost/cpainel/views/Admin/return.php?result={$result['nome']}{$result['sobrenome']} ");

        }

        }
    }

}

