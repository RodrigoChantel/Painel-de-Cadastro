<?php
include_once("/xampp/htdocs/CPainel/Model/Conection.php");

class DeleteController{
    public function deleteUsers($id){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $query = "delete from funcionarios where ID_Funcionario = '{$id}'";
        $result = $conexao->query($query);
        if($result === true){
            echo "<script type='text/javascript'>alert('O funcionário foi deletado com sucesso.');location='http://localhost/cpainel/views/admin/index.php';</script>";
        }else{
            echo "<script type='text/javascript'>alert('Algo deu errado!');location='http://localhost/cpainel/views/admin/index.php';</script>";
        }
    }

    public function deleteCompany($id){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $query = "delete from funcionarios where empresa = '$id'";
        $result = $conexao->query($query);
        if($result === true){
            $deleteEmployers = "delete from empresa where id = '$id'";
            $executQuery = $conexao->query($deleteEmployers);
            echo "<script type='text/javascript'>alert('A empresa foi deletada com sucesso, juntamente com todos os funcionários.');location='http://localhost/cpainel/views/admin/index.php';</script>";
            return $executQuery;
        }else{
            echo "<script type='text/javascript'>alert('Algo deu errado!');location='http://localhost/cpainel/views/admin/index.php';</script>";
        }
        }
    }


?>