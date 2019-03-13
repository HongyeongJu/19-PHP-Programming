<html>
<body>
<h5> ¼·¾¾¸¦ È­¾¾·Î º¯°æ</h5>
<table border="1" width="300">
    <tr align="center"><td width="150">¼·¾¾</td><td>È­¾¾</td></tr>
    <?php
    for($c=-15; $c<=35; $c= $c+5){
        $f = $c * 9 / 5 + 32;
        echo "<tr align='center'><td>$c</td><td>$f</td></tr>";
    }
    ?>
</table>
</body>
</html>