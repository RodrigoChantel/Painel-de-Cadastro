<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Public/css/style.css" media="screen" />
    <script src="http://localhost/cpainel/public/JS/scriptindex.js"></script>
    <title>CPainel</title>
</head>
<body>
    <header>

    </header>
    <main class="main-page">
    <section class="section-login">
    <form action="Controller/Redirect.php" method="POST" class="form-login" id="form-login">
        <input type="hidden" value="login" name="page"/>
        <h3>ADMIN PAINEL</h3>
        <h2>FAÇA LOGIN PARA CONTINUAR</h2>
        <input type="text" name="name" placeholder="User" pattern="^[a-zA-Z\D]+$"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" name="acao" value="Entrar" class="Entrar-login"/>
        <div class="forgot-password">
        <a href="#" onclick="Recuperar('recuperar-click, form-login')">Esqueci Minha Senha</a>
        </div>
    </form>

    <!-- Dar nome a classe do formulário para rec de dados cadastrais, refazer processo de login/redirecionamento em php
    utilizar display none/block para esconder e mostrar formulário, ele precisa ser mostrado somente quando o "recuperar
    senha for clicado -->
    <form id="recuperar-click" class="form-login" action="Controller/Redirect.php" method="POST">
        <h3>Recuperar Conta</h3>
        <input type="hidden" value="esqueciSenha" name="page"/>
        <input type="text" name="email" placeholder="E-mail para recuperação"/>
        <input type="submit" class="recuperar-login"/>
        <a href="#" onclick="Recuperar_hiden('recuperar-click, form-login')">VOLTAR</a>

    </form>
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>