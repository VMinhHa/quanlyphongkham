<?php
include './../db/connect.php';
$s=new data();
    if (isset($_POST['submit'])) {
        if (isset($_POST['hoten'])) {
                $hoten = $_POST['hoten'];
                $hoten = str_replace('"', '\\"', $hoten);
        }
        if (isset($_POST['file1'])) {
            $file1 = $_POST['file1'];
            $file1 = str_replace('"', '\\"', $file1);
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
        //Luu vao database
        $sql = "INSERT INTO bacsi (id,ID_Khoa,Hoten,Ngaysinh,Gioitinh,image)
                 values('$tendangnhap','$tenkhoa','$hoten','$ngaysinh','$gioitinh','$file1')";
        $s->execute($sql);
        header('location:./index.php?page=doctors');
    }
?>