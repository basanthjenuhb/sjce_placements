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
		}
	</style>
	<script type="text/javascript">
		function change(div,page,i)
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
			var val='';
			if(i==1)
			{
				val='submit';
			}
			parameter="pass="+document.getElementById('pass').value+"&pass1="+document.getElementById('pass1').value+"&pass2="+document.getElementById('pass2').value+"&check="+val+"&usn="+document.getElementById('usn').value;
			if(i==1)
			{
				document.getElementById("pass").value='';
				document.getElementById("pass1").value='';
				document.getElementById("pass2").value='';
			}
			xmlhttp.open('POST',page,true);
			xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xmlhttp.send(parameter);
		}
		function clear()
		{
			document.getElementById("pass").value='';
		}
		function clear1()
		{
			document.getElementById("usn").value='';
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
		<?php
			@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
			@mysql_select_db(DB_DATABASE) or die("Could not connect.");
			//********************************************************************************************************//


			echo "<div id='welcome_'>Change p***word</div><br><hr><br><br>";
			$var3="msg2";
			$var4="change.php";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter password : </span> <input type='password' id='pass' name='password' onkeyup='change(\"{$var3}\",\"{$var4}\",0);'></div><br>";
			echo "<div id='msg2'></div>";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp Enter new password : </span> <input type='password' id='pass1' name='npassword1' onkeyup='change(\"{$var3}\",\"{$var4}\",0);'></div><br>";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbspConfirm password : </span> <input type='password' id='pass2' name='npassword2'  onkeyup='change(\"{$var3}\",\"{$var4}\",0);'></div><br>";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp</span> <input type='button' value='Submit' onclick='change(\"{$var3}\",\"{$var4}\",1);clear();'></div><br>";
			echo "<br><hr><br>";
			echo "<div id='welcome_'>Reset p***word</div><br><hr><br><br>";
			$var6="msg4";
			$var7="reset.php";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter USN : </span> <input type='text' id='usn' name='usn' autocomplete='off' maxlength='10' onkeyup='change(\"{$var6}\",\"{$var7}\",0);'></div><br>";
			echo "<div id='msg4'></div>";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span> <input type='button' value='Submit' onclick='change(\"{$var6}\",\"{$var7}\",1);clear1();'></div><br>";

		?>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>