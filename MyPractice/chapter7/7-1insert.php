<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-03-26
 * Time: 오후 9:42
 */
    $connect = mysql_connect("localhost", "hyj", "1234");
    mysql_select_db("hyj_db", $connect);

    $sql ="insert into biz_card (num, name, company, tel, hp, address)";
    $sql .= " values (1, '원선우', '미래전자', '031-276-1829', ";
    $sql .= " '010-8723-2837', '경기도 용인시 신갈동 388-23 번지')";

    $result = mysql_query($sql);

    if ($result)
        echo "레코드 삽입 완료!";
    else
        echo  "레코드 삽입 실패! 에러 확인 요망!";

    mysql_close($connect);
    ?>