<!-- The Modal -->

<?php
session_start();
include './db/connect.php';
        $s=new data();
            if(isset($_POST['update'])){
                if (isset($_POST['fullname'])) {
                    $fullname = $_POST['fullname'];
                    $fullname = str_replace('"', '\\"', $fullname);
                }
                if (isset($_POST['gioitinh'])) {
                        $gioitinh = $_POST['gioitinh'];
                        $gioitinh = str_replace('"', '\\"', $gioitinh);
                }
                if (isset($_POST['age'])) {
           
                        $age = $_POST['age'];
                        $age = str_replace('"', '\\"', $age);
                
                }
                if (isset($_POST['sdt'])) {
                    $sdt = $_POST['sdt'];
                    $sdt = str_replace('"', '\\"', $sdt);
                }
                $sql = 'update taikhoan t join bacsi b on t.id=b.id SET 
                Hoten="'.$fullname.'",Ngaysinh= "'.$age.'",Gioitinh= "'.$gioitinh.'",Email="'.$sdt.'"
                WHERE Tendangnhap="'.$_SESSION['username'].'"';
                $s->execute($sql);
                header('location:thongtinbacsi.php?pagetrang=thongtin');
            }
            if(isset($_POST['Edit'])){
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    $email = str_replace('"', '\\"', $email);
                }
                $sql='update taikhoan set Email="'.$email.'" where Tendangnhap="'.$_SESSION['username'].'"';
                $s->execute($sql);
                header('location:thongtinbacsi.php?pagetrang=capnhattk');
            }
            if(isset($_POST['Edit1'])){
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    $email = str_replace('"', '\\"', $email);
                }
                $sql='update taikhoan set Email="'.$email.'" where Tendangnhap="'.$_SESSION['username'].'"';
                $s->execute($sql);
                header('location:thongtinbenhnhan.php?pagetrang=capnhattk');
            }

            if(isset($_POST['updatebenhnhan'])){
                if (isset($_POST['fullname'])) {
                    $fullname = $_POST['fullname'];
                    $fullname = str_replace('"', '\\"', $fullname);
                }
                if (isset($_POST['gioitinh'])) {
                        $gioitinh = $_POST['gioitinh'];
                        $gioitinh = str_replace('"', '\\"', $gioitinh);
                }
                if (isset($_POST['age'])) {
           
                        $age = $_POST['age'];
                        $age = str_replace('"', '\\"', $age);
                
                }
                if (isset($_POST['sdt'])) {
                    $sdt = $_POST['sdt'];
                    $sdt = str_replace('"', '\\"', $sdt);
                }
                $sql = 'update taikhoan t join benhnhan b on t.id=b.id SET 
                Hoten="'.$fullname.'",Ngaysinh= "'.$age.'",Gioitinh= "'.$gioitinh.'",Email="'.$sdt.'"
                WHERE Tendangnhap="'.$_SESSION['username'].'"';
                $s->execute($sql);
                header('location:thongtinbenhnhan.php?pagetrang=thongtin');
            }
?>

	
