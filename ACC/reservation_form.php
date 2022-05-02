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
            alert('예약 하기는 로그인 후 이용해 주세요!');
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
                <td>
                    예약
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
                <td>
                    <?php
                        if($isReservation){
                            ?>이미 예약됨<?
                        }
                        else{
                            ?>
                                <a style="cursor:pointer; color:blue; text-decoration:underline" href='popup1.php?pnum=<?=$row[0]?>&name=<?=$row[1]?>' onclick="window.open(this.href,'팝업창','width=800,height=800');return false;">예약하기</a>
                            <?
                        }
                    ?>
                </td>
            </tr>
            <?php }; ?>
            <tr style = "height:0px; text-align:center">
                <td colspan=5 style="border-bottom:1px solid #dddddd"></td>
            </tr>
        </table>
    </div>

    <!-- <div class="box box-success" style = "width:500; display:non; background-color:white; padding-top:15px" id="winReservation">
        <form name=frm method="post" action="reservation_ok.php">
            <input type="hidden" name="insert_pnum" id="insert_pnum" value="">
                <div style="width:100%; height:33px; margin-left:20px">
                    <div style="width:30%; float:left">
                        숙박업소이름:
                    </div>
                    <div style="width:70%; float:left" id="divName">
                    </div>
                </div>

                <div style="width:100%; height:33px; margin-left:20px">
                    <div style="width:30%; float:left">
                        예약날짜:
                    </div>
                    <div style="width:70%; float:left">
                        <input type="text" name="reservation_date" id="reservation_date" style="width:80px">
                    </div>
                </div>

                <div style="width:100%; height:33px; margin-left:20px">
                    <div style="width:30%; float:left">
                        숙박인원:
                    </div>
                    <div style="width:70%; float:left">
                        <input type="text" name="total_man" id="total_man" style="width:50px">명
                    </div>
                </div>-->
        </form>

        <!--<div style="width:100%; height:33px; margin-top:30px; text-align:center">
            <button style="background-color:gray; color:white; border:1px solid #222222" onclick="saveReservation();">예약하기</button>
        <div>-->
    </div>
</body>
</html>