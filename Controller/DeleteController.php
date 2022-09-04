<?php
include_once("/xampp/htdocs/CPainel/Model/Conection.php");

class DeleteController{
    public function deleteUsers($id){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $query = "delete from funcionarios where ID_Funcionario = '{$id}'";
        $result = $conexao->query($query);
        if($result === true){
            echo "Funcionário foi deletado";
            echo "<script>
                setTimeout(function() {
                window.location.href = 'http://localhost/cpainel/views/admin/index.php';
                }, 3000);
            </script>";
        }else{
            echo "Funcionário não foi encontrado para ser excluido";
            echo "<script>
                setTimeout(function() {
                window.location.href = 'http://localhost/cpainel/views/admin/index.php';
                }, 3000);
            </script>";
        }
    }

    

};

?>