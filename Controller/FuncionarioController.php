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
            echo "Funcionário cadastrado com sucesso!<br>";
            echo "Aguarde o redirecionamento...";
            echo "<script>
                setTimeout(function() {
                window.location.href = 'http://localhost/cpainel/views/admin/index.php';
                }, 4000);
            </script>";
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

    public function editfunc($id2){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $idReturn = mysqli_real_escape_string($conexao, $id2);
        $sqlQuery = "select * from funcionarios where ID_Funcionario = '{$idReturn}'";
        $result = $conexao->query($sqlQuery);
        $cheklist = $result->fetch_all(MYSQLI_ASSOC);
        if($result == true){
            header("location: http://localhost/cpainel/views/admin/editar.php?edicao=$id2");
        }else{
            echo "deu ruim";
        }
    }
    

    public function editarFuncionarios($nome, $sobrenome, $rg, $email, $empresa){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $nomecad = mysqli_real_escape_string($conexao, $nome);
        $sobrenomecad = mysqli_real_escape_string($conexao, $sobrenome);
        $rgcad = mysqli_real_escape_string($conexao, $rg);
        $emailcad = mysqli_real_escape_string($conexao, $email);
        $empresacad = mysqli_real_escape_string($conexao, $empresa);

        $queryDB = "select * from funcionarios where rg = '{$rgcad}' or email = '{$emailcad}'";
        $checkEmployees = mysqli_query($conexao, $queryDB);
        $count = mysqli_num_rows($checkEmployees);

        if($count >= 1){
            $insertEmployees = "UPDATE funcionarios (nome, sobrenome, rg, email, empresa) 
                            VALUES ('{$nomecad}','{$sobrenomecad}', '{$rgcad}', '{$emailcad}', '{$empresacad}')
                            WHERE ID_Funcionario = ";
            $registerEmployees = mysqli_query($conexao, $insertEmployees);
            if($registerEmployees == true){
                echo "Funcionário cadastrado com sucesso!<br>";
                echo "Aguarde o redirecionamento...";
                echo "<script>
                    setTimeout(function() {
                    window.location.href = 'http://localhost/cpainel/views/admin/index.php';
                    }, 4000);
                </script>";
            }
            else{
                echo "Error:'{$registerEmployees->error}'";
            }
        }
    }
    

}
