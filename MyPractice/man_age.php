<?php

    $now_year = date("Y");
    $now_month = date("m");
    $now_day = date('d');

    $birth_year = 1994;
    $birth_month = 9;
    $birth_day = 7;


    if($birth_month < $now_month)
        $age = $now_year - $birth_year;
    else if($birth_month==$now_month){
        if($birth_day <=$now_day)
            $age = $now_year - $birth_year;
        else
            $age = $now_year - $birth_year - 1;
    }
    else
        $age = $now_year - $birth_year - 1;

    echo "���� ��¥ : $now_year �� $now_month �� $now_day ��<br>";
    echo "������� : $birth_year �� $birth_month �� $birth_day �ϻ� <br>";
    echo "�� ���� : $age ��";
    ?>
