<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/main_2.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<script type="text/javascript" src="js/jquery.js"></script>
	<title>우리집 상황 확인하기</title>
</head>
<body>
<header id="line1">
	<?php include "header.php";?>
</header>  
<section>
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
		<table>
	    <tr id="member_list">
				
					<td class="col1">번호</td>
					<td class="col2">아이디</td>
					<td class="col3">이름</td>
					<td class="col4">serial number</td>
		</tr>
					<!-- <span class="col7">수정</span> -->
				
<?php
    $con = mysqli_connect("192.168.1.3", "dbuser192114", "ce1234", "db192114");
	$sql = "select * from members order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $snum       = $row["snum"];

?>
		<tr>
		<!-- <form method="post" action="admin_member_update.php?num=<?=$num?>"> -->
			<td class="col1"><?=$number?></td>
			<td class="col2"><?=$id?></td>
			<td class="col3"><?=$name?></td>
			<!-- <span class="col4"><input type="text" name="snum" value="<?=$snum?>"></span> -->
			<td class="col4"><?=$snum?><button class="col8" type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></td>
			<!-- <span class="col7"><button type="submit">수정</button></span> -->
		<!-- </form> -->	

		</tr>

	
<?php
   	    $number--;
   }	
		mysqli_close($con);
?>
	</table>
	</div> <!-- admin_box -->
</section> 
<footer>

</footer>
</body>
</html>
