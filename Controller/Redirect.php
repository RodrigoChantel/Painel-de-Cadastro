<?php

//$_POST['page'];
//$_POST['name'];
//$_POST['password'];

if($_POST['page'] == "login"){
    include('Login.php');
    $x = new Login;
    $x->index($_POST['name'], $_POST['password']);
    //$x->format();
}

if($_POST['page'] == "esqueciSenha"){
    include('Login.php');
    $z = new Login;
    $z->resetPassword($_POST['email']);
}
