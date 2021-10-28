<?php
include './../db/connect.php';
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
        //Luu vao database
        $sql = "INSERT INTO taikhoan (Tendangnhap,Email,Phanquyen)
                 values('$tendangnhap','$email','$phanquyen ')";
        $s->execute($sql);
        header('location:./index.php?page=users');
    }
?>