<?php
//comecei a sessão
session_start();

//incluí a conexão no arquivo
require("conexao.php");

//verificando se a requisição foi feita via método post e pegando a variáveis do formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nivel=0;
    $confSenha = $_POST["confirmarSenha"];
    

    $consulta = "INSERT INTO adm(nome, email, senha, nivel)
                VALUES(?,?,?,?)";

    //preparando a declaração da cosulta
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param("sssi", $nome, $email, $senha, $nivel);

    if ($senha === $confSenha) {
        //criptografando a senha
        $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
        //executo a consulta
        $stmt->execute();

        echo "\n<script>";
        echo "\nalert('Cadastrado com sucesso!')";
        echo "\nwindow.location.href = '../login e cadastro/login.php'";
        echo "\n</script>";

        // Encerra o script após o redirecionamento
        exit();
    } else {
        echo "\n<script>";
        echo "\nalert('Senhas estão incorretas. Por favor, insira as senhas novamente!')";
        echo "\n</script>";
    }
}
    ?>