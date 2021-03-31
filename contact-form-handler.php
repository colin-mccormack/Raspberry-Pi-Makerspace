<?php
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $country = $_POST['country'];
  $message = $_POST['message'];

  $email_from = 'colin@slpv2.org';
  $email_subject = "New form submission";
  $email_body = "User Name: $name.\n".
    "User Email: $email.\n"
      "User Message: $message.\n";

$to = "colin.william.mccormack@gmail.com;

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
mail($to,$email_subject,$email_body,$headers);

header("Location: contact.html");

?>
