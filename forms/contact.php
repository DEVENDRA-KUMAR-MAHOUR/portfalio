<?php
// Replace with your receiving email address
$receiving_email_address = 'devendrk79@gmail.com';

// Load the PHP Email Form library
$php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'] ?? 'Anonymous';
$contact->from_email = $_POST['email'] ?? 'no-reply@example.com';
$contact->subject = $_POST['subject'] ?? 'New Contact Message';

// Optional: Use SMTP (recommended for live servers)
$contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'devendrk79@gmail.com',
    'password' => 'idpcyqokawrgfxbs', // Consider using an App Password (see below)
    'port' => '587',
    'encryption' => 'tls' // recommended
);

// Add form fields
$contact->add_message($_POST['name'], 'Name');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send the email
echo $contact->send();
?>
