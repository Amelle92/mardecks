<?php
  if(empty($_POST['fullname'])      ||
     empty($_POST['address'])     ||
     empty($_POST['location'])     ||
     empty($_POST['email'])     ||
     empty($_POST['type'])     ||
     empty($_POST['service_rating'])     ||
     empty($_POST['quality_rating'])     ||
     empty($_POST['customer_service_rating'])     ||
     empty($_POST['value_rating'])     ||
     empty($_POST['testimony'])   ||
     empty($_POST['approval'])   ||
     !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
       echo "No arguments Provided!";
       return false;
     }

  $name = strip_tags(htmlspecialchars($_POST['fullname']));
  $address = strip_tags(htmlspecialchars($_POST['address']));
  $location = strip_tags(htmlspecialchars($_POST['location']));
  $email_address = strip_tags(htmlspecialchars($_POST['email']));
  $type = strip_tags(htmlspecialchars($_POST['type']));
  $service_rating = strip_tags(htmlspecialchars($_POST['service_rating']));
  $quality_rating = strip_tags(htmlspecialchars($_POST['quality_rating']));
  $customer_service_rating = strip_tags(htmlspecialchars($_POST['customer_service_rating']));
  $value_rating = strip_tags(htmlspecialchars($_POST['value_rating']));
  $testimony = strip_tags(htmlspecialchars($_POST['testimony']));
  $approval = strip_tags(htmlspecialchars($_POST['approval']));

  // Create the email and send the message
  $to = 'services@mardecks.com';
  $email_subject = "Testimony Submission: $name";
  $email_body = "Name: $name\n\nAddress: $address\n\nCity/State: $location\n\nEmail: $email_address\n\nType: $type\n\nService Rating: $service_rating\n\nQuality Rating: $quality_rating\n\nCustomer Service Rating: $customer_service_rating\n\nValue For Money Rating: $value_rating\n\nApproval to use on website: $approval\n\nTestimony:\n$testimony";
  $headers = "From: $email_address\n";
  $headers .= "Reply-To: $email_address";
  mail($to,$email_subject,$email_body,$headers);

  return true;
?>
