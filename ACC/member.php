<!DOCTYPE html>
<html lang="en">
 <head>
  <title>회원가입 페이지</title>
  <link rel="stylesheet" href="stylesheet.css"/>
  <style>
	  input[type=text]:focus, input[type=password]:focus, textarea:focus { border : 2px solid #489CFF;}
  </style>
  <script>
   function check_input()
   {
      if (!document.member_form.id.value) {
          alert("아이디를 입력하세요!");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.email1.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }

      if (!document.member_form.email2.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email2.focus();
          return;
      }

      if (!document.member_form.address.value) {
          alert("주소를 입력하세요!");    
          document.member_form.address.focus();
          return;
      }

      if (!document.member_form.phone1.value) {
          alert("핸드폰 번호를 입력하세요!");    
          document.member_form.phone1.focus();
          return;
      }

      if (!document.member_form.phone2.value) {
          alert("핸드폰 번호를 입력하세요!");    
          document.member_form.phone2.focus();
          return;
      }

      if (!document.member_form.phone3.value) {
          alert("핸드폰 번호를 입력하세요!");    
          document.member_form.phone3.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form() {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
      document.member_form.address.value = "";
      document.member_form.phone1.value = "";
      document.member_form.phone2.value = "";
      document.member_form.phone3.value = "";
      document.member_form.id.focus();
      return;
   }

   function check_id() {
     window.open("member_check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }
</script>
 </head>
 <body>
 	<form name="fruit" method="post" action="membersave.php">
	<header class="header_wrap">
				<div class="top_wrap">
				    <div class="main_top_wrap">
						<div class="main_logo_wrap">
							<div class="main_logo"><a href="index.php"><img src="img/main_logo2.png" alt="logo" title="logo"></a></div>			
						</div>
				   </div>
				   </div>	   
 <br><br><br><br><br><br>
  <h3>회원가입</h3>
  <div id="line">
  </div>
  <p>회원정보는 개인정보취급방침에 따라 안전하게 보호되며 회원님의 명백한 동의 없이 공개 또는 제3자에게 제공되지 않습니다.</p>
  </header>
 <br>
 <section>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_insert.php">
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>  
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_id()"></a>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1">@<input type="text" name="email2">
				        </div>                 
			       	</div>
                    <div class="clear"></div>
			       	<div class="form phone">
				        <div class="col1">핸드폰 번호</div>
				        <div class="col2">
							<input type="text" name="phone1">-<input type="text" name="phone2">-<input type="text" name="phone3">
				        </div>                 
			       	</div>   
			       	<div class="clear"></div>
                       <div class="form">
				        <div class="col1">주소</div>
				        <div class="col2">
							<input type="text" name="address">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>   
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> 
        </div> 
	</section>
	<!--<center>
	<footer>
		<br>
		<input id="button1" type ="submit" value="확인">
	</footer>
	</center>-->
</body>
</html>
