<?php
include($_SERVER["DOCUMENT_ROOT"]."/Version.php");
include($_SERVER["DOCUMENT_ROOT"]."/$Version/Header/index.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HTML Form</title>
		<link rel='stylesheet' type='text/css' href="//<?php echo $_SERVER['HTTP_HOST']?>/<?php echo $Version; ?>/css/main.css">
		<link rel='stylesheet' type='text/css' href="//<?php echo $_SERVER['HTTP_HOST']?>/<?php echo $Version; ?>/css/php.css">
    </head>
    <body>
		<div id="header">
			<h1>HTML Form Template</h1>
			</br>
		</div>
        <form action="//<?php echo $_SERVER['HTTP_HOST']; ?>" method="POST">
            <div class="input-holder">
                <input class="input" name="Form[Email]" id="Email" type="email" value="" placeholder="email">
            </div>

            <div class="input-holder">
                <input class="input" name="Form[Message]" id="message" type="text" value="" placeholder="Message">
            </div>

			<input name="EmailService[ID]" type="hidden" value="_BASE_/Test_MailService">
			</br>

            <button class="button" type="submit">Sumbit</button>
        </form>
    </body>
</html>