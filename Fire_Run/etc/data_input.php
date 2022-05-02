<?php
	$conn = mysqli_connect("azza.gwangju.ac.kr", "dbuser192114", "ce1234", "db192114");
	
		if($conn) {
			echo "Successfully connected!<br>"; 
			
			$query1 = "select * from window;";
			$result1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($result1);
			for ($i = 0; $i < mysqli_num_rows($result1); $i++)
			{
				mysqli_data_seek($result1, $i);
				
				$row1		  = mysqli_fetch_array($result1);
				$temp         = $row1["temp"];
				$humi         = $row1["humi"];
				$dust         = $row1["dust"];
				$pdlc	      = $row1["pdlc"];
				$rain		  = $row1["rain"];
				$open_close   = $row1["open_close"];
			}

			$query2 = "select * from fire;";
			$result2 = mysqli_query($conn, $query2);
			$row2 = mysqli_fetch_array($result2);
			for ($i = 0; $i < mysqli_num_rows($result2); $i++)
			{
				mysqli_data_seek($result2, $i);
				
				$row = mysqli_fetch_array($result2);
				$co            = $row2["co"];
				$fire          = $row2["fire"];
				$gas           = $row2["gas"];
				$fire_whether  = $row2["fire_whether"];
			}
			
			$temperature = $_GET['Temperature'];
			$humidity = $_GET['Humidity'];
			$Dust = $_GET['Dust_density'];
			$rain_check = $_GET['RAIN'];
			$bright = $_GET['Brightness'];
			$distance = $_GET['Distance'];

			$co1 = $_GET['CO'];
			$flame = $_GET['Flame'];
			$Gas = $_GET['GAS'];
			$WHETHER = $_GET['Whether'];

			if (is_Null($temp) || is_Null($humi) || is_Null($dust) || is_Null($rain) || is_Null($pdlc) || is_Null($open_close)) {
				$query = "INSERT INTO window (temp, humi, dust, rain, pdlc, open_close) VALUES ('$temperature', '$humidity', '$Dust', '$rain_check', '$bright', '$distance')";
				mysqli_query($conn,$query);
				
				echo "<br>success!";
			} else {
			
				if ($temperature && $humidity) {
						$query = "update window set temp = '$temperature', humi = '$humidity' where temp is not null and humi is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}

				if($Dust) {				
						$query = "update window set dust = '$Dust' where dust is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}

				if($rain_check == 0 || $rain_check == 1) {				
						$query = "update window set rain = '$rain_check' where rain is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}

				if($bright == 1 || $bright == 0) {
						$query = "update window set pdlc = '$bright' where pdlc is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}

				if($distance == 1 || $distance == 0) {
						$query = "update window set open_close = '$distance' where open_close is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}
			}

			if (is_Null($co) || is_Null($fire) || is_Null($gas)) {
				$query = "INSERT INTO fire (co, fire, gas, fire_whether) VALUES ('$co1', '$flame', '$Gas', '$WHETHER')";
				mysqli_query($conn,$query);
				
				echo "<br>success!";
			} else {

				if($co1) {
						$query = "update fire set co = '$co1' where co is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}

				if($flame == 0 || $flame == 1) {
						$query = "update fire set fire = '$flame' where fire is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}

				if($Gas == 0 || $Gas == 1) {
						$query = "update fire set gas = '$Gas' where gas is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}

				if($WHETHER == 0 || $WHETHER == 1) {
						$query = "update fire set fire_whether = '$WHETHER' where fire_whether is not null";
						mysqli_query($conn,$query);
					
						echo "<br>success!!";
				}
			}
		}
		
		else { 
			echo "MySQL could not be connected"; 
		} 
		
	mysqli_close($conn); 
?>