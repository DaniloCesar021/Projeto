<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/gerenciar_usuario.css">
    
    <title>AutoClub | Gerenciar Usuários</title>
</head>
<body>
    <!-- COMEÇO DA NAVBAR -->
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
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#sobre_nos">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contato">Contato</a>
                    </li>
                   <!--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Serviços
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Oficina/index.html">Oficinas</a></li>
                            <li><a class="dropdown-item" href="../Autopeças/index.html">Autopeças</a></li>
                            <li><a class="dropdown-item" href="../Estética/index.html">Estética Automotiva</a></li>
                        </ul>
                    </li> -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="gerenciar_usuario.html">Gerenciar Usuários</a></li>
                            <li><a class="dropdown-item" href="relatorio.html">Relatórios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- FIM DA NAVBAR -->

    <!-- Container principal -->
    <div class="container">
        <!-- Seção de gerenciamento de usuários -->
        <section class="gerenciar-usuarios-section">
            <h2 class="text-center">Gerenciamento de Usuários</h2>

            <!-- Tabela de usuários -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- <td>1</td>
                        <td>Nome Completo</td>
                        <td>usuario@exemplo.com</td>
                        <td>+55 11 91234-5678</td>
                        <td> -->
                            <?php 
                                require("../includes/get_listaAdmins.php");
                            ?>
                            <!-- <button class="btn btn-danger btn-sm">Excluir</button> -->
                        </td>
                    </tr>
                    <!-- Outros usuários aqui -->
                </tbody>
            </table>

            <!-- Botão para adicionar novo usuário -->
            <div class="acoes-usuarios">
                <a href="novo_usuMaster.php" class="btn btn-success">Adicionar Novo Usuário</a>
            </div>
        </section>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
