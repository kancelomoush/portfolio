
<?php
// PHPMailer SMTP contact form
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/phpmailer/PHPMailer.php';
require '../assets/vendor/phpmailer/SMTP.php';
require '../assets/vendor/phpmailer/Exception.php';

// Configuration
$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'moussalasfar2000@gmail.com';
$smtpPassword = 'yytqddiuuiobazds'; // Mot de passe d'application Gmail
$smtpPort = 587;
$smtpSecure = 'tls';

$toEmail = 'moussalasfar2000@gmail.com';

// Get POST data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : 'Contact Form';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Create PHPMailer instance
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = $smtpSecure;
    $mail->Port = $smtpPort;

    $mail->setFrom($smtpUsername, $name);
    $mail->addAddress($toEmail);
    $mail->addReplyTo($email, $name);

    $mail->Subject = $subject;
    $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
