<?php

    $con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");
    $sql = "update fire set led = 1";

    mysqli_query($con, $sql);

	  echo "
    <script> 
      alert('1분이 지났습니다. 119에 신고접수됩니다.');
      location.href = 'fire_run.php';
    </script>
    ";

    mysqli_close($con);     

?>