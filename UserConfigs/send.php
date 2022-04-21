<?php

if (isset($_COOKIE["UserID"]) and isset($_REQUEST["FileName"])) {
	if (!file_exists($_COOKIE["UserID"])) {
    mkdir($_COOKIE["UserID"], 0777, true);
	}
	$UserConfig = fopen($_COOKIE["UserID"]."/".$_REQUEST["FileName"].".php", "w");
	$Form__Subject = "\$Form__Subject = '" . $_REQUEST["Subject"] . "';";
	$Form__Admin_Email = "\$Form__Admin_Email = '" . $_REQUEST["Admin_Email"] . "';";
	$Form__Reply = "\$Form__Reply = '" . $_REQUEST["Reply"] . "';";
	$Form__Reply_Message = "\$Reply_Message = '" . $_REQUEST["Reply_Message"] . "';";
	$Form__Print_Form = "\$Form__Print_Form = '" . $_REQUEST["Print_Form"] . "';";
	$Form__Redirect = "\$Form__Redirect = '" . $_REQUEST["Redirect"] . "';";

	fwrite($UserConfig, "<?php\n");
	fwrite($UserConfig, $Form__Subject."\n");
	fwrite($UserConfig, $Form__Admin_Email."\n");
	fwrite($UserConfig, $Form__Reply."\n");
	fwrite($UserConfig, $Form__Reply_Message."\n");
	fwrite($UserConfig, $Form__Print_Form."\n");
	fwrite($UserConfig, $Form__Redirect."\n");
	fwrite($UserConfig, "\n?>");
	fclose($UserConfig);
	?>
	{'Status': '200'}
	<?php
	echo "<script>window.location.href = '" . "https://mail.magma-mc.net" . "'</script>";
}else {
	?>
	{'Status': '405'}
	<?php
}


?>