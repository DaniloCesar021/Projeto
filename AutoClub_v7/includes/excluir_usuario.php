<?php 

require("conexao.php");

session_start();

if(isset($_SESSION["id_usuario"])){
    $id_usuario = $_SESSION["id_usuario"];

    $consulta = "UPDATE usuario SET status = 'inativo' WHERE id_usuario = ?";
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param("i", $id_usuario);

    if($stmt->execute()){

        echo "<script>";
        echo "alert('Usuário excluído com sucesso!');";
        echo "window.location.href= '../home/home.html';";
        echo "</script>";

        session_destroy();
    } else{
        echo "<script>";
        echo "alert('Erro ao excluir o usuário');";
        echo "window.location.href= '../perfil/perfil.php';";
        echo "</script>";
    }
} else {
    echo "Nenhum usuário logado.";
}

?>