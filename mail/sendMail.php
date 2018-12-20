<?php
  if(empty($_POST['fullname'])      ||
     empty($_POST['address'])     ||
     empty($_POST['location'])     ||
     empty($_POST['email'])     ||
     empty($_POST['phone'])     ||
     empty($_POST['type'])     ||
     empty($_POST['description'])   ||
     !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
       echo "No arguments Provided!";
       return false;
     }

  $name = strip_tags(htmlspecialchars($_POST['fullname']));
  $address = strip_tags(htmlspecialchars($_POST['address']));
  $location = strip_tags(htmlspecialchars($_POST['location']));
  $email_address = strip_tags(htmlspecialchars($_POST['email']));
  $phone = strip_tags(htmlspecialchars($_POST['phone']));
  $type = strip_tags(htmlspecialchars($_POST['type']));
  $message = strip_tags(htmlspecialchars($_POST['description']));

  // Create the email and send the message
  $to = 'services@mardecks.com';
  $email_subject = "Quote Request: $name FOR: $type";
  $email_body = "Name: $name\n\nAddress: $address\n\nCity/State: $location\n\nEmail: $email_address\n\nPhone: $phone\n\nType: $type\n\nDescription:\n$message";
  $headers = "From: $email_address\n";
  $headers .= "Reply-To: $email_address";
  mail($to,$email_subject,$email_body,$headers);

  // Send confirmation to client
  $to = $email_address;
  $email_subject = "Quote Request Recieved!";
  $email_body = '<img src="mardecks.com/new/images/RequestQuote/Thankyou.png">';
  $headers = "From: services@mardecks.com\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";
  $headers .= "Reply-To: services@mardecks.com";
  mail($to,$email_subject,$email_body,$headers);

  return true;
?>
