<?php
include '../../db/connect.php';
$s=new data();
    if (isset($_POST['submit'])) {
        if (isset($_POST['hoten'])) {
                $hoten = $_POST['hoten'];
                $hoten = str_replace('"', '\\"', $hoten);
        }
        if (isset($_POST['diachi'])) {
            $diachi = $_POST['diachi'];
            $diachi = str_replace('"', '\\"', $diachi);
        }
        if (isset($_POST['ngaysinh'])) {
                $ngaysinh = $_POST['ngaysinh'];
                $ngaysinh = str_replace('"', '\\"', $ngaysinh);
        }
        $sql = "INSERT INTO Phongkham (Tenphongkham,Diachi,NgayThanhLap)
                 values('$hoten','$diachi','$ngaysinh')";
        $s->execute($sql);
        header('location:../index.php?page=phongkham');
    }
?>