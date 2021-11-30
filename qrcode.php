<?php
session_start();
    // include('plugins/phpqrcode/qrlib.php');
    
    // $id = $_GET['id'];
    // $patch = 'images/qrcode/';
    // $file = $patch.uniqid().".png";
    // // outputs image directly into browser, as PNG stream
    // $text= "Hello dsaaaaaaaa";

    // QRcode::png($text, $file, QR_ECLEVEL_L, 4);

    // echo "<center><img src='".$file."'></center>";

    if(isset($_GET['idlich'])){
            $id=$_GET['idlich'];
            include './db/connect.php';
            $s = new data();
            $sql='select * from bacsi b join lichhen l on b.ID_Bacsi=l.ID_Bacsi  join benhnhan n 
                on n.ID_Benhnhan=l.ID_Benhnhan JOIN taikhoan t on t.id=n.id
                where t.Tendangnhap="'.$_SESSION['username'].'" and l.id_Lichhen="'.$id.'" ';
            $Lich = $s->executeSingLesult($sql);

            $sql4="SELECT * from lichlamviec l join phongkham pk on l.ID_Phongkham=pk.ID_Phongkham
					where ID_Lich=".$Lich['so'];
					$phongkham=$s->executeSingLesult($sql4);
    }else{
        echo 456;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <style>
        .a2{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            border:1px solid black;
            width:400px;
        }
    </style>
    <body>
        <div class="a2">
            <div style="text-align: center;">
                    <h2>Lịch khám</h2>
                    <br>
                    <p><b>Ngày khám: </b><label for=""><?php echo date("l M d Y",strtotime($Lich['Ngayhen'])) ?></label></p>
                    <p><b>Giờ khám: </b><label for=""><?php echo date("h:i A",strtotime($Lich['Giobatdau'])) ?></label></p>
                    <p><b>Tên bệnh nhân: </b><label for=""><?php echo $Lich['Hotenbn']?></label></p>
                    <p><b>Bác sĩ khám: </b><label for=""><?php echo $Lich['Hoten']?></label></p>
                    <p><b>Phòng khám: </b><label for=""><?php echo $phongkham['Tenphongkham'];?></label></p>
                    <p><b>Trạng thái: </b><label for=""><?php echo $Lich['Trangthai']?></label></p>
                    
 
            </div>
        </div>
    </body>
</html> 