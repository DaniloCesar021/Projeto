<?php
session_start();
include 'conexao.php'; // Arquivo de conexão com o banco de dados

// Verifica se o usuário está autenticado (por exemplo, pelo ID do usuário armazenado na sessão)
if (!isset($_SESSION['id_usuario'])) {
    // Redireciona para a página de login se o usuário não estiver autenticado
    header("Location: ../login e cadastro/login.php");
    exit();
}

// ID do usuário autenticado
$user_id = $_SESSION['id_usuario'];

// Verifica se os campos de senha foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmarSenha'];

    // Verifica se a senha e a confirmação coincidem
    if ($nova_senha === $confirmar_senha) {
        // Faz o hash da nova senha para segurança
        $senha_hash = password_hash($nova_senha, PASSWORD_BCRYPT);

        // Atualiza a senha no banco de dados
        $sql = "UPDATE usuario SET senha = ? WHERE id_usuario = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('si', $senha_hash, $user_id);

        if ($stmt->execute()) {
            // Exibe uma mensagem de sucesso ou uma mensagem de erro
            session_unset(); //Remove todas as variáveis da sessão, limpando qualquer dado armazenado.
            session_destroy(); //Encerra a sessão atual, invalidando o ID de sessão.

            echo '<script>';
            echo 'alert("Senha atualizada com sucesso!");';
            echo 'window.location.href = "../login e cadastro/login.php";';
            echo '</script>';
            exit();
        } else {
            echo '<script>';
            echo 'alert("Erro ao atualizar a senha. Tente novamente.");';
            echo 'window.location.href = "../login e cadastro/atualizar_senha.html";';
            echo '</script>';
        }

        $stmt->close();
    } else {
        echo '<script>';
        echo 'alert("As senhas não coincidem. Por favor, tente novamente.");';
        echo 'window.location.href = "../login e cadastro/atualizar_senha.html";';
        echo '</script>';
    }
}

$conexao->close();
?>