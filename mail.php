<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {

    $mail = new PHPMailer(true);

    try {

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jericc590@gmail.com';
        $mail->Password   = 'hknmumnkotqelkjq';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Sender
        $mail->setFrom($_POST["email"], $_POST["name"]);

        // Receiver
        $mail->addAddress('jericc590@gmail.com');

        // Reply To
        $mail->addReplyTo($_POST["email"], $_POST["name"]);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body    = nl2br($_POST["message"]);

        // Send Email
        $mail->send();

        echo "
        <script>
            alert('✅ The message has been sent!');
            window.location.href='index.php';
        </script>
        ";

    } catch (Exception $e) {

        echo "
        <script>
            alert('❌ Message could not be sent.');
            window.history.back();
        </script>
        ";

    }
    
    header("Location: index.html?success=1");
exit();

}

?>
