<?php
require_once 'google/appengine/api/mail/Message.php';
use \google\appengine\api\mail\Message;
//if "email" is filled out, send email
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
{
      try
      {
      //send email
      $name = $_REQUEST['name'];
      $email = $_REQUEST['email'];
      $address = $_REQUEST['address'];
      $phone = $_REQUEST['phone'];  
      $message_content = $_REQUEST['message']."\nFrom:".$name."\nReply Email: ".$email."\nPhone Number: ".$phone."\nAddress: ".$address;
      $headers = "From: Derek Website<derek.wene@yahoo.com>/r/n";
    //  $headers = "Content-type: text/html;";
      $message = new Message();
      $message->setSender("djrobotfreak@gmail.com");
      $message->addTo("texomalawncare@gmail.com");
      $message->setSubject("TEXOMA WEBSITE MESSAGE");
      $message->setTextBody($message_content);
      $message->send();
      echo "Thank you, your message has been sent";
    } catch (InvalidArgumentException $e) {
      // ... 
          echo "ERROR: EMAIL NOT SENT";
    }
}
else
//if "email" is not filled out, display the form
  {
  echo "<form method='post' action='/contact' class='form-horizontal'>
 	<label for='name'>Name:</label> <input type='text' name='name' class='form-control'><br>
	<label for='email'>Email:</label> <input type='text' name='email' class='form-control'><br>
    <label for='phone'>Phone Number:</label> <input type='text' name='phone' class='form-control'><br>
    <label for='address'>Address:</label> <input type='text' name='address' class='form-control'><br>
	<label for='message'>Content:</label> <textarea name='message' id='content' class='form-control' rows='10'></textarea><br>
	<button type='submit' class='btn btn-default'>Submit</button>";
  }
?>