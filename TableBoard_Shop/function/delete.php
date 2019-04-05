<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드 삭제하기!

$connect = mysql_connect("localhost","hyj","1234");
$db_con = mysql_select_db("hyj_db", $connect);

$sql = "delete from tableboard_shop ".
    "where num = $_GET[num];";
// echo $sql;

$result = mysql_query($sql,$connect);

if($result){

}else{
    # 참고 : 에러 메시지 출력 방법
    echo "<script> alert('delete fail') </script>";
}
mysql_close();
?>

<script>
    location.replace('../index.php');
</script>
