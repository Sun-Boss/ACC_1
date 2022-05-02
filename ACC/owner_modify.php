<?php
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
        ?>
        	
<?php 
    $id   = $_GET["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $businum  = $_POST["businum"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];

    $email = $email1."@".$email2;
    $phone = $phone1."-".$phone2."-".$phone3;
          
    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

    $sql = "UPDATE finals_owner SET pass='$pass', name='$name', email='$email', businum='$businum', phone='$phone' WHERE id='$id'";
    
    $stid = oci_parse($con, $sql);
    oci_execute($stid);

    oci_close($con);    

    echo(" 
      <script> 
      alert('회원 정보가 변경되었습니다.')
      </script> 
      ");
      
    echo("
        <script>
            location.href = 'owner_modify_form.php';
        </script>");
?>

   
