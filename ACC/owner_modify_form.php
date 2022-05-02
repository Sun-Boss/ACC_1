<!DOCTYPE html>
<html>
<head>  
<meta charset="utf-8">
<title>사업자 정보 수정</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<body> 
	<header>
    	<?php include "o_header.php";?>
    </header>
  
	<?php
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
	?>	

<?php    
   	$con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

    $sql = "SELECT * from finals_owner where id='{$ownerid}'";
    $result = oci_parse($con, $sql);
	oci_execute($result);

    $row = oci_fetch_array($result);

    $pass = $row[7];
    $name = $row[1];
	$businum = $row[2];

    $email = explode("@", $row[6]);
    $email1 = $email[0];
    $email2 = $email[1];

	$phone = explode("-", $row[4]);
    $phone1 = $phone[0];
    $phone2 = $phone[1];
	$phone3 = $phone[2];



    oci_close($con);
?>
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form name="owner_form" method="post" action="owner_modify.php?id=<?=$ownerid?>">
			    <h2>사업자 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?=$ownerid?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" value="<?=$email1?>">@<input 
							       type="text" name="email2" value="<?=$email2?>">
				        </div>                 
			       	</div>
					<div class="clear"></div>
					<div class="form phone">
				        <div class="col1">핸드폰번호</div>
				        <div class="col2">
							<input type="text" name="phone1" value="<?=$phone1?>">-<input 
							       type="text" name="phone2" value="<?=$phone2?>">-<input 
							       type="text" name="phone3" value="<?=$phone3?>">
				        </div>                 
			       	</div>
					<div class="clear"></div>
					<div class="form businum">
				        <div class="col1">사업자 번호</div>
				        <div class="col2">
							<input type="text" name="businum" value="<?=$businum?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
			       		<input type="submit" name="button"value="변경하기"/>
	                	<!--<a href="member_modify.php"><img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;</a>
						<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">--> 
	           		</div>
           	</form>
        	</div>
        </div>
	</section> 
</body>
</html>

