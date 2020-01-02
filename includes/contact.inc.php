<?php

	if(isset($_POST['submit'])){
		require ('PHPMailerAutoload.php');
		require('PHPMailer/class.phpmailer.php');
		require('PHPMailer/class.smtp.php');
		
		$name=$_POST['name'];
		$mailFrom=$_POST['mail'];
		$phone=$_POST['phone'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$place=$_POST['place'];
		$nrpeople=$_POST['nrpeople'];
		$description=$_POST['description'];
		
		$subject="VolunTimi";
		$mailTo="ashley.m.hurrelbrink@gmail.com";
		$txt="You have recieved an email from ".$name.".\n\n"
           ."Phone:".$phone.".\n\n"
		    ."Date:".$date.".\n\n"
			 ."Time:".$time.".\n\n"
			  ."Place:".$place.".\n\n"
			   ."Number of people:".$nrpeople.".\n\n"
			    ."Message:"."\n".$description."\n\n"."From:".$mailFrom;
		
		$mail->new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='ssl';
		$mail->Host='smtp.gmail.com';
		$mail->Port='465';
		$mail->isHTML();
		$mail->Username='ashley.m.hurrelbrink@gmail.com';
		$mail->Password='19zipicup98';
		$mail->SetFrom($mailFrom);
		$mail->Subject=$subject;
		$mail->Body=$txt;
		$mail->AddAddress('ahurrelbrink98@yahoo.com');
		
		
		if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                //echo 'Message has been sent';
                $smsg = 'Confirmation email sent to ' . $email;
            }
    }
		
		
		header("Location: contact.php?mailsend");
	}