<?php
include('/xampp/htdocs/CPainel/Model/Conection.php');
//session_start();
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

        $insertEmployees = "INSERT INTO funcionarios (nome, sobrenome, rg, email, empresa) VALUES ('{$nomecad}','{$sobrenomecad}', '{$rgcad}', '{$emailcad}', '{$empresacad}'";
        $registerEmployees = mysqli_query($conexao, $insertEmployees);
        if($registerEmployees === true){
            echo "Funcionário cadastrado com sucesso!";
        }
        else{
            echo "Error:'{$registerEmployees->error}'";
        }

    }

    public function nFuncionarios(){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $sqlQuery = "select id from funcionarios";
        $checklist = mysqli_query($conexao, $sqlQuery);
        $numrows = mysqli_num_rows($checklist);
        echo $numrows;
    }
}
