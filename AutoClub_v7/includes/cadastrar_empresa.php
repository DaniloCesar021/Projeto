<?php
//comecei a sessão
session_start();

//incluí a conexão no arquivo
require("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nomeEmpresa"];
    $cnpj = $_POST["cnpj"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $cep = $_POST["cep"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confSenha = $_POST["confirmarSenha"];
    $nivel = 1;
    $assinatura = $_POST["assinatura"];
    $servico = $_POST["tipoServico"];

    //aqui eu tenho que verificar a senha, o serviço e a assinatura
    if ($assinatura == null) {
        echo "\n<script>";
        echo "\nalert('Desculpe! A assinatura é obrigatória!')";
        echo "\nwindow.location.href = '../login e cadastro/cadastro_empresa.php'";
        echo "\n</script>";
    } else {
        if ($senha === $confSenha) {
            $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

            if ($servico === "autopeca") {
            
                $consulta = "INSERT INTO autopecas(nome, cnpj, logradouro, numero, bairro, cidade, uf, cep, telefone, email, senha, nivel, foto, id_assinatura) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
                $stmt = $conexao->prepare($consulta);
                $stmt->bind_param("sssssssssssssi", $nome, $cnpj, $logradouro, $numero, $bairro, $cidade, $uf, $cep, $telefone, $email, $senha, $nivel, $foto, $assinatura);
                $stmt->execute();

                echo "\n<script>";
                echo "\nalert('Autopeça cadastrada com sucesso!')";
                echo "\nwindow.location.href = '../login e cadastro/login.php'";
                echo "\n</script>";
    
                // Encerra o script após o redirecionamento
                exit();
    
            } elseif( $sevico === "estetica"){
    
                $consulta = "INSERT INTO estetica(nome, cnpj, logradouro, numero, bairro, cidade, uf, cep, telefone, email, senha, nivel, foto, id_assinatura) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
                $stmt = $conexao->prepare($consulta);
                $stmt->bind_param("sssssssssssssi", $nome, $cnpj, $logradouro, $numero, $bairro, $cidade, $uf, $cep, $telefone, $email, $senha, $nivel, $foto, $assinatura);
                $stmt->execute();

                echo "\n<script>";
                echo "\nalert('Estética cadastrada com sucesso!')";
                echo "\nwindow.location.href = '../login e cadastro/login.php'";
                echo "\n</script>";
    
                // Encerra o script após o redirecionamento
                exit();
                
            } else{
    
                $consulta = "INSERT INTO oficina(nome, cnpj, logradouro, numero, bairro, cidade, uf, cep, telefone, email, senha, nivel, foto, id_assinatura) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
                $stmt = $conexao->prepare($consulta);
                $stmt->bind_param("sssssssssssssi", $nome, $cnpj, $logradouro, $numero, $bairro, $cidade, $uf, $cep, $telefone, $email, $senha, $nivel, $foto, $assinatura);
                $stmt->execute();

                echo "\n<script>";
                echo "\nalert('Oficina cadastrada com sucesso!')";
                echo "\nwindow.location.href = '../login e cadastro/login.php'";
                echo "\n</script>";
    
                // Encerra o script após o redirecionamento
                exit();
            }
        } else{
            echo "\n<script>";
            echo "\nalert('Senhas estão incorretas. Por favor, insira as senhas novamente!')";
            echo "\n</script>";
        }

       
    }
}
?>