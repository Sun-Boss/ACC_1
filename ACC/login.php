<!DOCTYPE html>
<html>
 <head>
  <title>로그인 페이지</title>
  <link type="text/css" rel="stylesheet" href="./css/locss.css">
 </head>
 <body>
             <form name="fruit" method="post" action="login_check.php">
            <header class="header_wrap">
            <div class="top_wrap">
                <div class="main_top_wrap">
                  <div class="main_logo_wrap">
                     <div class="main_logo"><a href="index.php"><img src="img/main_logo2.png" alt="logo" title="logo"></a></div>
                  </div>
               </div>
               </div>      
            </header>
            <section>
               <div class="login_wrap">
                  <p>로그인</p>
                  <div class ="box_wrap">
                     <div class="box1">
                        <input type ="text" name="id" placeholder="아이디">
                     </div>
                     <div class="box2">
                        <input type ="password" name="pw" placeholder="비밀번호">
                     </div>
                  </div>                  <div class ="botton_wrap">
                     <div class ="botton">
                        <input type="submit" name="취소버튼" value="취소" >
                        <span><input type="submit" name="로그인버튼" value="로그인"></span>   
                     </div>
                  </div>
               </div>
            </section>
            </form>
            <footer>
               <div class="footer_wrap">
                  <div class="text">SNS로그인</div>
                  <div class="snslogin">
                     <input type="image" src="img/kakao.PNG" art="카카오톡">
                     <input type="image" src="img/face.PNG" art="페이스북">
                     <input type="image" src="img/goo.PNG" art="구글">
                     <input type="image" src="img/naver.PNG" art="네이버">
                  </div>
               </div>
            </footer>
         </body>
         </html>