<?php 
    session_start();
    if (isset($_SESSION["ownerid"])) $userid = $_SESSION["ownerid"];
    else $userid = "";
    if (isset($_SESSION["ownername"])) $username = $_SESSION["ownername"];
    else $username = "";

    if ( $ownerid )
    {
        echo("
            <script>
            alert('사업자 ID는 목록조회만 가능합니다.');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');
    $sql = "SELECT A.pnum as pnum, A.name as name, A.address as address, A.roomtype as roomtype, A.pay as pay, count(B.rnum) as rnum
            FROM finals_place A LEFT OUTER JOIN finals_reservation B ON A.pnum = B.place_num
            GROUP BY A.pnum, A.name, A.address, A.roomtype, A.pay, B.rnum
            ORDER BY A.pnum ASC";
    $result = oci_parse($con, $sql);
    oci_execute($result);
?>

<!DOCTYPE html>
<html>
<head>  
<meta charset="utf-8">
<title>숙박 업소 예약 하기</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<script src = "js/jquery.min.js"></script>
<script src = "js/jquery-ui.min.js"></script>
<script src="js/jquery.bpopup.min.js" type="text/javascript"></script>
</head>
<body>  
   <header>
       <?php include "o_header.php";?>
    </header>

    <?php
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
   ?>

    <div style = "width:1000px; margin:0px auto; background-color:white; margin-top:30px">
        <table style = "width:100%">
            <tr style = "height:33px; background-color:gray; color:white; text-align:center">
                <td>
                    No.
                </td>
                <td>
                    이름
                </td>
                <td>
                    주소
                </td>
                <td>
                    방 타입
                </td>
                <td>
                    가격
                </td>
            </tr>

            <?php
                $isReservation = 0;
            $i = 0;
                while($row = oci_fetch_array($result, OCI_NUM)){
                    $isReservation = false;
                    if($row[5] > 0){
                        $isReservation = true;
                    }
            ?>
            <tr style = "height : 33px; text-align:center">
                <td>
                    <?=$row[0]?>
                </td>
                <td>
                    <?=$row[1]?>
                </td>
                <td>
                    <?=$row[2]?>
                </td>
                <td>
                    <?=$row[3]?>
                </td>
                <td>
                    <?=$row[4]?>
                </td>
            </tr>
              <?php }; ?>
            <tr style = "height:0px; text-align:center">
                <td colspan=5 style="border-bottom:1px solid #dddddd"></td>
            </tr>

        </table>
    </div>
</body>
</html>