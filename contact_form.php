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
      $message_content = $_REQUEST['message']."<br>From:".$name."<br>Reply Email: ".$email."<br>Phone Number: ".$phone."<br>Address: ".$address;
      $headers = "From: Derek Website<derek.wene@yahoo.com>/r/n";
    //  $headers = "Content-type: text/html;";
      $message = new Message();
      $message->setSender("djrobotfreak@gmail.com");
      $message->addTo("derek.wene@yahoo.com");
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
  echo "<form method='post' action='/contact' class='smart-green'>
 	<label for='name'>Name:</label> <input type='text' name='name' class='form'><br>
	<label for='email'>Email:</label> <input type='text' name='email' class='form'><br>
    <label for='phone'>Phone Number:</label> <input type='text' name='phone' class='form'><br>
    <label for='address'>Address:</label> <input type='text' name='address' class='form'><br>
	<label for='message'>Content:</label> <textarea name='message' id='content' class='form' rows='10'></textarea><br>
	<label for='submit'>&nbsp;</label> <input type='submit' value=' Send '>";
  }
?>