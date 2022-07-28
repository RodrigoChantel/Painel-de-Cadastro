<?php
include('../Model/Conection.php');
session_start();
class create{
    public function empresas($p1, $p2, $p3, $p4){
        if($p1 == null || $p2 == null || $p3 == null || $p4 == null){
            header("location: http://localhost/cpainel/views/naofunciona.php");
            
            //return false;
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
        $count2 = mysqli_fetch_assoc($checkIfCompanyExists);
        if($count >= 1){
            //header("location: http://localhost/cpainel/views/funciona.php");
            echo "Empresa já existe!";
            die;
        }
        
        $insertCompany = "INSERT INTO empresa (razaosocial, endereco, cnpj, telefone) VALUES ('{$nomeEmpresa}', '{$enderecoEmpresa}', '{$cnpj}', '{$telefone}')";
        $registerCompany = mysqli_query($conexao2, $insertCompany);
        if($registerCompany === true){
            echo "Empresa cadastrada!";
        }
        else{
            echo "Error:'{$registerCompany->error}'";
        }

    }
    
    
}


