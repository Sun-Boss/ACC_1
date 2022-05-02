<?php
    session_start();
    $indexlink = "fire_run.php";
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>
        <div id = "top">
            <header id="line1">
                <a href="fire_run.php"><img id="main_logo" src="img/main_logo_1.png" alt="logo" title="logo"></a>
            
                <ul id="login">
<?php
    if(!$userid) {
?>
                <a href="member_form.php">회원가입</a> | <a href="login_form.php">로그인</a>           
<?php
    } else {
                $logged = $username."(".$userid.")님 환영합니다!";
?>  
                <li id="login_menu"><?=$logged?> | <a href="logout.php">로그아웃</a> | <a href="member_modify_form.php">정보수정</a>
<?php
            }
?>

<?php
    if($userid==admin) {
?>
                 | <a href="admin.php">관리자모드</a></li>
<?php
    }
?>
            </ul>
            </header>
        </div>
            