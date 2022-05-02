<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');
    $sql = "delete from finals_board where num = $num";
    $result = oci_parse($con, $sql);
	oci_execute($result);
    
    oci_close($con);

    echo "
	     <script>
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
?>

