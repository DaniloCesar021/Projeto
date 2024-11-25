<?php
//comecei a sessão
session_start();

//incluí a conexão no arquivo
require("conexao.php");

//verificando se a requisição foi feita via método post e pegando a variáveis do formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    //preparando a conculta
    $consulta = "INSERT INTO pecas(nome, preco)
                VALUES(?,?)";

    //preparando a declaração da cosulta
    $stmt = $conexao->prepare($consulta);

    $stmt->bind_param("ss", $nome, $preco, $id_autopecas);

    if ($stmt->execute()) {
        echo "\n<script>";
        echo "\nalert('Você cadastrou o seu carro com sucesso.')";
        echo "\nwindow.location.href = '../perfil/perfil.html'";
        echo "\n</script>";

        // Encerra o script após o redirecionamento
        exit();
    } else {
        echo "\n<script>";
        echo "\nalert('Erro ao cadastrar o carro.')";
        echo "\nwindow.location.href = '../login e cadastro/cadastro_carro.html'";
        echo "\n</script>";
        exit();
    }
}
?>