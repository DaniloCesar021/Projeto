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