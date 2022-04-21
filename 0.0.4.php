
<?php

$v = $_POST['Form'];
$Email = $v['Email'];
$subject = $v["subject"];
$to = $v['Admin_Email'];
$reply = $v['Reply'];
$message = $v['Message'];
$redirect = $v['Redirect'];
 $path = 'Uploads/Public/' . $_FILES["file"]["name"];
 move_uploaded_file($_FILES["file"]["tmp_name"], $path);
$Version = "0.0.4";
/**
  HTML page css
  HTML page Imports
  HTML page Meta
 */
echo file_get_contents("Assets/0.0.4/header.html");
error_log("\n\nPHP Mailer \nVersion: " . $Version . "\n");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'mail.ini.php';
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
$mail->setFrom('Mailer@mail.magma-mc.net', 'Mail.magma-mc.net');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($to, '');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->MsgHTML($message);
//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->IsHTML(true);
	//
$mail->AddAttachment($path);

	if ($path !== "Uploads/Public") {
		$File = "true";
	} else {
		$File = "false";
	}

	if ($reply) {
		$Reply = "true";
	} else {
		$Reply ="false";
	}

if (!$mail->send()) {
			echo "<html lang='en'>";
				echo "<body>";
					echo "<div id='content'>";
						echo "<h3 class='center'>Help setting up mailer on your website?</h3>"; 
						echo "<button class='button' onclick='window.location.href = `/Assets/html/help.html`'>Help</button>";
						echo file_get_contents("Assets/0.0.4/Php_help.html");
						echo "<br>";
						echo "<h2 class='center'>Mail Error:</h2> <p>" . $mail->ErrorInfo . "</p>";
						echo "<h2>Options</h2>";
						echo "<p>PHP Mailer Version: " . $Version . "</p>";
						echo "<p>reply to user: " . $Reply . "</p>";
						echo "<p>Subject: " . $subject . "</p>";
						echo "<p>File Upload: " . $File . "</p>";
					echo "</div>";
			echo "</body>";
			echo file_get_contents("Assets/html/CopyRight.co");
		echo "</html>";
} else {
		echo "<html lang='en'>";
			echo "<body>";
				echo "<div class='center' id='content'>";
					echo "<h1>Mail successfully Sent</h1>";
					echo "<h2>Options</h2>";
					echo "<p>PHP Mailer Version: " . $Version . "</p>";
					echo "<p>reply to user: " . $Reply . "</p>";
					echo "<p>Subject: " . $subject . "</p>";
					echo "<p>File Upload: " . $File . "</p>";
					echo "</div>";
			echo "</body>";
			echo file_get_contents("Assets/html/CopyRight.co");
		echo "</html>";

			if ($reply == "true") {
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
							echo "window.location.href = '" . $redirect . "';";
	}