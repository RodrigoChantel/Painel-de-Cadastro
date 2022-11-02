<?php
include_once("/xampp/htdocs/CPainel/Controller/FuncionarioController.php");
include_once("/xampp/htdocs/CPainel/Controller/EmpresaController.php");
?>


<a href="http://localhost/cpainel/views/admin/index.php">&#10094; &#10094; &nbsp; VOLTAR</a>

<?php
//echo "<hr>" . $_GET['result'] . "<hr>";


if($_GET['page'] == 'seach'){
    $buscador = new FuncionarioController;
    $buscador->buscadorFuncionario($_GET['buscador']);
}


if($_GET['page'] == 'seachE'){

    $buscador = new EmpresaController;
    $buscador->buscadorEmpresa($_GET['buscador']);
}