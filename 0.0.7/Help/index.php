<?php
include($_SERVER["DOCUMENT_ROOT"]."/Version.php");
include($_SERVER["DOCUMENT_ROOT"]."/$Version/Header/index.php");
?>
<head>
	<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/atom-one-dark.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
	<script>hljs.highlightAll();</script>
</head>

    <body>
        <div id="content" class="center">
            <h2>HTML Form Template</h2>
            <!-- Textarea records tabs !-->
		</div>
    <div class="input-holder">
<pre>
<code class="language-html">
<textarea cols="130" rows="25" name="index.html" readonly>
<html lang="en">
	<head>
		<title>template</title>
	</head>
			
	<body>
		<form action="https://mail.magma-mc.net" method="POST">
			<div class="input-holder">
				<input class="input" name="Form[Email]" id="Email" type="email" value="" placeholder="email">
			</div>

			<div class="input-holder">
				<input class="input" name="Form[Message]" id="message" type="text" value="" placeholder="Message">
			</div>

			<div id="ES">
				<input name="EmailService[ID]" type="hidden" value="ID/FILENAME"> <!-- Eg bfaldo5Pgr/Test_MailService-->
			</div>
			<button class="button" type="submit">Sumbit</button>
		</form>
	</body>
</html>
</textarea>
</code>
</pre>
    </div>
</body>
</html>