<?php
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
echo $url;
?>
<script>
console.log(window.location.href)
</script>
<?php
if (isset($_REQUEST["SignUp"])) {
	if ($_REQUEST["Login"] == "true") {
		// Login
		$Form = $_REQUEST["SignUp"];
		if (file_exists($Form["UserName"])) {
			include $Form["UserName"]."/User_Data.php";
			if (password_verify($Form["Password"], $password)) {
				setcookie("UserID", $Form["UserName"], 0, "/");
				echo "<script>alert('Logined in')</script>";
			} else {
				echo "<script>alert('login wronge password')</script>";
			}
		} else {
			echo "<script>alert('login account not exist')</script>";

		}
	} else {
		// Sign Up
		$Form = $_REQUEST["SignUp"];
		if (!file_exists($Form["UserName"])) {
			if ($Form["Password"] == $Form["PasswordR"]) {
				// Password Same
				mkdir($Form["UserName"], 0777, true);
				$Account = fopen($Form["UserName"]."/" . "User_Data" . ".php", "w");

				$Email = "\$Email = '" . $Form["Email"] . "';";
				$password = "\$password = '" . password_hash($Form["Password"], PASSWORD_DEFAULT) . "';";

				fwrite($Account, "<?php\n");
				fwrite($Account, $Email."\n");
				fwrite($Account, $password."\n");
				fwrite($Account, "\n?>");

				fclose($Account);
				setcookie("UserID", $Form["UserName"], 0, "/");
				echo "<script>alert('account done')</script>";
			} else {
				echo "<script>alert('Password Does not Match')</script>";
			}
		} else {
			echo "<script>alert('Acount allready exists')</script>";

		}
	}
}
?>

<!DOCTYPE html>
<html>
	<!-- page css, js, Meta data -->
      <meta charset="UTF-8">
      <meta property="og:title" content="HTML Form Emailer" />
      <meta property="title" content="HTML Form Emailer" />
      <meta property="og:type" content="website" />
			<meta property="Version" content="<?php echo $Version;?>" />
      <meta property="og:description" content="HTML Form Emailer - Sign Up" />
      <meta name="description" content="HTML Form Emailer - Sign Up" />
			<meta name="description" content="mail.magma-mc.net - Sign Up">
      <meta name="og:image" content="/favicon.png">
      <meta name="theme-color" content="#F1C40F">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <link rel="shortcut icon" type="image/png" href="/favicon.png">
      <title>SignUp</title>
	<!-- Page Imports End -->
<head>
	<link rel="stylesheet" href="https://mail.magma-mc.net/0.0.7/css/SignUp.css">
		<script src="https://mail.magma-mc.net/0.0.7/js/main.js"></script>
	</head>
<body>
<button onclick="document.getElementById('SignUp_page').style.display='block'" style="width:auto;">Sign Up</button>
<div id="SignUp_page" class="modal">
  <span onclick="back()" class="close" title="Close">&times;</span>
  <form class="modal-content">
    <div class="container">
      <h1>Sign Up</h1>
	  <?php
		if ($_REQUEST["Login"] != "true") {
			?>
    		<p>Please fill in this form to create an account. or <a href="?Login=true">SignIn</a></p>
			<?php
		} else {
			?>
    		<p>Please fill in this form to Login. or <a href="?Login=false">SignUp</a></p>
			<?php
		}
		?>
      <hr>
	  <?php
		if ($_REQUEST["Login"] != "true") {
			?>
			<label for="email"><b>Email</b></label>
			<input type="email" placeholder="Enter Email" name="SignUp[Email]" required>
			<?php
		}
		?>
      

      <label for="UserName"><b>UserName</b></label>
      <input type="UserName" placeholder="Enter Username" name="SignUp[UserName]" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="SignUp[Password]" required>

		<?php
	  	if ($_REQUEST["Login"] != "true") {
			?>
			<label for="psw-repeat"><b>Repeat Password</b></label>
     		<input type="password" placeholder="Repeat Password" name="SignUp[PasswordR]" required>
			<?php
		} else {
			?>
     		<input type="hidden" placeholder="Repeat Password" name="Login" value="true">
			<?php
		}
	  ?>


      <button type="button" onclick="back()" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </form>
</div>


</body>
</html>
