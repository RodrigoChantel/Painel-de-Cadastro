<?php
include_once("/xampp/htdocs/CPainel/Model/Autentication.php");
include_once("/xampp/htdocs/CPainel/Controller/EmpresaController.php");
include_once("/xampp/htdocs/CPainel/Controller/FuncionarioController.php");
$cadfunc = new FuncionarioController;
$edit = $cadfunc->editfunc($_GET);
$edit = $edit[0];
?>
<head>
    <script src="http://localhost/cpainel/public/JS/script.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/cpainel/public/css/style-painel-edit.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://localhost/cpainel/public/css/style-painel.css" media="screen" />
</head>
<main class="">
    <section class="section-login">
    <div class="content-box-inicio">
                
        <div class="campo">
        <form action="http://localhost/cpainel/controller/Redirect.php/" method="POST" >
            <input type="hidden" value="acaoCadastro" name="pagina"/>
            <fieldset>
                <fieldset  class="grupo">
                    <div class="campo">
                        <input name="ID_Funcionario" value="<?php echo $edit['ID_Funcionario'];?>" type="hidden" >
                        <label for="nome">Nome</label>
                        <input name="nome" value="<?php echo $edit['nome'];?>" type="text" placeholder="<?php echo $listaEmpresa['nome'];?>">
                        <label for="nome">Sobrenome</label>
                        <input name="sobrenome" value="<?php echo $edit['sobrenome'];?>" type="text" placeholder="<?php echo $listaEmpresa['sobrenome'];?>">
                    </div>
                </fieldset>
                <fieldset  class="grupo">
                    <div class="campo">
                        <label for="nome">E-mail</label>
                        <input name="email" value="<?php echo $edit['email'];?>" type="text" placeholder="<?php echo $listaEmpresa['email'];?>">
                        <label for="nome">RG</label>
                        <input name="RG" value="<?php echo $edit['rg'];?>" type="text" placeholder="<?php echo $listaEmpresa['rg'];?>">
                    </div>
                </fieldset>
                <fieldset  class="grupo">
                    <div class="campo">
                        <select class="select" name="empresa">
                            <?php


                                $empresa = new EmpresaController;
                                foreach ($empresa->listaEmpresas() as $emp) {
                                    if($emp['id'] == $edit['empresa']){
                                        echo "<option style='color: red;' selected value='{$emp['id']}' >";
                                        echo $emp['razaosocial'];
                                        echo "</option>";   
                                    }else{
                                        echo "<option value='{$emp['id']}'>";
                                        echo $emp['razaosocial'];
                                        echo "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" class="Entrar-login">ALTERAR</button>
                <a href="http://localhost/cpainel/views/admin/index.php" class="Entrar-login">VOLTAR</a>

            </fieldset>
            </form>
        </div>
    </div>
    </section></main>