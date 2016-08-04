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
	<link rel="stylesheet" href="../styles/account.css">
	<style type="text/css">
		#msg2
		{
			margin-left: 100px;
		}
		section
		{
			width:800px;
			margin-left: 250px;
			min-height: 450px;
		}
		.set
		{
			width: 80px;
		}
	</style>
	<script type="text/javascript">
		function change1()
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
					document.getElementById('udiv').innerHTML=xmlhttp.responseText;
				}
			}
			parameter="usn="+document.getElementById('usn').value;
			xmlhttp.open('POST','setupdate.php',true);
			xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xmlhttp.send(parameter);
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
		<div id='welcome_'>UPDATE</div><br><hr><br><br>
		<form method="post" action="writeupdate.php">
		<div id='changestuff'><span id='msg1'>USN : </span> <input type='text' autocomplete='off' id='usn' name='usn' maxlength="10" onkeyup='change1();'></div><br>
		<div id='udiv'>
		</div>
		<div id='changestuff'>
		<span id='msg1'>SSLC : </span> <input type='number' id='sslc' class='set' step='any' name='sslc' onkeyup='change2();'>
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		<span id='msg1'>PUC : </span> <input type='number' id='puc' class='set' name='puc' step='any' onkeyup='change2();'>
		</div><br><br>
		<div id='changestuff'>
		<span id='msg1'>UG : </span> <input type='number' id='ug' class='set' name='ug' step='any' onkeyup='change2();'>
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		<span id='msg1'>PG : </span> <input type='number' id='pg' class='set' name='pg' step='any' onkeyup='change2();'>
		</div><br>
		<div id='changestuff'>
		<span id='msg1'>Backs : </span> <input type='number' id='backs' class='set' name='backs' step='any' onkeyup='change2();'>
		<input type="submit" value="submit">
		</div><br><br>
		</form>
		<?php
			if(isset($_SESSION['updatemsg']))
			{
				@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
				@mysql_select_db(DB_DATABASE) or die("Could not connect.");
				$uquery=mysql_query("SELECT * FROM test1 WHERE usn='{$_SESSION['updatemsg']}'");
				if($uquery && mysql_num_rows($uquery)==1)
				{
				$urow=mysql_fetch_assoc($uquery);
				echo "<div id='changestuff'><span id='msg1'>Name: {$urow['name']}</span></div><br>";
				echo "<div id='changestuff'><span id='msg1'>SSLC: {$urow['sslc']} &nbsp &nbsp &nbsp PUC: {$urow['puc']} &nbsp &nbsp &nbsp UG: {$urow['ug']} </span></div><br>";
				echo "<div id='changestuff'><span id='msg1'>PG: {$urow['pg']} &nbsp &nbsp &nbsp Backs: {$urow['backs']}</span></div><br>";
				}
			}
			unset($_SESSION['updatemsg']);
		?>
		<br>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>