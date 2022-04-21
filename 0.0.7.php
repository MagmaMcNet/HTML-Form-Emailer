<?php
$msg = "<pre>".print_r($_POST, true)."</pre>";
$Form = $_REQUEST['Form'];
$ES = $_REQUEST['EmailService'];
$Form__Test = $ES["Test"];
$Form__ID = $ES["ID"];
$Email = $Form['Email'];
$Form__Subject = $Form["subject"];
$Form__Admin_Email = $Form['Admin_Email'];
$Form__Reply = $Form['Reply'];
$Form__Redirect = $Form['Redirect'];
$Form__Print_Form = $Form["Print"];
$File = $_FILES["Form"]["File"];
$File_Uploaded = 'Uploads/Public/' . $File["name"];
move_uploaded_file($File["tmp_name"], $File_Uploaded);
/*
  HTML page css
  HTML page Imports
  HTML page Meta
*/

$_SERVER["Form"] = $Form;
$_SERVER["ES"] = $ES;
$_SERVER["Form__Test"] = $Form__Test;
$_SERVER["Form__ID"] = $Form__ID;
$_SERVER["Email"] = $Email;
$_SERVER["Form__Subject"] = $Form__Subject;
$_SERVER["Form__Admin_Email"] = $Form__Admin_Email;
$_SERVER["Form__Reply"] = $Form__Reply;
$_SERVER["Form__Redirect"] = $Form__Redirect;
$_SERVER["Form__Print_Form"] = $Form__Print_Form;

error_log("\n\nPHP Mailer \nVersion: " . $Version . "\n");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'Exception.php';
include 'PHPMailer.php';
include 'SMTP.php';
include 'Gmail.ini.php';
include 'mail.ini.php';
include 'Version.php';
SetHeader($Version);

//
?>



<?php


//
echo '<link rel="stylesheet" href="https://mail.magma-mc.net/0.0.7/css/table.css">';
echo "<table id='table'>";
    echo "<thead>";
    	echo "<tr>";
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Value</th>';
      echo "</tr>";
    echo "</thead>";

$arrays = array();
$items = $_REQUEST['Form'];
		foreach ($items as $key => $value){
				echo "<tbody>";
        echo '<th scope="col" class="btn-secondary">'. $key ."</th>";
				echo '<th scope="col" class="btn-discord">'. $value ."</th>";
				echo "</tbody>";
				$arrays[$key] = $value;
	}
echo "</table>";
echo print_r($arrays,true);
$styles2 = 
"<link rel='stylesheet' type='text/css' href='https://mail.magma-mc.net/0.0.7/css/php.css'>"
.
"<link rel='stylesheet' type='text/css' href='https://mail.magma-mc.net/0.0.7/css/table.css'>";

$styles = "

";
//

echo '<script>';
echo 'Cookies.set("Table","<table>"+document.getElementById("table").innerHTML+"</table>")';

echo '</script>';


$msg = print_r($_COOKIE["Table"], true);

if ($_FILES["Form"]["file"]["name"] == null) {

}

if ($Form__ID != null) {
include "UserConfigs/".$Form__ID.".php";
}

if ($Form__Test == 'true') {
	$Form__Admin_Email = $Email;
}
if ($Form__Print_Form == 'true') {
	echo "<div id='Value'>";
		echo "<pre>";
			echo print_r($_REQUEST);
		echo "</pre>";
	echo "</div>";
} else {
	$Form__Print_Form = 'false';
}

if ($Form__Reply != "true") {$Form__Reply = "false";}
if (!$Form__Subject) {$Form__Subject = "Null";}

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
$mail->addAddress($Form__Admin_Email, '');
//Set the subject line
$mail->Subject = $Form__Subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
error_log(FormID("$Form__ID"));
error_log($msg);
if ($msg != IsUser() and $msg != FormID("$Form__ID") and $_REQUEST["A"] != "aB") {
	$mail->MsgHTML(print_r($styles2, true).$msg);
}
//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->IsHTML();
	//
?>

<?php
	if ($File_Uploaded !== "Uploads/Public/") {
		$File = "true";
		$mail->AddAttachment($File_Uploaded);
	} else {
		$File = "false";
	}

if (!$mail->send()) {
	?>
			<html lang='en'>
				<body>
					<div class='center' id='content'>
					<?php
						if (print_r($Form,true) != null) {
							echo "<h2 class='center'>Mail Error:</h2>";
							echo "<p>";
								echo $mail->ErrorInfo;
							echo "</p>";
							} else {
								echo "<h1>Easy HTML Email Form</h1>";
								echo "<br></br>";
								
								//echo "<h3 class='center'>Help setting up mailer on your website?</h3>";
								//echo EmbedFrame("/$Version/Help/index.php", "550px", "1350px");
							}?>
					</div>
					<div><?php
						echo "<h2>Options</h2>";
						echo "<p>PHP Mailer Version: $Version </p>";
						echo "<p>Reply To User: $Form__Reply </p>";
						echo "<p>Subject: $Form__Subject </p>";
						echo "<p>File Upload: $File </p>";
						echo "<p>Print Post: $Form__Print_Form </p>";
					echo "</div>";
			echo "</body>";
		echo "</html>";
} else {?>
		<html lang='en'>
			<body>
				<div class='center' id='content'>
					<h1>Mail successfully Sent</h1>
				</div>
					<div>
						<h2>Options</h2><?php
						echo "<p>PHP Mailer Version: " . $Version . "</p>";
						echo "<p>Reply To User: " . $Form__Reply . "</p>";
						echo "<p>Subject: " . $Form__Subject . "</p>";
						echo "<p>File Upload: " . $File . "</p>";
						echo "<p>Print Post: " . $Form__Print_Form . "</p>";?>
					</div>
			</body><?php
		echo "</html>";

			if ($Form__Reply == "true") {
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

				$mail->Subject = $Form__Subject;

				$mail->MsgHTML("Your " . $Form__Subject . " Form submition. Will be read soon please wait.");

				$mail->send();
				}
	}
	setFooter($Version);
if ($Form__Redirect != null) {
	echo "<script>window.location.href = '" . $Form__Redirect . "'</script>";
}