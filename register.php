<?php
  include('db/constrants.php');
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
              <input type="text" class="form-control" id="uname" placeholder="Nhập tên đăng nhập" name="username" required>
              <!-- <div class="valid-feedback">Valid.</div> -->
              <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
            </div>
            <div class="form-group">
              <label for="pwd">Mật Khẩu:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password" required>
              <!-- <div class="valid-feedback">Valid.</div> -->
              <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
            </div>

            <div class="form-group">
              <label for="txtname">Họ Tên:</label>
              <input type="text" class="form-control" id="txtname" placeholder="Nhập họ tên" name="full_name" required>
              <!-- <div class="valid-feedback">Valid.</div> -->
              <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
            </div>

            <div class="form-group">
              <label for="txtsdt">Số điện thoại:</label>
              <input type="text" class="form-control" id="txtsdt" placeholder="Nhập số điện thoại" name="sdt" required>
              <!-- <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div> -->
            </div>

            <div class="form-group">
              <label for="txtemail">Email:</label>
              <input type="email" class="form-control" id="txtemail" placeholder="Nhập email" name="email" required>
              <!-- <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div> -->
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
  <?php
  if(isset($_POST['submit']))
  {
      //Button Clicked
      
      //1. Get the data from form
      $username = $_POST['username'];
      $password =md5($_POST['password']);    //Password Encryption with MD5
      $full_name= $_POST['full_name'];
      $sdt = $_POST['sdt'];
      $email = $_POST['email'];
      $phanquyen = 'benhnhan';    

      // echo $full_name.'</br>'; 
      // echo $username .'</br>';
      // echo $password .'</br>';
      // echo $email .'</br>';
      // echo $sdt .'</br>';
      // echo $phanquyen;

      // //2. SQL Query to save the data
      $sql = "INSERT INTO taikhoan 
      SET Hoten='$full_name',
      Tendangnhap='$username',
      Password='$password',
      Email='$email',
      Sodienthoai='$sdt',
      phanquyen='$phanquyen'
      "; 

      // //Connecting SQL
      // //3. Execute Query and Save data
      $res = mysqli_query($conn,$sql);

      // //4. Check whether the (Query is Executed) data is inserted or not and display.
      if($res == TRUE)
      {
      //       //Data inserted
              // echo "Data inserted";
      //     // Create a Session Variable to Display Mess
      //     // $_SESSION['add'] = "<div class='success'>Admin Added Successfully </div>";
      //     //Redirect Page tp Manage Admin
            header("location:index.php");          
      }
      else
      {
        // echo "Failed to inserted";
      //     // Create a Session Variable to Display Mess
      //     // $_SESSION['add'] = "<div class='success'>Failed to Add Admin </div>";
            // Redirect Page tp Add Admin
            header("location:register.php");
      }
      
  }
?>

</body>
</html>
