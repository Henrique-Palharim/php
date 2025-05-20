<?php 

    $cor[1] = "vermelho";
    $cor[2] = "verde";
    $cor[3] = "azul";
    $cor["teste"] = 1;

    // echo $cor[1] . "\n";

    $cores = array(1 => "vermelho", 2 => "verde", 3 => "azul","teste" => 1);
    // echo $cores[2] . "\n";

    $matriz =
    [
        ["nome" => "Thales", "idade" => "20", "hobby" => "Jogador de Lol"], // linha 0
        ["nome" => "Gabriel", "idade" => "25", "hobby" => "Fazendeiro de Stardew Valley"], // linha 1
        ["nome" => "Pablo", "idade" => "22", "hobby" => "Marombeiro \"Natural\""], // linha 2
        ["nome" => "Luiz", "idade" => "21", "hobby" => "Twitta o dia inteiro"] // linha 3
    ];
    // echo $matriz[0]["hobby"] . "\n\n";

    /* ---------------------------------------------------------------------------------------------------------------------------- */

    echo "--- MATRIZ ---\n";
    for ($i = 0; $i < count($matriz); $i++) {
        foreach ($matriz[$i] as $chave => $valor) {
            echo $chave . ": " . $valor . "\n";
        }
        echo "\n";
    }

    /* ---------------------------------------------------------------------------------------------------------------------------- */

    echo "--- MATRIZ ---\n";
    $keys = array_keys($matriz[0]);  // pega as chaves da primeira linha
    foreach ($keys as $key) {
        echo str_pad($key, 20, " ", STR_PAD_RIGHT);
    }
    echo "\n";

    for ($i = 0; $i < count($matriz); $i++) {
        foreach ($keys as $key) {
            echo str_pad($matriz[$i][$key], 20, " ", STR_PAD_RIGHT);
        }
        echo "\n";
    }
?>