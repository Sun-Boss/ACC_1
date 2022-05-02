<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>숙박업소</title>
		<link rel="stylesheet" type="text/css" href="o_icss.css">
	</head>

	<body>
		<header class="header_wrap">
			<?php
					session_start(); 
					if (isset($_SESSION["ownerid"])) $ownerid = $_SESSION["ownerid"]; 
					else $ownerid = ""; 
					if (isset($_SESSION["ownername"])) $ownername = $_SESSION["ownername"]; 
			?>
			<div class="top_wrap">
				<div class="main_logo"><img src="img/main_logo2.png" alt="logo" title="logo"></div>
					<div class="main_menu">
					<?php
					if(!$ownerid){
					?>
					<ul>
						<li><a href="loginmain.php" title="login">로그인</a></li>
						<li><a href="member_owner.php" title="membership">회원가입</a></li>
						<li><a href="help.php" title="help">고객센터</a></li>
					</ul>
					<?php
				} else { 
					$logged ="".$ownername."[사업자] "; 
					?>
					<ul>
						<li><?=$logged?><a href="logout.php" title="loginout">로그아웃</a></li>
						<li><a href="owner_modify_form.php" title="changing information">정보수정</a></li>
						<nav class="main_menu_nav">
						<li><a href="owner_place_form.php" title="owner_place_form.php">업소등록</a></li>
						<nav class="main_menu_hover">
                        <div>
                        <ul>
                        <li><a href="o_reservation_form.php" title="업소목록보기">업소목록보기</a></li>
                    	</ul>
                    	</div>
                    </nav>
                	</nav>
						<li><a href="o_board_list.php" title="board">게시판</a></li>
						<li><a href="o_help.php" title="help">고객센터</a></li>
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