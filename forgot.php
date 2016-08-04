<?php
	require_once 'config.php';
	include 'resetpass.php';
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
						<p><h3>Forgot password ?</h3></p>
						<p>Its ok....</p><hr><br>
						<?php echo "<span id='error'>$error1</span>" ?>
						USN:<br><input type="text" name="usn" maxlength="10">
						<?php echo "<span id='error'>$error2</span>" ?><br>
						<br>
						<input type="submit" value="  Submit  ">
						<?php echo "<span id='success'><br>$success<br></span>" ?>
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