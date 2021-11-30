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
        $sql2 = 'SELECT * from taikhoan';
                $phongkham = $s->executeLesult($sql2);
                foreach ($phongkham as $item) {
                    if( $tendangnhap==$item['Tendangnhap']){
                        $resu=1;
                        echo '<script>
                        alert("Tên tài khoản đã tồn tại");
                        window.location.href="../index.php?page=users";
                        </script>';
                        exit();
                    }else{
                        $resu=2;
                    }
                }
        if($resu==2){
            //Luu vao database
            $sql = "INSERT INTO taikhoan (Tendangnhap,Password,Email,Phanquyen)
            values('$tendangnhap','$pass','$email','$phanquyen')";
        // $sql1="INSERT INTO bacsi (id,ID_Khoa,Hoten,Ngaysinh,Gioitinh)
        //  values('','','','','')";
        // $s->execute($sql1);
        $s->execute($sql);
        echo '<script>
        alert("Thêm tài khoản bác sĩ sử dụng thành công");
        window.location.href="../index.php?page=doctors";
        </script>';
        }
        
    }
?>