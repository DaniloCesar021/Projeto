<?php
// Inicia a sessão para acessar variáveis de sessão
session_start();
//
$imagem = "../imagens/usu_sem_foto.png";

// Verifica se o usuário não está autenticado
if (!isset($_SESSION["id_usuario"])) {
    // Redireciona para a página de login se não estiver autenticado
    header('Location: ../login e cadastro/login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/autopecas.css">
    <link rel="shortcut icon" href="../imagens/autoclub.png" type="image/x-icon">
    <title>AutoClub | Autopeças</title>
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
                            <li><a class="dropdown-item" href="../Oficina/index.php">Oficinas</a></li>
                            <li><a class="dropdown-item" href="../Autopeças/index.php">Autopeças</a></li>
                            <li><a class="dropdown-item" href="../Estética/index.php">Estética Automotiva</a></li>
                        </ul>
                    </li>
                </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img src="<?php 
                        if(isset($_SESSION["foto"])) {
                            echo $_SESSION["foto"];
                        } else{
                            echo $imagem;
                        }
                    
                     ?>" alt="Ícone de Usuário" class="user-icon">
                        <div class="welcome-text">
                            <span>Bem-vindo(a)</span><br>
                            <span><?php echo $_SESSION["nome"] ?></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../perfil/perfil.php">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" id="sair" href="../includes/desconectar.php" id>Sair</a></li>
                    </ul>
                </li>                
                                
            </div>
        </div>
    </nav>


    <!-- FIM DA NAVBAR -->

    <img id="bg_autopecas" class="img-fluid" src="../imagens/bg_autopecas1.jpg">


    <div class="container col-sm-12">
        <div class="row">
            <!-- Coluna com a imagem e a descrição -->
            <div class="col-12 col-md-6">
                <p id="nome_autopeca">Autopeça Anchieta</p>
                <img id="img_autopeca" src="../imagens/autopecas_anchieta.jpg" class="img-thumbnail" alt="Autopeça Anchieta"
                    style="width: 100%;">

                <!-- Descrição abaixo da imagem -->
                <h6 id="titulo_descricao">Descrição</h6>
                <p id="p_descricao">Autopeças Anchieta é uma loja especializada na venda de peças automotivas para
                    veículos de diversas marcas e modelos. Oferece uma ampla variedade de produtos, incluindo
                    componentes de motor, suspensão, freios, sistemas elétricos, acessórios e muito mais. Com foco em
                    qualidade e atendimento, a Autopeças Anchieta garante que seus clientes encontrem as peças certas
                    para manter seus veículos em perfeito funcionamento. A loja se destaca pelo conhecimento técnico de
                    sua equipe e pela parceria com fornecedores confiáveis, garantindo peças de alta durabilidade e
                    desempenho.</p>
            </div>

            <!-- Coluna com os cards ao lado da imagem em telas grandes -->
            <div id="card_local" class="col-12 col-md-6 mt-md-5 mb-sm-5">
                <div class="card mb-3 mt-md-5" style="width: 100%;">
                    <div class="card-body">
                        <h2 class="card-title" style="font-weight: bold;">Localização</h2>
                        <p class="card-text">Estr. do Engenho Novo, 116A - Loja A - Anchieta, Rio de Janeiro - RJ,
                            21620-242</p>
                        <h5 class="card-title" style="font-weight: bold;">Horário de Atendimento</h5>
                        <p class="card-text">Segunda à Sexta de 8h às 18h e Sábado de 8h às 14h.</p>
                        <h5 class="card-title" style="font-weight: bold;">Contato</h5>
                        <p class="card-text">(21) 2455-3232</p>
                    </div>
                </div>

                <!-- VLibras Plugin -->
                <div vw class="enabled">
                    <div vw-access-button class="active"></div>
                    <div vw-plugin-wrapper>
                        <div class="vw-plugin-top-wrapper"></div>
                    </div>
                </div>
                <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
                <script>
                    new window.VLibras.Widget('https://vlibras.gov.br/app');
                </script>

                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Serviços</h5>
                        <button id="btn" type="button" class="btn btn-primary btn-sm mt-1" disabled>Retirada na Loja</button>
                        <button id="btn" type="button" class="btn btn-primary btn-sm mt-1" disabled>Entrega</button>
                        <button id="btn" type="button" class="btn btn-primary btn-sm mt-1" disabled>Reciclagem de Bateria</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div id="mapa" class="container-fluid">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.402624177508!2d-43.40761102545176!3d-22.82458893493708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9963e226849371%3A0x16c4b638de589cbd!2sAuto%20Pe%C3%A7as%20Anchieta!5e0!3m2!1spt-BR!2sbr!4v1728506591985!5m2!1spt-BR!2sbr"
            style="width: 100%; height: 300px;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>



    <!-- INÍCIO DO RODAPE -->
    <footer id="footer" class=" text-white text-center text-lg-start mt-auto">
        <div class="container p-4">
            <div class="row">
                <!-- Coluna 1 -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <a class="text-center" href="#">
                        <img id="logo_footer" src="../imagens/AutoClub_logo.png">
                    </a>
                    <p id="contato" class="text-start">
                        E-mail:<br>
                        contato@autoclub.com<br>
                        Info • Support • Marketing
                    </p>
                </div>

                <!-- Coluna 2 -->
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-center" style="font-weight: bold; padding: 5px;">Nosso Objetivo</h5>
                    <ul class="list-inline mb-0">
                        <li id="objetivo" class="list-inline-item text-white">Ser o maior centro
                            global da América
                            Latina, trazendo
                            solução em
                            manutenção aos
                            apaixonados em
                            veículos.
                        </li>
                        <li id="objetivo" class="list-inline-item text-white" style="margin-top: -15px;">
                            Oferecer a melhor opção para qualquer proprietários de
                            veículo em
                            manutenção
                            preventiva e
                            corretiva.
                        </li>
                        <li id="objetivo" class="list-inline-item text-white">Excelência no
                            atendimento e nos
                            serviços, qualidade na
                            entrega, pontualidade, além de compromisso
                            para uma experiência
                            única.</li>
                    </ul>

                    <h5 class="text-uppercase text-center" style="margin-top: 40px;">Sigam nossas redes</h5>
                    <ul id="icon_redes" class="list-inline text-center mb-0">
                        <li class="list-inline-item text-white">
                            <a id="link_icon" href="#"><i class="fab fa-facebook-f fa-2x"></i></a>
                        </li>
                        <li class="list-inline-item text-white">
                            <a id="link_icon" href="#"><i class="fab fa-x-twitter fa-2x"></i></a>
                        </li>
                        <li class="list-inline-item text-white">
                            <a id="link_icon" href="#"><i class="fab fa-instagram fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <p class="text-center align-text-bottom"> AutoClub© 2024 - Todos os direitos reservados.</p>

    </footer>

    <script>
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
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://kit.fontawesome.com/690b857793.js" crossorigin="anonymous"></script>
</body>