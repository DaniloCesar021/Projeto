<?php
// Fazendo conexão com o banco
require("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_usuario = $_POST["id_usuario"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nomeMaterno = $_POST["nomeMaterno"];
    $telefone = $_POST["telefone"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $cep = $_POST["cep"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confSenha = $_POST["confirmarSenha"];

    
    
    
    /* if (isset($foto)) {
        // Nome temporário e nome original do arquivo
        $nomeTemp = $_FILES[$foto]["tmp_name"];
        $nomeFoto = basename($_FILES[$foto]["name"]);
        $dir = "fotos_perfil/";

        // Move o arquivo para o diretório desejado
        if (move_uploaded_file($nomeTemp, $dir . $nomeFoto)) {
            echo "Foto foi enviada com sucesso!";
        } else {
            echo "Falha ao enviar a foto.";
            exit();
        }
    } else {
        echo "Nenhuma foto enviada ou erro no upload.";
    } */

    if ($senha === $confSenha) {
        // Criptografa a senha apenas se estiver correta
        $senha = password_hash($senha, PASSWORD_BCRYPT);
    } else {
        echo "<script>alert('Senhas estão incorretas. Por favor, insira as senhas novamente!');</script>";
        exit();
    }

    // Verifica se um arquivo foi enviado
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'fotos_perfil/'; // Diretório base
    
        // Criar o diretório base se ele não existir
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        // Define o caminho final do arquivo
        $fileName = basename($_FILES['foto']['name']);
        $filePath = $uploadDir . $fileName;
    
        // Move o arquivo para o diretório
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $filePath)) {
            // Salva o caminho no banco de dados
            echo "Foto salva no banco";
            
        } else{
            echo "Erro ao salvar a foto!";
        }
    } 
echo $filePath;
    // Consulta SQL
    $consulta = "UPDATE usuario SET nome = ?, cpf = ?, nomeMaterno = ?, telefone = ?, logradouro = ?, numero = ?, bairro = ?, cidade = ?, uf = ?, cep = ?, email = ?, senha = ?, foto = ? WHERE id_usuario = ?";
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param("sssssssssssssi", $nome, $cpf, $nomeMaterno, $telefone, $logradouro, $numero, $bairro, $cidade, $uf, $cep, $email, $senha, $filePath, $id_usuario);

    if ($stmt->execute()) {
        echo "<script>alert('O Usuário foi alterado com sucesso.'); window.location.href = '../perfil/perfil.php';</script>";
        exit();
    } else {
        echo "<script>alert('Falha ao editar o usuário.'); window.location.href = '../perfil/editar_perfil.php';</script>";
        exit();
    }
}
?>
