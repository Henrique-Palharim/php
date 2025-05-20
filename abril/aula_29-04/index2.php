<?php 

    $string_conexao =
        "pgsql:host=localhost; port=5432;
        dbname=cursos; user=postgres; password=postgres";

    $conn = new PDO($string_conexao);
    // o construtor precisa da string de conexão
    // para instanciar o objeto

    // Se houver algum problema, saia do programa
    if (!$conn) { // leia-se: “se não conectado”
        echo "Não conectado";
        exit;
    }

    $varSQL = "SELECT titulo, descricao FROM cursos";
    $select = $conn->query($varSQL);

    while ( $linha = $select->fetch() )
    {
        echo "Título: " . $linha['titulo'] . "<br>" . "Descrição: " . $linha['descricao'];
    }

?>