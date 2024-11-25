<?php
// Fazendo conexão com o banco
require("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_carro = $_POST["id_carro"];
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $ano = $_POST["ano"];
    $ultimaRevisao = $_POST["ultimaRevisao"];
    $combustivel = $_POST["combustivel"];
    $motor = $_POST["motor"];
   
    $ultimaRevisao = date("Y-m-d", strtotime($ultimaRevisao));

    // Consulta SQL
    $consulta = "UPDATE carro SET placa = ?, marca = ?, modelo = ?, ano = ?, ultimaRevisao = ?, combustivel = ?, motor = ? WHERE id_carro = ?";
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param("sssssssi", $placa, $marca, $modelo, $ano, $ultimaRevisao, $combustivel, $motor, $id_carro);

    if ($stmt->execute()) {
        echo "\n<script>";
        echo "\nalert('Carro alterado com sucesso.')";
        echo "\nwindow.location.href = '../perfil/perfil.php'";
        echo "\n</script>";
        exit();
    } else {
        echo "\n<script>";
        echo "\nalert('Erro ao alterar o carro.')";
        echo "\nwindow.location.href = '../perfil/perfil.php'";
        echo "\n</script>";
        exit();
    }
}
?>