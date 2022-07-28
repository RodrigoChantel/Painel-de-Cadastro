<?php
//$_POST['page'];
//$_POST['name'];
//$_POST['password'];

if($_POST['page'] == "login"){
    include('./Login.php');
    $x = new Login;
    $x->index($_POST['name'], $_POST['password']);
    //$x->format();
    //Todos os dados precisam ser preenchidos.
    if(empty($_POST['name']) || empty($_POST['password'])){
        header('location: http://localhost/cpainel/index.php');
        exit();
    }
}
//Recuperação de conta
if($_POST['page'] == "esqueciSenha"){
    include('Login.php');
    $z = new Login;
    $z->resetPassword($_POST['email']);
}
//Cadastro de empresa
if($_POST['page'] == 'cadastroemp'){
    include('./EmpresaController.php');
    $cademp = new create;
    $cademp->empresas(
        $_POST['nomeEmpresa'],
        $_POST['enderecoEmpresa'],
        $_POST['cnpj'],
        $_POST['telEmpresa']
    );
    
}

