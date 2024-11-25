<?php
// Inicia a sessão para gerenciar as variáveis de sessão
session_start();

// Verifica se o usuário já está autenticado
if (isset($_SESSION["id_usuario"])) {
    // Redireciona para a página inicial se o usuário já estiver autenticado
    header('Location: ../home/home_logado.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>AutoClub | Login</title>
</head>

<body>
    <!-- COMEÇO DA NAVBAR -->
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo" src="../imagens/AutoClub_logo.png" class="img-fluid"
                    style="max-width: 80px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../home/home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#sobre_nos">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contato">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="opcao_cadastro.html">Cadastre-se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- FIM DA NAVBAR -->

    <!-- Container para os Botões de Acessibilidade -->
    <div class="accessibility-buttons">
        <!-- Modo Claro / Escuro -->
        <button id="mode-toggle" class="btn"><i class="fas fa-moon"></i></button>
        <!-- Aumentar Fonte -->
        <button id="increase-font" class="btn"><i class="fas fa-search-plus"></i></button>
        <!-- Diminuir Fonte -->
        <button id="decrease-font" class="btn"><i class="fas fa-search-minus"></i></button>
    </div>

    <!-- Container principal -->
    <div class="container">
        <!-- Seção de Login -->
        <section class="login-section">
            <h2>Login</h2>
            <form id="loginForm" class="loginForm" action="../includes/processar_login.php" method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="login" class="form-control" name="login" id="login" placeholder="Digite seu email">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="senha" id="senha"
                            placeholder="Digite sua senha">

                        <span class="input-group-text">
                            <i id="toggleSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <div class="nav-login">
                    <a href="opcao_cadastro.html">Criar conta</a>
                    <a href="recuperar_senha.html">Recuperar senha</a>
                </div>

                <div class="acoes-login">
                    <button type="submit" class="btn entrar">Entrar</button>
                    <button type="button" class="btn limpar" id="limparCampos">Limpar</button>
                </div>
            </form>
        </section>
    </div>

    <script>
        document.getElementById('limparCampos').addEventListener('click', function () {
            document.getElementById('loginForm').reset();
        });
    </script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/acessibilidade.js"></script>
    <script src="../js/olhinhoSenha.js"></script>
</body>

</html>