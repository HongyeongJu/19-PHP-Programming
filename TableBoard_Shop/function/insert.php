<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!

# 참고 : 에러 메시지 출력 방법
$connect = mysql_connect("localhost","hyj","1234");
$db_con = mysql_select_db("hyj_db", $connect);

$sql = "insert into table_board (date, order_id, name, price, quantity)".
    "values ('$_POST[date]' , $_POST[order_id] ,'$_POST[name]', $_POST[price] , $_POST[quantity]);";



$result = mysql_query($sql,$connect);

if($result){
}
else {
    echo ("<script>alert('sql fail.');</script>");
}

mysql_close();
?>

<script>
    location.replace('../index.php');
</script>
