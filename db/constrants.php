<?php
    // Start Session
    session_start();
    
    // Create Constants to Store Non Repeating Value
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD', '');
    define('DB_NAME','quanlyphongkham');

    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Data connection
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());   //Selecting Data
    mysqli_set_charset($conn,'utf8');

    // function loginFromSocialCallBack($googleUser){
    //     // var_dump($googleUser);
    //     // die();
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
    //         header('Location: ../login.php');
    //     }
    // }
?>