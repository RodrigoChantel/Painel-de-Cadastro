<?php
    include_once("/xampp/htdocs/CPainel/Model/Autentication.php");
    include_once("/xampp/htdocs/CPainel/Controller/EmpresaController.php");
    $edit = new EmpresaController;
    $edit = $edit->editarEmpresa($_GET);
    $edit = $edit[0];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://localhost/cpainel/public/JS/script.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/cpainel/public/css/style-painel-edit.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://localhost/cpainel/public/css/style-painel.css" media="screen" />
    <title>Editar Empresa</title>
</head>
<body>
<main class="">
    <section class="section-login">
    <div class="content-box-inicio">
                
        <div class="campo">
        <form action="http://localhost/cpainel/controller/Redirect.php/" method="GET" >
            <input type="hidden" value="acaoCadastroEmp" name="pagina"/>
            <fieldset>
                <fieldset  class="grupo">
                    <div class="campo">
                        <input name="id" value="<?php echo $edit['id'];?>" type="hidden" >
                        <label for="razaosocial">Empresa</label>
                        <input name="razaosocial" value="<?php echo $edit['razaosocial'];?>" type="text">
                        <label for="endereco">Endereço</label>
                        <input name="endereco" value="<?php echo $edit['endereco'];?>" type="text">
                    </div>
                </fieldset>
                <fieldset  class="grupo">
                    <div class="campo">
                        <label for="CNPJ">CNPJ</label>
                        <input name="CNPJ" value="<?php echo $edit['cnpj'];?>" type="number" placeholder="<?php echo $edit['cnpj'];?>">
                        <label for="telefone">Telefone</label>
                        <input name="telefone" value="<?php echo $edit['telefone'];?>" type="tel" required placeholder="(xx) xxxxx-xxxx">
                    </div>
                </fieldset>
                <button type="submit" class="Entrar-login">ALTERAR</button>
                <a href="http://localhost/cpainel/views/admin/index.php" class="Entrar-login">VOLTAR</a>
            </fieldset>
            </form>
        </div>
    </div>
    </section></main>
</body>
</html>