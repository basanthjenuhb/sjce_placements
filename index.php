<?php
	require_once 'config.php';
	include 'login.php';
	if(isset($_SESSION['login_user']))
		header("Location:account.php");
	if(isset($_SESSION['admin']))
		header("Location:admin/index.php");
?>

<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<META NAME="keywords" CONTENT="Sjce,Sjceplacements,sjce placements,sjce mysore,Sri Jayachamarajendra College Of Engineering,new website sjce placements">
	<title>SJCE</title>
	<link rel="stylesheet" href="styles/main1.css">
	<style type="text/css">
		footer
		{
			margin-left: -200px;
		}
	</style>
</head>
<body>
	<div id="bigwrapper">
		<header id="header_">
			<p><h1>JSS Mahavidyapeetha</h1></p>
			<p><h1>Sri Jayachamarajendra College of Engineering</h1></p>
			<p><h1>Placement and Training Cell</h1></p>
			<p><h3>Mysore</h3></p>
		</header><br>
		
		<section id="section_">			
			<div id="section_1">
			<h3>SJCE</h3>
			<p>Sri Jayachamarajendra College of Engineering was started as one in the galaxy of Technical Colleges in the year 1963 which was inaugurated by Dr.T.M.A.Pai, who was then the Chairman of The Academy of Education Manipal, Mysore State. It was initially commissioned as a totally private college under the auspices of the JSS Mahavidyapeetha with the inspiration of His Holiness Jagadguru Dr.Sri Sri Shivarathri Rajendra Mahaswamigalavaru of Suttur Math.</p>
			</div>
			<div id="section_2">
				<div id="section_21">
					<img src="images/key.jpg" height=80px width=70px/>
					<img src="images/login.jpg" id="space" height=80px width=200px/>
				</div>
				<div id="section_22">
					<form action="" method="post">
						<br>
						<?php 
							echo "<span id='error'>$error.<br></span>";
						?>
						Username:<br>
						<input type="text" name="username" maxlength="10"><br><br>
						Password:<br>
						<input type="password" name="password"><br><br>
						<input type="submit" value="  Login  ">
						<a href="forgot.php">Forgot password?</a>
					</form>
					<div id="section_221">
						<a href="signup.php"><img src="images/signup.png" height=100px width=200px></a>
					</div>
				</div>
			</div>
		</section>

		<footer id="footer_"><center>
			Developed under the guidance of &nbsp Dr. C N Ravikumar & Prof. Sheela N<br>
			Developed and Maintained by Basanth Jenu H B<br>
			Copyright &copy 2015 - All rights Reserved</center>
		</footer>
	</div>
</body>
</html>