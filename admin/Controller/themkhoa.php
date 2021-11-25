<?php 
include '../../db/connect.php';
$s=new data();
      if(isset($_POST['load'])){
          if(isset($_POST['tenkhoa'])){
            $tenkhoa=$_POST['tenkhoa'];
          }
          if(isset($_POST['Ngay'])){
            $Ngay=$_POST['Ngay'];
          }if(!empty($_FILES['img']['tmp_name'])){
            $fname = strtotime(date("Y-m-d H:i"))."_".$_FILES['img']['name'];
            $move = move_uploaded_file($_FILES['img']['tmp_name'], '../../images/khoa/'.$fname);
          }
        if(!empty($_FILES['img']['tmp_name'])){
          $target_dir = "../../images/khoa/";
          $target_file = $target_dir . basename($_FILES["img"]["name"]);
          $type = strtolower(pathinfo( $target_file,PATHINFO_EXTENSION));
          if($type=="jpg"||$type=="png"){
              $fname = strtotime(date("Y-m-d H:i"))."_".$_FILES['img']['name'];
              $move = move_uploaded_file($_FILES['img']['tmp_name'], '../../images/khoa/'.$fname);
              if($Ngay<date("Y-m-d")){
                  //Luu vao database
                  $sql="INSERT INTO khoa (Tenkhoa,Hinhanh,Ngaythanhlap_khoa) 
                  VALUES ('$tenkhoa','$fname', '$Ngay')";
                  $s->execute($sql);
                  header('location:../index.php?page=categories');
              }else{
                  echo '<script>
                      alert("Phải nhỏ hơn ngày hiện hành");
                      window.location.href="../index.php?page=categories";
                      </script>';
              }
          }else{
              echo '<script>
              alert("Không đúng định dạng");
              window.location.href="../index.php?page=categories";
              </script>';
          }
          }else{
                  echo '<script>
                      alert("Ảnh bị sai");
                      window.location.href="../index.php?page=categories";
                      </script>';
            }
        }
?>