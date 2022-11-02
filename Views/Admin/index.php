<?php
include_once("/xampp/htdocs/CPainel/Model/Autentication.php");
include_once("/xampp/htdocs/CPainel/Controller/EmpresaController.php");
include_once("/xampp/htdocs/CPainel/Controller/FuncionarioController.php");
include_once("/xampp/htdocs/CPainel/Controller/DeleteController.php");
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
            $enum->nEmpresas();
            foreach ($enum as $numeroDeEmpresas){
                echo $numeroDeEmpresas;
            };

        ?>
        <br> Empresas Registrados</p>
        </div>
        <div class="img2">
        <img src="http://localhost/cpainel/public/img/edit002.png" class="imgs002">
        <p>Atualmente Existem
            <br>
            <?php
            
            $enum = new FuncionarioController;
            $enum->nFuncionarios();
            foreach ($enum as $numeroDeFuncionarios){
                echo $numeroDeFuncionarios;
            };
            ?>
            <br> 
            Funcionários Registrados</p>
        </div>
        </div>
    </div>
    <div id="funcionario-click" class="content-box-funcionario">
        <form class="cadastro-funcionarios" action="http://localhost/cpainel/controller/Redirect.php/" method="POST">
            <input type="hidden" value="cadastrofunc" name="page"/>
            <h1>REGISTRO DE FUNCIONÁRIOS</h1>
            <input type="text" name="nome" placeholder="Nome (Obrigatório)" class="nome"/>
            <input type="text" name="sobrenome" placeholder="Sobrenome (Obrigatório)" class="nome2"/>
            <input type="number" name="RG" placeholder="RG (Obrigatório)" size="5" maxlength="11"/>
            <input type="e-mail" name="email" placeholder="E-mail"/>
            <label for="select">Empresa</label>
            <select name="empresa">
                <?php
                    $empresa = new EmpresaController;
                    foreach ($empresa->listaEmpresas() as $empresa) {
                        
                        echo "<option value='{$empresa['id']}'>";
                        
                        echo $empresa['razaosocial'];
                        echo "</option>";
                    }
                  
                ?>
            </select>
            <button type="submit" class="Entrar-login">REGISTRAR FUNCIONARIO</button>
        </form>
        <div id="registrado-on" class="registrado">
            <br>
            <a href="#">X</a>
            <h1>Você cadastrou o funcionário <br>
                
                com sucesso</h1>
        </div>
    </div>

    <div id="empresa-click" class="content-box-empresa">
        <form class="cadastro-funcionarios" action="http://localhost/cpainel/controller/Redirect.php/" method="POST" autocomplete="off">
            <input type="hidden" value="cadastroemp" name="page"/>
            <h1>REGISTRO DE EMPRESAS</h1>
            <input type="text" name="nomeEmpresa" placeholder="Razão Social (Obrigatório)"/>
            <input type="text" name="enderecoEmpresa" placeholder="Endereço"/>
            <input type="number" name="cnpj" placeholder="CNPJ (Obrigatório)" maxlength="11"/>
            <input type="tel" id="telefone" name="telEmpresa" required placeholder="(xx) xxxxx-xxxx">
            <button type="submit" class="Entrar-login">REGISTRAR EMPRESA</button>
        </form>
    </div>

    <div id="consulta-click" class="content-box-consulta">
        <p class="pFunc">FUNCIONÁRIOS</p>
        <div class="buscar">
            <form action="http://localhost/cpainel/Views/Admin/return.php/" method="GET">
            <input type="hidden" name="page" value="seach">
            <input type="text" name="buscador" placeholder="Buscar Funcionário por Nome" class="busca">
            <button>&#128270; Buscar</button>
            </form>
        </div>
        <div class="consultasFE">
        <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>NOME</th>
                <th>SOBRENOME</th>
                <th>EMAIL</th>
                <th>EMPRESA</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <?php
        $innertest = new FuncionarioController;
        foreach ($innertest->join() as $inner){
            
        ?>
        <tbody>
            <tr>
                <td><?php echo $inner['ID_Funcionario'];?></td>
                <td><?php echo $inner['nome']; ?></td>
                <td><?php echo $inner['sobrenome']; ?></td>
                <td><?php echo $inner['email']; ?></td>
                <td><?php echo $inner['razaosocial']; ?></td>
                <td style="text-align: center;">
                    <?php echo "<a href='http://localhost/cpainel/controller/Redirect.php?page=editarFuncionario&id={$inner['ID_Funcionario']}'>&#9998;</a>"?>
                    &nbsp; 
                    <?php echo "<a href='http://localhost/cpainel/controller/Redirect.php?page=deleteFuncionario&id={$inner['ID_Funcionario']}'>&#10006;</a>"?>
                </td>
            </tr>
        </tbody>
        <?php
        };
        ?>
        </table>       
        </div>

        <p class="pEmp">EMPRESAS</p>
        <div class="buscarE">
            <form action="http://localhost/cpainel/Views/Admin/return.php/" method="GET">
            <input type="hidden" name="page" value="seachE">
            <input type="text" name="buscador" placeholder="Buscar Empresa por Nome" class="busca">
            <button>&#128270; Buscar</button>
            </form>
        </div>
        <div class="consultasFEE">
        <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>EMPRESA</th>
                <th>ENDEREÇO</th>
                <th>CNPJ</th>
                <th>TELEFONE</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <?php
        $ChamaEmpresa = new EmpresaController;
        foreach ($ChamaEmpresa->listaEmpresas() as $listaEmpresa){
            
        ?>
        <tbody>
            <tr>
                <td><?php echo $listaEmpresa['id']; ?></td>
                <td><?php echo $listaEmpresa['razaosocial']; ?></td>
                <td><?php echo $listaEmpresa['endereco']; ?></td>
                <td><?php echo $listaEmpresa['cnpj']; ?></td>
                <td><?php echo $listaEmpresa['telefone']; ?></td>
                <td style="text-align: center;">
                    <?php echo "<a href='http://localhost/cpainel/controller/Redirect.php?page=editarEmpresa&id={$listaEmpresa['id']}'>&#9998;</a>"?>
                    &nbsp; 
                    <?php echo "<a href='http://localhost/cpainel/controller/Redirect.php?page=deleteEmpresa&id={$listaEmpresa['id']}'>&#10006;</a>"?>
                </td>
            </tr>
        </tbody>
        <?php
        };
        ?>
        </table>    
        </div>
    </div>
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>