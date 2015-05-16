<?php
require_once 'swiftmailer/lib/swift_required.php'; //Including the swiftmailer

ini_set('max_execution_time', 600);

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('danielzaru')
  ->setPassword('224247desh')
  ;
  // Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance($_POST["topic"])
  ->setFrom(array('danielzaru@gmail.com' => 'Daniil Zaru'))
  ->setTo(array($_POST["recipient"]))
  ->setBody($_POST["body"])
  ;
  
  $mailer->send($message);
?>