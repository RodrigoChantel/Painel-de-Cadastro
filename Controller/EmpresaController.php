<?php
include_once('/xampp/htdocs/CPainel/Model/Conection.php');
class EmpresaController{
    public function empresas($p1, $p2, $p3, $p4){
        if($p1 == null || $p2 == null || $p3 == null || $p4 == null){
            header("location: http://localhost/cpainel/views/naofunciona.php");
        }
        $this->sendWithDB($p1, $p2, $p3, $p4);
    }
    public function sendWithDB($empresaDB, $enderecoDB, $cnpjDB, $telefoneDB){
        $conexao2 = new Conection;
        $conexao2 = $conexao2->conect();
        $nomeEmpresa = mysqli_real_escape_string($conexao2, $empresaDB);
        $enderecoEmpresa = mysqli_real_escape_string($conexao2, $enderecoDB);
        $cnpj = mysqli_real_escape_string($conexao2, $cnpjDB);
        $telefone = mysqli_real_escape_string($conexao2, $telefoneDB);

        $queryDB = "select * from empresa 
        where razaosocial = '{$nomeEmpresa}' 
        or cnpj = '{$cnpj}'";
        
        
        $checkIfCompanyExists = mysqli_query($conexao2, $queryDB);
        $count = mysqli_num_rows($checkIfCompanyExists);
        

        if($count >= 1){
            //header("location: http://localhost/cpainel/views/funciona.php");
            echo "Empresa já existe!<br><br>";
            echo "Aguarde o redirecionamento...";
            echo "<script>
                setTimeout(function() {
                window.location.href = 'http://localhost/cpainel/views/admin/index.php';
                }, 3000);
            </script>";
            die;
        }
        
        $insertCompany = "INSERT INTO empresa (razaosocial, endereco, cnpj, telefone) VALUES ('{$nomeEmpresa}', '{$enderecoEmpresa}', '{$cnpj}', '{$telefone}')";
        $registerCompany = mysqli_query($conexao2, $insertCompany);
        if($registerCompany === true){
            echo "Empresa cadastrada com sucesso!<br><br>";
            echo "Aguarde o redirecionamento...";
            echo "<script>
                setTimeout(function() {
                window.location.href = 'http://localhost/cpainel/views/admin/index.php';
                }, 4000);
            </script>";
            
        }
        else{
            echo "Error:'{$registerCompany->error}'";
        }

    }

    public function listaEmpresas(){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $sql = "select * from `empresa`";
        
        $resultQuery = $conexao->query($sql);
        $resultAssoc = $resultQuery->fetch_all(MYSQLI_ASSOC);

        //$querySQL = "Select id from empresa";
        //$checklist = mysqli_query($conexao, $querySQL);
        //$enum = mysqli_fetch_assoc($checklist);
        
        return $resultAssoc;
        //return $enum
    }

    public function nEmpresas(){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $querySQL = "Select id from empresa";
        $checklist = mysqli_query($conexao, $querySQL);
        $enum = mysqli_num_rows($checklist);
        echo $enum;
    }
    
    
    
}


