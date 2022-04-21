<?php
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
echo $url;
?>
<script>
console.log(window.location.href)
</script>
<?php
if (strpos($url,'car') !== false) {
    echo 'Car exists.';
} else {
    echo 'No cars.';
}
echo "<pre>".print_r($GLOBALS,true)."</pre>";
if (isset($_REQUEST["SignUp"])) {
	$Form = $_REQUEST["SignUp"];
	if (file_exists($Form["UserName"])) {
		define("Form",$Form["UserName"]);
		// account exists
		include $Form["UserName"]."/User_Data.php";

		if($Form["Email"] != $Email or $Form["Password"] != $password) {
			echo "<script>"."alert('Incorrect Email Or Password')"."</script>";
		} 

		if($password != $Form["Password"] or $password != $Form["PasswordR"]) {
			echo "<script>"."alert('Password Incorrect')"."</script>";
		} else {
			setcookie("UserID", $Form["UserName"], 0, "/");
			echo "<script>"."window.location.href = ('https://mail.magma-mc.net')"."</script>";
		}
	} else {
		// new account
		if($Form["Password"] != $Form["PasswordR"] and $Form["Email"] != $Email) {
			echo "<script>"."alert('Password or Email Does not match')"."</script>";
		} else {

			mkdir($Form["UserName"], 0777, true);
			$Account = fopen($Form["UserName"]."/" . "User_Data" . ".php", "w");

			$Email = "\$Email = '" . $Form["Email"] . "';";
			$password = "\$password = '" . $Form["Password"] . "';";

			fwrite($Account, "<?php\n");
			fwrite($Account, $Email."\n");
			fwrite($Account, $password."\n");
			fwrite($Account, "\n?>");

			fclose($Account);
			setcookie("UserID", $Form["UserName"], 0, "/");
			echo "<script>"."window.location.href = ('https://mail.magma-mc.net')"."</script>";
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
      <p>Please fill in this form to create an account. or <a href="?#=a">SignIn</a></p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="SignUp[Email]" required>

      <label for="UserName"><b>UserName</b></label>
      <input type="UserName" placeholder="Enter Username" name="SignUp[UserName]" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="SignUp[Password]" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="SignUp[PasswordR]" required>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <button type="button" onclick="back()" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </form>
</div>


</body>
</html>
