<?php
	require_once '../config.php';
	include_once 'session.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="../Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<meta http-equiv="refresh" content="">
	<link rel="stylesheet" href="../styles/admin.css">
	<style type="text/css">
		section
		{
			width: 1212px;
			margin-left: auto;
			margin-right: auto;
			min-height: 500px;
		}
	</style>
	<script type="text/javascript">
		function register(i,task)
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
					document.getElementById('b_div').innerHTML=xmlhttp.responseText;
				}
			}
			var spot='cname['+i+"]";
			parameters="cname="+document.getElementById(spot).value+"&task="+task;
			xmlhttp.open('POST','setreg.php',true);
			xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
		}
		function place()
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
					document.getElementById('c_div').innerHTML=xmlhttp.responseText;
				}
			}
			var parameters="usn="+document.getElementById('usn').value;
			xmlhttp.open('POST','setplace.php',true);
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
		<div id='welcome_'>REGISTER<br><br><hr></div><br><br>
		<?php
		?>
		<div id='b_div'>
			<?php
				if(isset($_SESSION['msgforplace']))
				{
					echo "<span id='msg'> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp {$_SESSION['msgforplace']}</span>";
					include_once 'place.php';
					unset($_SESSION['msgforplace']); 
				}
				include_once 'list.php'; 
			?>
		</div>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>