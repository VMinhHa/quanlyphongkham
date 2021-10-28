<?php include('db/constrants.php'); 
      require('vendor/autoload.php');

      $clientID='565136117957-2eli3vrv3q691kcglvgp34i734srupo1.apps.googleusercontent.com';
      $ClientSecret='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';
      $redirectUrl= 'http://localhost:8080/quanlyphongkham/login.php';

      //Create client request to google
      $client = new Google_Client();
      $client->setClientID($clientID);
      $client->setClientSecret($ClientSecret);
      $client->setRedirectUri($redirectUrl);
      $client->addScope('profile');
      $client->addScope('email');
      
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
    <style>
      .btn-google{
        color:white;
      }
      .btn-google:hover {
        color:white;
        text-decoration:none;
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
          <form action=""  method="POST" enctype="multipart/form-data" >
            <h2>ĐĂNG NHẬP</h2>

            <div class="form-group ">
              <label for="uname">Tên Đăng Nhập:</label>
              <input type="text" class="form-control" id="uname" placeholder="Nhập tên đăng nhập" name="username" required>
            </div>
            
            <div class="form-group">
              <label for="pwd">Mật Khẩu:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password" required>
            </div>
            
            <div class="btn-form btn-login">
              <input type="submit" class="btn btn-primary btn-sign" name="submit" value="Đăng Nhập" />
              <span>Hoặc</span>
              <button type="submit" class="btn btn-danger btn-sign btn-regis"><i class="icon-gg fab fa-google-plus-g"></i>
                <?php if(isset($_GET['code']))
                {
                  $token=$client->fetchAccessTokenwithAuthCode($_GET['code']);
                  $client->setAccessToken($token);

                  //Getting User Profile
                  $gauth = new Google_Service_Oauth2($client);
                  $google_info = $gauth->userinfo->get();
                  $email = $google_info->email;
                  $name = $google_info->name;
                  
                  echo '<script>window.location.href="index.php"</script>';
                }
                else{
                  echo "<a href='".$client->createAuthUrl()."' class='btn-google'>Đăng Nhập bằng Google</a> ";
                }
                ?>
              </button>
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
        $password = $_POST['password'];
        $password = md5($password);           
        //$password = $_POST['password'];        
          
            $sql = "SELECT * FROM taikhoan WHERE Tendangnhap='$username' and Password='$password'";

            $res = mysqli_query($conn, $sql) ;

            $count = mysqli_num_rows($res);            
            if ($count > 0) {              
                $row = mysqli_fetch_array($res);                
                if($row['Phanquyen']=='Benhnhan')
                {
                  echo '<script>
                    alert("Đăng Nhập Thành Công");
                    window.location.href="index.php";
                  </script>';
                  $_SESSION['username'] = $row['Tendangnhap'];
                  $_SESSION['phanquyen'] = $row['Phanquyen'];                 
                }
                else if($row['Phanquyen']=='Doctor')
                {
                  echo '<script>
                    alert("Đăng Nhập Thành Công với tài khoản Bác Sĩ");
                    window.location.href="index.php";
                  </script>';
                  $_SESSION['username'] = $row['Tendangnhap'];
                  $_SESSION['phanquyen'] = $row['Phanquyen'];
                }
                else if($row['Phanquyen']=='Admin')
                {
                  echo '<script>
                    alert("Đăng nhập trang Admin");
                    window.location.href="admin/index.php";
                  </script>';
                }               
            }else{
                echo '<script>alert("failed");</script>';
                // echo 'Failed';
                header('location:login.php');
              
            }

    }
?>

</body>
</html>






