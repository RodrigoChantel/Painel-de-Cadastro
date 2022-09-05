<?php
//Login
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
    $cademp = new EmpresaController;
    $cademp->empresas(
        $_POST['nomeEmpresa'],
        $_POST['enderecoEmpresa'],
        $_POST['cnpj'],
        $_POST['telEmpresa']
    );   
}
//Cadastro de funcionarios
if($_POST['page'] == 'cadastrofunc'){
    include('../Controller/FuncionarioController.php');
    $cadfunc = new FuncionarioController;
    $cadfunc->funcionarios(
        $_POST['nome'],
        $_POST['sobrenome'],
        $_POST['RG'],
        $_POST['email'],
        $_POST['empresa']
    );
    
}

if($_GET['page'] == 'deleteFuncionario'){
    include('../Controller/DeleteController.php');
    $delFunc = new DeleteController;
    $delFunc->deleteusers(
        $_GET['id']
    ); 
}

if($_GET['page'] == 'editarFuncionario'){
    include('../Controller/funcionarioController.php');
    $editFunc = new FuncionarioController;
    $editFunc->editfunc(
        $_GET['id2']
    );
}

if($_POST['page'] == 'editarFuncionario2'){
    include('../Controller/FuncionarioController.php');
    $cadfunc = new FuncionarioController;
    $cadfunc->editarFuncionarios(
        $_POST['nome'],
        $_POST['sobrenome'],
        $_POST['rg'],
        $_POST['email'],
        $_POST['empresa']
    );
    echo $_POST['nome'];

}

