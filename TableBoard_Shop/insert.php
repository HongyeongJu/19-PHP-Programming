<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-04-04
 * Time: 오후 3:23
 */

$connect = mysql_connect("localhost","hyj","1234");
$db_con = mysql_select_db("hyj_db", $connect);

$sql = "insert into table_board (date, order_id, name, price, quantity)".
 "values ('$_POST[date]' , $_POST[order_id] ,'$_POST[name]', $_POST[price] , $_POST[quantity]);";

$result = mysql_query($sql,$connect);

if($result){
    echo ("<script> alert('성공하였습니다.');</script>");
}
else {
    echo ("<script>alert('실패하였습니다.');</script>");
}

mysql_close();
?>

