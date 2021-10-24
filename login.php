<?php include('db/constrants.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./font/fontawesome-free-5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./css/form.css">
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
          <form action=""  method="POST" enctype="multipart/form-data" >
            <h2>ĐĂNG NHẬP</h2>
            <?php
                
            ?>
            <div class="form-group ">
              <label for="uname">Tên Đăng Nhập:</label>
              <input type="text" class="form-control" id="uname" placeholder="Nhập tên đăng nhập" name="username" required>
              <!-- <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div> -->
            </div>
            
            <div class="form-group">
              <label for="pwd">Mật Khẩu:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password" required>
              <!-- <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div> -->
            </div>
            <div class="form-group">

            </div>
            <div class="btn-form btn-login">
              <input type="submit" class="btn btn-primary btn-sign" name="submit" value="Đăng Nhập" />
              <span>Hoặc</span>
              <button type="submit" class="btn btn-danger btn-sign btn-regis"><i class="icon-gg fab fa-google-plus-g"></i>Đăng Nhập bằng Google</button>
            </div>

            
          </form>
        </div>

        <div class="register">
          <span>Bạn chưa có tài khoản! <a href="./register.php">Đăng Ký</a></span>
        </div>
        
      </div>
    </div>
    </div>
  </div>

  <?php
  // Start Session
  

  if(isset($_POST['submit']))
    {
        // Process for Login
        //1 . Get the Data from Login form
        $username= $_POST['username'];
        $password = md5($_POST['password']);

        // $username = strip_tags($username);
        // $username = addslashes($username);
        // $password = strip_tags($password);
        // $password = addslashes($password);
        // echo $username. '<br/>';
        // echo $password;

        // if ($username == "" || $password =="") {
        //   echo "username hoặc password bạn không được để trống!";
        // }else{
          $sql = "SELECT * FROM taikhoan WHERE Tendangnhap='$username' and password='$password'";
          
          $res = mysqli_query($conn, $sql) ;

          $count = mysqli_num_rows($res);

          if ($count == 1) {
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              header('Location: index.php');
          }else{
              // echo 'Failed';
              header('location:login.php');
            
          }
        // }

      //   $row= mysql_fetch_array ($res);
			//   if($row['username'] == $username && $row['password'] == $password)
			// {
			// 	session_start();
			// 	$_SESSION['username']=$username;
			// 	$_SESSION['password']=$password;
			// 	echo'<script language="javascript">alert("Đăng nhập thành công. Xin chào '.$row['username'].'");</script>';
			// 	echo'<script language="javascript"> window.location.href="insert.php";</script>';
			// }
			// else
			// {
			// 	echo'<script language="javascript">alert("Đăng nhập không thành công!Vui lòng đăng nhập lại");</script>';
			// 	echo'<script language="javascript"> window.location.href="login.php";</script>';	
			// }
    }
?>

</body>
</html>






