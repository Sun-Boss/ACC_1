<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>후기 게시판</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>

	<?php 
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
	?>
</header>  
<section>
   	<div id="board_box">
	    <h3 class="title">
			후기 게시판
		</h3>
	<?php
		$num  = $_GET["num"];
		$page  = $_GET["page"];

		$con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');
		$sql = "SELECT * FROM finals_board where num=$num";
		$result = oci_parse($con, $sql);
		oci_execute($result);

		$row = oci_fetch_array($result);
		$id      = $row[1];
		$name      = $row[2];
		$regist_day = $row[5];
		$subject    = $row[3];
		$content    = $row[4];
		/* $file_name    = $row[7];
		$file_type    = $row[8];
		$file_copied  = $row[9]; */
		$hit          = $row[6];

		$content = str_replace(" ", "&nbsp;", $content);
		$content = str_replace("\n", "<br>", $content);

		$new_hit = $hit + 1;
		$sql = "UPDATE finals_board SET hit=$new_hit WHERE num=$num";   
		oci_execute($result);
	?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?> | <?=$regist_day?></span>
			</li>
			<li>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
				<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
		</ul>
	</div>
</section> 
</body>
</html>
