<?php
// Inicia a sessão para acessar variáveis de sessão
session_start();
//
$imagem = "../imagens/usu_sem_foto.png";

// Verifica se o usuário não está autenticado
if (!isset($_SESSION["id_adm"])) {
    // Redireciona para a página de login se não estiver autenticado
    header('Location: ../login e cadastro/login.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/perfil_master.css">

    <title>AutoClub | Perfil Master</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo" src="../imagens/AutoClub_logo.png" class="img-fluid" style="max-width: 80px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active text-white" href="../home/home_logado.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#sobre_nos">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contato">Contato</a></li>
                   <!--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Serviços</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Oficina/index.html">Oficinas</a></li>
                            <li><a class="dropdown-item" href="../Autopeças/index.html">Autopeças</a></li>
                            <li><a class="dropdown-item" href="../Estética/index.html">Estética Automotiva</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">Admin</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="gerenciar_usuario.html">Gerenciar Usuários</a></li>
                            <li><a class="dropdown-item" href="relatorio.html">Relatórios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- FIM NAVBAR -->

    <!-- Conteúdo Principal -->
    <div class="container mt-5 pt-5 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- Coluna Esquerda: Perfil do Usuário -->
            <section class="perfil-section col-md-4">
                <div class="perfil-coluna-esquerda">
                    <img src="<?php
                        if (isset($_SESSION["foto"])) {
                            echo $_SESSION["foto"];
                        } else {
                            echo $imagem;
                        }

                        ?>" alt="Foto de perfil" class="perfil-imagem mb-3">
                    <h2 class="perfil-nome"><?php echo $_SESSION["nome"] . "(Master)"?></h2>
                    <a href="editar_perfil.php" class="btn editar-info">Editar Perfil</a>
                    <button class="btn btn-danger excluir">Excluir Perfil</button>
                </div>
            </section>

            <!-- Coluna Direita: Painel de Controle -->
            <section class="painel-controle-section col-md-8">
                <h2 class="text-center mb-4">Painel de Controle</h2>
                <div class="row">
                    <!-- Card Gerenciar Usuários -->
                    <div class="col-12 mb-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <h5 class="card-title">Gerenciar Usuários</h5>
                                <p class="card-text">Adicione, edite ou remova usuários do sistema.</p>
                                <a href="gerenciar_usuario.php" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Relatórios -->
                    <div class="col-12 mb-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <h5 class="card-title">Relatórios</h5>
                                <p class="card-text">Visualize os relatórios de atividades e usuários.</p>
                                <a href="relatorio.html" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script_perfil.js"></script>
</body>

</html>