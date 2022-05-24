<?php
require '../../mail.ini.php';
include $_SERVER['DOCUMENT_ROOT']."/Version.php";
?>

<html lang="en">
<?php 
SetHeader($Version);
?>
<title>Form Manager Settings</title>
    <body>
			<div id="header">
				<h1>Form Manager Settings</h1>
				</br>
			</div>
        <form action="//<?php echo $_SERVER['HTTP_HOST']?>/UserConfigs/send.php" method="GET">
				
            <div class="input-holder">
                <input class="input" name="FileName" id="FileName" type="text" value="" placeholder="FormName" required>
            </div>
						</br>

            <div class="input-holder">
                <input class="input" name="Subject" id="Subject" type="text" value="" placeholder="Subject" required>
            </div>
						</br>

            <div class="input-holder">
                <input class="input" name="Admin_Email" id="Email" type="email" value="" placeholder="Admin Email" required>
            </div>
						</br>
						
						<div class="input-holder">
                <input class="input" name="Reply" id="Reply" type="text" value="" placeholder="Reply 'true/false'" required>
            </div>
						</br>

            <input class="button" type="button" onclick="wlh('Reply.php')" value="More Reply Variables">
						<div class="input-holder">
                <input class="input" name="Reply_Message" id="Reply_Message" type="text" value="" placeholder="Reply Message 'Eg. Hello %FORM_EMAIL your %SUBJECT Form submition. Will be read soon please wait.'" required>
            </div>
						</br>

            <div class="input-holder">
                <input class="input" name="Print_Form" id="Print" type="text" value="" placeholder="Print Form 'true/false'" required>
            </div>
						</br>
						
            <div class="input-holder">
                <input class="input" name="Form__Redirect" id="Redirect" type="url" value="" placeholder="Redirect">
            </div>
						</br>

						</br>
            <button class="button" type="submit">Sumbit</button>
        </form>
            <button onclick="wlh('https://mail.magma-mc.net/UserConfigs/')" class="other-button">Back</button>
						<?php SetFooter($Version);?>
    </body>
</html>