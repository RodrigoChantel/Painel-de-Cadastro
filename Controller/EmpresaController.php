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
            echo "<script type='text/javascript'>alert('A empresa $nomeEmpresa já possui cadastro em nosso sistema.');location='http://localhost/cpainel/views/admin/index.php';</script>";
            //header("location: http://localhost/cpainel/views/funciona.php");
        }
        
        $insertCompany = "INSERT INTO empresa (razaosocial, endereco, cnpj, telefone) VALUES ('{$nomeEmpresa}', '{$enderecoEmpresa}', '{$cnpj}', '{$telefone}')";
        $registerCompany = mysqli_query($conexao2, $insertCompany);
        if($registerCompany === true){
            echo "<script type='text/javascript'>alert('A empresa $nomeEmpresa foi cadastrada com sucesso.');location='http://localhost/cpainel/views/admin/index.php';</script>";
            
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
    

    public function buscadorEmpresa($empresa){
        if($empresa == NULL){
            echo "<script type='text/javascript'>alert('Não é possível buscar por campo vazio!  Levaremos você de volta para página inicial.');location='http://localhost/cpainel/views/admin/index.php';</script>";
        }else{
            $conexao = new Conection;
            $conexao = $conexao->conect();
            $buscador = mysqli_real_escape_string($conexao, $empresa);
            $sqlQuery = "select * from empresa where razaosocial like'%{$buscador}%' ";
            $executarQuery = $conexao->query($sqlQuery);
            $resultado = $executarQuery->fetch_all(MYSQLI_ASSOC);
            foreach ($resultado as $buscaEmpresa){
                echo "<hr>" . $buscaEmpresa['razaosocial'] . "<hr>";
            }
        }
    }
    
    public function editarEmpresa($idEmp){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $converte = mysqli_real_escape_string($conexao, $idEmp['id']);
        $sql = "select * from empresa where id = $converte ";
        $executeQuery = $conexao->query($sql);
        $result = $executeQuery->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function cadastrarNovosDados($idGet, $razaosocialGet, $enderecoGet, $cnpjGet, $telefoneGet){
        $conexao = new Conection;
        $conexao = $conexao->conect();
        $razaosocial = mysqli_real_escape_string($conexao, $razaosocialGet);
        $endereco = mysqli_real_escape_string($conexao, $enderecoGet);
        $cnpj = mysqli_real_escape_string($conexao, $cnpjGet);
        $telefone = mysqli_real_escape_string($conexao, $telefoneGet);

        $update = "UPDATE empresa SET razaosocial='$razaosocial', endereco='$endereco', cnpj='$cnpj', telefone='$telefone' where id=$idGet";
        $registerEmployees = mysqli_query($conexao, $update);
        if($registerEmployees == true){
            echo "<script type='text/javascript'>alert('Você alterou os dados da empresa  $razaosocial com sucesso.');location='http://localhost/cpainel/views/admin/index.php';</script>";

        }else{
            echo "deu ruim";
        }

    }
}


