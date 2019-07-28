<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    session_start();


        $email = $_SESSION['mail'];
      $url = 'pec.paavai.edu.in/techfinix19/regis/download.php?id='.$_SESSION['id'];
        $subject = "library due";
        $message = "
                    Dear Student,<br>
                          due notifier for your book <br>
                  With regards,<br>
                 cse librarian ,<br>
                  Paavai Engineering College,<br>
                  Namakkal -637018.<br>";

        $filename = $_FILES['attachment']['name'];
        $location = 'attachment/' . $filename;
        move_uploaded_file($_FILES['attachment']['tmp_name'], $location);

        //Load composer's autoloader
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'lokivarman5@gmail.com';     // Your Email/ Server Email
            $mail->Password = 'Link@8760';                     // Your Password
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            $mail->SMTPSecure = 'TLS';
            $mail->Port = 587;

            //Send Email
            $mail->setFrom('techfinix18@paavai.edu.in');

            //Recipients
            $mail->addAddress($email);
            $mail->addReplyTo('techfinix18@paavai.edu.in');

            //Attachment
            if(!empty($filename)){
                $mail->addAttachment($location, $filename);
            }

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            $_SESSION['message'] = 'Message has been sent';
        } catch (Exception $e) {
            $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        }

        header('location:pass.php');
