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
    <section class="section-login">
    
    <div class="botao-de-navegacao">
        <input class="input1" type="submit" value="INICIO" onclick="Inicio('Inicio-click')" id="dse"/>
        <input class="input2" type="submit" value="FUNCIONARIO" onclick="Funcionario('funcionario-click')"/>
        <input class="input3" type="submit" value="EMPRESA" onclick="Empresa('empresa-click')"/>
        <input class="input4" type="submit" value="CONSULTA" onclick="Consulta('consulta-click')"/>
    </div>
    <div id="Inicio-click" class="content-box-inicio">
        <div class="img12">
        <div class="img1">
        <img src="http://localhost/cpainel/public/img/edit001.png" class="imgs001">
        <p>Atualmente Existem<br> "..."<br> Empresas Registrados</p>
        </div>
        <div class="img2">
        <img src="http://localhost/cpainel/public/img/edit002.png" class="imgs002">
        <p>Atualmente Existem<br> "..."<br> Funcionários Registrados</p>
        </div>
        </div>
    </div>
    <div id="funcionario-click" class="content-box-funcionario">
        <form class="cadastro-funcionarios">
            <h1>REGISTRO DE FUNCIONÁRIOS</h1>
            <input type="text" name="name" placeholder="Nome (Obrigatório)" pattern="^[a-zA-Z\D]+$" class="nome"/>
            <input type="text" name="name" placeholder="Sobrenome (Obrigatório)" pattern="^[a-zA-Z\D]+$" class="nome2"/><br>
            <input type="number" name="name" placeholder="CPF (Obrigatório)" size="5" maxlength="11" class="num"/>
            <input type="number" name="name" placeholder="RG (Obrigatório)" size="5" maxlength="11" class="num2"/><br>

            <input type="date" name="name" placeholder="Nascimento" size="5" maxlength="11" class="date-email"/>
            <input type="e-mail" name="name" placeholder="E-mail" pattern="^[a-zA-Z\D]+$" class="date-email2"/><br>
            <div class="telefones">
            <label for="telefone">Telefone / Celular</label><br>
            <input type="tel" id="telefone" class="input-padrao" required placeholder="(xx) xxxxx-xxxx">
            
            <input type="tel" id="telefone" class="input-padrao2" required placeholder="(xx) xxxxx-xxxx">
            </div>
            <label for="select">Empresa</label><br>
            <select>
                <option value="" selected hidden>...</option>
                <option value="1">palavra</option>
                <option value="2">palavra2</option>
                <option value="3">palavra2</option>
            </select>
        </form>
            <input type="submit" name="acao" value="REGISTRAR FUNCIONÁRIO" class="Entrar-login"/>
    </div>

    <div id="empresa-click" class="content-box-empresa">
        <form class="cadastro-funcionarios">
            <h1>REGISTRO DE EMPRESAS</h1>
            <input type="text" name="name" placeholder="Razão Social (Obrigatório)" pattern="^[a-zA-Z\D]+$" class="nome"/>
            <input type="text" name="name" placeholder="Fantasia (Obrigatório)" pattern="^[a-zA-Z\D]+$" class="nome2"/><br>
            <input type="number" name="name" placeholder="WebSite" size="5" maxlength="11" class="num"/>
            <input type="number" name="name" placeholder="CNPJ (Obrigatório)" size="5" maxlength="11" class="num2"/><br>

            <input type="date" name="name" placeholder="Nascimento" size="5" maxlength="11" class="date-email"/>
            <input type="e-mail" name="name" placeholder="E-mail" pattern="^[a-zA-Z\D]+$" class="date-email2"/><br>
            <div class="telefones">
            <label for="telefone">Contatos</label><br>
            <input type="tel" id="telefone" class="input-padrao" required placeholder="(xx) xxxxx-xxxx">
            
            <input type="tel" id="telefone" class="input-padrao2" required placeholder="(xx) xxxxx-xxxx">
            </div>
        </form>
            <input type="submit" name="acao" value="REGISTRAR EMPRESA" class="Entrar-login"/>
    </div>
    
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>