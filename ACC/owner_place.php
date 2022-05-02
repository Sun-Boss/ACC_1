<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
?>

<?php
    session_start();
    $name   = $_POST["name"];
    $address = $_POST["address"];
    $roomtype = $_POST["roomtype"];
    $pay  = $_POST["pay"];
              
    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

    $sql = "INSERT INTO finals_place(owner_num, pnum, name, address, roomtype, pay) 
    VALUES((SELECT num FROM FINALS_OWNER WHERE id='{$_SESSION['ownerid']}' and rownum=1), (SELECT nvl(max(pnum), 0)+1 FROM finals_place), '$name', '$address', '$roomtype', '$pay')";

    $stid = oci_parse($con, $sql);
    oci_execute($stid); // $sql 에 저장된 명령 실행
    oci_close($con);
    
   echo(" 
      <script> 
      alert('업소 정보가 입력되었습니다. 닫기를 누르면 목록으로 넘어갑니다.')
      </script> 
      ");
      
    echo("
        <script>
            location.href = 'o_reservation_form.php';
        </script>");
?>