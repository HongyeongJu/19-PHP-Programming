<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-03-19
 * Time: 오전 2:19
 */

    $num = array(15, 13 ,9, 7, 6 ,12, 19, 30, 28, 26);

    $count = 10;

    echo "정렬되기 전 : ";

    for($a = 0; $a< 10; $a++)
        echo $num[$a]." " ;

    echo "<br>";

    for($i = $count - 2; $i >=0 ;$i--){
        for($j = 0; $j<=$i; $j++){
            if($num[$j] > $num[$j + 1])
            {
                $tmp = $num[$j];
                $num[$j] = $num[$j + 1];
                $num[$j+1] = $tmp;
            }
        }

        echo "\$i : $i<br>";
        for($k = 0; $k < 10 ; $k++)
            echo "$num[$k] " ;
        echo "<br>";
    }

    echo  "오름차순 정렬(버블 정렬) : ";
    for ($a = 0; $a < 10; $a++)
        echo $num[$a]. " ";
?>
