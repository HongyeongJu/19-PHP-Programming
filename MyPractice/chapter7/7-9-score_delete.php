<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-03-26
 * Time: ���� 11:41
 */
    $connect = mysql_connect("localhost", "hyj", "1234");
    mysql_select_db("hyj_db", $connect);

    // �ʵ� num�� $num ���� ������ ���ڵ� ����
    $sql = "delete from stud_score where num = $_GET[num]";
    mysql_query($sql, $connect);

    mysql_close($connect);

    Header("Location:7-8-score_list.php");
    ?>

<script>
    location.href = "7-8-score_list.php";

</script>
