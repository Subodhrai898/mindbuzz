<?php
$to = $email;
$subject = "Password for Mindbuzz";
$txt = "This is your last step for registration with your rollno".$rollno."and password ".$pass;
$headers = "From: innovationcell@mmmut.ac.in" . "\r\n";

mail($to,$subject,$txt,$headers);

?>