<?php
	session_start();
	require_once 'config.php';
	include 'signuptest.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<link rel="stylesheet" href="styles/mainsignup.css">
	<style type="text/css">
	</style>
</head>
<body>
	<div id="bigwrapper">
		<header id="header_">
			<p><h1>JSS Mahavidyapeetha</h1></p>
			<p><h1>Sri Jayachamarajendra College of Engineering</h1></p>
			<p><h1>Placement and Training Cell</h1></p>
			<p><h3>Mysore</h3></p>
		</header>
		
		<section id="section_">
					<form action="" method="post" id="signupform">
						<br>
						<p><h3>Sign up!</h3></p>
						<p>Its free....</p><hr><br>
						<?php echo "<span id='error'>$error1</span>" ?>
						USN:<br><input type="text" name="usn" maxlength="10">
						<?php echo "<span id='error'>$error2</span>" ?><br>
						Password:<br><input type="password" name="password"><br>
						Confirm Password:<br><input type="password" name="cpassword"><br>
						<br>
						<input type="submit" value="  Submit  ">
						<?php echo "<span id='success'><br>$success<br></span>" ?>
						<?php
							if(isset($_SESSION['message']))
							{
								echo "<span id='success'><br>".$_SESSION['message']."<br></span>";
								unset($_SESSION['message']);
							}
						?>
					</form>
					<div id="section_221">
						<img src="images/signup.png" height=100px width=220px>
					</div>
					<div id="section_222"><img src="images/pic2.jpeg" height="400px"></div>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>