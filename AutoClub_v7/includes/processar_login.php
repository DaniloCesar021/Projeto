<?php


// Inicia a sessão para acessar variáveis de sessão
session_start();
require("conexao.php");

// Verifica se a requisição foi feita via método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["login"];
    $senha = $_POST["senha"];

    // Verifica primeiro se é um usuário
    $consultaUsuario = "SELECT * FROM usuario WHERE email = ? AND status = 'ativo'";
    $stmtUsuario = $conexao->prepare($consultaUsuario);
    $stmtUsuario->bind_param("s", $email);
    $stmtUsuario->execute();
    $resultUsuario = $stmtUsuario->get_result();

    //verefica se encontrou alguém com o email fornecido
    if ($resultUsuario->num_rows > 0) {
        $rowUsuario = $resultUsuario->fetch_assoc();
        //verifica as senhas
        if (password_verify($senha, $rowUsuario["senha"])) {
            // Armazena dados do usuário na sessão
            $_SESSION["id_usuario"] = $rowUsuario["id_usuario"];
            $_SESSION["nome"] = $rowUsuario["nome"];
            $_SESSION["cpf"] = $rowUsuario["cpf"];
            $_SESSION["nomeMaterno"] = $rowUsuario["nomeMaterno"];
            $_SESSION["dataNasc"] = date("d/m/Y", strtotime($rowUsuario["dataNasc"]));
            $_SESSION["sexo"] = $rowUsuario["sexo"];
            $_SESSION["telefone"] = $rowUsuario["telefone"];
            $_SESSION["cep"] = $rowUsuario["cep"];
            $_SESSION["logradouro"] = $rowUsuario["logradouro"];
            $_SESSION["numero"] = $rowUsuario["numero"];
            $_SESSION["bairro"] = $rowUsuario["bairro"];
            $_SESSION["cidade"] = $rowUsuario["cidade"];
            $_SESSION["uf"] = $rowUsuario["uf"];
            $_SESSION["email"] = $rowUsuario["email"];
            $_SESSION["nivel"] = $rowUsuario["nivel"];
            $_SESSION["foto"] = $rowUsuario["foto"];

            // Redireciona com base no nível do usuário
            header("Location: ../home/home_logado.php");
            exit();
        } else {
            echo "<script>";
            echo "alert('Dados incorretos, por favor tente novamente.');";
            echo "window.location.href = '../login e cadastro/login.php';";
            echo "</script>";
        }
    } else{
        echo "<script>";
        echo "alert('Usuário não encontrado. Verifique suas informações.');";
        echo "window.location.href = '../login e cadastro/login.php';";
        echo "</script>";
    }

    // Se não é um usuário, verifica se é uma autopeça
    $consultaAutopecas = "SELECT * FROM autopecas WHERE email = ? AND status = 'ativo'";
    $stmtAutopecas = $conexao->prepare($consultaAutopecas);
    $stmtAutopecas->bind_param("s", $email);
    $stmtAutopecas->execute();
    $resultAutopecas = $stmtAutopecas->get_result();

    //verefica se encontrou alguém com o email fornecido
    if ($resultAutopecas->num_rows > 0) {
        $rowAutopecas = $resultAutopecas->fetch_assoc();
        //verifica as senhas
        if (password_verify($senha, $rowAutopecas["senha"])) {
            // Armazena dados da autopeça na sessão
            $_SESSION["id_autopecas"] = $rowAutopecas["id_autopecas"];
            $_SESSION["nome"] = $rowAutopecas["nome"];
            $_SESSION["cnpj"] = $rowAutopecas["cnpj"];
            $_SESSION["logradouro"] = $rowAutopecas["logradouro"];
            $_SESSION["numero"] = $rowAutopecas["numero"];
            $_SESSION["bairro"] = $rowAutopecas["bairro"];
            $_SESSION["cidade"] = $rowAutopecas["cidade"];
            $_SESSION["uf"] = $rowAutopecas["uf"];
            $_SESSION["cep"] = $rowAutopecas["cep"];
            $_SESSION["telefone"] = $rowAutopecas["telefone"];
            $_SESSION["email"] = $rowAutopecas["email"];
            $_SESSION["senha"] = $rowAutopecas["senha"];
            $_SESSION["nivel"] = $rowAutopecas["nivel"];
            $_SESSION["foto"] = $rowAutopecas["foto"];

            header("Location: ../home/home_logado.php");
            exit();
        } else {
            echo "<script>";
            echo "alert('Dados incorretos, por favor tente novamente.');";
            echo "window.location.href = '../login e cadastro/login.php';";
            echo "</script>";
        }
    } else{
        echo "<script>";
        echo "alert('Autopeça não encontrada. Verifique suas informações.');";
        echo "window.location.href = '../login e cadastro/login.php';";
        echo "</script>";
    }

     // Se não é uma autopeça, verifica se é uma estética
     $consultaEstetica = "SELECT * FROM estetica WHERE email = ? AND status = 'ativo'";
     $stmtEstetica = $conexao->prepare($consultaEstetica);
     $stmtEstetica->bind_param("s", $email);
     $stmtEstetica->execute();
     $resultEstetica = $stmtEstetica->get_result();
 
     //verefica se encontrou alguém com o email fornecido
     if ($resultEstetica->num_rows > 0) {
         $rowEstetica = $resultEstetica->fetch_assoc();
         //verifica as senhas
         if (password_verify($senha, $rowEstetica["senha"])) {
             // Armazena dados do usuário na sessão
             $_SESSION["id_autopecas"] = $rowEstetica["id_autopecas"];
             $_SESSION["nome"] = $rowEstetica["nome"];
             $_SESSION["cnpj"] = $rowEstetica["cnpj"];
             $_SESSION["logradouro"] = $rowEstetica["logradouro"];
             $_SESSION["numero"] = $rowEstetica["numero"];
             $_SESSION["bairro"] = $rowEstetica["bairro"];
             $_SESSION["cidade"] = $rowEstetica["cidade"];
             $_SESSION["uf"] = $rowEstetica["uf"];
             $_SESSION["cep"] = $rowEstetica["cep"];
             $_SESSION["telefone"] = $rowEstetica["telefone"];
             $_SESSION["email"] = $rowEstetica["email"];
             $_SESSION["senha"] = $rowEstetica["senha"];
             $_SESSION["nivel"] = $rowEstetica["nivel"];
             $_SESSION["foto"] = $rowEstetica["foto"];
 
             // Redireciona com base no nível do usuário
             header("Location: ../home/home_logado.php");
             exit();
         } else {
            echo "<script>";
            echo "alert('Dados incorretos, por favor tente novamente.');";
            echo "window.location.href = '../login e cadastro/login.php';";
            echo "</script>";
         }
     } else{
        echo "<script>";
        echo "alert('Estética não encontrada. Verifique suas informações.');";
        echo "window.location.href = '../login e cadastro/login.php';";
        echo "</script>";
     }

      // Se não é uma estética, verifica se é uma oficina
    $consultaOficina = "SELECT * FROM oficina WHERE email = ? AND status = 'ativo'";
    $stmtOficina = $conexao->prepare($consultaOficina);
    $stmtOficina->bind_param("s", $email);
    $stmtOficina->execute();
    $resultOficina = $stmtOficina->get_result();
 
    //verifica se encontrou o usuário com o email fornecido
    if ($resultOficina->num_rows > 0) {
        $rowOficina = $resultOficina->fetch_assoc();
        //verifica a senha
        if (password_verify($senha, $rowOficina["senha"])) {
            // Armazena dados do usuário na sessão
            $_SESSION["id_autopecas"] = $rowOficina["id_autopecas"];
            $_SESSION["nome"] = $rowOficina["nome"];
            $_SESSION["cnpj"] = $rowOficina["cnpj"];
            $_SESSION["logradouro"] = $rowOficina["logradouro"];
            $_SESSION["numero"] = $rowOficina["numero"];
            $_SESSION["bairro"] = $rowOficina["bairro"];
            $_SESSION["cidade"] = $rowOficina["cidade"];
            $_SESSION["uf"] = $rowOficina["uf"];
            $_SESSION["cep"] = $rowOficina["cep"];
            $_SESSION["telefone"] = $rowOficina["telefone"];
            $_SESSION["email"] = $rowOficina["email"];
            $_SESSION["senha"] = $rowOficina["senha"];
            $_SESSION["nivel"] = $rowOficina["nivel"];
            $_SESSION["foto"] = $rowOficina["foto"];

            // Redireciona com base no nível do usuário
            header("Location: ../home/home_logado.php");
            exit();
        } else {
            echo "<script>";
            echo "alert('Dados incorretos, por favor tente novamente.');";
            echo "window.location.href = '../login e cadastro/login.php';";
            echo "</script>";
        } 
    } else{
        echo "<script>";
        echo "alert('Oficina não encontrada. Verifique suas informações.');";
        echo "window.location.href = '../login e cadastro/login.php';";
        echo "</script>";
    }

     // Se não é uma oficina, verifica se é um usuário master
     $consultaUsuMaster = "SELECT * FROM adm WHERE email = ? AND status = 'ativo'";
     $stmtUsuMaster = $conexao->prepare($consultaUsuMaster);
     $stmtUsuMaster->bind_param("s", $email);
     $stmtUsuMaster->execute();
     $resultUsuMaster = $stmtUsuMaster->get_result();
 
     if ($resultUsuMaster->num_rows > 0) {
         $rowUsuMaster = $resultUsuMaster->fetch_assoc();
         if (password_verify($senha, $rowUsuMaster["senha"])) {
             // Armazena dados do usuário na sessão
             $_SESSION["id_adm"] = $rowUsuMaster["id_adm"];
             $_SESSION["nome"] = $rowUsuMaster["nome"];
             $_SESSION["email"] = $rowUsuMaster["email"];
             $_SESSION["nivel"] = $rowUsuMaster["nivel"];
             $_SESSION["foto"] = $rowUsuMaster["foto"];
 
             // Redireciona com base no nível do usuário
             header("Location: ../perfil/perfil_master.php");
             exit();
         } else {
            echo "<script>";
            echo "alert('Dados incorretos, por favor tente novamente.');";
            echo "window.location.href = '../login e cadastro/login.php';";
            echo "</script>";
         }
     }

    // Caso nenhuma das condições seja satisfeita
    echo "<script>";
    echo "alert('Nenhum email encontrado.');";
    echo "window.location.href = '../home/home.html';";
    echo "</script>";
}
?>
