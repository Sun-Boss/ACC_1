<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<?php
$id = $_POST['id'];
$pass = $_POST['pass'];
$conn = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

   if (!$conn) {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
   }

$sql = "select * from finals_customer where id='$id' and pass='$pass'"; 
$result = oci_parse($conn, $sql);
oci_execute($result);

$hi = oci_fetch_array($result);

if (!$result) 
{
   echo(" 
   <script> 
      window.alert('등록되지 않은 아이디입니다!') 
      history.go(-1) 
   </script>
   ");
}

else 
{ 
   $db_pass = $hi[5]; 

      if ($pass != $db_pass) 
      {
         echo(" 
         <script> 
            window.alert('비밀번호가 틀립니다!') 
            history.go(-1) 
         </script> 
         "); 

         exit;
      } 

      else 
      {
      session_start(); 
      $_SESSION["userid"] = $hi[4]; 
      $_SESSION["username"] = $hi[1];

      if(isset($_SESSION["userid"])){
      echo(" 
      <script> 
      alert('로그인이 성공하였습니다.')
      </script> 
      ");
            echo("
              <script>
                 location.href ='index.php';
              </script>");
   }
      }

} 
?>
