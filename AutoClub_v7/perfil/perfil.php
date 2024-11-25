<?php
// Inicia a sessão para acessar variáveis de sessão
session_start();
//
$imagem = "../imagens/usu_sem_foto.png";

// Verifica se o usuário não está autenticado
if (!isset($_SESSION["id_usuario"])) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/alerts.js"></script>
    <script src="../js/excluirCarro.js"></script>
    <!-- <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/perfil.css">

    <title>AutoClub | Perfil de Usuário</title>
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
                        <a class="nav-link active text-white" aria-current="page"
                            href="../home/home_logado.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#sobre_nos">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contato">Contato</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Serviços</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Oficina/index.html">Oficinas</a></li>
                            <li><a class="dropdown-item" href="../Autopeças/index.html">Autopeças</a></li>
                            <li><a class="dropdown-item" href="../Estética/index.html">Estética Automotiva</a></li>
                        </ul>
                    </li>
                </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="<?php
                        if (isset($_SESSION["foto"])) {
                            echo $_SESSION["foto"];
                        } else {
                            echo $imagem;
                        }

                        ?>" alt="Ícone de Usuário" class="user-icon">
                        <div class="welcome-text">
                            <span>Bem-vindo(a)</span><br>
                            <span><?php echo $_SESSION["nome"] ?></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!--  <li><a class="dropdown-item" href="../perfil/perfil.html">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->
                        <li><a class="dropdown-item" id="sair" href="../includes/desconectar.php">Sair</a></li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>


    <!-- FIM DA NAVBAR -->


    <!-- Container principal -->
    <div class="container">

        <!-- Seção do perfil com duas colunas -->
        <section class="perfil-section">
            <div class="perfil-coluna-esquerda">
                <img src="<?php echo $_SESSION["foto"] ?>
                
                !-- <?php
                if (isset($_SESSION["foto"])) {
                    echo $_SESSION["foto"];
                } else {
                    echo $imagem;
                }

                ?> -->" alt="Foto de perfil" class="perfil-imagem">
                <h2><?php echo $_SESSION["nome"] ?></h2>

                <!-- Botão para alterar imagem do perfil -->
                <!-- <input type="file" id="fileInput" accept="image/*" style="display: none;">
                <button class="btn alterar-imagem" id="changeImageBtn">Editar Perfil</button> -->
                <a href="editar_perfil.php" class="btn editar-info">Editar Perfil</a>
                <button onclick="excluirUsuario()" class="btn excluir">Excluir Perfil</button>
            </div>
            <div class="perfil-coluna-direita">
                <h3>Informações Pessoais</h3>
                <div class="info-item">
                    <strong>Email:</strong>
                    <p><?php echo $_SESSION["email"] ?></p>
                </div>
                <div class="info-item">
                    <strong>Telefone:</strong>
                    <p><?php echo $_SESSION["telefone"] ?></p>
                </div>
                <div class="info-item">
                    <strong>Data de Nascimento:</strong>
                    <p><?php echo $_SESSION["dataNasc"] ?></p>
                </div>
                <div class="info-item">
                    <strong>CPF:</strong>
                    <p><?php echo $_SESSION["cpf"] ?></p>
                </div>
                <div class="info-item">
                    <strong>Endereço:</strong>
                    <p><?php echo $_SESSION["logradouro"];
                    echo ', ';
                    echo $_SESSION["numero"];
                    echo ' - ';
                    echo $_SESSION["bairro"];
                    echo ', ';
                    echo $_SESSION["cidade"]; ?></p>
                </div>

                <!--   <div class="acoes-info-pessoais">
                    <a href="editar_perfil.php" class="btn editar-info">Editar Perfil</a>
                    <button class="btn excluir">Excluir Perfil</button>
                </div> -->

            </div>
        </section>

        <!-- Seção com informações do carro -->
        <section class="car-section">
            <h3>Informações do Carro</h3>
            <?php if (!empty($_SESSION["marca"]) && !empty($_SESSION["modelo"])): ?>
    <div class="info-item">
        <strong>Modelo:</strong>
        <p><?php echo $_SESSION["marca"] . " " . $_SESSION["modelo"]; ?></p>
    </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION["ano"])): ?>
    <div class="info-item">
        <strong>Ano:</strong>
        <p><?php echo $_SESSION["ano"]; ?></p>
    </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION["motor"])): ?>
    <div class="info-item">
        <strong>Motor:</strong>
        <p><?php echo $_SESSION["motor"]; ?></p>
    </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION["combustivel"])): ?>
    <div class="info-item">
        <strong>Combustível:</strong>
        <p><?php echo $_SESSION["combustivel"]; ?></p>
    </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION["ultimaRevisao"])): ?>
    <div class="info-item">
        <strong>Última revisão:</strong>
        <p>
            <?php
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
            echo strftime('%d de %B de %Y', strtotime($_SESSION["ultimaRevisao"]));
            ?>
        </p>
    </div>
    <?php endif; ?>
            <div class="acoes-info-pessoais">
                <a href="../login e cadastro/cadastro_carro.php" class="btn editar m-1">Cadastrar Carro</a>
                <a href="editar_carro.php" class="btn editar-info m-1">Editar Carro</a>
                <button onclick="excluirCarro()" class="btn excluir m-1">Excluir Carro</button>
            </div>

        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="script_perfil.js"></script>

    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>