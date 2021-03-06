<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-03-26
 * Time: 오후 10:00
 */
/*
 * POST로 전달받은 값 출력
 * 서버 환경 설정 - PHP 설정에서 register_globals 를 Off로 설정했기 때문에, 기본 변수로 POST나 GET으로 전달된 파라미터가 전달되지 않음!
 * register_globals를 Off로 설정한 경우, $_POST[변수이름]을 통해서, POST로 전달된 파라미터를 변수로 받을 수 있음!
 * on으로 했을 경우 보안상 문제가 발생할 수가 있다.
 */

echo "아이디   : $_POST[id]<br>";
echo "이름     : $_POST[name]<br>";
echo "비밀번호  : $_POST[passwd]<br>";
echo "비밀번호 확인 : $_POST[passwd_confirm]<br>";
echo "성별  : $_POST[gender]<br>";
echo "휴대번호  : $_POST[phone1] - $_POST[phone2] - $_POST[phone3]<br>";
echo "주소  : $_POST[address]<br>";
echo "영화감상  : $_POST[movie]<br>";
echo "독서  : $_POST[book]<br>";
echo "쇼핑  : $_POST[shop]<br>";
echo "운동  : $_POST[sport]<br>";
echo "자기소개  : $_POST[intro]<br>";
echo "제목(hidden 타입에서 전달)  : $_POST[title]<br>";
?>