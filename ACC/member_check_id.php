<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #489CFF;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
   $id = $_GET["id"];

   if(!$id) 
   {
      echo("<li>아이디를 입력해 주세요!</li>");
   }
   else
   {
      $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');
      $sql = "SELECT count(*) FROM finals_customer WHERE id = '$id'";
      
      $stid = oci_parse($con, $sql);
      oci_execute($stid);

      list($record) = oci_fetch_row($stid);
            
      if ($record == 1) 
      {
         echo "<li>".$id." 아이디는 중복됩니다.</li>\n
               <li>다른 아이디를 사용해 주세요!</li>";
      }
      else 
      {
         echo "<li>".$id." 아이디는 사용 가능합니다.</li>";
      }
      
      oci_free_statement($stid);
      oci_close($con);
   }
?>
</p>
<div id="close">
   <img src="./img/close.png" onclick="javascript:self.close()">
</div>
</body>
</html>