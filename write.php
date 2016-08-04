<?php
	require_once 'config.php';
	include 'session.php';
	include 'create.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<link rel="stylesheet" href="styles/blog.css">
	<style type="text/css">
		section
		{
			margin-left:auto;
			margin-right: auto;
		}
		#blogtext
		{
			min-height: 400px;
			height: auto;
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
		</header>
		<div id="inner">
		<section id="section_">
			<nav id="nav_">
			<ul >
				<a href="account.php"><li>Home</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="status.php"><li>your status</li></a>
				<a href="recruiters.html"><li>Recruiters</li></a>
				<a href="info.php"><li>profile</li></a>
				<a href="blog.php"><li>blog</li></a>
				<a href="faq.php"><li>FAQ</li></a>
				<a href="logout.php"><li>Logout</li></a>
			</ul>
		</nav>
		<div id="writeblog">
			<br><h3>WRITE YOUR STORY.....</h3><br><br>
			<?php echo $msg1.$msg2.'<br><br>' ?>
			<form id="form_" method="post" action="" >
				Title : <input type="text" name='title'><br><br>
				Story : <br><br><textarea name='contents' cols="50" id='blogtext'></textarea><br><br>
				<input type="submit" value="Submit" name="submit">
			</form>
		</div>
		</section>
		</div>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>