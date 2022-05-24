<?php
require '../../mail.ini.php';
include $_SERVER['DOCUMENT_ROOT']."/Version.php";
?>

<html lang="en">
<head>
	<link rel="stylesheet"href="colour.css">
	<script src="https://unpkg.com/@highlightjs/cdn-assets@11.5.1/highlight.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
	<script src="commentcode.js"></script>
	<script>hljs.highlightAll();</script>
<?php 
SetHeader($Version);
?>
<body>
<pre>
<code class="e">
%SUBJECT // Form Name
%FORM_EMAIL // User Email Submitted
%ADMIN_EMAIL // Email of the administrator that the Form Will Be Send To
%TIME[HR] 
%TIME[MIN] 
%TIME[SEC] 
%TIME 
%DATE[Y] 
%DATE[M] 
%DATE[D] 
%DATE 


</code>
</pre>
</body>
</html>