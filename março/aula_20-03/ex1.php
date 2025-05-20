<?php 

    $matriz_times =
    [
        ["time" => "Barcelona", "origem" => "Espanha"],
        ["time" => "Bayer de Munique", "origem" => "Alemanha"],
        ["time" => "Manchester United", "origem" => "Inglaterra"],
        ["time" => "Paris Saint-Germain", "origem" => "França"],
        ["time" => "Flamengo", "origem" => "Brasil"]
    ];

    echo "--- TIMES ---\n\n";
    foreach ($matriz_times as $time) {
        echo $time["time"] . " - " . $time["origem"] . "\n";
    }
    
?>