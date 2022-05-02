<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>로그인</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<script type="text/javascript" src="./js/login.js"></script>
</head>
<body> 
	<header>
       <form name="fruit" method="post" action="o_login.php">
    	<?php 
        include "header.php";
      ?>
    </header>
	<section>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">       	
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li>
                  	</ul>
                  	<div id="login_btn">
                        <input type="submit" src="./img/login.png" name="login" value="login" >
                  	</div>		    	
        		</div>
    		</div>
        </div>
	</section> 
  </form>
</body>
</html>

