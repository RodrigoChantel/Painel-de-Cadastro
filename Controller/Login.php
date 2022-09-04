<?php
include('../Model/Conection.php');
session_start();
class login{
    //public function index($parametro1, $parametro2 = 'rodrigo'){ Dando valor ao parametro 2, mas o que 
        //a Pagina enviar de informação, sobreescreve o valor existente.
    public function index($parametro1, $parametro2){
        if($parametro1 == null || $parametro2 == null){
            return false;
        }
        $this->compareWithBD($parametro1, $parametro2);

    }

    public function compareWithBD($usuario, $senha){
        
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $name = mysqli_real_escape_string($conexao, $usuario);
        $password = mysqli_real_escape_string($conexao, $senha);

        $query = "select *
		 from `login`
		 where usuario = '{$name}' and senha = '{$password}'";

        $result = mysqli_query($conexao, $query);
        $row = mysqli_fetch_assoc($result);

        if($usuario == $row['usuario'] && $senha == $row['senha']){
            $_SESSION['usuario_login'] = $row['usuario'];
            $_SESSION['senha_login'] = $row['senha'];
            header('Location: http://localhost/cpainel/Views/Admin/Index.php');
            exit();
        }
        else{
            header('Location: http://localhost/cpainel/Index.php');
            exit();
        }
    }
    

    public function resetPassword($email){
        //Aqui você vai verificar no banco se este email
        //existe. Se existir, você redefine a senha.
        //header("Location: http://localhost/cpainel/index.php");
        echo $email;
    }
    
}    


/****************************************
 * METODOS ABAIXO SÃO AS FUNÇÕES PADRÕES
 * **************************************
 * 
 * Index    = Primeira função usada dentro de um controle. 
 * Create   = Redireciona para uma tela de cadastro.
 * Store    = Ação de salvar o cadastro.
 * Show     = Redireciona para uma tela de visualização do cadastro.
 * Edit     = Redireciona para uma tela de edição/atualização do cadastro.
 * Update   = Ação de atualizar os dados.
 * Destroy  = Ação de deletar/excluir dados.
 * 
 */