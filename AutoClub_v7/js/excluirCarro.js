function excluirCarro(){
    Swal.fire({
        title: 'Tem certeza que deseja excluir o seu carro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../includes/excluir_carro.php';
        } else {
            window.location.href = '../perfil/perfil.php';
        }
    });
}