<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-03-19
 * Time: ¿ÀÀü 2:13
 */
    for($i = 0 ; $i < 10; $i++)
        $a[$i] = $i + 1;

    for($i = 9; $i >= 0 ; $i--)
        $b[9-$i] = $i+1;

    for($i = 0 ; $i <10 ; $i++)
        $c[$i] = $a[$i] * $b[$i];

    for($i = 0; $i < 10; $i++)
        echo "$a[$i] x $b[$i] = $c[$i] <br>";

    ?>

