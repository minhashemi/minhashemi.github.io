<?php
$name = trim($_POST['fullname']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);
if ($name == "") {
    $msg['err'] = "\n Name can not be empty!";
    $msg['field'] = "fullname
";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "\n Email can not be empty!";
    $msg['field'] = "email";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n Please put a valid email address!";
    $msg['field'] = "email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "\n Message can not be empty!";
    $msg['field'] = "message";
    $msg['code'] = FALSE;
} else {
    $to = 'aminhashemi.xyz@gmail.com';
    $subject = 'Website Contact Query';
    $_message = '<html><head></head><body>';
    $_message .= '<p>Name: ' . $name . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Message: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:  Amin Hashemi <aminhashemi.xyz@gmail.com>' . "\r\n";
    $headers .= 'cc: aminhashemi.xyz@gmail.com' . "\r\n";
    $headers .= 'bcc: aminhashemi.xyz@gmail.com' . "\r\n";
    mail($to, $subject, $_message, $headers, '-f aminhashemi.xyz@gmail.com');

    $msg['success'] = "\n Email has been sent successfully.";
    $msg['code'] = TRUE;
}
echo json_encode($msg);