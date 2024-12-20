<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastro_pecas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>AutoClub | Cadastro de Peças</title>
</head>
<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo" src="../imagens/AutoClub_logo.png" class="img-fluid" style="max-width: 80px; height: auto;">
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="/home/home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#sobre_nos">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contato">Contato</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-white" href="login.php">Entrar</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="">Cadastre-se</a></li>
                </ul>
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
            <h2>Cadastro de Peças</h2>
            <hr>
            <form id="formCadastroPeca" action="../includes/cadastrar_pecas.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome da Peça</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da peça" required>
                </div>

                <div class="mb-3">
                    <label for="preco" class="form-label">Preço da Peça</label>
                    <input type="text" class="form-control" name="preco" id="preco" placeholder="R$ 0,00" required>
                </div>

                <div class="acoes-cadastro">
                    <button type="submit" class="btn cadastrar">Cadastrar Peça</button>
                    <button type="button" class="btn limpar" id="limparCampos">Limpar</button>
                </div>
            </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Máscara para o preço
            $('#preco').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>


<script src="../js/acessibilidade.js"></script>
</body>
</html>
