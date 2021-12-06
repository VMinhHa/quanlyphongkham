<?php 
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // require '../plugins/PHPMailer/src/Exception.php';
    // require '../plugins/PHPMailer/src/PHPMailer.php';
    // require '../plugins/PHPMailer/src/SMTP.php';

    session_start();
   
    if(isset($_POST['datlich'])){
        //$_SESSION['datlich']=$_POST['datlich'];
        $id=$_POST['datlich'];
        include '../db/connect.php';
        $s=new data();
        $sql1='
        SELECT * from lichlamviec l join bacsi b on l.ID_Bacsi=b.ID_Bacsi
        Where ID_Lich="'.$id.'"';
        $lich=$s->executeSingLesult($sql1);
        $bs=$lich['ID_Bacsi'];
        $ngay=$lich['Ngay'];                     //appointment
        $bd=$lich['Giobatdau'];                 //StartTime
        $kt=$lich['Gioketthuc'];                //EndTime
         $sql2='
         SELECT * FROM benhnhan b JOIN taikhoan t on b.id=t.id
         Where Tendangnhap="'.$_SESSION['username'].'"';
         $lich1=$s->executeSingLesult($sql2);
         $bn=$lich1['ID_Benhnhan'];
         $email = $lich1['Email'];              //Email
        $date=date("Y-m-d");
        $sql="INSERT INTO lichhen (ID_Benhnhan,ID_Bacsi,Ngayhen,Giobatdau,Gioketthuc,Ngaytao,so) 
        VALUES ('$bn','$bs','$ngay','$bd','$kt','$date','$id')";
        $s->execute($sql);
        
        echo '<script>
        alert("Đăng ký lịch thành công");
        window.location.href="../doctor.php";
        </script>';

    }
    if(isset($_POST['Xoa_lich'])){
        include '../db/connect.php';
        $s=new data();
        $idlichhen=$_POST['Xoa_lich'];
        $sql="DELETE FROM lichhen WHERE
        id_Lichhen = ".$idlichhen;
        $s->execute($sql);
            echo '<script>
            alert("Hủy lịch thành công");
            window.location.href="../thongtinbenhnhan.php?pagetrang=xemlich";
            </script>';
        
    }

?>