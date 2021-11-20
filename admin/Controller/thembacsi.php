<?php
include '../../db/connect.php';
$s=new data();
    if (isset($_POST['submit'])) {
        if (isset($_POST['hoten'])) {
                $hoten = $_POST['hoten'];
                $hoten = str_replace('"', '\\"', $hoten);
        }
        if (isset($_POST['tendangnhap'])) {
            $tendangnhap = $_POST['tendangnhap'];
            $tendangnhap = str_replace('"', '\\"', $tendangnhap);
        }
        if (isset($_POST['tenkhoa'])) {
            $tenkhoa = $_POST['tenkhoa'];
            $tenkhoa = str_replace('"', '\\"', $tenkhoa);
        }
        if (isset($_POST['ngaysinh'])) {
                $ngaysinh = $_POST['ngaysinh'];
                $ngaysinh = str_replace('"', '\\"', $ngaysinh);
        }
        if (isset($_POST['gioitinh'])) {
            $gioitinh = $_POST['gioitinh'];
        }

        if(!empty($_FILES['img']['tmp_name'])){
            $target_dir = "../../images/bacsi/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $type = strtolower(pathinfo( $target_file,PATHINFO_EXTENSION));
            if($type=="jpg"||$type=="png"){
                $fname = strtotime(date("Y-m-d H:i"))."_".$_FILES['img']['name'];
			    $move = move_uploaded_file($_FILES['img']['tmp_name'], '../../images/bacsi/'.$fname);
                if($ngaysinh<date("Y-m-d")){
                    //Luu vao database
                    $sql = "INSERT INTO bacsi (id,ID_Khoa,Hoten,Ngaysinh,Gioitinh,image)
                    values('$tendangnhap','$tenkhoa','$hoten','$ngaysinh','$gioitinh','$fname')";
                    $s->execute($sql);
                    echo '<script>
                   alert("Thêm thành công");
                   window.location.href="../index.php?page=doctors";
                   </script>';
                }else{
                    echo '<script>
                        alert("Phải nhỏ hơn ngày hiện hành");
                        window.location.href="../index.php?page=doctors";
                        </script>';
                }
            }else{
                echo '<script>
                alert("Không đúng định dạng");
                window.location.href="../index.php?page=doctors";
                </script>';
            }
		}else{
            echo '<script>
                alert("Ảnh bị sai");
                window.location.href="../index.php?page=doctors";
                </script>';
        }
    }
?>