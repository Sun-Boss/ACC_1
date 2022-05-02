<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>후기 게시판</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>>
   	<div id="board_box">
	    <h3 id="board_title">
	    		후기 작성하기
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');
	$sql = "SELECT * FROM finals_board where num=$num";
	$result = oci_parse($con, $sql);
	oci_execute($result);
	$row = oci_fetch_array($result);
	$name = $row[2];
	$subject = $row[3];
	$content = $row[4];		
?>
	    <form  name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> 
</section> 
</body>
</html>
