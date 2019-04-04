<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!
$connect = mysql_connect("localhost","hyj","1234");
$db_con = mysql_select_db("hyj_db", $connect);


$sql = "update table_board set date ='$_POST[date]' , order_id = '$_POST[order_id]' , name = '$_POST[name]' , price = '$_POST[price]' , quantity = '$_POST[quantity]'
where num = '$_GET[num]';";

echo $sql;
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
