<?php
// Inicia a sessão para poder acessar variáveis de sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
require("conexao.php");


$id_usuario = $_SESSION["id_usuario"];

$consultaCarro = "SELECT * FROM carro WHERE id_usuario = ?";

$stmt = $conexao->prepare($consultaCarro);
$stmtCarro = $conexao->prepare($consultaCarro);
$stmtCarro->bind_param("i", $id_usuario);
$stmtCarro->execute();
$resultCarro = $stmtCarro->get_result();

// Verifica se encontrou um carro associado ao usuário
if ($resultCarro->num_rows > 0) {
    $rowCarro = $resultCarro->fetch_assoc();
    $_SESSION["id_carro"] = $rowCarro["id_carro"];
    $_SESSION["placa"] = $rowCarro["placa"];
    $_SESSION["marca"] = $rowCarro["marca"];
    $_SESSION["modelo"] = $rowCarro["modelo"];
    $_SESSION["ano"] = $rowCarro["ano"];
    $_SESSION["ultimaRevisao"] = $rowCarro["ultimaRevisao"];
    $_SESSION["combustivel"] = $rowCarro["combustivel"];
    $_SESSION["motor"] = $rowCarro["motor"];
} else{
    echo "Erro";
}
?>