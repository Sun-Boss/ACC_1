<!DOCTYPE HTML>
<html>
<head>
<title>빗물 감지</title>
<link rel="stylesheet" type="text/css" href="css/rain.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
	<header>
		<?php include "header.php"?>
	</header>
	<section class="main_section">
	<div class="rain_situation">
<?php

	$con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");
	$rain = $row["rain"];

	if(!empty($con) || isset($con)){
		$sql = "select rain from window";
		$result = mysqli_query($con, $sql);

		if(!empty($result) || $result == true){
			while($row = mysqli_fetch_array($result)){

				$rain = $row["rain"];
				if($rain == 1){
					echo "빗물이 감지되었습니다.";
?>
	</div>
				<div class="rain">
					<img class="content" src="img/rain.png" title="rain">
				</div>	
	<div class="rain_situation">
<?php
				} else {
					echo "빗물이 감지되지 않았습니다.";
?>
	</div>
				<div class="sun">
					<img class="content" src="img/sun.png" title="sun">
				</div>
<?php				
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