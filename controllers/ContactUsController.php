<?php
/**
 * Created by PhpStorm.
 * User: AHMED HASSAN
 */

if(!empty($_POST) && !empty($_POST['contact_form'])) {
    if (!wp_verify_nonce($_POST['contact_form'], 'submit_contact_form')) {
        exit();
    }
    $name = trim(stripslashes($_POST['contactName']));
    $email = trim(stripslashes($_POST['contactEmail']));
    $subject = trim(stripslashes($_POST['contactSubject']));
    $contact_message = trim(stripslashes($_POST['contactMessage']));

    // Check Name
    if (strlen($name) < 2) {
        $error['name'] = "Please enter your name.";
    }
    // Check Email
    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
        $error['email'] = "Please enter a valid email address.";
    }
    // Check Message
    if (empty($contact_message)) {
        $error['message'] = "Please enter your message.";
    }
    // Subject
    if ($subject == '') {
        $subject = "Contact Form Submission";
    }

    // Set Message
    $message = '';
    $message .= "Email from: " . $name . "\r\n";
    $message .= "Email address: " . $email . "\r\n";
    $message .= "Message: \r\n";
    $message .= $contact_message;
    $message .= "\r\n This email was sent from your portfolio site's contact form. \r\n";

    // Set From: header
    $from =  $name . " <" . $email . ">";

    // Email Headers
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


    if (!isset($error)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        wp_mail($emailTo, $subject, $message, $headers);
        echo "OK";
    } else {
        $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
        $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
        $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
        echo $response;
    }
    exit();
}