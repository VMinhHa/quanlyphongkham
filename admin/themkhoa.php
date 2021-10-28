<?php 
include './../db/connect.php';
$s=new data();
      if(isset($_POST['load'])){
          if(isset($_POST['tenkhoa'])){
            $tenkhoa=$_POST['tenkhoa'];
          }
          if(isset($_POST['Ngay'])){
            $Ngay=$_POST['Ngay'];
          }if(isset($_POST['file'])){
            $file=$_POST['file'];
          }
        $sql="INSERT INTO khoa (Tenkhoa,Hinhanh,Ngaythanhlap) 
        VALUES ('$tenkhoa','$file', '$Ngay')";
        $s->execute($sql);
        header('location:./index.php?page=categories');
      }
      
?>