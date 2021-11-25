<?php
include '../../db/connect.php';
$s=new data();
    if (isset($_POST['submit3'])) {
        if (isset($_POST['tendangnhap'])) {
                $tendangnhap = $_POST['tendangnhap'];
                $tendangnhap = str_replace('"', '\\"', $tendangnhap);
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $email = str_replace('"', '\\"', $email);
        }
        if (isset($_POST['phanquyen'])) {
            $phanquyen = $_POST['phanquyen'];
            $phanquyen = str_replace('"', '\\"', $phanquyen);
        }
        $pass=md5(12345);
        //Luu vao database
        $sql = "INSERT INTO taikhoan (Tendangnhap,Password,Email,Phanquyen)
                 values('$tendangnhap','$pass','$email','$phanquyen')";
        // $sql1="INSERT INTO bacsi (id,ID_Khoa,Hoten,Ngaysinh,Gioitinh)
        //  values('','','','','')";
        // $s->execute($sql1);
        $s->execute($sql);
        echo '<script>
        alert("Thêm bác sĩ sử dụng tài khoản");
        window.location.href="../index.php?page=doctors";
        </script>';
    }
?>