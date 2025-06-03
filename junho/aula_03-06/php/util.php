<?php

    function Conectar()
    {
        // Configura a string de conexão com o banco de dados PostgreSQL
        $string_conexao = "pgsql:host=localhost; port=5432; dbname=cursos; user=postgres; password=postgres";

        try {    
            $conn = new PDO($string_conexao); // Cria uma nova conexão PDO
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        }
        catch (PDOException $e) {
            // Em caso de erro na conexão ou na execução da query
            echo "<tr><td colspan='6'>Erro na conexão ou consulta: " . $e->getMessage() . "</td></tr>";
            exit;
        }
    }

?>