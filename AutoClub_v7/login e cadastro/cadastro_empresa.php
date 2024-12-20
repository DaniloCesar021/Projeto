<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastro_empresa.css">
    <!-- biblioteca de máscara do javascript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  ---------------------------------------------------------------------------------------------------------------------------- -->
    <title>AutoClub | Cadastro de Empresa</title>
    <script src="../js/mascaras.js"></script>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo" src="../imagens/AutoClub_logo.png" class="img-fluid"
                    style="max-width: 80px; height: auto;">
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="../home/home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#sobre_nos">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contato">Contato</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-white" href="../login e cadastro/login.php">Entrar</a></li>
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
            <h2>Cadastro de Empresa</h2>
            <hr>
            <form id="formCadastro" action="../includes/cadastrar_empresa.php" method="POST">
                <div class="mb-3">
                    <label for="nomeEmpresa" class="form-label">Nome da Empresa</label>
                    <input type="text" class="form-control" name="nomeEmpresa" id="nomeEmpresa"
                        placeholder="Digite o nome da empresa">
                </div>

                <div class="mb-3">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="Digite o CNPJ">
                </div>


                <div class="mb-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite o CEP">
                </div>

                <div class="mb-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" id="logradouro"
                        placeholder="Rua/Avenida/Estrada">
                </div>

                <div class="mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Nº" maxlength="5">
                </div>

                <div class="mb-3">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o bairro">
                </div>

                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite a cidade">
                </div>

                <div class="mb-3">
                    <label for="uf" class="form-label">UF</label>
                    <select class="form-select" name="uf" id="uf">
                        <option selected>Selecione um estado</option>
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
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone"
                        placeholder="Digite o telefone">
                </div>

                <div class="mb-3">
                    <label for="tipoServico" class="form-label">Tipo de Serviço</label>
                    <select class="form-select" name="tipoServico" id="tipoServico">
                        <option selected>Selecione um serviço</option>
                        <option value="estetica">Estética</option>
                        <option value="autopeca">Autopeça</option>
                        <option value="oficina">Oficina</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email da Empresa</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Digite o email">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="******">
                        <span class="input-group-text"><i id="toggleSenha" class="fa fa-eye"
                                style="cursor: pointer;"></i></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="confirmarSenha" id="confirmarSenha"
                            placeholder="******">
                        <span class="input-group-text"><i id="toggleConfirmarSenha" class="fa fa-eye"
                                style="cursor: pointer;"></i></span>
                    </div>
                </div>

                <div class="mb-3" id="assinaturaContainer">
                    <label class="form-label">Assinatura <span id="tooltip">❓
                            <span id="tooltiptext">A assinatura é um procedimento indispensável. Ao aderir, você
                                contribui com um valor simbólico de apenas R$25,00 por mês. Como nosso parceiro, você
                                desfruta de benefícios exclusivos, como a exibição destacada do seu perfil na página
                                inicial.</span>
                        </span>
                    </label>
                    <p class="text-start">Deseja ser nosso assinante ou virar nosso parceiro?</p>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="assinatura" id="assinante" value="1">
                            <label class="form-check-label" for="assinante">Assinante</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="assinatura" id="parceiro" value="2">
                            <label class="form-check-label" for="parceiro">Parceiro</label>
                        </div>
                    </div>
                </div>

                <div class="acoes-cadastro">
                    <button type="submit" class="btn cadastrar">Cadastrar</button>
                    <button type="button" class="btn limpar" id="limparCampos">Limpar</button>
                </div>
            </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/olhinhoSenha.js"></script>
    <script src="../js/acessibilidade.js"></script>
<script>
         document.getElementById('limparCampos').addEventListener('click', function () {
            document.getElementById('formCadastro').reset();
           
        });
</script>
</body>

</html>