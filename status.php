<?php
	require_once 'config.php';
	include 'session.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<link rel="stylesheet" href="styles/account.css">
	<style type="text/css">
		section
		{
			padding-bottom: 50px;
			width: 800px;
			margin-left: auto;
			margin-right: auto;
			min-height: 500px;
		}
		#data_
		{
			margin-left: 150px;
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
			echo "<div id='welcome_'>YOUR STATUS</div><br>";
			echo "<hr/><br>";
			@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect to Database. Please try again later.');
			@mysql_select_db(DB_DATABASE) or die('Could not connect to Database. Please try again later.');
			$query="SELECT opendream,dream,core,mass,openmass FROM test1 WHERE usn='{$_SESSION['login_id']}' ";
			$query_run=mysql_query($query);
			$data=mysql_fetch_assoc($query_run);
			echo "<br><br><div id='data_'>OPEN DREAM COMPANY: {$data['opendream']}</div><br>";
			echo "<div id='data_'>DREAM COMPANY: {$data['dream']}</div><br>";
			echo "<div id='data_'>CORE COMPANY: {$data['core']}</div><br>";
			echo "<div id='data_'>MASS COMPANY: {$data['mass']}</div><br>";
			echo "<div id='data_'>OPEN MASS COMPANY: {$data['openmass']}</div><br><br><hr>";
		?>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>