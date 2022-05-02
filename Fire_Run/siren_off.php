<!DOCTYPE HTML>
<html>
<head>
<script>
function moveClose(){
	opener.location.href="fire_run.php";
	self.close();
}
</script>
  <title>경보 OFF</title>
</head>
<body>
<div>
<?php
    $con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");
    $sql = "update fire set fire_whether= 0";
    $sql1 = "update fire set led = 0";
    mysqli_query($con, $sql);
    mysqli_query($con, $sql1);
    echo '<span style="width : 25%; height : 10%; position: relative; left: 10%; font-family: 맑은 고딕; font-size: 2.1em; font-weight: bold;">경보 off 했습니다.</span>';
    
    mysqli_close($con);     

?>

</div>
<div style=" float : left; margin-left : 40%; margin-top : 10%;">
<input type = "button" value = "닫기" onclick="moveClose();"/>
</div>
</body>
</html>