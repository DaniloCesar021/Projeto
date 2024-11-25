<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/novo_usuMaster.css">
    <!-- biblioteca de máscara do javascript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  ---------------------------------------------------------------------------------------------------------------------------- -->
    <title>AutoClub | Usuário Master</title>
    <script src="../js/mascaras.js"></script>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home/home.html">
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
                        <a class="nav-link text-white" href="../login e cadastro/login.php">Entrar</a>
                    </li>
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
            <h2>Cadastro de Usuário Master</h2>
            <hr>
            <br>
            <form id="formCadastro" action="../includes/cadastrar_usuMaster.php" method="POST">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" id="nome"
                        placeholder="Digite seu nome completo">
                </div>

               
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="******"
                            pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,12}$"
                            title="A senha deve conter de 6 a 12 caracteres, incluindo pelo menos uma letra maiúscula, um número e um caractere especial."
                            required>
                        <span class="input-group-text">
                            <i id="toggleSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="confirmarSenha" id="confirmarSenha"
                            placeholder="******" required>
                        <span class="input-group-text">
                            <i id="toggleConfirmarSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>


                <div class="mb-3">
                        <label for="foto" class="form-label">Foto de Perfil</label><br>
                        <input type="file"  accept="image/*" name="foto" id="foto">
                    </div>

                <div class="acoes-cadastro">
                    <button type="submit" class="btn cadastrar">Cadastrar</button>
                    <button type="button" class="btn limpar" id="limparCampos">Limpar</button>
                </div>
            </form>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



    <script>
        document.getElementById('limparCampos').addEventListener('click', function () {
            document.getElementById('formCadastro').reset();
        });
    </script>

    <script src="../js/acessibilidade.js"></script>
    <script src="../js/olhinhoSenha.js"></script>
    <script src="cadastro.js"></script>
</body>

</html>