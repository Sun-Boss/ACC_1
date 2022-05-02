<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<script type="text/javascript" src="js/jquery.js"></script>
	<title>우리집 상황 확인하기</title>
</head>
<body>
<header id="line1">
	<?php include "header.php";?>
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
					echo "
						<script>
							alert('화재가 발생했습니다. 오작동이면 경보를 OFF 해주세요');
							location.href = 'siren.php';
						</script>
					";
				}
			}
		} // $res
	}  // $connect

	mysqli_close($con);
?>

<section>
	<div class="main_box">
		<div id="box1">
			<a href="window.php">
				<div class="content_box1">
					<img class="content" src="img/window.png" alt="button" title="window">
					<p>창문 상태</p>
				</div>
			</a>
			<a href="temperature.php">
				<div class="content_box2">
					<img class="content" src="img/temperature.png" alt="button" title="temperature">
					<p>온도 / 습도</p>
				</div>
			</a>
			<a href="rain.php">
				<div class="content_box3">
					<img class="content" src="img/rain.png" alt="button" title="rain">
					<p>빗물 감지</p>
				</div>
			</a>
		</div>
		<div id="box2">
			<a href="dust.php">
				<div class="content_box4">
					<img class="content" src="img/film.png" alt="button" title="film">
					<p>미세먼지</p>
				</div>
			</a>
			<a href="pdlc.php">
				<div class="content_box5">
					<img class="content" src="img/pdlc.png" alt="button" title="pdlc_film">
					<p>PDLC 필름</p>
				</div>
			</a>
			<a href="siren.php">			 			
				<div class="content_box6">
					<img class="content" src="img/siren.png" alt="button" title="siren">
					<p>경보 OFF</p>
				</div>
			</a>
		</div>
	</div>
</section>
<footer id="line2"></footer>
</body>
</html>