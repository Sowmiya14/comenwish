<?php

if(isset($_POST) && isset($_POST['email']))
{
        $to = 'nn65606@gmail.com';
        $from = $_POST['email'];
        $subject = "Comenwish Enquiry";




        $htmlcontent = "<br><br>";
        $htmlcontent .= "Name : ".$_POST['name']."<br><br>";

        $htmlcontent .= "Email :".$_POST['email']."<br><br>";

        $htmlcontent .= "Subject :".$_POST['subject']."<br><br>";


        $htmlcontent .= "Message :".$_POST['message']."<br><br>";

        $htmlcontent .= "Regards <br>";

        $message = $htmlcontent;

        // To send HTML mail, the Content-type header must be set

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();


        if(mail($to, $subject, $message, $headers))
            echo 1;
        else
            echo 0;
    }
?>