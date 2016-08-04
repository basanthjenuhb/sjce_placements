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
	<link rel="stylesheet" href="styles/blog.css">
	<style type="text/css">
		section
		{
			min-height: 500px;
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
		<div id="write">
			<a href='write.php'><li>Write</li></a>
		</div>
		<section id="section_">
			<nav id="nav_">
			<ul >
				<a href="account.php"><li>Home</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="status.php"><li>your status</li></a>
				<a href="recruiters.php"><li>Recruiters</li></a>
				<a href="info.php"><li>Profile</li></a>
				<a href="blog.php"><li>blog</li></a>
				<a href="faq.php"><li>FAQ</li></a>
				<a href="logout.php"><li>Logout</li></a>
			</ul>
		</nav>
		<div id='blog'>
			<div id="bloghead">
				My Journey....!<br><br><hr>
			</div>
			<div id="blogs">
				<?php
					mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
					mysql_select_db(DB_DATABASE);
					$sql1=mysql_query('SELECT * FROM blog ORDER BY id DESC');
					while($row=mysql_fetch_assoc($sql1))
					{
						$id = $row['id'];
						$title = $row["title"];
						$contents = $row["contents"];
						$contents = nl2br($contents);
						$author = $row["author"];
						$date = $row["date"];
						$date = strftime("%b %d, %y", strtotime($date));
						echo "<br><div id='blogtitle'>$id . $title | $date</div>";
						echo "<br><div id='author'>$author</div><br>";
						echo "<br><div id='blogcontent'>$contents<br><br><hr></div>";
					}
				?>
				<hr>
			</div>
		</div>
		</section>
		</div>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>