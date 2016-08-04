<?php
	require_once '../config.php';
	require_once 'session.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="../Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<link rel="stylesheet" href="../styles/adminc.css">
	<style type="text/css">
		section
		{
			width:1200px;
			margin-left:auto;
			margin-right:auto;
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
		<section id="section_">
			<nav id="nav_">
			<ul >
				<a href="index.php"><li>Home</li></a>
				<a href="company.php"><li>Company</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="search.php"><li>Search</li></a>
				<a href="password.php"><li>password</li></a>
				<a href="update.php"><li>update</li></a>
				<a href="blog.php"><li>Blog</li></a>
				<a href="logout.php"><li>Logout</li></a>
			</ul>
			</nav>
			<div id="heading1">
				<h1>WELCOME ADMIN</h1><br><hr>
			</div>
			<?php
			@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
			@mysql_select_db(DB_DATABASE) or die("Could not connect.");
			$uquery1=mysql_query("SELECT * FROM company WHERE date>=now() ORDER BY id DESC");
			if(!$uquery1)
				die("Could not Connect. Please try again later.");
			while($row=mysql_fetch_assoc($uquery1))
			{
				echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp &nbsp &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp &nbsp &nbsp &nbsp Cut off:(UG) {$row['ug']} (PG) {$row['pg']} &nbsp &nbsp &nbsp Category: {$row['type']} &nbsp &nbsp &nbsp Date: {$row['date']} </div><br><br><br><br> ";
			}
			?>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>