<?php
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $phone = $_POST["phone"];
//     $notes = $_POST["notes"];

//     $to = "dd61fe@gmail.com"; 
//     $subject = "New Notes Submission";
//     $message = "Name: $name\nEmail: $email\nPhone: $phone\nNotes:\n$notes";


//     if (mail($to, $subject, $message)) {
   
//         echo '<meta http-equiv="refresh" content="0;url=thank-you.html">';
//         echo '<script type="text/javascript">';
//         echo 'window.location.href = "thank-you.html";';
//         echo '</script>';
//         exit;
//     } else {
      
//         echo "An error occurred while sending the email.";
//     }
// }
?>
<?php
// Include PHPMailer library
require 'phpmailer/PHPMailerAutoload.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate a random verification code
    $verificationCode = mt_rand(100000, 999999);

    // Store the verification code in a session
    session_start();
    $_SESSION['verification_code'] = $verificationCode;

    // Send verification email
    $mail = new PHPMailer;
    // Configure email settings

    $mail->addAddress($_POST['email']);
    $mail->Subject = 'Your Verification Code';
    $mail->Body = 'Your verification code is: ' . $verificationCode;

    if ($mail->send()) {
        // Email sent successfully
        echo "Verification code sent to your email.";
    } else {
        // Email sending failed
        echo "Error sending verification code. Please try again later.";
    }
}
?>