<?php
// Iniciar a sessão
session_start();

// Conexão com o banco de dados
require("conexao.php");

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $CPF = trim($_POST['cpf']);
    $nome_materno = trim($_POST['nomeMaterno']);

    // Preparar a query para evitar SQL Injection
    $query = "SELECT * FROM usuario WHERE email = ? AND cpf = ? AND nomeMaterno = ?";
    $stmt = $conexao->prepare($query);
    // Vincular parâmetros
    $stmt->bind_param("sss", $email, $CPF, $nome_materno);
    // Executar a consulta
    $stmt->execute();
    // Obter o resultado
    $result = $stmt->get_result();
    
    // Inicializar $row como null por padrão
    $row = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Armazenar o ID do usuário na sessão
        $_SESSION["id_usuario"] = $row["id_usuario"];
    }

    if (!$row) {
        // Caso nenhum registro seja encontrado
        echo '<script>';
        echo 'alert("E-mail, CPF ou Nome Materno incorreto!");';
        echo 'window.location.href = "../login e cadastro/recuperar_senha.html";'; // Redireciona para o formulário
        echo '</script>';
    } else {
        // Redireciona para a página de atualização de senha
        header('Location: ../login e cadastro/atualizar_senha.html');
        exit();
    }
}
?>
