<?php
require_once( '../../../../wp-load.php' );
$todayis = date("l, F j, Y, g:i a") ;

$name=$_POST["name"];
echo($name);
$subject = "A question from ".$name;

$notes = stripcslashes($_POST["question"]);

$message = " $todayis [EST] \n

Question: $notes \n

";

$from = "From: ".$_POST["email"];

$emailToSend=get_opt('_email');
mail($emailToSend, $subject, $message, $from);

?>
