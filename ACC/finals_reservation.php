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
            alert('로그인 후 이용 가능합니다.');
            history.go(-1)
            </script>
        ");
        exit;
    }
  
    $con = oci_connect('dbuser191418', 'tjcogus0308', 'azza.gwangju.ac.kr/orcl', 'AL32UTF8');

    $sql = "SELECT p.name, p.address, r.place_num, r.r_date, r.total ,r.customer_num, p.pay
from finals_place P LEFT OUTER JOIN finals_reservation R ON P.pnum = R.place_num";

    $result = oci_parse($con, $sql);
    oci_execute($result);

    $row = oci_fetch_array($result);

    $placename = $row[0];
    $address = $row[1];
    $type = $row[2];
    $pay = $row[6];
    $date = $row[3];
    $total = $row[4];


    oci_close($con);
?>

<!DOCTYPE html>
<html>
<head>  
<meta charset="utf-8">
<title>숙박 업소 예약목록</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<script src = "js/jquery.min.js"></script>
<script src = "js/jquery-ui.min.js"></script>
<script src="js/jquery.bpopup.min.js" type="text/javascript"></script>
</head>
<body>  
   <header>
       <?php include "header.php";?>
    </header>

    <?php
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
   ?>

    <div style = "width:1000px; margin:0px auto; background-color:white; margin-top:30px">
        <table style = "width:100%">
            <tr style = "height:33px; background-color:gray; color:white; text-align:center">
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
                <td>
                    날짜
                </td>
               <td>
                    인원
                </td>
            </tr>

            <tr style = "height : 33px; text-align:center">

                <td>
                    <?=$placename?>
                </td>
                <td>
                    <?=$address?>
                </td>
                <td>
                    <?=$type?>
                </td>
                <td>
                    <?=$pay?>
                </td>
                <td>
                    <?=$date?>
                </td>
                 <td>
                    <?=$total?>
                </td>
            </tr>
            <tr style = "height:0px; text-align:center">
                <td colspan=5 style="border-bottom:1px solid #dddddd"></td>
            </tr>

        </table>
    </div>
</body>
</html>