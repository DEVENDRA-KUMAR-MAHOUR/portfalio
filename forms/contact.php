<?php
// // Replace with your receiving email address
// $receiving_email_address = 'devendrk79@gmail.com';

// // Load the PHP Email Form library
// $php_email_form_path = '../assets/vendor/php-email-form/validate.js';
// if (file_exists($php_email_form_path)) {
//     include($php_email_form_path);
// } else {
//     die('Unable to load the "PHP Email Form" Library!');
// }

// $contact = new PHP_Email_Form;
// $contact->ajax = true;

// $contact->to = $receiving_email_address;
// $contact->from_name = $_POST['name'] ?? 'Anonymous';
// $contact->from_email = $_POST['email'] ?? 'no-reply@example.com';
// $contact->subject = $_POST['subject'] ?? 'New Contact Message';

// // Optional: Use SMTP (recommended for live servers)
// $contact->smtp = array(
//     'host' => 'smtp.gmail.com',
//     'username' => 'devendrk79@gmail.com',
//     'password' => 'idpcyqokawrgfxbs', // Consider using an App Password (see below)
//     'port' => '587',
//     'encryption' => 'tls' // recommended
// );


// $contact->add_message($_POST['name'], 'Name');
// $contact->add_message($_POST['email'], 'Email');
// $contact->add_message($_POST['message'], 'Message', 10);


// echo $contact->send();


// ----------------------------new code----------------------------



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/php-email-form/PHPMailer/src/Exception.php';
require '../assets/vendor/php-email-form/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/php-email-form/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->ajax = true;
try {
    // SMTP configuration
   
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'devendrk79@gmail.com';     // Your Gmail address
    $mail->Password   = 'idpcyqokawrgfxbs';         // App password from Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Sender and recipient
    $mail->setFrom('devendrk79@gmail.com', 'My Desk');
    $mail->addAddress($_POST['email'], $_POST['name'] ?? 'Customer');

    // Optional BCC
    $mail->addBCC('devendrk79@gmail.com', 'Digikolorz');
    $mail->addBCC('devendrk79@gmail.com', 'Lumina Holidays');

    // Subject
    $mail->Subject = "I am Sofware Engineer!";

    // Compose HTML email body
    $name = $_POST['name'] ?? 'No name provided';
    $email = $_POST['email'] ?? 'No email provided';
    $messageText = $_POST['message'] ?? 'No message provided';

    $body = "
        <div style='font-family:Arial, sans-serif;'>
            <h3>New Equery</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$messageText}</p>
        </div>
    ";

    $mail->isHTML(true);
    $mail->Body = $body;

    // Send email
    echo  $mail->send();
    // echo "Message has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>







