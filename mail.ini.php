<?php
include $_SERVER["DOCUMENT_ROOT"].'/Version.php';
$Version = $_SERVER["Version"];
$Form = $_SERVER["Form"];
$ES = $_SERVER["ES"];
$Form__Test = $_SERVER["Form__Test"];
$Form__ID = $_SERVER["Form__ID"];
$Email = $_SERVER["Email"];
$Form__Subject = $_SERVER["Form__Subject"];
$Form__Admin_Email = $_SERVER["Form__Admin_Email"];
$Form__Reply = $_SERVER["Form__Reply"];
$Form__Redirect = $_SERVER["Form__Redirect"];
$Form__Print_Form = $_SERVER["Form__Print_Form"];

//CONFIGURATION
$CONFIG_SENDFILENAME = false; // false: send file as an attachment, true: send file as a link
$CONFIG_EMAILNAME = "mail***magma-mc.net";
$CONFIG_NOREPLYNAME = "noreply***magma-mc.net";




// 




function IsUser() { 
return 
"<pre>Array
(
)
</pre>";
}
function SetHeader($Ver) {
	include($_SERVER['DOCUMENT_ROOT']."/".$Ver."/Header/index.php");;
}

function SetFooter($Ver) {
 echo '<br></br><a onclick="window.location.href = (`../`)" class="bed">©2020-2022 kaicycle, inc.</a>'.'<a class="bed2">PHP emailer Version ' . $Ver . ' -</a>';
}

function EmbedFrame($src, $height, $width) {
	return "<iframe src='$src' width='$width' height='$height'></iframe>";
}

function GetFile($file) {
	return file_get_contents($file);
}

function FormID($ID) {
	return (
"<pre>Array
(
    [ID] => $ID
)
</pre>");
}

function a() {
	echo str_replace("=>","</td><td>","Hello world!");
}


?>