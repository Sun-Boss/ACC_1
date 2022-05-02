<?php
    session_start();
    $pnum = $_POST["insert_pnum"];
    $date  = $_POST["reservation_date"];
    $total = $_POST["total_man"];
    
    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');
    
    $sql = "";

    $sql = "INSERT INTO finals_reservation(num, rnum, place_num, customer_num, r_date, total)
            VALUES ((SELECT nvl(max(num), 0)+1 FROM finals_reservation), 1, '$pnum', (SELECT num FROM finals_customer WHERE id='{$_SESSION['userid']}' and rownum=1), '$date', '$total')";

    $stid = oci_parse($con, $sql);
    oci_execute($stid);
    
    echo(" 
        <script> 
            alert('정상 예약되었습니다.')
            history.go(-1)
        </script>");
?>