<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');
    $sql = "delete from finals_place where num = $num";
    $result = oci_parse($con, $sql);
	oci_execute($result);
    
    oci_close($con);

    echo "
         <script>
             alert('삭제 되었습니다.');
         </script>
       ";

    echo "
	     <script>
	         location.href = 'o_board_list.php?page=$page';
	     </script>
	   ";
?>

