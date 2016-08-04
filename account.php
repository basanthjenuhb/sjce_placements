<?php
	require_once 'config.php';
	include 'session.php';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="Favicon.jpg" type="image/jpg">
	<title>SJCE</title>
	<link rel="stylesheet" href="styles/account.css">
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
		<?php
			echo "<div id='welcome_'>Welcome $login_session<br><br>UPDATES</div><br><hr><br>";
			$pass='goodday*123';
			@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
			@mysql_select_db(DB_DATABASE) or die("Could not connect.");
			$uquery1=mysql_query("SELECT * FROM company WHERE date>=now() ORDER BY id DESC");
			if(!$uquery1)
				die("Could not Connect. Please try again later.");
			while($row=mysql_fetch_assoc($uquery1))
			{
				echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbspPackage: {$row['package']} L &nbsp Cut off:(SSC) {$row['sslc']} (HSC) {$row['puc']} (UG) {$row['ug']} (PG) {$row['pg']} &nbsp &nbsp Category: {$row['type']} &nbsp Date: {$row['date']} </div><br><br><br><br> ";

			}
			if(mysql_num_rows($uquery1)<2)
				echo "<br><br>";
		?>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>