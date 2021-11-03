<?php
    // include('./constrants.php');
    //  function loginFromSocialCallBack($googleUser){
    //     $result = mysqli_query($conn, "Select 'id','Tendangnhap','email','Phanquyen' FROM 'Taikhoan' WHERE 'email' ='" . $googleUser['email'] . "'");
    //     if ($result->num_rows == 0) {
    //         $result = mysqli_query($conn, "INSERT INTO Taikhoan ('Tendangnhap','email', 'Phanquyen',) VALUES ('" . $googleUser['name'] . "', '" . $googleUser['email'] . "', 'Benhnhan');");
    //         if (!$result) {
    //             echo mysqli_error($conn);
    //             exit;
    //         }
    //         $result = mysqli_query($conn, "Select 'id','Tendangnhap','email','Phanquyen' FROM 'Taikhoan' WHERE 'email' ='" . $googleUser['email'] . "'");
    //     }
    //     if ($result->num_rows > 0) {
    //         $user = mysqli_fetch_assoc($result);
    //         if (session_status() == PHP_SESSION_NONE) {
    //             session_start();
    //         }
    //         $_SESSION['username'] = $username;
    //         header('Location: ../index.php');
    //     }
    // }

?>