<!DOCTYPE HTML>
<html>
<head>
<title>PDLC 필름</title>
<link rel="stylesheet" type="text/css" href="css/pdlc.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
	<header>
		<?php include "header.php"?>
	</header>

	<section class="main_section">
<?php

			$con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");

			if(!empty($con) || isset($con)){
				$sql = "select pdlc from window";

				$result = mysqli_query($con, $sql);

				if(!empty($result) || $result == true){
					while($row = mysqli_fetch_array($result)){
				
						$pdlc = $row["pdlc"];
						if($pdlc == 1){
							echo '<span style="width : 25%; height : 10%; position: relative; left: 42%; top: 80%; font-family: 맑은 고딕; font-size: 25px; font-weight: bold;">pdlc 필름 OFF 권장</span>';
?>
				<div class="pdlc">
					<img class="content" src="img/film_2.png" title="pdlc">
				</div>	
<?php
						} else {
							echo '<span style="width : 25%; height : 10%; position: relative; left: 42%; top: 80%; font-family: 맑은 고딕; font-size: 25pt; font-weight: bold;"> pdlc 필름을 ON 권장</span>';
?>
				<div class="pdlc">
					<img class="content" src="img/pdlc.png" title="pdlc">
				</div>
<?php			
				}			
			}
		} // $res
	}  // $connect

	mysqli_close($con);
?>
</section>
</body>
</html>