<?php
	require_once '../config.php';
	require_once 'session.php';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>SJCE</title>
	<link rel="stylesheet" href="../styles/admin.css">
	<script type="text/javascript">
		function register()
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
					document.getElementById('a_div').innerHTML=xmlhttp.responseText;
				}
			}
			var element=document.form1.category;
			for(var i=0;i<element.length;i++)
				if(element[i].checked)
				{
					var setcat=element[i].value;
					break;
				}
			var element=document.form1.sex;
			for(var i=0;i<element.length;i++)
				if(element[i].checked)
				{
					var setsex=element[i].value;
					break;
				}

			parameter="name="+document.getElementById('name').value+"&usn="+document.getElementById('usn').value+"&gp="+document.getElementById('gp').value+"&branch="+setcat+"&sex="+setsex;
			xmlhttp.open('POST','setstudent.php',true);
			xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xmlhttp.send(parameter);
		}
	</script>
</head
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
				<a href="admin.php"><li>Home</li></a>
				<a href="company1.php"><li>Company</li></a>
				<a href="#"><li>Add Student</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="search.php"><li>Search</li></a>
				<a href="logout.php"><li>Logout</li></a>
			</ul>
			</nav>
			<div id="heading1">
				<h1>WELCOME ADMIN</h1><br><hr>
			</div>
			<div id="wrap1">
			<div id='addcompany'>
				<h1>Add Student</h1>
					<br>
					<form name="form1" method="post" action="submitstudent.php">
					<b>Name</b> : <input type='text' name="name" id="name" autocomplete="off" onkeyup="register();" ><br><br>
					<b>USN</b> : <input type='text' name="usn" id="usn" autocomplete="off" maxlength="10" onkeyup="register();" ><br><br>
					<b>Branch</b>:<br>
					Computers <input type='radio' value="computers" name="category" id="category" onclick="register();"><br>
					Electronics <input type='radio' value="electronics" name='category' id="category" onclick="register();"><br>
					Information Science <input type='radio' value="information" name='category' id="category" onclick="register();"><br>
					Industrial <input type='radio' value="industrial" name='category' id="category" onclick="register();"><br>
					Electrical <input type='radio' value="electrical" name='category' id="category" onclick="register();"><br>
					Instrumentation <input type='radio' value="instrumentation" name='category' id="category" onclick="register();"><br>
					Civil <input type='radio' value="civil" name='category' id="category" onclick="register();"><br>
					Polymer <input type='radio' value="polymer" name='category' id="category" onclick="register();"><br>
					Environmental <input type='radio' value="environmental" name='category' id="category" onclick="register();"><br>
					Construction Technology <input type='radio' value="construction" name='category' id="category" onclick="register();"><br><br>
					<b>GP</b>: &nbsp&nbsp&nbsp<input type="number" id="gp" name="gp" size="20" min='0' max='10' step='any' onkeyup="register();"><br><br>
					Male <input type='radio' value="M" name='sex' id="sex" onclick="register();">
					Female <input type='radio' value="F" name='sex' id="sex" onclick="register();"><br>
					<br><input id="submit" type="button" value="Submit">
					</form>
			</div>
			<div id='a_div'>
				<?php if(isset($_SESSION['msg1']))
				echo $_SESSION['msg1'];
				unset($_SESSION['msg1']) ?>
			</div>
			</div>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>