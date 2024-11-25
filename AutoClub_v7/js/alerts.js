function excluirUsuario(){
    Swal.fire({
        title: 'Tem certeza que deseja excluir o seu perfil?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../includes/excluir_usuario.php';
        } else {
            window.location.href = '../perfil/perfil.php';
        }
    });
}

