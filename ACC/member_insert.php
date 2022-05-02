<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $address = $_POST["address"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];

    $email = $email1."@".$email2;
    $phone = $phone1."-".$phone2."-".$phone3;
              
    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

    $sql = "INSERT INTO finals_customer(num, name, phone, email, id, pass, address) 
    VALUES((SELECT nvl(max(num), 0)+1 FROM finals_customer), '$name', '$phone', '$email', '$id', '$pass', '$address')";

    $stid = oci_parse($con, $sql);
    oci_execute($stid); // $sql 에 저장된 명령 실행
    oci_close($con);
    
    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	";
?>

   
