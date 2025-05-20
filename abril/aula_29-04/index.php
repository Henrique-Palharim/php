<?php 

    // Configura a string de conexão com o banco de dados PostgreSQL
    $string_conexao = "pgsql:host=localhost; port=5432; dbname=cursos; user=postgres; password=postgres";

    try {
        
        $conn = new PDO($string_conexao); // Cria uma nova conexão PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro para exceção (melhor para depuração)
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Define o modo de busca para retornar arrays associativos

        $varSQL = "SELECT titulo, descricao FROM cursos"; // Prepara a consulta SQL
        $select = $conn->query($varSQL); // Executa a consulta

        // Verifica se a consulta retornou linhas
        if ($select->rowCount() > 0) {
            // Itera sobre os resultados
            while ($linha = $select->fetch()) {
                echo "Título: " . $linha['titulo'] . "<br>";
                echo "Descrição: " . $linha['descricao'] . "<br><br>";
            }
        }
        else
        {
            echo "Nenhum curso encontrado.";
        }

    } catch (PDOException $e) {
        // Em caso de erro na conexão ou na execução da query
        echo "Erro na conexão ou na consulta: " . $e->getMessage();
        exit;
    }

?>