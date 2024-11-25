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

/* if (isset($_SESSION["marca"]) && isset($_SESSION["modelo"])) {
    echo "<p>Modelo: " . $_SESSION["marca"] . " " . $_SESSION["modelo"] . "</p>";
} else {
    echo "<p>Informações do carro não disponíveis.</p>";
} */
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastro_carro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- biblioteca de máscara do javascript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!--  ---------------------------------------------------------------------------------------------------------------------------- -->
    <title>AutoClub | Cadastro de Carro</title>
    <script src="../js/mascaras.js"></script>
</head>

<body>
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
                        <a class="nav-link active text-white" aria-current="page" href="../home/home_logado.php">Home</a>
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
                   <!--  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
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
                    </a> -->
                    <ul class="dropdown-menu">
                        <!--  <li><a class="dropdown-item" href="../perfil/perfil.html">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->
                        <li><a class="dropdown-item" id="sair" href="../includes/desconectar.php" id>Sair</a></li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>

    <!-- Container para os Botões de Acessibilidade -->
    <div class="accessibility-buttons">
        <!-- Modo Claro / Escuro -->
        <button id="mode-toggle" class="btn"><i class="fas fa-moon"></i></button>
        <!-- Aumentar Fonte -->
        <button id="increase-font" class="btn"><i class="fas fa-search-plus"></i></button>
        <!-- Diminuir Fonte -->
        <button id="decrease-font" class="btn"><i class="fas fa-search-minus"></i></button>
    </div>


    <div class="container">
        <section class="cadastro-section">
            <h2>Cadastre seu Carro</h2>
            <hr>
            <form id="formCadastroCarro" action="../includes/cadastrar_carro.php" method="POST">
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" class="form-control" name="placa" id="placa" placeholder="___-____"
                        maxlength="8">
                </div>

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" name="marca" id="marca"
                        placeholder="Digite a marca do carro">
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" id="modelo"
                        placeholder="Digite o modelo do carro">
                </div>

                <div class="mb-3">
                    <label for="ano" class="form-label">Ano</label>
                    <input type="text" class="form-control" name="ano" id="ano" placeholder="Digite o ano do carro">
                </div>

                <div class="mb-3">
                    <label for="ultimaRevisao" class="form-label">Última Revisão</label>
                    <input type="date" class="form-control" name="ultimaRevisao" id="ultimaRevisao">
                </div>

                <div class="mb-3">
                    <label for="combustivel" class="form-label">Tipo de Combustível</label>
                    <select class="form-select" name="combustivel" id="combustivel">
                        <option selected>Selecione o combustível</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Álcool">Álcool</option>
                        <option value="Diesel">Diesel</option>
                        <option value="GNV">GNV</option>
                        <option value="Elétrico">Elétrico</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="motor" class="form-label">Tipo do Motor</label>
                    <select class="form-select" name="motor" id="motor">
                        <option selected>Selecione o motor</option>
                        <option value="1.0">1.0</option>
                        <option value="1.6">1.6</option>
                        <option value="2.0">2.0</option>
                        <option value="2.4">2.4</option>
                        <option value="3.0">3.0</option>
                    </select>
                </div>

                <div class="mb-3">
                        <label for="id_usuario" class="form-label" hidden>ID</label>
                        <input type="text" class="form-control" name="id_usuario" id="id_usuario"
                            value="<?php echo $_SESSION["id_usuario"] ?>" hidden>
                    </div>

                <div class="acoes-cadastro">
                    <button type="submit" class="btn cadastrar">Cadastrar Carro</button>
                    <button type="button" class="btn limpar" id="limparCampos">Limpar</button>
                </div>
            </form>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS modo escuro -->
    <script>
        document.getElementById('mode-toggle').addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            const currentMode = document.body.classList.contains('dark-mode') ? 'Escuro' : 'Claro';
        });
    </script>

    <!-- JS Aumentar e diminuir tamanho da fonte -->
    <script>
        let fontSize = 16;

        document.getElementById('increase-font').addEventListener('click', function () {
            fontSize += 2;
            document.body.style.fontSize = fontSize + 'px';
        });

        document.getElementById('decrease-font').addEventListener('click', function () {
            fontSize -= 2;
            document.body.style.fontSize = fontSize + 'px';
        });

    </script>
</body>

</html>