<?php
    // Inicia a sessão para poder acessar variáveis de sessão
    session_start();

    // Destroi a sessão atual, desconectando o usuário
    session_destroy();

    // Exibe um alerta indicando o sucesso da desconexão e redireciona para a página de login
    echo "\n<script>";
    echo "\nalert('Você se desconectou com sucesso.')";
    echo "\nwindow.location.href = '../login e cadastro/login.php'";
    echo "\n</script>";

    // Encerra o script após o redirecionamento
    exit();
?>