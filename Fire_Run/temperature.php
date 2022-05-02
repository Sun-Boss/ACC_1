<!DOCTYPE HTML>
<html>
<head>
<title>온도/습도</title>
<link rel="stylesheet" type="text/css" href="css/temperature.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
	<header>
		<?php include "header.php"?>
	</header>
<?php

	$con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");

	if(!empty($con) || isset($con)){
		$sql = "select temp from window";
		$sql_1 = "select humi from window";

		$result = mysqli_query($con, $sql);
		$result_1 = mysqli_query($con, $sql_1);
// 온도
		if(!empty($result) || $result == true){
			while($row = mysqli_fetch_array($result)){

				$temperature = $row["temp"];
				echo '<span style="float : left; width : 25%; height : 10%; font-family: 맑은 고딕; font-size: 25px; font-weight: bold; margin-left : 5%; margin-top: 5%;">온도 : '.$temperature.'℃</span>';					

				if($temperature > 25){
?>

				<div class="temperature">
					<img class="content" src="img/tem_1.png" title="temperature">
				</div>	
<?php
				}elseif($temperature > 15){

?>
				<div class="temperature">
					<img class="content" src="img/temperature_m1.png" title="temperature">
				</div>

<?php
				}else{
?>
				<div class="temperature">
					<img class="content" src="img/temperature_row1.png" title="temperature">
				</div>
<?php				
				}
			} // $res
		}  // $connect

// 습도
	if(!empty($result_1) || $result_1 == true){
		while($row = mysqli_fetch_array($result_1)){
			
			$humidity = $row["humi"];
			echo '<span style="float : left; width : 25%; height : 10%; font-family: 맑은 고딕; font-size: 25px; font-weight: bold; margin-top: 5%;">습도 : '.$humidity.'%</span>';			
			
			if($humidity > 40){

?>

			<div class="temperature_2">
				<img class="content" src="img/tem_2.png" title="temperature">
			</div>
<?php
			} elseif($humidity >30){

?>
			<div class="temperature">
				<img class="content" src="img/temperature_m2.png" title="temperature">
			</div>

<?php
			}else{
?>
			<div class="temperature">
				<img class="content" src="img/temperature_row2.png" title="temperature">
			</div>
<?php
				}
			} // $res
		}  // $connect
}
	mysqli_close($con);

?>

</body>
</html>