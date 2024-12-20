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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/indexAutopecas.css">
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

    <!-- BARRA DE PESQUISA -->
    <form class="container-sm d-flex justify-content-center" role="search">
        <input id="pesquisa" class="form-control form-control-sm me-2" type="search" placeholder="Pesquise na AutoClub"
            aria-label="Search">
    </form>

    <div class="container">
        <div class="row">
            <!-- O botão só aparecerá em larguras menores que md (768px) -->
            <button id="botao_filtro" class="btn btn-primary d-md-none d-block mt-3" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                Filtro
            </button>

            <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
                aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Filtro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <form>
                        <h5>Peças:</h5>
                        <div id="checkbox" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Filtro de Óleo</label>
                        </div>

                        <div id="checkbox" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Filtro de Ar</label>
                        </div>

                        <div id="checkbox" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Pastilhas de Freio</label>
                        </div>

                        <div id="checkbox" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Discos de Freio</label>
                        </div>

                        <div id="checkbox" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Bateria</label>
                        </div>

                        <div id="checkbox" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Ventoinha</label>
                        </div>

                        <div id="checkbox" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Radiador</label>
                        </div><br><br>

                        <h6>Localização:</h6>
                        <select class="form-select" aria-label="Default select example" style="margin: 0;">
                            <option selected>Selecione uma região</option>
                            <option value="1">Anchieta</option>
                            <option value="2">Pavuna</option>
                            <option value="3">Guadalupe</option>
                        </select><br>

                        <h6>Faixa de Preço:</h6>
                        <select class="form-select" aria-label="Default select example" style="margin: 0;">
                            <option selected>Selecione um preço</option>
                            <option value="1">De R$80 a R$120</option>
                            <option value="2">De R$120 a R$240</option>
                            <option value="3">De R$240 a R$380</option>
                        </select>


                        <input id="btn" class="btn btn-primary mt-3" type="reset" value="Limpar">
                        <input id="btn" class="btn btn-primary mt-3" type="submit" value="Aplicar Filtros">
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- ORVERFLOW DOS FILTROS  -->
    <div class="container">
        <div class="row">
            <!--  Coluna para o overflow  -->
            <div id="overflow" class="col-md-3 overflow-y-auto d-none d-md-block mt-5" style="height: 400px;">
                <form>
                    <h5>Peças:</h5>
                    <div id="checkbox" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Filtro de Óleo</label>
                    </div>

                    <div id="checkbox" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Filtro de Ar</label>
                    </div>

                    <div id="checkbox" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Pastilhas de Freio</label>
                    </div>

                    <div id="checkbox" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Discos de Freio</label>
                    </div>

                    <div id="checkbox" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Bateria</label>
                    </div>

                    <div id="checkbox" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Ventoinha</label>
                    </div>

                    <div id="checkbox" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Radiador</label>
                    </div><br><br>

                    <h6>Localização:</h6>
                    <select class="form-select" aria-label="Default select example" style="margin: 0;">
                        <option selected>Selecione uma região</option>
                        <option value="1">Anchieta</option>
                        <option value="2">Pavuna</option>
                        <option value="3">Guadalupe</option>
                    </select><br>

                    <h6>Faixa de Preço:</h6>
                    <select class="form-select" aria-label="Default select example" style="margin: 0;">
                        <option selected>Selecione um preço</option>
                        <option value="1">De R$80 a R$120</option>
                        <option value="2">De R$120 a R$240</option>
                        <option value="3">De R$240 a R$380</option>
                    </select>

                    <input id="btn" class="btn btn-primary mt-3" type="reset" value="Limpar">
                    <input id="btn" class="btn btn-primary mt-3" type="submit" value="Aplicar Filtros">
                </form>
            </div>

            <!-- Coluna para os cards -->
            <div id="cards" class="col-md-9 d-flex flex-column align-items-center">
                <a class="text-decoration-none w-100" href="autopecas_anchieta.php">
                    <div class="card mb-3 mt-5 w-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../imagens/autopecas_anchieta.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Autopeças Anchieta</h5>
                                    <p class="card-text"> </p>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1" disabled>Retirada
                                        na Loja</button>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1"
                                        disabled>Entrega</button>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1"
                                        disabled>Reciclagem de Bateria</button>
                                    <p class="card-text"><small class="text-body-secondary">Rio de Janeiro,
                                            Anchieta</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a class="text-decoration-none w-100" href="autopecas_lupi.php">
                    <div class="card mb-3 w-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../imagens/autopecas_lupi.jpeg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Lupi Autopeças</h5>
                                    <p class="card-text"> </p>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1" disabled>Retirada
                                        na Loja</button>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1"
                                        disabled>Entrega</button>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1"
                                        disabled>Reciclagem de Bateria</button>
                                    <p class="card-text"><small class="text-body-secondary">Rio de Janeiro,
                                            Rocha Miranda</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a class="text-decoration-none w-100" href="autopecas_guigo.php">
                    <div class="card mb-3 w-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../imagens/autopecas_guigo.jpeg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Guigo Autopeças</h5>
                                    <p class="card-text"> </p>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1" disabled>Retirada
                                        na Loja</button>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1"
                                        disabled>Entrega</button>
                                    <button id="btn" type="button" class="btn btn-primary btn-sm mt-1"
                                        disabled>Reciclagem de Bateria</button>
                                    <p class="card-text"><small class="text-body-secondary">Rio de Janeiro,
                                            Anchieta</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://kit.fontawesome.com/690b857793.js" crossorigin="anonymous"></script>
</body>