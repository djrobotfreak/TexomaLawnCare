<?php
require_once 'google/appengine/api/mail/Message.php';
use \google\appengine\api\mail\Message;
//if "email" is filled out, send email
if (isset($_POST['email']))
//if "email" is filled out, send email
{
    try
    {
      //send email
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $altphone = $_POST['altphone'];
        $email = $_POST['email'];
        $type_of_service = $_POST['typeservice'];
        $type_of_work = $_POST['typework'];
        $refferal = $_POST['referral'];
        $payment = $_POST['payment'];
        $invoice = $_POST['invoice'];
        $comments = $_POST['message'];   
        $message_content = "Name: ".$name."\nAddress: ".$address."\nCity:\t".$city."\nPhone:\t".$phone."\nAlternate Phone:\t".$altphone."\nEmail:\t".$email."\nType of Service:\t".$type_of_service."\nType of Work:\t".$type_of_work."\nRefferal:\t".$refferal."\nPayment Type:\t".$payment."\nInvoice:\t".$invoice."\nQuestions/Comments:\t".$comments;
        $message = new Message();
        $message->setSender("djrobotfreak@gmail.com");
        $message->addTo("texomalawncare@gmail.com");
        //$message->addTo("derek.wene@gmail.com");
        $message->setSubject("TEXOMA WEBSITE CONTACT: ".$name);
        $message->setTextBody($message_content);
        $message->send();
        echo '<a href="/">Thank you, your message has been sent. Please click this message to return to the Texoma Website</a>';
        } catch (InvalidArgumentException $e) {
      // ... 
          echo '<a href="/">ERROR: EMAIL NOT SENT. Please click this message to return to the Texoma Website to try again. </a> <br>';
          echo $e;
    }
}
else
//if "email" is not filled out, display the form
  {
  echo '
  
    <p>Something weird happened.</p> <script> setTimeout(function(){ window.location.replace("/"); }, 5000);</script>
    ';
  }
?>