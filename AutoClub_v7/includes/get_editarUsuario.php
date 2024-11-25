<?php
    // Inclui o arquivo de conexão com o banco de dados
    require("conexao.php");
    global $id_usuario; 
    // Função para obter informações de um usuário com base no ID do usuário
    function obterUsuario($id_usuario) {
        // Usa a variável global $conexao para acessar a conexão com o banco de dados
        global $conexao;
        $id_usuario = $_SESSION["id_usuario"];

        $consulta = "SELECT * FROM usuario WHERE id_usuario = ?";
        $stmt = $conexao->prepare($consulta);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        // Inicializa um array para armazenar os dados do usuário
        $usuario = [];

        // Verifica se há registros retornados
        if ($result->num_rows > 0) {
            // Loop pelos resultados da consulta e armazena os dados no array $usuario
            while ($row = $result->fetch_assoc()) {
                $usuario[] = $row;
            }
        }
        // Retorna o array contendo as informações do usuário
        return $usuario;
    }
?>