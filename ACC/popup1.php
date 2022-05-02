<?php 
    $pnum = $_GET['pnum'];
    $name = $_GET['name'];
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="./js/jquery.bpopup.min.js" type="text/javascript"></script>
</head>
   <body>
    <div class="box box-success" style = "width:500; display:non; background-color:white; padding-top:15px" id="winReservation">
        <form name=frm method="post" action="reservation_ok.php">
            <input type="hidden" name="insert_pnum" id="insert_pnum" value="<?=$pnum?>">
                <div style="width:100%; height:33px; margin-left:20px">
                    <div style="width:30%; float:left">
                        숙박업소이름: <?=$name?>
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
                </div>
        </form>

        <div style="width:100%; height:33px; margin-top:30px; text-align:center">
            <button style="background-color:gray; color:white; border:1px solid #222222" onclick="saveReservation();">예약하기</button>
    </div>
</div>
 <script>
        function execReservation(pnum, name){
            $("#insert_pnum").val(pnum);
            $("#divName").html(name);

            $('winReservation').bPopup();
        }

        function saveReservation() {
            if (!$.trim($("#reservation_date").val())){
                alert("예약 날짜를 입력하세요!");
                return false;
            }
            if (!$.trim($("#total_man").val())){
                alert("숙박 인원을 입력하세요!");
                return false;
            }
            if (isNaN($("#total_man").val())){
                alert("숙박 인원을 숫자로 입력하세요!");
                return false;
            }
            document.frm.submit();
         }
    </script> 
</body>
</html>