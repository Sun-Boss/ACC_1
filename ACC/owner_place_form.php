<!DOCTYPE html>
<html>
<head>  
<meta charset="utf-8">
<title>업소 등록</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
<script>
   function check_input()
   {

      if (!document.owner_place_form.name.value) {
          alert("호텔이름을 입력해주세요");    
          document.owner_place_form.name.focus();
          return;
      }

      if (!document.owner_place_form.address.value) {
          alert("주소를 입력해주세요");    
          document.owner_place_form.address.focus();
          return;
      }

      if (!document.owner_place_form.roomtype.value) {
          alert("방 타입을 입력해주세요");    
          document.owner_place_form.roomtype.focus();
          return;
      }

      if (!document.owner_place_form.pay.value) {
          alert("가격을 입력해주세요");    
          document.owner_place_form.pay.focus();
          return;
      }

      document.owner_place_form.submit();
   }

   function reset_form() {
      document.owner_place_form.name.value = "";  
      document.owner_place_form.address.value = "";
      document.owner_place_form.roomtype.value = "";
      document.owner_place_form.pay.value = "";
      return;
   }

</script>
</head>
<body> 
	<header>
    	<?php include "o_header.php";?>
    </header>
  
	<?php
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
	?>	
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form name="owner_form" method="post" action="owner_place.php">

			    <h2>업소 등록</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?=$ownerid?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">호텔 이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">주소</div>
				        <div class="col2">
							<input type="text" name="address">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">방 타입</div>
				        <div class="col2">
							<input type="text" name="roomtype">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">가격</div>
				        <div class="col2">
							<input type="text" name="pay">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
			       		<input type="submit" name="button"value="입력하기"/>
	           		</div>
           	</form>
        	</div>
        </div>
	</section> 
</body>
</html>