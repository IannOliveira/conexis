<?php

if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "ianncosta13@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";

$body = "Você recebeu uma nova mensagem do formulário do site.\n\n";
$body .= "============================\n";
$body .= "Nome: $name\n";
$body .= "Email: $email\n";
$body .= "Assunto: $m_subject\n\n";
$body .= "Mensagem:\n$message\n";
$body .= "============================\n";

$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if(mail($to, $subject, $body, $headers)) {
  http_response_code(200);
} else {
  http_response_code(500);
}

?>
