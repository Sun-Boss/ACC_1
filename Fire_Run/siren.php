<!DOCTYPE HTML>
<html>
<head>
<title>경보 OFF</title>
<link rel="stylesheet" type="text/css" href="css/siren.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
<script>
$(document).ready(function(){
	setInterval(function(){
			var state = $(".fire").css("background-color");
			if(state == "rgb(255, 0, 0)"){
				$(".fire").css("background-color","white");
			}else{
				$(".fire").css("background-color","red");
			}
		},1000)
});

function siren() {
//	alert('1분이 지났습니다.');
	location.href = 'siren_time.php';
}

setTimeout(siren, 1000 * 10);

function showPopup() {
	window.open("siren_off.php","경보 off", "width=400, height=300, left=100, top=50");
}
</script>
	<header>
		<?php include "header.php"?>
	</header>
<?php
	$con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");

	if(!empty($con) || isset($con)){
		$sql = "select fire_whether from fire";
		$result = mysqli_query($con, $sql);

		if(!empty($result) || $result == true){
			while($row = mysqli_fetch_array($result)){
		
				$fire = $row["fire_whether"];
				if($fire == 1){
					echo '<a href="./route.php?_id=$_id" style="float : left; margin-left: 36%; margin-top : 5%; font-family: 맑은 고딕; font-size: 30pt; font-weight : bold; color : orange;">대피 경로를 확인하세요.</a>';
?>
				<div class="fire">
					<img class="content" src="img/siren.png" title="siren">
					<input type="button" value="경보 off" onclick="showPopup();"/>
				</div>
	
<?php
				} else {
					echo "
					<script>
						alert('경보가 OFF된 상태입니다.');
						location.href = 'fire_run.php';
					</script>
					";
				}
			}

		} // $res
	}  // $connect

	mysqli_close($con);

?>
<section>

</section>
</body>
</html>
