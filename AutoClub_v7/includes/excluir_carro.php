<?php 

require("conexao.php");

session_start();

if(isset($_SESSION["id_usuario"])){
    $id_usuario = $_SESSION["id_usuario"];
    $id_carro = $_SESSION["id_carro"];
    

    $consulta = "DELETE FROM carro WHERE id_carro = ? AND id_usuario = ?";
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param("ii", $id_carro,$id_usuario);

    if($stmt->execute()){

        echo "<script>";
        echo "alert('Carro excluído com sucesso!');";
        echo "window.location.href= '../perfil/perfil.php';";
        echo "</script>";

    } else{
        echo "<script>";
        echo "alert('Erro ao excluir o carro');";
        echo "window.location.href= '../perfil/perfil.php';";
        echo "</script>";
    }
} else {
    echo "Nenhum usuário logado.";
}

?>