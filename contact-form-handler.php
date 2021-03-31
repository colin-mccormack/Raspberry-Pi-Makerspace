<?php
  $fname = $_POST['fname'];  
  $lname = $_POST['lname'];
  $contact_email = $_POST['contact_email'];
  $country = $_POST['country'];
  $message = $_POST['subject'];

  $email_from = 'colin@slpv2.org';
  $email_subject = "New form submission";
  $email_body = "User Name: $name.\n".
    "User Email: $contact_email.\n"
      "User Message: $message.\n";

$to = "colin.william.mccormack@gmail.com;

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $contact_email \r\n";
mail($to,$email_subject,$email_body,$headers);

header("Location: contact.html");

?>
