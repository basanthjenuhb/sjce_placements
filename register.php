<?php
	require_once 'config.php';
	include_once 'session.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<meta http-equiv="refresh" content="">
	<link rel="stylesheet" href="styles/account.css">
	<script type="text/javascript">
		function register(i)
		{			
			var xmlhttp;
			if(window.XMLHttpRequest)
			{
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState==4 && xmlhttp.status==200 )
				{
					document.getElementById('a_div').innerHTML=xmlhttp.responseText;
				}
			}
			var spot='cname['+i+"]";
			parameters="cname="+document.getElementById(spot).value;
			xmlhttp.open('POST','setreg.php',true);
			xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
		}
	</script>

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
			<nav id="nav_">
			<ul >
				<a href="account.php"><li>Home</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="status.php"><li>your status</li></a>
				<a href="recruiters.php"><li>Recruiters</li></a>
				<a href="info.php"><li>profile</li></a>
				<a href="blog.php"><li>blog</li></a>
				<a href="faq.php"><li>FAQ</li></a>
				<a href="logout.php"><li>Logout</li></a>
			</ul>
		</nav>
		<div id='welcome_'>REGISTER<br><br><hr></div><br><br>

		<div id='a_div'><?php 	include_once 'list.php'; ?></div>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>