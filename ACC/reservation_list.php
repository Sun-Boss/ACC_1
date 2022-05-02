<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>업소 목록</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3>
	    	예약 하기
		</h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">업장 이름</span>
					<span class="col3">사업자</span>
					<span class="col5">등록일</span>
				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	$con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

	$sql = "SELECt COUNT(1) from finals_place";
	
	$result = oci_parse($con, $sql);
	oci_execute($result);
	$row = oci_fetch_array($result);
	$total_record = $row[0]; // 전체 글 수

	$scale = 10;

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 

	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;

	$sql = "SELECT * from finals_place WHERE num <= {$total_record} - {$start} and num > {$total_record} - {$start}-10 order by num desc";
	
	$result = oci_parse($con, $sql);
	oci_execute($result);

   while ($row =  oci_fetch_array($result))
   {
      // 가져올 레코드로 위치(포인터) 이동
      
      // 하나의 레코드 가져오기
	  $num         = $row["NUM"];
	  $name        = $row["NAME"];
	  $owner_num   = $row["OWNER_NUM"];
      $regist_day  = $row["REGIST_DAY"];
      if ($row["FILE_NAME"])
      	$file_image = "<img src='./img/file.gif'>";
      else
      	$file_image = " ";
?>
				<li>
					<span class="col1"><?=$num?></span>
					<span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$name?></a></span>
					<span class="col4"><?=$file_image?></span>
					<span class="col5"><?=$regist_day?></span>
				</li>	
<?php
   	   $num--;
   }
   oci_close($con);

?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<li><a href='reservation_list.php?page=$new_page'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='reservation_list.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='reservation_list.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul>   	
			<ul class="buttons">
				<li><button onclick="location.href='reservation_list.php'">목록</button></li>
			</ul>
	</div>
</section> 
</body>
</html>
