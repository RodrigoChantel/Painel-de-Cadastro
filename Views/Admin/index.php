<?php
include("/xampp/htdocs/CPainel/Model/Autentication.php");
include("/xampp/htdocs/CPainel/Controller/EmpresaController.php");
//include("/xampp/htdocs/CPainel/Controller/FuncionarioController.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://localhost/cpainel/public/JS/script.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/cpainel/public/css/style-painel.css" media="screen" />
    <title>CPainel</title>
</head>
<body>
    <header>

    </header>
    <main class="main-page">
    <?php echo "<p class='session1'>Olá, {$_SESSION['usuario_login']}!</p>";?>
    <section class="section-login">
    
    <div class="botao-de-navegacao">
        <input class="input1" type="submit" value="INICIO" onclick="Inicio('Inicio-click')" id="dse"/>
        <input class="input2" type="submit" value="FUNCIONARIO" onclick="Funcionario('funcionario-click')"/>
        <input class="input3" type="submit" value="EMPRESA" onclick="Empresa('empresa-click')"/>
        <input class="input4" type="submit" value="CONSULTA" onclick="Consulta('consulta-click')"/>
        <a class="logout" href="http://localhost/cpainel/Controller/logout.php">SAIR</a>
    </div>
    <div id="Inicio-click" class="content-box-inicio">
        <div class="img12">
        <div class="img1">
        <img src="http://localhost/cpainel/public/img/edit001.png" class="imgs001">
        <p>Atualmente Existem<br> <?php
        
            $enum = new EmpresaController;
            while($enum->nEmpresas()){
                echo $enum;
            }
        ?>
        <br> Empresas Registrados</p>
        </div>
        <div class="img2">
        <img src="http://localhost/cpainel/public/img/edit002.png" class="imgs002">
        <p>Atualmente Existem<br><?php
            //$numrows = new FuncionarioController;
            //while($numrows->nFuncionarios()){
            //echo $numrows;
            //}
        ?>
        <br> Funcionários Registrados</p>
        </div>
        </div>
    </div>
    <div id="funcionario-click" class="content-box-funcionario">
        <form class="cadastro-funcionarios">
            <input type="hidden" value="cadastrofunc" name="page"/>
            <h1>REGISTRO DE FUNCIONÁRIOS</h1>
            <input type="text" name="nome" placeholder="Nome (Obrigatório)" pattern="^[a-zA-Z\D]+$" class="nome"/>
            <input type="text" name="sobrenome" placeholder="Sobrenome (Obrigatório)" pattern="^[a-zA-Z\D]+$" class="nome2"/><br>
            <input type="number" name="RG" placeholder="RG (Obrigatório)" size="5" maxlength="11"/><br>
            <input type="e-mail" name="email" placeholder="E-mail" pattern="^[a-zA-Z\D]+$"/><br>
            <label for="select">Empresa</label><br>           
            <select name="empresa">
                <?php
                    $empresa = new EmpresaController;
                    foreach ($empresa->listaEmpresas() as $empresa) {
                        
                        echo "<option value='{$empresa['id']}'>";
                        
                        echo $empresa['razaosocial'];
                        echo "</option>";
                    }
                    //while($colum = mysqli_fetch_array($checklist)){
                    //echo "<option>";
                    //echo "{$colum['razaosocial']}";
                    //echo "</option>";
                    //}   
                ?>
            </select>
            <input type="submit" name="acao" value="REGISTRAR FUNCIONÁRIO" class="Entrar-login"/>
        </form>
    </div>

    <div id="empresa-click" class="content-box-empresa">
        <form class="cadastro-funcionarios" action="http://localhost/cpainel/controller/Redirect.php/" method="POST" autocomplete="off">
            <input type="hidden" value="cadastroemp" name="page"/>
            <h1>REGISTRO DE EMPRESAS</h1>
            <input type="text" name="nomeEmpresa" placeholder="Razão Social (Obrigatório)"/>
            <input type="text" name="enderecoEmpresa" placeholder="Endereço" class="nome"/>
            <input type="number" name="cnpj" placeholder="CNPJ (Obrigatório)" maxlength="11"/>
            <input type="tel" id="telefone" name="telEmpresa" required placeholder="(xx) xxxxx-xxxx">
            <button type="submit" class="Entrar-login">REGISTRAR EMPRESA</button>
        </form>
    </div>

    </section>
    </main>
    <footer>

    </footer>
</body>
</html>