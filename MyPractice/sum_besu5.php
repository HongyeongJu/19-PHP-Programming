<?php
    $sum = 0;

    for($i = 1; $i <=100; $i++){
        if($i %5 == 0){
            $sum = $sum + $i;
        }
    }
    echo "1에서 100 사이에 있는 5의 배수의 합계 :$sum";
    ?>

