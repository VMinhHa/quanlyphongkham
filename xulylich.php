<?php 
    session_start();
        include './db/connect.php';
        $s=new data();
                if(isset($_POST['xacnhan'])){
                    if(isset($_POST['trangthai'])){
                        $trangthai=$_POST['trangthai'];
                    }
                    if(isset($_POST['xacnhan'])){
                        $xacnhan=$_POST['xacnhan'];
                    }
                    $sql = 'update taikhoan t join bacsi b on t.id=b.id join lichhen l on
                    b.ID_Bacsi=l.ID_Bacsi SET 
                    Trangthai="'.$trangthai.'" WHERE Tendangnhap="'.$_SESSION['username'].'" and id_Lichhen=
                    "'.$xacnhan.'"';
                    $s->execute($sql);
                    header('location:thongtinbacsi.php?pagetrang=xemlich');
            }
                
      
?>