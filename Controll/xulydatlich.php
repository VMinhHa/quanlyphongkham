<?php 
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
        $ngay=$lich['Ngay'];
        $bd=$lich['Giobatdau'];
        $kt=$lich['Gioketthuc'];
         $sql2='
         SELECT * FROM benhnhan b JOIN taikhoan t on b.id=t.id
         Where Tendangnhap="'.$_SESSION['username'].'"';
         $lich1=$s->executeSingLesult($sql2);
         $bn=$lich1['ID_Benhnhan'];

        $sql="INSERT INTO lichhen (ID_Benhnhan,ID_Bacsi,Ngayhen,Giobatdau,Gioketthuc,Trangthai,so) 
        VALUES ('$bn','$bs','$ngay','$bd','$kt','đang chờ','$id')";
        $s->execute($sql);
        header('location:../doctor.php');
    }

?>