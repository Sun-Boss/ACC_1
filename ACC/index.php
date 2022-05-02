<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>숙박업소</title>
		<link rel="stylesheet" type="text/css" href="icss.css">
	</head>

	<body>
		<header class="header_wrap">
			<?php
					session_start(); 
					if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"]; 
					else $userid = ""; 
					if (isset($_SESSION["username"])) $username = $_SESSION["username"]; 
			?>
			<div class="top_wrap">
				<div class="main_logo"><img src="img/main_logo2.png" alt="logo" title="logo"></div>
					<div class="main_menu">
					<?php
					if(!$userid){
					?>
					<ul>
						<li><a href="loginmain.php" title="login">로그인</a></li>
						<li><a href="member_owner.php" title="membership">회원가입</a></li>
						<li><a href="help.php" title="help">고객센터</a></li>
					</ul>
					<?php
				} else { 
					$logged ="".$username."님 "; 
					?>
					<ul>
						<li><?=$logged?><a href="logout.php" title="loginout">로그아웃</a></li>
						<li><a href="member_modify_form.php" title="changing information">정보수정</a></li>
						<li><a href="reservation_form.php" title="reservation">예약하기</a></li>
						<li><a href="board_list.php" title="board">게시판</a></li>
						<li><a href="help.php" title="help">고객센터</a></li>
					</ul>
					<?php
					}
					?>
				</div>
			</div>
			
			<div class="header_text">
				<div>Welcome!</div>
				<div>Accommodation</div>
				<div>Reservation</div>
			</div>
		</header>
	</body>
</html>