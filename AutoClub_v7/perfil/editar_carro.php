<?php
// Inclui o arquivo responsável por obter os dados do usuário a ser editado
require("../includes/get_editarCarro.php");
//require("../includes/processar_carro.php");

// Inicia a sessão para poder acessar variáveis de sessão
session_start();

// Verifica se o usuário não está autenticado como Administrador
if (!isset($_SESSION["id_usuario"])) {
    //Redireciona para a página de login se não estiver autenticado
    header('Location: ../login e cadastro/login.php');
    exit();
}
// Obtém os dados do usuário a ser editado
$carro = obterCarro($id_carro);

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/mascaras.js"></script>
    
    <title>AutoClub | Editar Perfil</title>
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
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
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
                        <li><a class="dropdown-item" id="sair" href="../home/home.html" id>Sair</a></li>
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
            <h3 class="text-center">Informações do Carro</h3>
            <hr><br>
            <form action="../includes/alterar_carro.php" method="POST">
            <?php
                //loop para mostrar os dados do usuário nos campos do formulário
                foreach ($carro as $dado) {
                    ?>
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $dado["placa"] ?>">
                </div>

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $dado["marca"] ?>">
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $dado["modelo"] ?>">
                </div>

                <div class="mb-3">
                    <label for="ano" class="form-label">Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" value="<?php echo $dado["ano"] ?>" maxlength="4">
                </div>

                <div class="mb-3">
                    <label for="motor" class="form-label">Motor</label>
                    <input type="text" class="form-control" id="motor" name="motor" value="<?php echo $dado["motor"] ?>">
                </div>

              
                <div class="mb-3">
                    <label for="combustivel" class="form-label">Combustível</label>
                    <input type="text" class="form-control" id="combustivel" name="combustivel" value="<?php echo $dado["combustivel"] ?>">
                </div>

                <div class="mb-3">
                    <label for="ultimaRevisao" class="form-label">Última Revisão</label>
                    <input type="date" class="form-control" id="ultimaRevisao" name="ultimaRevisao" value="<?php echo $dado["ultimaRevisao"] ?>">
                </div>

                <div class="mb-3">
                    <label for="id_carro" class="form-label" hidden>ID</label>
                    <input type="text" class="form-control" id="id_carro" name="id_carro" value="<?php echo $dado["id_carro"] ?>" hidden>
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