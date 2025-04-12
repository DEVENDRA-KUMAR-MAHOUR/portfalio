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
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/php-email-form/PHPMailer/src/Exception.php';
require '../assets/vendor/php-email-form/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/php-email-form/PHPMailer/src/SMTP.php'; 


$mail = new PHPMailer(true);
$receiving_email_address = 'devendrk79@gmail.com';

    $mail->isSMTP();                                          //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
    $mail->Username   = 'devendrk79@gmail.com';            //SMTP username
    $mail->Password   = 'idpcyqokawrgfxbs';                   //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS encryption
    $mail->Port       = 465;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('devendrk79@gmail.com', 'Lumina Holidays');
    $mail->addBCC("devendrk79@gmail.com", "Digikolorz");
    $mail->addBCC("devendrk79@gmail.com", "Lumina Holidays");
    $mail->addAddress($email,$name);     //Add a recipient
    $mail->to = $receiving_email_address;
    $mail->from_name = $_POST['name'] ?? 'Anonymous';
    $mail->from_email = $_POST['email'] ?? 'no-reply@example.com';
    $mail->subject = $_POST['subject'] ?? 'New Contact Message';	



   // Always set content-type when sending HTML email
    $mail->add_message($_POST['name'], 'Name');
    $mail->add_message($_POST['email'], 'Email');
    $mail->add_message($_POST['message'], 'Message', 10);
    //Content
    $mail->isHTML(true); 
	  // Set email format to HTML
    $mail->Subject = "Lumina Holidays's Booking Desk";
    $message = '<div style="margin-bottom:10px;"><b>Dear Customer</b>,</div>' ; 
    $mail->Body    = $message;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();

?>




