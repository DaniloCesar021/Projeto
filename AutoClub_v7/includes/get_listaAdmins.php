<?php
    // Inclui o arquivo de conexão com o banco de dados
    require("conexao.php");

    // Consulta SQL para recuperar informações de equipamentos e seus respectivos setores
    $consulta = "SELECT id_adm, nome, email, status FROM adm";
    
    // Prepara a consulta SQL
    $stmt = $conexao->prepare($consulta);
    
    // Executa a consulta
    $stmt->execute();
    
    // Obtém o resultado da consulta
    $result = $stmt->get_result();
    
    // Verifica se há registros retornados
    if ($result->num_rows > 0) {
        // Loop pelos resultados da consulta e exibe as informações na forma de uma tabela HTML
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id_adm']}</td>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['status']}</td>";
             echo "
                <td>
                    <a class='acao' href='includes/acao_excluir.php?pg=equipamentos&idEquipamento={$row['idEquipamento']}'><i class='ri-delete-bin-5-fill'></i></a>
                </td>
            "; 
            echo "</tr>";
        }
    } else {
        // Se não houver registros, exibe uma linha de tabela com colspan
        echo "<tr><td colspan='5'></td></tr>";
    }
?>