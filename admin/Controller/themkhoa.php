<?php 
include '../../db/connect.php';
$s=new data();
      if(isset($_POST['load'])){
          if(isset($_POST['tenkhoa'])){
            $tenkhoa=$_POST['tenkhoa'];
            $tenkhoa = str_replace('"', '\\"', $tenkhoa);
          }
          if(isset($_POST['Ngay'])){
            $Ngay=$_POST['Ngay'];
            $Ngay = str_replace('"', '\\"', $Ngay);
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
              $resu=0;
              if($Ngay<date("Y-m-d")){
                  //Luu vao database
                  $sql2 = 'SELECT * from khoa';
                  $phongkham = $s->executeLesult($sql2);
                  foreach ($phongkham as $item) {
                      if($tenkhoa==$item['Tenkhoa']){
                          $resu=1;
                          echo '<script>
                          alert("Khoa đã tồn tại");
                          window.location.href="../index.php?page=categories";
                          </script>';
                          exit();
                      }else{
                          $resu=2;
                      }
                  }
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
          if($resu==2){
            $sql="INSERT INTO khoa (Tenkhoa,Hinhanh,Ngaythanhlap_khoa) 
                VALUES ('$tenkhoa','$fname', '$Ngay')";
                $s->execute($sql);
                echo '<script>
                alert("Thêm thành công");
                window.location.href="../index.php?page=categories";
                </script>';
          }
      }
?>