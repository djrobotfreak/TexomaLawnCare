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
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $phone = $_REQUEST['phone'];
        $altphone = $_REQUEST['altphone'];
        $email = $_REQUEST['email'];
        $type_of_service = $_REQUEST['typeservice'];
        $type_of_work = $_REQUEST['typework'];
        $refferal = $_REQUEST['refferal'];
        $payment = $_REQUEST['payment'];
        $invoice = $_REQUEST['invoice'];
        $comments = $_REQUEST['message'];   
        $message_content = "Name: ".$name."\nAddress: ".$address."\nCity:\t".$city."\nPhone:\t".$phone."\nAlternate Phone:\t".$altphone."\nEmail:\t".$email."\nType of Service:\t".$type_of_service."\nType of Work:\t".$type_of_work."\nRefferal:\t".$refferal."\nPayment Type:\t".$payment."\nInvoice:\t".$invoice."\nQuestions/Comments:\t".$comments;
        $message = new Message();
        $message->setSender("djrobotfreak@gmail.com");
        $message->addTo("texomalawncare@gmail.com");
        //$message->addTo("derek.wene@gmail.com");
        $message->setSubject("TEXOMA WEBSITE CONTACT: ".$name);
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
    <label for='city' class='control-label'>City*:</label> <input type='text' name='city' class='form-control'>
    <label for='phone' class='control-label'>Telephone*:</label> <input type='text' name='phone' class='form-control'>
    <label for='altphone' class='control-label'>Alternate Telephone:</label> <input type='text' name='altphone' class='form-control'>
    <label for='email' class='control-label'>Email*:</label> <input type='email' name='email' class='form-control'>
    <label for='typeservice' class='control-label'>Type of Service:</label> 
    <select class='form-control' name='typeservice'>
        <option>Weekly</option>
        <option>Bi-Weekly</option>
        <option>One Time</option>
    </select>
    
    <label for='typework' class='control-label'>How did you hear about us?:</label> 
    <select class='form-control' name='typework'>
        <option>Reffered</option>
        <option>Facebook</option>
        <option>Flyer</option>
        <option>Other</option>
    </select>
    
    <label for='refferal' class='control-label'>Reffered by Someone?:</label> <input type='text' name='refferal' class='form-control'>
    <label for='payment' class='control-label'>Method of Payment:</label> 
    <select class='form-control' name='payment'>
        <option>Cash</option>
        <option>Credit/Debit Card</option>
        <option>Check</option>
    </select>
    
    <label for='invoice' class='control-label'>Invoice Preference:</label> 
    <select class='form-control' name='invoice'>
        <option>Email</option>
        <option>Standard Postal Service</option>
    </select>
    
	<label for='message' class='control-label'>Comments or Questions:</label> <textarea name='message' id='content' class='form-control' rows='10'></textarea>
    <p>By clicking Submit you agree to all terms listed in the 'Things to Know' section</p><br>
    <button type='submit' class='btn btn-default'>Submit</button>
    </form>
    ";
  }
?>