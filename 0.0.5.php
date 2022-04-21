<?php
$msg = "<pre>".print_r($_POST, true)."</pre>";
$v = $_POST['Form'];
$Email = $v['Email'];
$subject = $v["subject"];
$to = $v['Admin_Email'];
$Reply = $v['Reply'];
$message = $v['Message'];
$redirect = $v['Redirect'];
$path = 'Uploads/Public/' . $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], $path);
$Version = "0.0.5";
if ($v["Test"] == "True") {
	$to = $Email;
}
if ($v["Print"] == "true") {
	echo "<div id='Value'>";
		echo "<pre>";
			echo print_r($_POST);
		echo "</pre>";
	echo "</div>";
} else {
	$v["Print"] = "false";
}

if ($Reply != "true") {$Reply = "false";}
if (!$subject) {$subject = "Null";}

/**
  HTML page css
  HTML page Imports
  HTML page Meta
 */


error_log("\n\nPHP Mailer \nVersion: " . $Version . "\n");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'Gmail.ini.php';
require 'mail.ini.php';

SetHeader("$Version");

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $User1;
//Password to use for SMTP authentication
$mail->Password = $Pass1;
//Set who the message is to be sent from
$mail->setFrom('mail@magma-mc.net', 'mail.magma-mc.net');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($to, '');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->MsgHTML($msg);
//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->IsHTML();
	//


	if ($path !== "Uploads/Public/") {
		$File = "true";
		$mail->AddAttachment($path);
	} else {
		$File = "false";
	}

if (!$mail->send()) {
			echo "<html lang='en'>";
				echo "<body>";
					echo "<div class='center' id='content'>";
						echo "<br>";
						if (print_r($v,true) != $IsUser) {
							echo "<h2 class='center'>Mail Error:</h2>";
							echo "<p>";
								echo $mail->ErrorInfo;
							echo "</p>";
							} else {
								echo "<h1>Easy HTML Email Form</h1>";
								echo "<br></br>";
								echo "<h3 class='center'>Help setting up mailer on your website?</h3>";
								echo EmbedFrame("/Assets/html/help.html", "550px", "1350px");
								
							}
					echo "</div>";
					echo "<div>";
						echo "<h2>Options</h2>";
						echo "<p>PHP Mailer Version: " . $Version . "</p>";
						echo "<p>reply to user: " . $Reply . "</p>";
						echo "<p>Subject: " . $subject . "</p>";
						echo "<p>File Upload: " . $File . "</p>";
						echo "<p>Print Post: " . $v['Print'] . "</p>";
					echo "</div>";
			echo "</body>";
			echo GetFile("Assets/html/CopyRight.co");
		echo "</html>";
} else {
		echo "<html lang='en'>";
			echo "<body>";
				echo "<div class='center' id='content'>";
					echo "<h1>Mail successfully Sent</h1>";
				echo "</div>";
					echo "<div>";
						echo "<h2>Options</h2>";
						echo "<p>PHP Mailer Version: " . $Version . "</p>";
						echo "<p>reply to user: " . $Reply . "</p>";
						echo "<p>Subject: " . $subject . "</p>";
						echo "<p>File Upload: " . $File . "</p>";
						echo "<p>Print Post: " . $v['Print'] . "</p>";
					echo "</div>";
			echo "</body>";
			echo GetFile("Assets/html/CopyRight.co");
		echo "</html>";

			if ($Reply == "true") {
				$mail = new PHPMailer;
				//Tell PHPMailer to use SMTP
				$mail->isSMTP();

				$mail->SMTPDebug = 0;
				//Ask for HTML-friendly debug output
				$mail->Debugoutput = 'html';
				//Set the hostname of the mail server
				$mail->Host = 'smtp.gmail.com';

				$mail->Port = 587;
				//Set the encryption system to use - ssl (deprecated) or tls
				$mail->SMTPSecure = 'tls';
				//Whether to use SMTP authentication
				$mail->SMTPAuth = true;
				//Username to use for SMTP authentication - use full email address for gmail
				$mail->Username = $User1;
				//Password to use for SMTP authentication
				$mail->Password = $Pass1;
				//Set who the message is to be sent from
				$mail->setFrom('Mailer@mail.magma-mc.net', 'Mail.magma-mc.net');

				$mail->addAddress($Email, '');

				$mail->Subject = $subject;

				$mail->MsgHTML("Your " . $subject . " Form submition. Will be read soon please wait.");

				$mail->send();
				}
	}
if ($redirect != null) {
	echo "<script>window.location.href = '" . $redirect . "'</script>";
}