//ViaCep para puxar o endereço pelo cep
$(document).ready(function () {
    $('#cep').on('blur', function () {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep !== "") {
            var url = "https://viacep.com.br/ws/" + cep + "/json/";
            $.getJSON(url, function (data) {
                if (!("erro" in data)) {
                    $('#logradouro').val(data.logradouro);
                    $('#bairro').val(data.bairro);
                    $('#complemento').val(data.complemento);
                    $('#cidade').val(data.localidade); // Adiciona cidade
                } else {
                    alert("CEP não encontrado.");
                }
            });
        }
    });
});

//máscara do cnpj
document.addEventListener('DOMContentLoaded', function() {
    var cnpjInput = document.getElementById('cnpj');
    var cnpjMask = IMask(cnpjInput, {
        mask: '00.000.000/0000-00'
    });
});

//máscara do cep
document.addEventListener('DOMContentLoaded', function() {
    var cepInput = document.getElementById('cep');
    var cepMask = IMask(cepInput, {
        mask: '00000-000'
    });
});

//máscara do cpf
document.addEventListener('DOMContentLoaded', function() {
    var cpfInput = document.getElementById('cpf');
    var cpfMask = IMask(cpfInput, {
        mask: '000.000.000-00'
    });
});

//máscara do telefone
document.addEventListener('DOMContentLoaded', function() {
    var telefoneInput = document.getElementById('telefone');
    var telefoneMask = IMask(telefoneInput, {
        mask: '(00)00000-0000'
    });
});


//script para esconder e mostrar a senha
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

document.getElementById('limparCampos').addEventListener('click', function () {
    document.getElementById('formCadastro').reset();
    updateFormFields();
});

updateFormFields();


//modo escuro
document.getElementById('mode-toggle').addEventListener('click', function () {
    document.body.classList.toggle('dark-mode');
    const currentMode = document.body.classList.contains('dark-mode') ? 'Escuro' : 'Claro';
});


/* let fontSize = 16;

document.getElementById('increase-font').addEventListener('click', function () {
    fontSize += 2;
    document.body.style.fontSize = fontSize + 'px';
});

document.getElementById('decrease-font').addEventListener('click', function () {
    fontSize -= 2;
    document.body.style.fontSize = fontSize + 'px';
});
 */