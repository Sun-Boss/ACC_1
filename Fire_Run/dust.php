<!DOCTYPE HTML>
<html>
<head>
<title>미세먼지</title>
<link rel="stylesheet" type="text/css" href="css/dust.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
	<header>
		<?php include "header.php"?>
	</header>
<?php

	$con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");	

	if(!empty($con) || isset($con)){
		$sql = "select dust from window";

		$result = mysqli_query($con, $sql);

		if(!empty($result) || $result == true){
			while($row = mysqli_fetch_array($result)){
	
				$dust = $row["dust"];
				if($dust > 150){
					echo '<span style="width : 25%; height : 10%; position: relative; left: 46%; top: 80%; font-family: 맑은 고딕; font-size: 25px; font-weight: bold;">'.$dust.'㎍/㎥</span>';
?>
				<div class="dust">
					<img class="content" src="img/film.png" title="dust">
				</div>	
<?php
				} else {
					echo '<span style="width : 25%; height : 10%; position: relative; left: 46%; top: 80%; font-family: 맑은 고딕; font-size: 25px; font-weight: bold;">'.$dust.'㎍/㎥</span>';	
?>
				<div class="clean">
					<img class="content" src="img/film_2.png" title="clean">
				</div>
<?php				
				}
			}
		} // $res
	}  // $connect

	mysqli_close($con);

?>

</body>
</html>
<!-- 
수정
0 < 값 <= 30 good
30 < 값 <=80 soso
80 < 값 <=120 bad
210 <= very bad -->