<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $resinum1 = $_POST["resinum1"];
    $resinum2 = $_POST["resinum2"];
    $businum  = $_POST["businum"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];

    $email = $email1."@".$email2;
    $phone = $phone1."-".$phone2."-".$phone3;
    $resinum = $resinum1."-".$resinum2;
              
    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

    $sql = "INSERT INTO finals_owner(num, name, businum, phone, email, id, pass, resinum) 
    VALUES((SELECT nvl(max(num), 0)+1 FROM finals_owner), '$name', '$businum', '$phone', '$email', '$id', '$pass', '$resinum')";

    $stid = oci_parse($con, $sql);
    oci_execute($stid); // $sql 에 저장된 명령 실행
    oci_close($con);
    
    echo "
          <script>
             location.href = 'index.php';
          </script>
    ";
?>

   
