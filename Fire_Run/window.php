<!DOCTYPE HTML>
<html>
<head>
<title>창문 상태</title>
<link rel="stylesheet" type="text/css" href="css/window.css">
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
				$sql = "select open_close from window";

				$result = mysqli_query($con, $sql);

				if(!empty($result) || $result == true){
					while($row = mysqli_fetch_array($result)){
				
						$ws = $row["open_close"];
						if($ws == 1){
							echo '<span style="width : 25%; height : 10%; position: relative; left: 40%; top: 85%; font-family: 맑은 고딕; font-size: 2.1em; font-weight: bold;">창문이 열려있습니다.</span>';
		?>
				<div class="ws">
					<img class="content" src="img/window_2.png" title="ws">
				</div>	
	<div class="window_situation">
<?php
				} else {
					echo '<span style="width : 25%; height : 10%; position: relative; left: 40%; top: 85%; font-family: 맑은 고딕; font-size: 25pt; font-weight: bold;">창문이 닫혀있습니다.</span>';
?>
	</div>
				<div class="sw">
					<img class="content" src="img/window.png" title="sw">
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