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
  echo "
  
    <div class='heading'>
        <h5>Get Started!</h5>    
    </div>
    <form method='post' action='/contact' class='form-horizontal styling'>
 	<p style='font-size:14px;'>Fields marked with * are required.</p>
    <label for='name' class='control-label'>Name*:</label> <input type='text' name='name' class='form-control'>
    <label for='address' class='control-label'>Address*:</label> <input type='text' name='address' class='form-control'>
    <label for='typeservice' class='control-label'>City*:</label> 
    <select class='form-control' name='city'>
        <option>Bonham</option>
        <option>Dodd City</option>
        <option>Ector</option>
        <option>Ravenna</option>
        <option>Savoy</option>
        <option>Windam</option>
        <option>Bells</option>
        <option>Whitewright</option>
    </select>
    <label for='phone' class='control-label'>Telephone*:</label> <input type='text' name='phone' class='form-control'>
    <label for='altphone' class='control-label'>Alternate Telephone:</label> <input type='text' name='altphone' class='form-control'>
    <label for='email' class='control-label'>Email*:</label> <input type='email' name='email' class='form-control'>
    <label for='typeservice' class='control-label'>Type of Service:</label> 
    <select class='form-control' name='typeservice'>
        <option>Weekly</option>
        <option>Bi-Weekly</option>
        <option>One Time</option>
    </select>
    
    <label for='typeservice' class='control-label'>How did you hear about us?:</label> 
    <select class='form-control' name='typework'>
        <option>Refered</option>
        <option>Facebook</option>
        <option>Phone Call</option>
    </select>
    
    <label for='referal' class='control-label'>Refered by Someone?:</label> <input type='text' name='referal' class='form-control'>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='pets'>
        Pets in the Yard?
    </label>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='gates'>
        Gates Locked?
    </label>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='shrub'>
        Estimate for Shrub Trimming?
    </label>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='weeding'>
        Estimate for Bed Weeding?
    </label>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='crape'>
        Trim Crape Myrtles?
    </label>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='mulch'>
        Mulch Installed?
    </label>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='leaf'>
        Leaf Cleanup?
    </label>
    <label class='checkbox' class='control-label'>
        <input type='checkbox' value='' name='fertilization'>
        Fertilization?
    </label><br>
    
	<label for='message' class='control-label'>Comments or Questions:</label> <textarea name='message' id='content' class='form-control' rows='10'></textarea><br>
    <p><button type='submit' class='btn btn-default'>Submit</button>
    By clicking Submit you agree to all terms listed in the 'Things to Know' section
	
    </p>
    </form>
    
    ";
  }
?>