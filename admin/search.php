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
	<link rel="stylesheet" href="../styles/admin.css">
	<script type="text/javascript">
		function search(div,page)
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
					document.getElementById(div).innerHTML=xmlhttp.responseText;
				}
			}
			parameter="usn="+document.getElementById('usn').value+"&name="+document.getElementById('name').value+"&company="+document.getElementById('cname').value;
			xmlhttp.open('POST',page,true);
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
		<center><div>
				<h1 id="search0">SEARCH<br><br><hr><br></h1>
				<div id='search1'>
					Enter the USN of the student:<br><br>
					<input type="text" id="usn" maxlength="10" autocomplete='off' onkeyup="search('find','find.php');">
					<div id="find"></div>
					<br><br><hr><br><hr><br>
				</div>
				<div id='search1'>
					Enter the Name of the student:<br><br>
					<input type="text" id="name" autocomplete='off' onkeyup="search('show','show.php');">
					<div id="show"></div>
					<br><br><hr><br><hr><br>
				</div>
				<div id='search1'>
					Enter the Name of the Company:<br><br>
					<input type="text" id="cname" autocomplete='off' onkeyup="search('company','searchcompany.php');">
					<div id="company"></div>
					<br><br><hr>
				</div>
		</div>
		</center>		
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>