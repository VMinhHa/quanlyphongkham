<?php 
include './../db/connect.php';
$s=new data();
      if(isset($_POST['load'])){
          if(isset($_POST['tenkhoa'])){
            $tenkhoa=$_POST['tenkhoa'];
          }
          if(isset($_POST['Ngay'])){
            $Ngay=$_POST['Ngay'];
          }if(!empty($_FILES['img']['tmp_name'])){
            $fname = strtotime(date("Y-m-d H:i"))."_".$_FILES['img']['name'];
            $move = move_uploaded_file($_FILES['img']['tmp_name'], './../images/khoa/'.$fname);
          }
        $sql="INSERT INTO khoa (Tenkhoa,Hinhanh,Ngaythanhlap) 
        VALUES ('$tenkhoa','$fname', '$Ngay')";
        $s->execute($sql);
        header('location:./index.php?page=categories');
      }
      
?>