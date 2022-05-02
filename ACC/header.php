<?php
    session_start();
    $indexlink = "index.php";
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>		
        <div id="top">
            <h3>
                <div class="main_logo"><a href="<?=$indexlink?>"><img src="img/main_logo2.png" alt="logo" title="logo"></a></div>	
            </h3>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="member_owner.php">회원가입</a> </li>
                <li> | </li>
                <li><a href="loginmain.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님 환영합니다!";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보수정</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">상업자모드</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <!--<li><a href="index.php">HOME</a></li>
                <li><a href="message_form.php">쪽지 만들기</a></li>                                
                <li><a href="board_form.php">게시판 만들기</a></li>-->
            </ul>
        </div>