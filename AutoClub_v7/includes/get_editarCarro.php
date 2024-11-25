<?php
    // Inclui o arquivo de conexão com o banco de dados
    require("conexao.php");
    global $id_carro; 
    // Função para obter informações de um usuário com base no ID do usuário
    function obterCarro($id_carro) {
        // Usa a variável global $conexao para acessar a conexão com o banco de dados
        global $conexao;
        $id_carro = $_SESSION["id_carro"];

        $consulta = "SELECT * FROM carro WHERE id_carro = ?";
        $stmt = $conexao->prepare($consulta);
        $stmt->bind_param("i", $id_carro);
        $stmt->execute();
        $result = $stmt->get_result();
        // Inicializa um array para armazenar os dados do usuário
        $carro = [];

        // Verifica se há registros retornados
        if ($result->num_rows > 0) {
            // Loop pelos resultados da consulta e armazena os dados no array $usuario
            while ($row = $result->fetch_assoc()) {
                $carro[] = $row;
            }
        }
        // Retorna o array contendo as informações do usuário
        return $carro;
    }
?>