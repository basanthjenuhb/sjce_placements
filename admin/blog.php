<?php
	require_once '../config.php';
	include 'session.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="../Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<link rel="stylesheet" href="../styles/blog.css">
	<style type="text/css">
		section
		{
			margin-left: 10px;
			min-height: 500px;
		}
		.submit1
		{
			cursor: pointer;
		}
		.test
		{
			width: 80px;
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
			<form method="post" action="downloadblog.php">
				<input type="number" name="id" width="5" class="test" min='0' max='10000' step='1'>
				<input type="submit" value="Submit" class="submit1">
			</form>
			<br>
			<form method="post" action="downloadall.php">
				<input type="submit" class="submit1" value="Download all">
			</form>
		</div>
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
						echo "<br><div id='blogcontent'>$contents<br><br><hr></div>";
						echo "<br><div id='author'>$author</div><br>";
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