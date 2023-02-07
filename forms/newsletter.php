<?php
$email = $_POST['newsletter_email'];
function filter_email_header($form_field)
{
  return preg_replace('/[nr|!/<>^$%*&]+/', '', $form_field);
}

$to = "support@ayezeewebdesigns.com";
$subject = 'Newsletter Subscription';
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <support@ayezeewebdesigns.com>' . "\r\n";
$message = "
<html>
<head>
<title>HTML Email</title>
</head>
<body>
<p>This email contains html</p>
<p>Email Signup: {$email}</p>
</body>
</html>
";

mail($to, $subject, $message, $headers);

// Email to person confirming signup
$to = $email;
$subject = 'Newsletter Confirmation';
$message = "We have added you to the club! keep an eye out for some goodies!";
$headers = 'From: ayezeewebdesigns.com' . "\r\n" .
  'Reply-To: ayezeewebdesigns.com' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to, $subject, $message, $headers);
?>