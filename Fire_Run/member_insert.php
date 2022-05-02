<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $snum = $_POST["snum"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;

    $con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");

	$sql = "insert into members(id, pass, name, snum, email) ";
	$sql .= "values('$id', '$pass', '$name', '$snum', '$email')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'fire_run.php';
	      </script>
	  ";
?>

   
