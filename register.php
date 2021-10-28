<?php
  include('db/constrants.php');
  include('db/validation.php');
  $err = [];
  if(isset($_POST['username']))
  {
      $username = $_POST['username'];
      $password =$_POST['password'];
      $repass = $_POST['repass'];
      $email = $_POST['email'];
      $phanquyen = 'Benhnhan';

      //
        if(empty($username))
        {
          $err['username'] = '*Bạn chưa nhập tên đăng nhập';
        }else{
            // Kiểm tra định dạng username
            if (!is_username($username)) {
                $err['username'] = "*Tên đăng nhập phải từ 6 chữ số";
            } else {
                $username = $_POST['username'];
            }
        }

        //Kiểm tra lỗi password
        if(empty($password))
        {
           $err['password'] = '*Bạn chưa nhập mật khẩu';
         } else {
            // Kiểm tra định dạng password
            if (!is_password($_POST['password'])) {
                $err['password'] = "*Mật khẩu bắt đầu bằng chữ in hoa từ 5 chữ số";
            } else {
                $password = $_POST['password'];
            }
        }

        if($password != $repass)
        {
          $err['repass'] = '*Mật khẩu nhập lại không đúng';
        }

        if(empty($email))
        {
          $err['email'] = '*Bạn chưa nhập email';
        }else {
          // Kiểm tra định dạng password
          if (!is_email($_POST['email'])) {
              $err['email'] = "Email không đúng định dạng";
          } else {
              $email = $_POST['email'];
          }
      }
      
      
      // if(empty($username))
      // {
      //   $err['username'] = '*Bạn chưa nhập tên đăng nhập';
      // }
      // if(empty($password))
      // {
      //   $err['password'] = '*Bạn chưa nhập mật khẩu';
      // }
      // if($password != $repass)
      // {
      //   $err['repass'] = '*Mật khẩu nhập lại không đúng';
      // }
      // if(empty($email))
      // {
      //   $err['email'] = '*Bạn chưa nhập email';
      // }
      
      if(empty($err))
      {        
        $pass = md5($password);
        $sql = "INSERT INTO taikhoan(Tendangnhap,Password,Email,Phanquyen) 
        values ('$username','$pass','$email','$phanquyen')";
        $query = mysqli_query($conn,$sql);
        if($query)
        {          
          $res = mysqli_query($conn, "SELECT * FROM taikhoan WHERE Tendangnhap='$username' and Password='$pass'");
          $count = mysqli_num_rows($res);
          if ($count > 0) {              
                $row = mysqli_fetch_array($res);                
                if($row['Phanquyen']=='Benhnhan')
                {
                  echo '<script>
                    alert("Đăng Ký Thành Công");
                    window.location.href="index.php";
                  </script>';
                  $_SESSION['username'] = $row['Tendangnhap'];
                  $_SESSION['phanquyen'] = $row['Phanquyen'];                 
                }                
            }
        }
        else{
          echo'<script>alert("Đăng Ký Thất Bại");</script>';
        }
      }
      
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/form.css">
    <style>
      .has-error{
        color:red;
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <a href="./index.php">
        <img src="./images/logo.png" alt="">
      </a>
    </div>

    <div class="row justify-content-md-center">
      <div class="col-8">
        <div class="main-form">
          <form action="" method="POST" enctype="multipart/form-data">
            <h2>ĐĂNG KÝ</h2>
            <div class="form-group">
              <label for="uname">Tên Đăng Nhập:</label>
              <input type="text" class="form-control" id="uname" placeholder="Nhập tên đăng nhập" name="username" >
              <div class="has-error">
                <span> <?php echo (isset($err['username'])) ? $err['username']:'' ?> </span>
              </div>
            </div>

            <div class="form-group">
              <label for="pwd">Mật Khẩu:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password" >
              <div class="has-error">
                <span> <?php echo (isset($err['password'])) ? $err['password']:'' ?> </span>
              </div>
            </div>

            <div class="form-group">
              <label for="rpwd">Xác nhận mật khẩu:</label>
              <input type="password" class="form-control" id="rpwd" placeholder="Nhập lại mật khẩu" name="repass" >
              <div class="has-error">
                <span> <?php echo (isset($err['repass'])) ? $err['repass']:'' ?> </span>
              </div>
            </div>

            <div class="form-group">
              <label for="txtemail">Email:</label>
              <input type="email" class="form-control" id="txtemail" placeholder="Nhập email của bạn" name="email">
              <div class="has-error">
                <span> <?php echo (isset($err['email'])) ? $err['email']:'' ?> </span>
              </div>
            </div>

            <div class="btn-form">
              <input type="submit" class="btn btn-primary btn-sign" value="Đăng Ký" name="submit">
              <input type="button" class="btn btn-danger btn-sign" style="margin-top:10px;" value="Trở Lại" onclick="history.back(-1)" />
            </div>
          </form>
        </div>

      </div>
    </div>
    </div>
  </div>

</body>
</html>
