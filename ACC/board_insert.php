<meta charset="utf-8">
<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    if ( !$userid )
    {
        echo("
            <script>
            alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $subject = $_POST["subject"];
    $content = $_POST["content"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date("Y-m-d (H:i)");

	$upload_dir = './data/';

	/* $upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
	$upfile_error    = $_FILES["upfile"]["error"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 1000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else 
	{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	} */
	
	$conn = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

	$sql = "INSERT into finals_board(num, id, name, subject, content, regist_day, hit) 
			values((SELECT nvl(max(num), 0)+1 FROM finals_board), '$userid', '$username', '$subject', '$content', '$regist_day', 0)";

	$result = oci_parse($conn, $sql);
	oci_execute($result);

	$sql = "SELECT point from finals_board where id='$userid'";
	
	$sql = "UPDATE finals_board set where id='$userid'";

	oci_close($conn);

	echo "
	   <script>
	    location.href = 'board_list.php';
	   </script>
	";
?>

  
