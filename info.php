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
		#msg2
		{
			margin-left: 100px;
		}
		section
		{
			width:800px;
			margin-left:auto;
			margin-right:auto;
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
			parameter="email="+document.getElementById('email').value+"&phone="+document.getElementById('phone').value+"&pass="+document.getElementById('pass').value+"&pass1="+document.getElementById('pass1').value+"&pass2="+document.getElementById('pass2').value+"&check="+val;
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
			echo "<div id='welcome_'>Welcome $login_session</div><br><hr>";
			@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
			@mysql_select_db(DB_DATABASE) or die("Could not connect.");
			$pquery1=mysql_query("SELECT sslc,puc,ug,pg,backs,email,phone FROM test1 WHERE usn='{$_SESSION['login_id']}'");
			if(!$pquery1)
				die("404 Error.");
			if(mysql_num_rows($pquery1)!=1)
				die("Invalid Entry.");
			$prow1=mysql_fetch_assoc($pquery1);
			echo "<br><br>";
			echo "<center><div id='msg1'>Email : {$prow1['email']} &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Phone : {$prow1['phone']}</div></center>";
			echo "<br><br>";
			$var1="msg1";
			$var2="change.php";
			echo "<div id='changestuff'><center><span id='msg1'>Change Email : </span> <input type='text' id='email' name='email' value='{$prow1['email']}' onkeyup='change(\"{$var1}\",\"{$var2}\",0);'></center></div><br>";
			echo "<div id='changestuff'><center><span id='msg1'>Change Phone :</span> <input type='text'  id='phone' name='phone' name='email' value='{$prow1['phone']}' maxlength='10' onkeyup='change(\"{$var1}\",\"{$var2}\",0);'></center></div><br><br>";
			$backs='NO';
			if($prow1['backs']!=0)
				$backs='YES';
			if($prow1['pg']!=-1)
			echo "<center><span id='msg1'>SSC: {$prow1['sslc']}% &nbsp &nbsp HSC: {$prow1['puc']}% &nbsp &nbsp UG: {$prow1['ug']}  &nbsp &nbsp PG: {$prow1['pg']} &nbsp &nbsp BACKS: $backs </center>";
			else
			echo "<center><span id='msg1'>SSC: {$prow1['sslc']}% &nbsp &nbsp HSC: {$prow1['puc']}% &nbsp &nbsp UG: {$prow1['ug']} &nbsp &nbsp BACKS: $backs</center>";

			echo "<br><center><span id='msg1'>In case of errors, Please contact the Placement Cell - SJCE, Mysore.</center>";


			echo "<br><hr><br><br>";
			//********************************************************************************************************//


			echo "<div id='welcome_'>Change p***word</div><br><hr><br><br>";
			$var3="msg2";
			$var4="password.php";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter password : </span> <input type='password' id='pass' name='password' onkeyup='change(\"{$var3}\",\"{$var4}\",0);'></div><br>";
			echo "<div id='msg2'></div>";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp Enter new password : </span> <input type='password' id='pass1' name='npassword1' onkeyup='change(\"{$var3}\",\"{$var4}\",0);'></div><br>";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbspConfirm password : </span> <input type='password' id='pass2' name='npassword2'  onkeyup='change(\"{$var3}\",\"{$var4}\",0);'></div><br>";
			echo "<div id='changestuff'><span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp</span> <input type='button' value='Submit' onclick='change(\"{$var3}\",\"{$var4}\",1);clear();'></div><br>";
		?>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>