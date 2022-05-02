<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";

    if ( $userid != admin )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
                exit;
    }

    $num   = $_GET["num"];

    $con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");
    $sql = "delete from members where num = $num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

