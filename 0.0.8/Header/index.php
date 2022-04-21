<?php
include $_SERVER['DOCUMENT_ROOT']."/Version.php";

?>

<head>
		<!-- page css, js, Meta data -->
        <meta charset="UTF-8">
        <meta property="og:title" content="HTML Form Emailer" />
        <meta property="title" content="HTML Form Emailer" />
        <meta property="og:type" content="website" />
				<meta property="Version" content="<?php echo $Version;?>" />
        <meta property="og:description" content="HTML Form Emailer For Public Use - by SMLkaiellis08" />
        <meta name="description" content="HTML Form Emailer For Public Use - by SMLkaiellis08" />
		<link rel='stylesheet' type='text/css' href='/<?php echo $Version;?>/css/main.css'>
		<link rel='stylesheet' type='text/css' href='/<?php echo $Version;?>/css/php.css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="/<?php echo $Version;?>/js/main.js"></script>
        <meta name="description" content="mail.magma-mc.net - PHP mailer for public use.">
        <meta name="og:image" content="/favicon.png">
        <meta name="theme-color" content="#F1C40F">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="shortcut icon" type="image/png" href="/favicon.png">
        <title>HTML Form Emailer</title>
		<!-- Page Imports End -->
</head>
<br>
<span class="dropdown, top" onmouseover="navblock()" onmouseout="navnone()"><a href="/">Menu -<a>
	<a class="navtag keep" href="/">Home</a>

	<span class="dd-content" style="display: none; box-shadow: rgb(136, 136, 136) 0px 4px 4px -4px, rgb(136, 136, 136) -4px 0px 4px -4px;">

	<a href="/"><i class="fa fa-home"></i> Home</a>
	<br>
	<a>----</a>
	<br>

	<a href="/UserConfigs/index.php"><i class="fa fa-folder"></i> Form Manager</a>
	<br>

	<a href="/<?php echo $_SERVER['Version']?>/Settings/index.php"><i class="fa fa-align-left"></i> Form Editor</a>
	<br>

	<a href="/<?php echo $_SERVER['Version']?>/Test/index.php"><i class="fa fa-info"></i> Template</a>
	<br>
	
	<a href="/<?php echo $_SERVER['Version']?>/Help/index.php"><i class="fa fa-info"></i> Help</a>
	<br>
		<?php if($_COOKIE["UserID"] == null) {
		?>
	<a href="https://mail.magma-mc.net/UserConfigs/SignUp.php"><i class="fa fa-info"></i> SignUp</a>
	<br>
<?php }?>
	</span>
</span>
