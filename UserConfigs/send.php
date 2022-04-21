<?php

if (isset($_COOKIE["UserID"]) and isset($_REQUEST["FileName"])) {
	if (!file_exists($_COOKIE["UserID"])) {
    mkdir($_COOKIE["UserID"], 0777, true);
	}

	$UserConfig = 
		fopen($_COOKIE["UserID"].
		"/" .
		str_replace( "\\", "", $_REQUEST["FileName"] ) .
		".php", "w");

	$Form__Subject = 
		"\$Form__Subject = \"" .
		str_replace( "\\", "", $_REQUEST["Subject"] ) .
		"\";";

	$Form__Admin_Email =
		"\$Form__Admin_Email = \"" . 
		str_replace( "\\", "", $_REQUEST["Admin_Email"] ) . 
		"\";";

	$Form__Reply = 
		"\$Form__Reply = \"" . 
		str_replace( "\\", "", $_REQUEST["Reply"] ) . 
		"\";";

	$Form__Reply_Message = 
		"\$Reply_Message = \"" . 
		str_replace( "\\", "", $_REQUEST["Reply_Message"] ) . 
		"\";";

	$Form__Print_Form = 
		"\$Form__Print_Form = \"" .
		str_replace( "\\", "", $_REQUEST["Print_Form"] ) . 
		"\";";

	$Form__Redirect = 
		"\$Form__Redirect = \"" . 
		str_replace( "\\", "", $_REQUEST["Redirect"] ) . 
		"\";";


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
	echo "<script>window.location.href = 'http://" . $_SERVER["HTTP_HOST"] . "'</script>";
}else {
	?>
	{'Status': '405'}
	<?php
}


?>