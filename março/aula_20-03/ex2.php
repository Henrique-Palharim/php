<?php 

    $n1 = 6; $n2 = 10;

    $media = ($n1 + $n2) / 2;
    $media_formatada = number_format($media,1,".",",");

    if ($media < 4)
    {
        echo "Média: " . $media_formatada . "\nSituação: Reprovado !";
    }
    else if ($media < 7)
    {
        echo "Média: " . $media_formatada . "\nSituação: Recuperação !";
    }
    else
    {
        echo "Média: " . $media_formatada . "\nSituação: Aprovado !";
    }

?>