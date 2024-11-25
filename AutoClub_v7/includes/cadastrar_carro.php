<?php
//comecei a sessão
session_start();

//incluí a conexão no arquivo
require("conexao.php");

//verificando se a requisição foi feita via método post e pegando a variáveis do formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $ano = $_POST["ano"];
    $ultimaRevisao = $_POST["ultimaRevisao"];
    $combustivel = $_POST["combustivel"];
    $motor = $_POST["motor"];
    $id_usuario = $_SESSION["id_usuario"];
    
    
   

    $ultimaRevisao = date("Y-m-d", strtotime($ultimaRevisao));

    //preparando a conculta
    $consulta = "INSERT INTO carro(placa, marca, modelo, ano, ultimaRevisao, combustivel, motor, id_usuario)
                VALUES(?,?,?,?,?,?,?,?)";

    //preparando a declaração da cosulta
    $stmt = $conexao->prepare($consulta);

    $stmt->bind_param("sssssssi", $placa, $marca, $modelo, $ano, $ultimaRevisao, $combustivel, $motor, $id_usuario);

    if ($stmt->execute()) {
        echo "\n<script>";
        echo "\nalert('Você cadastrou o seu carro com sucesso.')";
        echo "\nwindow.location.href = '../perfil/perfil.php'";
        echo "\n</script>";

        // Encerra o script após o redirecionamento
        exit();
    } else {
        echo "\n<script>";
        echo "\nalert('Erro ao cadastrar o carro.')";
        echo "\nwindow.location.href = '../login e cadastro/cadastro_carro.php'";
        echo "\n</script>";
        exit();
    }
}
?>