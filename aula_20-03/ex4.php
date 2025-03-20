<?php 

    for ($i = 100; $i >= -100; $i--)
    {
        if ($i == -1)
        {
            break;
        }
        
        if ($i != 0) {
            echo "$i - ";
        } else {
            echo "$i";
        }
    }

?>