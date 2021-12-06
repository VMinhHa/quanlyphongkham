<?php

    
    // include '../db/connect.php';
    // $s=new data();
    
    
        
    // if(isset($_POST['datlich']))
    // {
    //     $id = $_GET['ID_bacsi'];
    //     echo $id;
    // }
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // require '../plugins/PHPMailer/src/Exception.php';
    // require '../plugins/PHPMailer/src/PHPMailer.php';
    // require '../plugins/PHPMailer/src/SMTP.php';



    // $mail = new PHPMailer(true);

    // //Server settings
                       
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'cancaiten2017@gmail.com';                     //SMTP username
    // $mail->Password   = '051299Ha';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // //Recipients
    // $mail->setFrom('cancaiten2017@gmail.com', 'Administrator');
    // $mail->addAddress('min.ha512qt@gmail.com');     //Add a recipient
    

    // //Content
    // $mail->isHTML(true);                                  //Set email format to HTML
    // $mail->Subject = 'THÔNG BÁO LỊCH HẸN CỦA BÁC SĨ ';
    // $email_template = "";

    // $mail->Body    = $email_template;
    
    // $mail->send();
    // echo 'Message has been sent';
    


    // $sql3= "SELECT MAx(id_Lichhen) from lichhen";
        
        // $max_id = $s->execute($sql3);

        // $sql4 = "SELECT t.Email from taikhoan t JOIN bacsi b on t.id=b.id 
        //                   join lichhen l on b.ID_Bacsi=l.ID_Bacsi where id_Lichhen='$max_id'";
        // $email_doctor = $s->execute($sql4);

        // echo $email_doctor;
        
        

        
        // $mail = new PHPMailer(true);
    
        // //Server settings
                            
        // $mail->isSMTP();                                            //Send using SMTP
        // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        // $mail->Username   = 'cancaiten2017@gmail.com';                     //SMTP username
        // $mail->Password   = 'password';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        // //Recipients
        // $mail->setFrom('cancaiten2017@gmail.com', 'Administrator');
        // $mail->addAddress('$email');     //$email thay bằng email người nhận
        
    
        // //Content
        // $mail->isHTML(true);                                  //Set email format to HTML
        // $mail->Subject = 'THÔNG BÁO LỊCH HẸN CỦA BÁC SĨ $bacsi';        //$bacsi = thay bang ten bac si
        // $email_template = "Bạn có 1 lịch hẹn với $name_benhnhan ";
    
        // $mail->Body    = $email_template;
        
        // $mail->send();
        //  
?>