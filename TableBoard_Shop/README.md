# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
    
쿼리문 
- 테이블 생성
    -   create table tableboard_shop (
        num int not null auto_increment ,
        date datetime,
        order_id int,
        name varchar(80),
        price double,
        quantity int,
        primary key(num));
- 초기 값 입력
    - insert into tableboard_shop (date, order_id, name, price, quantity)
      values ('2017-09-26 05:57' , 200396 ,'Game Console Controller', 22.00 , 2);
      
      insert into tableboard_shop (date, order_id, name, price, quantity)
      values ('2017-09-29 01:22' , 200398 ,'iPhone X 64Gb Grey', 999.00 , 1);
      
      insert into tableboard_shop (date, order_id, name, price, quantity)
      values ('2017-09-28 05:57' , 200397 ,'Samsung S8 Black', 756.00 , 1);
      
      insert into tableboard_shop (date, order_id, name, price, quantity)
      values ('2017-09-25 23:06' , 200392 ,'USB 3.0 Cable', 10.00 , 3);
    
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
 - mysql_connect() 함수를 사용해서 db 접속
 - mysql_select_db() 함수를 사용해서 db 선택
 - select sql 쿼리를 $sql 변수에 저장
    - 쿼리 : select num, date_format(date, '%Y-%m-%d %T') as date, order_id, name, price, quantity from tableboard_shop;
 - mysql_query() 함수를 사용하여 얻은 쿼리 처리 결과를 result 변수에 저장 
 - mysql_fetch_array()함수를 이용해서 얻은 쿼리 처리 결과를 바탕으로 원하는 값(이름, 가격, 수량, 날짜)등을 echo를 사용하여 테이블 형태로 출력
    -   이 상태에서는 while문을 사용하여 모든 처리 결과를 행기준으로 다 받아서 사용한다.
 - mysql_close()를 사용해서 데이터베이스 사용을 중지.
## board_form.php 수정
이 php 파일에서는 2가지 경우를 나누어서 생각한다.
1. index.php 파일에서 GET형식으로 데이터를 받았을 경우 (update, delete로 분기)
2. index.php 파일에서 GET형식으로 데이터를 받지 않았을 경우(insert 로 분기)


1. index.php 파일에서 GET형식으로 데이터를 받았을 경우
    - 코드 맨 위에서 데이터베이스에 있는 데이터를 꺼내 분석해야되므로 데이터베이스 접속 및 쿼리문 처리
    - sql 쿼리 문은 다음과 같이 처리한다.
        -  쿼리문 : select * from tableboard_shop  where num=$_GET[num];
        - 기본키 num 값인 데이터만 뽑아내면 되므로 위와 같은 쿼리를 사용한다.
        
    - mysql_fetch_array() 함수를 이용해 얻은 결과를 row 변수에 담아서 row 변수에서 얻기 원하는 데이터를 받는다.
    - 그 얻은 데이터를 이용하여 input 태그 안의 value 값에 적절한 위치에 출력하도록한다.
    - 마지막에는 $_GET[num] 값을 이용해 Delete로 처리할지, update로 처리할지 버튼을 만들고 num 값을 get으로 넘겨준다.
    
2. index.php 파일에서 GET형식으로 데이터를 받지 않았을 경우(insert 로 분기)
    - get 형식으로 아무 것도 데이터를 받지 않았을 경우에는 insert로 분기하는 것을 의미하므로 form 태그에 action에 insert.php 로 지정한다.
    - 상세 정보를 표기하는 창에도 어떠한 데이터도 넣지 않는다. (즉 빈공간으로 표현해서 데이터를 수정하고 insert로 넣을수 있도록한다.)
    - insert버튼을 만들고 이것을 눌렀을 시엔 insert.php로 post 값을 넘겨주어 처리할 수 있도록 만든다.
## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]
board_form.php에 받아온 POST 데이터를 이용해서 sql 문을 작성 그리고 mysql에 데이터를 넣으면 된다.
 -  mysql_connect()함수를 이용해서 mysql에 접속한다.
 - mysql_select_db() 함수를 이용해서 db를 선택한다.
 - $sql 변수에 insert 쿼리 구문을 입력한다
    -   쿼리 :insert into tableboard_shop (date, order_id, name, price, quantity)
                    values ('$_POST[date]' , $_POST[order_id] ,'$_POST[name]', $_POST[price] , $_POST[quantity]);
    - 이때 쿼리의 데이터는 $_POST를 이용해서 POST형식으로 받은 데이터를 넣은다.
 - mysql_query()함수를 이용해서 쿼리를 처리하고 결과를 result 변수에 넣는다.
 - mysql_close()함수를 이용해서 데이터베이스 접속을 끊는다.
 - 만약 쿼리가 처리가 안됬을시엔 실패했다고 알린다.
 - location.replace()함수를 이용해서 index.php 파일로 바로 이동한다.
### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]
board_form.php에서 받아온 GET 데이터(num)값을 이용해 어떤 데이터를 수정해야되는지 식별하고 $_POST 값을 이용해서 board_form.php 파일에서 받은
POST 값으로 데이터베이스의 값을 수정한다.

-  mysql_connect()함수를 이용해서 mysql에 접속한다.
- mysql_select_db() 함수를 이용해서 db를 선택한다.
- $sql 변수에 insert 쿼리 구문을 입력한다
    -    쿼리 : update tableboard_shop set date ='$_POST[date]' , order_id = '$_POST[order_id]' , name = '$_POST[name]' , price = '$_POST[price]' , quantity = '$_POST[quantity]'
              where num = '$_GET[num]';
    - 쿼리문의 데이터는 POST형식의 데이터로 . 어떤 값을 수정할지 판단하기 위해 where 문을 사용할 때는 GET형식으로 받은 값을 사용한다.
- mysql_close()함수를 이용해서 데이터베이스 접속을 끊는다.
- 만약 쿼리가 처리가 안되었을시엔 실패했다고 알린다.
- location.replace()함수를 이용해서 index.php로 바로 이동한다.
    
### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
board_form.php에서 받아온 GET 데이터(num)값을 이용해서 db에 접속해서 데이터를 삭제한다.

   - mysql_connect() 함수를 이용해서 mysql에 접속한다.
   - mysql_select_db()함수를 이용해서 db를 선택한다.
   - $sql 변수에 delete 쿼리 구문을 입력한다.
        - 쿼리 :  delete from tableboard_shop 
                  where num = $_GET[num];
        - 쿼리 처리를 mysql_query()함수로 처리하고 결과를 result에 넣는다.
   - 오류가 발생했을 시엔 실패했다고 알린다.
   - location.replace()함수를 이용해서 index.php로 이동한다.