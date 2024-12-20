<?php
// Inclui o arquivo responsável por obter os dados do usuário a ser editado
require("../includes/get_editarUsuario.php");
require("../includes/processar_carro.php");

// Inicia a sessão para poder acessar variáveis de sessão
//session_start();

// Verifica se o usuário não está autenticado como Administrador
if (!isset($_SESSION["id_usuario"])) {
    //Redireciona para a página de login se não estiver autenticado
    header('Location: ../login e cadastro/login.php');
    exit();
}
// Obtém os dados do usuário a ser editado
$usuario = obterUsuario($id_usuario);

$imagem = "../imagens/usu_sem_foto.png";
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/teste.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- biblioteca de máscara do javascript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  ---------------------------------------------------------------------------------------------------------------------------- -->
    <title>AutoClub | Editar Perfil</title>
    <script src="../js/mascaras.js"></script>
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
                            <span><?php echo $_SESSION["nome"]?></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../perfil/perfil.php">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" id="sair" href="../includes/desconectar.php" id>Sair</a></li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>


    <!-- FIM DA NAVBAR -->

    <!-- Container principal -->
    <div class="container">
        <!-- Seção de Edição de Perfil -->
        <section class="editar-perfil-section">
            <h2 class="text-center">Editar Perfil</h2>
            <hr><br>
            <form action="../includes/alterar_usuario.php" method="POST">
                <?php
                //loop para mostrar os dados do usuário nos campos do formulário
                foreach ($usuario as $dado) {
                    ?>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dado["nome"] ?>">
                    </div>

                    <div class="mb-3" id="nomeMaternoContainer">
                        <label for="nomeMaterno" class="form-label">Nome Materno</label>
                        <input type="text" class="form-control" name="nomeMaterno" id="nomeMaterno"
                            value="<?php echo $dado["nomeMaterno"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $dado["cpf"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="tel" class="form-control" name="telefone" id="telefone"
                            value="<?php echo $dado["telefone"] ?>">
                    </div>

                    <div class="mb-3" id="dataNascimentoContainer">
                        <label for="dataNasc" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dataNasc" id="dataNasc"
                            value="<?php echo $dado["dataNasc"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $dado["cep"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="logradouro" class="form-label">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro"
                            value="<?php echo $dado["logradouro"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" name="numero" id="numero"
                            value="<?php echo $dado["numero"] ?>" oninput="mascaraTelefone(this)">
                    </div>

                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro"
                            value="<?php echo $dado["bairro"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade"
                            value="<?php echo $dado["cidade"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="uf" class="form-label">UF</label>
                        <select class="form-select" name="uf" id="uf">
                            <option selected value="<?php echo $dado["uf"] ?>"><?php echo $dado["uf"] ?></option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="<?php echo $dado["email"] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="senha" id="senha"
                                placeholder="*******"
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
                                placeholder="*******" required>
                            <span class="input-group-text">
                                <i id="toggleConfirmarSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto de Perfil</label><br>
                        <input type="file"  accept="image/*" name="foto" id="foto">
                    </div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="id_usuario" id="id_usuario"
                            value="<?php echo $dado["id_usuario"] ?>">
                    </div>

                    <div class="acoes-perfil">
                        <button type="submit" class="btn editar">Salvar Alterações</button>
                    </div>
                    <?php
                    //fim do loop
                }
                ?>
            </form>
        </section>
    </div>

    <script>
        // Função para alternar a visibilidade da senha
        document.getElementById('toggleSenha').addEventListener('click', function () {
            const senhaInput = document.getElementById('senha');
            const senhaIcon = document.getElementById('toggleSenha');

            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                senhaIcon.classList.remove('fa-eye');
                senhaIcon.classList.add('fa-eye-slash');
            } else {
                senhaInput.type = 'password';
                senhaIcon.classList.remove('fa-eye-slash');
                senhaIcon.classList.add('fa-eye');
            }
        });

        // Função para alternar a visibilidade da confirmação de senha
        document.getElementById('toggleConfirmarSenha').addEventListener('click', function () {
            const confirmarSenhaInput = document.getElementById('confirmarSenha');
            const confirmarSenhaIcon = document.getElementById('toggleConfirmarSenha');

            if (confirmarSenhaInput.type === 'password') {
                confirmarSenhaInput.type = 'text';
                confirmarSenhaIcon.classList.remove('fa-eye');
                confirmarSenhaIcon.classList.add('fa-eye-slash');
            } else {
                confirmarSenhaInput.type = 'password';
                confirmarSenhaIcon.classList.remove('fa-eye-slash');
                confirmarSenhaIcon.classList.add('fa-eye');
            }
        });
    </script>

    <!--  <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Seleciona o link com o ID 'sair'
            const logoutLink = document.getElementById('sair');

            // Adiciona o listener de clique
            if (logoutLink) {
                logoutLink.addEventListener('click', function (event) {
                    // Limpa o localStorage
                    localStorage.clear();

                    // Opcional: Exibe uma mensagem de confirmação no console
                    console.log("Usuário deslogado, localStorage limpo.");
                });
            }
        });
    </script> -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>