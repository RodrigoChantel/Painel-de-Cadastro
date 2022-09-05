<?php
include_once("/xampp/htdocs/CPainel/Model/Autentication.php");
include_once("/xampp/htdocs/CPainel/Controller/EmpresaController.php");
include_once("/xampp/htdocs/CPainel/Controller/FuncionarioController.php");
?>
<head>
    <script src="http://localhost/cpainel/public/JS/script.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/cpainel/public/css/style-painel-edit.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://localhost/cpainel/public/css/style-painel.css" media="screen" />
</head>
<main class="">
    <section class="section-login">
    <div class="content-box-inicio">
                 <?php   
                        class dados{
                        public function editfunc(){
                        $dados = $_GET['edicao'];
                        $conexao = new Conection;
                        $conexao = $conexao->conect();
                        $idReturn = mysqli_real_escape_string($conexao, $dados);
                        $sqlQuery = "select * from funcionarios where ID_Funcionario = '{$idReturn}'";
                        $result = $conexao->query($sqlQuery);
                        $cheklist = $result->fetch_all(MYSQLI_ASSOC);
                        return $cheklist;
                        }}
                    $ChamaFuncionarios = new dados;
                    foreach ($ChamaFuncionarios->editfunc() as $listaEmpresa){
                    
                ?>
        <div class="campo">
        <form action="http://localhost/cpainel/controller/Redirect.php/" method="POST" >
            <input type="hidden" value="editarFuncionario2" name="page"/>
            <fieldset>    

                <fieldset  class="grupo">
                    <div class="campo">
                        <label for="nome">Nome</label>
                        <input value="<?php echo $listaEmpresa['nome'];?>" type="text" placeholder="<?php echo $listaEmpresa['nome'];?>">
                        <label for="nome">Sobrenome</label>
                        <input value="<?php echo $listaEmpresa['sobrenome'];?>" type="text" placeholder="<?php echo $listaEmpresa['sobrenome'];?>">
                    </div>
                </fieldset>
                <fieldset  class="grupo">
                    <div class="campo">
                        <label for="nome">E-mail</label>
                        <input value="<?php echo $listaEmpresa['email'];?>" type="text" placeholder="<?php echo $listaEmpresa['email'];?>">
                        <label for="nome">RG</label>
                        <input value="<?php echo $listaEmpresa['rg'];?>" type="text" placeholder="<?php echo $listaEmpresa['rg'];?>">
                    </div>
                </fieldset>
                <fieldset  class="grupo">
                    <div class="campo">
                        <select class="select">
                            <?php
                                $empresa = new EmpresaController;
                                foreach ($empresa->listaEmpresas() as $emp) {
                                    echo "<option value='{$emp['id']}'>";
                                    echo $emp['razaosocial'];
                                    echo "</option>";
                                }
                            ?><br>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" class="Entrar-login">ALTERAR</button>
                <a href="http://localhost/cpainel/views/admin/index.php" class="Entrar-login">VOLTAR</a>
                <?php
                    }
                ?>
            </fieldset>
            </form>
        </div>
    </div>
    </section></main>