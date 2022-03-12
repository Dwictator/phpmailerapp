<?php
    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();


    $mail = new PHPMailer(true);                              
    try {
        //Server settings
        $mail->SMTPDebug = 1;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                               
        $mail->Username = $_ENV['EMAIL_USERNAME'];                 
        $mail->Password = $_ENV['EMAIL_PASSWORD'];                           
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 587;                                    

        //Recipients
        $mail->setFrom($_ENV['SET_FROM'], $_ENV['NAME']);
        $mail->addAddress($_POST['recipient']);     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['message'];

        $mail->send();
        //echo 'Message has been sent';
        header('Location: http://localhost/mailsent');
        echo "<script>
                echo .'alert(\"welldone\");';
              </script>";
        exit();

    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>