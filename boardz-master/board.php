<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->

<!-- select * from 테이블명 where title like "%su%"; -->
<?php
$connect = mysql_connect("localhost","hyj","1234"); // MySQL 데이터베이스 연동
$db_con = mysql_select_db("hyj_db", $connect);
if($_POST[search]){                     //board.php(본 php파일에서) POST로 전달된 검색 변수 값을 가져옴
    $sql = "select * from boardz where title like \"%$_POST[search]%\";";   //전달 받은 변수 값 search를 이용해서 select 쿼리 스트링 작성
}else {
    $sql = "select * from boardz;";                 //만약 search값이 없다면 boardz에 있는 전체 데이터 출력
}
// 이건 db에 접속해서 db의 데이터를 꺼내는 것
$result = mysql_query($sql, $connect);              //mysql_query() 함수를 이용해서 ,MySQL 에 쿼리 스트링 전송

// mysql_num_rows 방법을 이용해서 row의 길이를 알아낸다.

$records = mysql_num_rows($result);                 //select 쿼리를 처리한 결과의 레코드의 수를 mysql_num_row()함수를 이용해서 구함
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
                <form class="example" action="board.php" method="post">    <!-- form 태그에서 action을 board.php로 method를 post형식으로 수정함-->
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <!--<hr class="seperator fifty-percent">-->

        <!-- Example Boardz element. -->
        <div class="boardz centered-block beautiful">
            <?php
            //2번째 php 시작 부분에서 실제적인 데이터를 출력하는 부분.
            $count = ($records % 3);        //레코드의 수를 3으로 나눈 나머지를 구해서 각 줄에 몇개씩 추가로 출력할 것인지를 구함
            if($records > 3){
                $column = 3;
            }else {                         //레코드의 숫자가 3 이하인 경우 레코드의 숫자에 맞춰 ul태그의 갯수로 맞춤.
                $column = $records;
            }
            for($i = 0 ; $i < $column ; $i++){
                echo "<ul>";
                for($j = 1; $j <($records / 3) ; $j++){         //레코드의 숫자를 3으로 나눠서 몇개씩 각 줄에 맞춰 통일적으로 출력할 것인지 맞춤
                    if($row = mysql_fetch_array($result)){      //mysql_fetch_array()를 이용하여 DB의 원하는 데이터를 출력 표현.
                        echo "<li>\n";
                        echo "<h1>$row[title]</h1>\n";          //title은 <h1> 태그를 이용하여 크게 표현
                        echo "$row[contents]\n";                //contents는 단순히 문자열로 출력함
                        echo "<img src='$row[image_url]' alt='demo image'>\n";      //image_url은 img태그를 사용하여 출력함.
                        echo "</li>\n";
                    }
                }
                if($count > 0 || (($records %3 )== 0)){      //추가로 출력할 개수가 1개 이상이거나 레코드의 숫자가 3의 배수이면 추가로 1개씩을 출력함.
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

            mysql_close();              // mysql_close를 사용해서 DB사용을 종료한다.
            ?>
        </div>
    </div>

    <hr class="seperator">

</div>
</body>
</html>