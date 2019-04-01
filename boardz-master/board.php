<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->

<!-- select * from 테이블명 where title like "%su%"; -->
<?php
    $connect = mysql_connect("localhost","hyj","1234");
    $db_con = mysql_select_db("hyj_db", $connect);
    if($_POST[search]){
        $sql = "select * from boardz where title like \"%$_POST[search]%\";";
    }else {
        $sql = "select * from boardz;";
    }
    // 이건 db에 접속해서 db의 데이터를 꺼내는 것
    $result = mysql_query($sql, $connect);

    // mysql_num_rows 방법을 이용해서 row의 길이를 알아낸다.

    $records = mysql_num_rows($result);
    $fields = mysql_num_fields($result);

?>


<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8"> 

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="seventyfive-percent  centered-block">
        <!-- Sample code block -->
        <div>    
            <hr class="seperator">

            <!-- Example header and explanation -->
            <div class="text-center">
                <h2>Beautiful <strong>Boardz</strong></h2>
                <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                    <form class="example" action="board.php" method="post">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <!--<hr class="seperator fifty-percent">-->

            <!-- Example Boardz element. -->
            <div class="boardz centered-block beautiful">
                <?php
                $count = ($records % 3);
                if($records > 3){
                    $column = 3;
                }else {
                    $column = $records;
                }
                for($i = 0 ; $i < $column ; $i++){
                    echo "<ul>";
                    for($j = 1; $j <($records / 3) ; $j++){
                        if($row = mysql_fetch_array($result)){
                            echo "<li>\n";
                            echo "<h1>$row[title]</h1>\n";
                            echo "$row[contents]\n";
                            echo "<img src='$row[image_url]' alt='demo image'>\n";
                            echo "</li>\n";
                        }
                    }
                    if($count > 0 || $records == 3){
                        if($row = mysql_fetch_array($result)){
                            echo "<li>\n";
                            echo "<h1>$row[title]</h1>\n";
                            echo "$row[contents]\n";
                            echo "<img src='$row[image_url]' alt='demo image'>\n";
                            echo "</li>\n";
                        }
                        $count--;
                    }
                    echo "</ul>";
                }
                ?>
            </div>
        </div>

        <hr class="seperator">

    </div>
</body>
</html>