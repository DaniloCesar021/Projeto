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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoClub | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"
        integrity="sha512-wC/cunGGDjXSl9OHUH0RuqSyW4YNLlsPwhcLxwWW1CR4OeC2E1xpcdZz2DeQkEmums41laI+eGMw95IJ15SS3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="slide.css">
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
                            <li><a class="dropdown-item" href="../Oficina/index.php">Oficinas</a></li>
                            <li><a class="dropdown-item" href="../Autopeças/index.html">Autopeças</a></li>
                            <li><a class="dropdown-item" href="../Estética/index.html">Estética Automotiva</a></li>
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
    <main>
        <section class="home" id="s1">
            <!--  -->
            <div class="carro1">
                <h1>Precisando de serviços <br> para seu carro?</h1>
                <p>Solicite orçamentos e agende serviços com <br> os melhores mecânicos de carros.</p>
                <img src="imagens/carroazul.png" id="imgc1">

            </div>

            <img src="imagens/WhatsApp Image 2024-08-29 at 00.42.22.jpeg" id="imgc2">

        </section>


        <section class="home2" id="s2">
            <div class="Container">

                <h2>Confira os serviços de oficinas por categoria</h2>

                <div class="cb">

                <a href="../oleo/oleo.html"><img src="imagens/troca d oleo.png" alt="" class="bolotas"></a>
                    <p>Troca de Óleo</p>
                    <a href="../pneu/index.html"><img src="imagens/troca d pneu.png" alt="" class="bolotas"></a>
                    <p>Troca de Pneu</p>
                    <a href=""><img src="imagens/suspenção.png" alt="" class="bolotas"></a>
                    <p>Suspensão</p>
                    <a href=""><img src="imagens/freios.png" alt="" class="bolotas"></a>
                    <p id="pf">Freios</p>
                    <a href=""><img src="imagens/imagem_5-removebg-preview.png" alt="" class="bolotas"></a>
                    <p id="ps">Sistema Elétrico</p>

                </div>

            </div>
            <!---------------------------------SLIDE BAR---------------------------------------------------------------->
            <section class="slider">
                <div class="slide-content">

                    <input type="radio" name="btn-radio" id="radio1">
                    <input type="radio" name="btn-radio" id="radio2">
                 

                    <div class="slide-box primeiro">
                        <a href="../pneu/index.html">
                            <img src="imagens/Desgaste Pneu.png">
                        </a>
                    </div>

                    <div class="slide-box segundo">
                        <a href="../oleo/oleo.html">
                            <img src="imagens/troca de óleo.png" alt="">
                        </a>
                    </div>
                        <div class="nav-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                        </div>

                            <div class="nav-manual">
                                <label for="radio1" class="manual-btn"></label>
                                <label for="radio2" class="manual-btn"></label>
                            </div>

                </div>
            </section>
  <!-------------------------------------------------------------------------------------------------------------------->
        </section>
        <section id="s3">
            <h1 id="sobre_nos">QUEM SOMOS?</h1>
            <div class="ds3">
                <div class="ds3-item">
                    <h2>MISSÃO</h2>
                    <p>Oferecer a melhor <br> opção para qualquer <br> proprietário de <br> veículo em <br>
                        manutenção preventiva e <br> corretiva.</p>
                </div>
                <div class="ds3-item">
                    <h2>VISÃO</h2>
                    <p>Ser o maior centro <br> global da América <br> Latina, trazendo <br> solução em <br>
                        manutenção aos <br> apaixonados em <br> veículos.</p>
                </div>
                <div class="ds3-item">
                    <h2>VALORES</h2>
                    <p>Excelência no <br> atendimento e nos <br> serviços, qualidade na <br> entrega, pontualidade,
                        <br> além de
                        compromisso<br> para uma experiência <br> única.
                    </p>
                </div>
            </div>
        </section>


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
                       <!--  <h5 class="text-uppercase text-center" style="font-weight: bold; padding: 5px;">Nosso Objetivo
                        </h5> -->
                        <!-- <ul class="list-inline mb-0">
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
                        </ul> -->

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
    </main>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://kit.fontawesome.com/690b857793.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home_logado.css">
    <script src="script_home.js"></script>
    <script src="slide.js"></script>
</body>
</html>