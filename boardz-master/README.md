# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)

```

## board.php (수정)

- MySQL 데이터베이스 연동
    -   mysql_connect
    -   mysql_select_db
- board.php(본 php파일에서) POST로 전달된 검색 변수 값을 가져옴
    -   search
- 전달 받은 변수 값 search를 이용해서 select 쿼리 스트링 작성
    - select * from boardz where title like \"%$_POST[search]%\";
    - 만약 search값이 없다면 boardz에 있는 전체 데이터 출력
- mysql_query() 함수를 이용해서 ,MySQL 에 쿼리 스트링 전송
    - mysql_query
- select 쿼리를 처리한 결과의 레코드의 수를 mysql_num_row()함수를 이용해서 구함

- form 태그에서 action을 board.php로 method를 post형식으로 수정함

- 2번째 php 시작 부분에서 실제적인 데이터를 출력하는 부분. 
    - 레코드의 수를 3으로 나눈 나머지를 구해서 각 줄에 몇개씩 추가로 출력할 것인지를 구함
    - 레코드의 숫자가 3 이하인 경우 레코드의 숫자에 맞춰 ul태그의 갯수로 맞춤.
    - 레코드의 숫자를 3으로 나눠서 몇개씩 각 줄에 맞춰 통일적으로 출력할 것인지 맞춤
    - mysql_fetch_array()를 이용하여 DB의 원하는 데이터를 출력 표현.
    - title은 h1 태그를 이용하여 크게 표현
    - contents는 단순히 문자열로 출력함
    - image_url은 img태그를 사용하여 출력함.
    - 추가로 출력할 개수가 1개 이상이거나 레코드의 숫자가 3의 배수이면 추가로 1개씩을 출력함. 
    - mysql_close를 사용해서 DB사용을 종료한다.