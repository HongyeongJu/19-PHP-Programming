<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-03-26
 * Time: 오후 10:48
 */
    $connect = mysql_connect("localhost", "hyj", "1234");
    $dbconn = mysql_select_db("hyj_db", $connect);

    $sql = "create table stud_score ( " ;
    $sql .= "num int not null auto_increment, ";
    $sql .= "name varchar(12), ";
    $sql .= "sub1 int, ";
    $sql .= "sub2 int, ";
    $sql .= "sub3 int, ";
    $sql .= "sub4 int, ";
    $sql .= "sub5 int, ";
    $sql .= "sum int, ";
    $sql .= "avg float, ";
    $sql .= "primary key(num) )";

    $result = mysql_query($sql, $connect);

    if($result)
        echo "데이터베이스 테이브 'stud_score'가 생성되었습니다!";
    else
        echo "데이터베이스 테이블 생성 에러!!!";

    mysql_close();
    ?>

